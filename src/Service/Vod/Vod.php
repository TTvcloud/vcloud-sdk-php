<?php

namespace Vcloud\Service\Vod;

use Cassandra\Value;
use Exception;
use Google\Protobuf\Internal\GPBDecodeException;
use Throwable;
use Vcloud\Base\V4Curl;
use \GuzzleHttp\Client;
use Vcloud\Models\Vod\Request\VodGetPlayInfoRequest;
use Vcloud\Models\Vod\Request\VodGetRecommendedPosterRequest;
use Vcloud\Models\Vod\Request\VodGetVideoInfosRequest;
use Vcloud\Models\Vod\Request\VodUpdateVideoInfoRequest;
use Vcloud\Models\Vod\Request\VodUpdateVideoPublishStatusRequest;
use Vcloud\Models\Vod\Response\VodGetPlayInfoResponse;
use Vcloud\Models\Vod\Request\VodGetOriginalPlayInfoRequest;
use Vcloud\Models\Vod\Response\VodGetOriginalPlayInfoResponse;
use Vcloud\Models\Vod\Response\VodGetRecommendedPosterResponse;
use Vcloud\Models\Vod\Response\VodGetVideoInfosResponse;
use Vcloud\Models\Vod\Response\VodUpdateVideoInfoResponse;
use Vcloud\Models\Vod\Response\VodUpdateVideoPublishStatusResponse;

const ResourceSpaceFormat = "trn:vod:%s:*:space/%s";
const ResourceVideoFormat = "trn:vod::*:video_id/%s";
const ResourceStreamTypeFormat = "trn:vod:::stream_type/%s";
const ResourceWatermarkFormat = "trn:vod::*:watermark/%s";
const ActionGetPlayInfo = "vod:GetPlayInfo";
const ActionApplyUpload = "vod:ApplyUpload";
const ActionCommitUpload = "vod:CommitUpload";
const Star = "*";
const Statement = "Statement";

class Vod extends V4Curl
{
    private static $UPDATE_INTERVAL = 10;
    private $lastDomainUpdateTime;
    private $domainCache = array();

