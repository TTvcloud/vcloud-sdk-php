<?php

namespace Vcloud\Service;

use Vcloud\Base\V4Curl;

class Vod extends V4Curl
{
    private static $UPDATE_INTERVAL = 10;
    private $lastDomainUpdateTime;
    private $domainCache = array();

    protected function getConfig()
    {
        return [
            'host' => 'https://vod.bytedanceapi.com',
            'config' => [
                'timeout' => 5.0,
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'v4_credentials' => [
                    'region' => 'cn-north-1',
                    'service' => 'vod',
                ],
            ],
        ];
    }

    public function getPlayAuthToken(array $config = [], string $version = "v1")
    {
        switch ($version) {
            case "v1":
                $token = ["Version" => $version];
                $token["GetPlayInfoToken"] = parse_url($this->getRequestUrl("GetPlayInfo", $config))["query"];
                return base64_encode(json_encode($token));
            case "v0": // deprecated func
                $url = $this->getRequestUrl("GetPlayInfo", $config);
                $m = parse_url($url);
                return $m["query"];
            default:
                $token = ["Version" => $version];
                $token["GetPlayInfoToken"] = parse_url($this->getRequestUrl("GetPlayInfo", $config))["query"];
                return base64_encode(json_encode($token));
        }
    }

    public function getUploadAuthToken(string $space, string $version = "v1")
    {
        $token = ["Version" => $version];

        switch ($version) {
            case "v1":
                $this->getUploadAuthTokenV1($space, $token);
            default:
                $token["Version"] = "v1";
                $this->getUploadAuthTokenV1($space, $token);
        }

        return base64_encode(json_encode($token));
    }

    private function getUploadAuthTokenV1(string $space, array &$token)
    {
        $url = $this->getRequestUrl("ApplyUpload", ["query" => ["SpaceName" => $space]]);
        $m = parse_url($url);

        $token["ApplyUploadToken"] = $m["query"];

        $url = $this->getRequestUrl("CommitUpload", ["query" => ["SpaceName" => $space]]);
        $m = parse_url($url);

        $token["CommitUpload"] = $m["query"];
    }

    private function getDomainInfo(string $space, array $fallbackWeights)
    {
        if (!empty($this->lastDomainUpdateTime)) {
            $now = time();
            if ($now - $this->lastDomainUpdateTime <= Vod::$UPDATE_INTERVAL) {
                $domainArray = $this->domainCache[$space];
                return $this->packDomainInfo($domainArray);
            }
        }

        $this->lastDomainUpdateTime = time();
        $response = Vod::getInstance()->request('GetCdnDomainWeights', ['query' => ['SpaceName' => $space]]);
        $respJson = json_decode($response->getBody(), true);
        if (array_key_exists('Error', $respJson['ResponseMetadata']) || !is_array($respJson['Result'][$space])) {
            $this->domainCache[$space] = $fallbackWeights;
        } else {
            $this->domainCache[$space] = $respJson['Result'][$space];
        }
        $domainArray = $this->domainCache[$space];
        return $this->packDomainInfo($domainArray);
    }

    private function packDomainInfo(array $domainArray)
    {
        $mainDomain = $this->randWeights($domainArray, '');
        $backupDomain = $this->randWeights($domainArray, $mainDomain);
        return array('MainDomain' => $mainDomain, 'BackupDomain' => $backupDomain);
    }

    public function getPosterUrl(string $space, string $uri, array $fallbackWeights, Option $opt)
    {
        $domainInfo = $this->getDomainInfo($space, $fallbackWeights);
        $proto = Option::$HTTP;
        if ($opt->getHttps()) {
            $proto = Option::$HTTPS;
        }
        $format = Option::$FORMAT_ORIGINAL;
        if (!empty($opt->getFormat())) {
            $format = $opt->getFormat();
        }
        $tpl = Option::$VOD_TPL_NOOP;
        if (!empty($opt->getTpl())) {
            $tpl = $opt->getTpl();
        }

        if ($tpl == Option::$VOD_TPL_OBJ || $tpl == Option::$VOD_TPL_NOOP) {
            $tpl = $opt->getTpl();
        } else {
            $tpl = sprintf('%s:%d:%d', $opt->getTpl(), $opt->getW(), $opt->getH());
        }

        $mainUrl = sprintf('%s://%s/%s~%s.%s', $proto, $domainInfo['MainDomain'], $uri, $tpl, $format);
        $backupUrl = sprintf('%s://%s/%s~%s.%s', $proto, $domainInfo['BackupDomain'], $uri, $tpl, $format);
        return array('MainUrl' => $mainUrl, 'BackupUrl' => $backupUrl);
    }

