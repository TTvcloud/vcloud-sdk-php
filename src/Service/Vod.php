<?php
namespace Vcloud\Service;

use Vcloud\Base\V4Curl;

class Vod extends V4Curl {
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
        case "v0":
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
        default :
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
    ];
}