    protected function getConfig(string $region)
    {
        switch ($region) {
            case 'cn-north-1':
                $config = [
                    'host' => 'https://staging-openapi-boe.byted.org',
//                    'host' => 'https://vod.bytedanceapi.com',
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
                break;
            case 'ap-singapore-1':
                $config = [
                    'host' => 'https://vod.ap-singapore-1.bytedanceapi.com',
                    'config' => [
                        'timeout' => 5.0,
                        'headers' => [
                            'Accept' => 'application/json'
                        ],
                        'v4_credentials' => [
                            'region' => 'ap-singapore-1',
                            'service' => 'vod',
                        ],
                    ],
                ];
                break;
            case 'us-east-1':
                $config = [
                    'host' => 'https://vod.us-east-1.bytedanceapi.com',
                    'config' => [
                        'timeout' => 5.0,
                        'headers' => [
                            'Accept' => 'application/json'
                        ],
                        'v4_credentials' => [
                            'region' => 'us-east-1',
                            'service' => 'vod',
                        ],
                    ],
                ];
                break;
            default:
                throw new \Exception("Cant find the region, please check it carefully");
        }
        return $config;
    }

    public function getSpace(array $query)
    {
        $response = $this->request('GetSpace', $query);
        return $response->getBody();
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

    /**
     * GetPlayInfo.
     *
     * @param $req VodGetPlayInfoRequest
     * @return VodGetPlayInfoResponse
     * @throws Exception the exception
     * @throws Throwable the exception
     */
    public function getPlayInfo(VodGetPlayInfoRequest $req): VodGetPlayInfoResponse
    {
        try {
            $jsonData = $req->serializeToJsonString();
            $query = json_decode($jsonData, true);
        } catch (Exception $e) {
            throw $e;
        } catch (Throwable $t) {
            throw $t;
        }
        try {
            $response = $this->request('GetPlayInfo', ['query' => $query]);
        } catch (Exception $e) {
            throw $e;
        } catch (Throwable $t) {
            throw $t;
        }
        if ($response->getStatusCode() != 200) {
            echo $response->getStatusCode(), "\n";
            echo $response->getBody()->getContents(), "\n";
        }
        $respData = new VodGetPlayInfoResponse();
        try {
            $respData->mergeFromJsonString($response->getBody(), true);
        } catch (Exception $e) {
            if ($respData == null || $respData->getResponseMetadata() == null) {
                echo $e, "\n";
                throw new Exception($response->getReasonPhrase());
            }
        } catch (Throwable $t) {
            if ($respData == null || $respData->getResponseMetadata() == null) {
                echo $t, "\n";
                throw new Exception($response->getReasonPhrase());
            }
        }
        return $respData;
    }

    /**
     * GetOriginalPlayInfo.
     *
     * @param $req VodGetOriginalPlayInfoRequest
     * @return VodGetOriginalPlayInfoResponse
     * @throws Exception the exception
     * @throws Throwable the exception
     */
    public function getOriginalPlayInfo(VodGetOriginalPlayInfoRequest $req): VodGetOriginalPlayInfoResponse
    {
        try {
            $jsonData = $req->serializeToJsonString();
            $query = json_decode($jsonData, true);
        } catch (Exception $e) {
            throw $e;
        } catch (Throwable $t) {
            throw $t;
        }
        try {
            $response = $this->request('GetOriginalPlayInfo', ['query' => $query]);
        } catch (Exception $e) {
            throw $e;
        } catch (Throwable $t) {
            throw $t;
        }
        if ($response->getStatusCode() != 200) {
            echo $response->getStatusCode(), "\n";
            echo $response->getBody()->getContents(), "\n";
        }
        $respData = new VodGetOriginalPlayInfoResponse();
        try {
            $respData->mergeFromJsonString($response->getBody(), true);
        } catch (Exception $e) {
            if ($respData == null || $respData->getResponseMetadata() == null) {
                echo $e, "\n";
                throw new Exception($response->getReasonPhrase());
            }
        } catch (Throwable $t) {
            if ($respData == null || $respData->getResponseMetadata() == null) {
                echo $t, "\n";
                throw new Exception($response->getReasonPhrase());
            }
        }
        return $respData;
    }


    public function uploadPoster(string $vid, string $spaceName, string $filePath)
    {
        $resp = $this->upload($spaceName, $filePath, "image");
        if ($resp[0] != 0) {
            return $resp[1];
        }
        $req = new VodUpdateVideoInfoRequest();
        $req->setVid($vid);
        $req->setPosterUriUnwrapped($resp[3]);
        $response = $this->updateVideoInfo($req);
        return (string)$response;
    }

    /**
     * UpdateVideoInfo.
     *
     * @param $req VodUpdateVideoInfoRequest
     * @return VodUpdateVideoInfoResponse
     * @throws Exception the exception
     * @throws Throwable the exception
     */
    public function updateVideoInfo(VodUpdateVideoInfoRequest $req): VodUpdateVideoInfoResponse
    {
        try {
            $jsonData = $req->serializeToJsonString();
            $query = json_decode($jsonData, true);
        } catch (Exception $e) {
            throw $e;
        } catch (Throwable $t) {
            throw $t;
        }
        try {
            $response = $this->request('UpdateVideoInfo', ['query' => $query]);
        } catch (Exception $e) {
            throw $e;
        } catch (Throwable $t) {
            throw $t;
        }
        if ($response->getStatusCode() != 200) {
            echo $response->getStatusCode(), "\n";
            echo $response->getBody()->getContents(), "\n";
        }
        $respData = new VodUpdateVideoInfoResponse();
        try {
            $respData->mergeFromJsonString($response->getBody(), true);
        } catch (Exception $e) {
            if ($respData == null || $respData->getResponseMetadata() == null) {
                echo $e, "\n";
                throw new Exception($response->getReasonPhrase());
            }
        } catch (Throwable $t) {
            if ($respData == null || $respData->getResponseMetadata() == null) {
                echo $t, "\n";
                throw new Exception($response->getReasonPhrase());
            }
        }
        return $respData;
    }

    /**
     * UpdateVideoPublishStatus.
     *
     * @param $req VodUpdateVideoPublishStatusRequest
     * @return VodUpdateVideoPublishStatusResponse
     * @throws Exception the exception
     * @throws Throwable the exception
     */
    public function updateVideoPublishStatus(VodUpdateVideoPublishStatusRequest $req): VodUpdateVideoPublishStatusResponse
    {
        try {
            $jsonData = $req->serializeToJsonString();
            $query = json_decode($jsonData, true);
            print_r($query);
        } catch (Exception $e) {
            throw $e;
        } catch (Throwable $t) {
            throw $t;
        }
        try {
            $response = $this->request('UpdateVideoPublishStatus', ['query' => $query]);
        } catch (Exception $e) {
            throw $e;
        } catch (Throwable $t) {
            throw $t;
        }
        if ($response->getStatusCode() != 200) {
            echo $response->getStatusCode(), "\n";
            echo $response->getBody()->getContents(), "\n";
        }
        $respData = new VodUpdateVideoPublishStatusResponse();
        try {
            $respData->mergeFromJsonString($response->getBody(), true);
        } catch (Exception $e) {
            if ($respData == null || $respData->getResponseMetadata() == null) {
                echo $e, "\n";
                throw new Exception($response->getReasonPhrase());
            }
        } catch (Throwable $t) {
            if ($respData == null || $respData->getResponseMetadata() == null) {
                echo $t, "\n";
                throw new Exception($response->getReasonPhrase());
            }
        }
        return $respData;
    }

    /**
     * GetVideoInfos.
     *
     * @param $req VodGetVideoInfosRequest
     * @return VodGetVideoInfosResponse
     * @throws Exception the exception
     * @throws Throwable the exception
     */
    public function getVideoInfos(VodGetVideoInfosRequest $req): VodGetVideoInfosResponse
    {
        try {
            $jsonData = $req->serializeToJsonString();
            $query = json_decode($jsonData, true);
        } catch (Exception $e) {
            throw $e;
        } catch (Throwable $t) {
            throw $t;
        }
        try {
            $response = $this->request('GetVideoInfos', ['query' => $query]);
        } catch (Exception $e) {
            throw $e;
        } catch (Throwable $t) {
            throw $t;
        }
        if ($response->getStatusCode() != 200) {
            echo $response->getStatusCode(), "\n";
            echo $response->getBody()->getContents(), "\n";
        }
        $respData = new VodGetVideoInfosResponse();
        try {
            $respData->mergeFromJsonString($response->getBody(), true);
        } catch (Exception $e) {
            if ($respData == null || $respData->getResponseMetadata() == null) {
                echo $e, "\n";
                throw new Exception($response->getReasonPhrase());
            }
        } catch (Throwable $t) {
            if ($respData == null || $respData->getResponseMetadata() == null) {
                echo $t, "\n";
                throw new Exception($response->getReasonPhrase());
            }
        }
        return $respData;
    }

    /**
     * GetRecommendedPoster.
     *
     * @param $req VodGetRecommendedPosterRequest
     * @return VodGetRecommendedPosterResponse
     * @throws Exception the exception
     * @throws Throwable the exception
     */
    public function getRecommendedPoster(VodGetRecommendedPosterRequest $req): VodGetRecommendedPosterResponse
    {
        try {
            $jsonData = $req->serializeToJsonString();
            $query = json_decode($jsonData, true);
        } catch (Exception $e) {
            throw $e;
        } catch (Throwable $t) {
            throw $t;
        }
        try {
            $response = $this->request('GetRecommendedPoster', ['query' => $query]);
        } catch (Exception $e) {
            throw $e;
        } catch (Throwable $t) {
            throw $t;
        }
        if ($response->getStatusCode() != 200) {
            echo $response->getStatusCode(), "\n";
            echo $response->getBody()->getContents(), "\n";
        }
        $respData = new VodGetRecommendedPosterResponse();
        try {
            $respData->mergeFromJsonString($response->getBody(), true);
        } catch (Exception $e) {
            if ($respData == null || $respData->getResponseMetadata() == null) {
                echo $e, "\n";
                throw new Exception($response->getReasonPhrase());
            }
        } catch (Throwable $t) {
            if ($respData == null || $respData->getResponseMetadata() == null) {
                echo $t, "\n";
                throw new Exception($response->getReasonPhrase());
            }
        }
        return $respData;
    }

    public function startWorkflow(array $query)
    {
        $response = $this->request('StartWorkflow', $query);
        return (string)$response->getBody();
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
        $response = $this->request('GetCdnDomainWeights', ['query' => ['SpaceName' => $space]]);
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

    public function getPosterUrl(string $space, string $uri, array $fallbackWeights, VodOption $opt)
    {
        $domainInfo = $this->getDomainInfo($space, $fallbackWeights);
        $proto = VodOption::$HTTP;
        if ($opt->getHttps()) {
            $proto = VodOption::$HTTPS;
        }
        $format = VodOption::$FORMAT_ORIGINAL;
        if (!empty($opt->getFormat())) {
            $format = $opt->getFormat();
        }
        $tpl = VodOption::$VOD_TPL_NOOP;
        if (!empty($opt->getTpl())) {
            $tpl = $opt->getTpl();
        }

        if ($tpl == VodOption::$VOD_TPL_OBJ || $tpl == VodOption::$VOD_TPL_NOOP) {
            $tpl = $opt->getTpl();
        } else {
            $tpl = sprintf('%s:%d:%d', $opt->getTpl(), $opt->getW(), $opt->getH());
        }

        $mainUrl = sprintf('%s://%s/%s~%s.%s', $proto, $domainInfo['MainDomain'], $uri, $tpl, $format);
        $backupUrl = sprintf('%s://%s/%s~%s.%s', $proto, $domainInfo['BackupDomain'], $uri, $tpl, $format);
        return array('MainUrl' => $mainUrl, 'BackupUrl' => $backupUrl);
    }

    public function getVideoPlayAuthWithExpiredTime(array $vidList, array $streamTypeList, array $watermarkList, int $expire)
    {
        $actions = [ActionGetPlayInfo];
        $resources = [];
        $this->addSts2Resources($vidList, ResourceVideoFormat, $resources);
        $this->addSts2Resources($streamTypeList, ResourceStreamTypeFormat, $resources);
        $this->addSts2Resources($watermarkList, ResourceWatermarkFormat, $resources);
        $statement = $this->newAllowStatement($actions, $resources);
        $policy = [
            Statement => [$statement],
        ];
        return $this->signSts2($policy, $expire);
    }

    public function getUploadVideoAuth()
    {
        return $this->getUploadVideoAuthWithExpiredTime(60 * 60);
    }

    public function getUploadVideoAuthWithExpiredTime(int $expire)
    {
        $actions = [ActionApplyUpload, ActionCommitUpload];
        $resources = [];
        $statement = $this->newAllowStatement($actions, $resources);
        $policy = [
            Statement => [$statement],
        ];
        return $this->signSts2($policy, $expire);
    }

    public function getVideoPlayAuth(array $vidList, array $streamTypeList, array $watermarkList)
    {
        return $this->getVideoPlayAuthWithExpiredTime($vidList, $streamTypeList, $watermarkList, 60 * 60);
    }

    private function addSts2Resources(array $list, string $resourceFormat, array &$resources)
    {
        if (sizeof($list) == 0) {
            $resources[] = sprintf($resourceFormat, Star);
        } else {
            foreach ($list as $value) {
                $resources[] = sprintf($resourceFormat, $value);
            }
        }
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
        'ApplyUploadInfo' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ApplyUploadInfo',
                    'Version' => '2020-08-01',
                ],
            ]
        ],
        'CommitUploadInfo' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CommitUploadInfo',
                    'Version' => '2020-08-01',
                ],
            ]
        ],
        'GetPlayInfo' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetPlayInfo',
                    'Version' => '2020-08-01',
                ],
            ]
        ],
        'GetOriginalPlayInfo' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetOriginalPlayInfo',
                    'Version' => '2020-08-01',
                ],
            ]
        ],
        'UploadMediaByUrl' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'UploadMediaByUrl',
                    'Version' => '2020-08-01',
                ],
            ]
        ],
        'QueryUploadTaskInfo' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'QueryUploadTaskInfo',
                    'Version' => '2020-08-01',
                ],
            ]
        ],
        'StartWorkflow' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'StartWorkflow',
                    'Version' => '2020-08-01',
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
        'UpdateVideoInfo' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'UpdateVideoInfo',
                    'Version' => '2020-08-01',
                ],
            ]
        ],
        'UpdateVideoPublishStatus' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'UpdateVideoPublishStatus',
                    'Version' => '2020-08-01',
                ],
            ]
        ],
        'GetVideoInfos' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetVideoInfos',
                    'Version' => '2020-08-01',
                ],
            ]
        ],
        'GetRecommendedPoster' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetRecommendedPoster',
                    'Version' => '2020-08-01',
                ],
            ]
        ],
    ];
}