    public function getImageUrl(string $space, string $uri, array $fallbackWeights, Option $opt)
    {
        $domainInfo = $this->getDomainInfo($space, $fallbackWeights);
        $proto = Option::$HTTP;
        if ($opt->getHttps()) {
            $proto = Option::$HTTPS;
        }
        $format = Option::$FORMAT_ORIGINAL;
        if (!empty($opt->getFormat())) {
            $format = $opt->getFormat();
        }
        $sigKey = '';
        if (!empty($opt->getSig())) {
            $sigKey = $opt->getSig();
        }

        $path = sprintf('/%s~%s.%s', $uri, $opt->getTpl(), $format);
        $sigTxt = $path;
        if (!empty($opt->getKV())) {
            if (!empty(sigKey) && !empty($opt->getKV()['sig'])) {
                throw new Exception("cant specify sig key in kv and option both the time.");
            }
            $sigTxt = sprintf('%s?%s', $path, http_build_query($opt->getKV(), '', '&'));
        }
        if (!empty($sigKey)) {
            $sign = base64_encode((hash_hmac('sha1', $sigTxt, $sigKey, true)));
            $arr = $opt->getKV();
            if ($arr == NULL) {
                $arr = array('sig' => $sign);
            } else {
                $arr['sig'] = $sign;
            }
            var_dump($arr);
            $path = sprintf('%s?%s', $path, http_build_query($arr, '', '&'));
        }

        $mainUrl = sprintf('%s://%s%s', $proto, $domainInfo['MainDomain'], $path);
        $backupUrl = sprintf('%s://%s%s', $proto, $domainInfo['BackupDomain'], $path);
        return array('MainUrl' => $mainUrl, 'BackupUrl' => $backupUrl);
    }

    private function randWeights(array $domainWights, string $excludeDomain)
    {
        $weightSum = 0;
        foreach ($domainWights as $key => $value) {
            if ($key == $excludeDomain) {
                continue;
            }
            $weightSum += $value;
        }
        if ($weightSum <= 0) {
            return '';
        }
        $r = rand(1, $weightSum);
        foreach ($domainWights as $key => $value) {
            if ($key == $excludeDomain) {
                continue;
            }
            $r -= $value;
            if ($r <= 0) {
                return $key;
            }
        }
        return '';
    }

    protected $apiList = [
        'GetSpace' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetSpace',
                    'Version' => '2018-12-01',
                ],
            ]
        ],
        'ApplyUpload' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ApplyUpload',
                    'Version' => '2018-01-01',
                ],
            ]
        ],
        'CommitUpload' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'CommitUpload',
                    'Version' => '2018-01-01',
                ],
            ]
        ],
        'GetPlayInfo' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetPlayInfo',
                    'Version' => '2019-03-15',
                ],
            ]
        ],
        'UploadMediaByUrl' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'UploadMediaByUrl',
                    'Version' => '2018-01-01',
                ],
            ]
        ],
        'StartTranscode' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'StartTranscode',
                    'Version' => '2018-01-01',
                ],
            ]
        ],
        'SetVideoPublishStatus' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'SetVideoPublishStatus',
                    'Version' => '2018-01-01',
                ],
            ]
        ],
        'RedirectPlay' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'RedirectPlay',
                    'Version' => '2019-03-15',
                ],
            ]
        ],
        'GetCdnDomainWeights' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetCdnDomainWeights',
                    'Version' => '2019-07-01',
                ],
            ]
        ],
    ];
}
