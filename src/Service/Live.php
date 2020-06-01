<?php

namespace Vcloud\Service;
require('Live/DataStruct.php');

use Vcloud\Base\V4Curl;
use GuzzleHttp\Client;
use Vcloud\Service\Live\PlayInfo;
use Vcloud\Service\Live\PushInfo;
use Vcloud\Service\Live\ResponseMetadata;

class Live extends V4Curl
{
    protected function getConfig(string $region)
    {
        switch ($region) {
            case 'cn-north-1':
                $config = [
                    'host' => 'https://live.bytedanceapi.com',
                    'config' => [
                        'timeout' => 5.0,
                        'headers' => [
                            'Accept' => 'application/json'
                        ],
                        'v4_credentials' => [
                            'region' => 'cn-north-1',
                            'service' => 'live',
                        ],
                    ],
                ];
                break;
            case 'ap-singapore-1':
                $config = [
                    'host' => 'https://live.ap-singapore-1.bytedanceapi.com',
                    'config' => [
                        'timeout' => 5.0,
                        'headers' => [
                            'Accept' => 'application/json'
                        ],
                        'v4_credentials' => [
                            'region' => 'ap-singapore-1',
                            'service' => 'live',
                        ],
                    ],
                ];
                break;
            case 'us-east-1':
                $config = [
                    'host' => 'https://live.us-east-1.bytedanceapi.com',
                    'config' => [
                        'timeout' => 5.0,
                        'headers' => [
                            'Accept' => 'application/json'
                        ],
                        'v4_credentials' => [
                            'region' => 'us-east-1',
                            'service' => 'live',
                        ],
                    ],
                ];
                break;
            default:
                throw new \Exception("Cant find the region, please check it carefully");
        }
        return $config;
    }

    protected $apiList = [
        'CreateStream' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'CreateStream',
                    'Version' => '2019-10-01',
                ],
            ]
        ],
        'MGetStreamsPushInfo' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'MGetStreamsPushInfo',
                    'Version' => '2019-10-01',
                ],
            ]
        ],
        'MGetStreamsPlayInfo' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'MGetStreamsPlayInfo',
                    'Version' => '2019-10-01',
                ],
            ]
        ],
        'GetVODs' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetVODs',
                    'Version' => '2019-10-01',
                ],
            ]
        ],
        'GetRecords' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetRecords',
                    'Version' => '2019-10-01',
                ],
            ]
        ],
        'GetSnapshots' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetSnapshots',
                    'Version' => '2019-10-01',
                ],
            ]
        ],
        'GetStreamTimeShiftInfo' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetStreamTimeShiftInfo',
                    'Version' => '2019-10-01',
                ],
            ]
        ],
        'GetOnlineUserNum' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetOnlineUserNum',
                    'Version' => '2019-10-01',
                ],
            ]
        ],
        'ForbidStream' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'ForbidStream',
                    'Version' => '2019-10-01',
                ],
            ]
        ]
    ];

    // 创建直播流
    public function createStream($appID, $stream = '', $delayTime = 0, $extra = '') {
        $json = [
            'AppID' => $appID,
            'Stream' => $stream,
            'DelayTime' => $delayTime,
            'Extra' => $extra
        ];

        $response = $this->request('CreateStream', ['json' => $json]);
        $respArr = json_decode((string)$response->getBody(),true);

        return (object)[
            "result" => (object)[
                "appID" => (int)$respArr["Result"]["AppID"],
                "stream" => (string)$respArr["Result"]["Stream"],
                "createTime" => (int)$respArr["Result"]["CreateTime"],
            ],
            "responseMetadata" => new ResponseMetadata($respArr["ResponseMetadata"])
        ];
    }

    // 获取推流信息
    public function getStreamsPushInfo(array $streams, $expireDuration = 60) {
        $json = [
            'Streams' => $streams,
            'ExpireDuration' => $expireDuration
        ];

        $response = $this->request('MGetStreamsPushInfo', ['json' => $json]);
        $respArr = json_decode((string)$response->getBody(),true);

        return (object)[
            "result" => array_map(function($value) {
                return new PushInfo($value);
            }, $respArr["Result"]["PushInfos"]),
            "responseMetadata" => new ResponseMetadata($respArr["ResponseMetadata"])
        ];
    }

    // 获取播放地址
    public function getStreamsPlayInfo(array $streams) {
        $json = [
            'Streams' => $streams,
        ];

        $response = $this->request('MGetStreamsPlayInfo', ['json' => $json]);
        $respArr = json_decode((string)$response->getBody(),true);

        return [
            "result" => array_map(function($value) {
                return new PlayInfo($value);
            }, $respArr["Result"]["PlayInfos"]),
            "responseMetadata" => new ResponseMetadata($respArr["ResponseMetadata"])
        ];
    }

    // 获取点播信息
    public function getVODs($stream) {
        $query = ['Stream' => $stream];

        $response = $this->request('GetVODs', ['query' => $query]);
        $respArr = json_decode((string)$response->getBody(),true);

        return [
            "result" => array_map(function($value) {
                    return (object)[
                        "sourceURL" => (string)$value["SourceURL"],
                        "vid" => (string)$value["VID"],
                        "duration" => (float)$value["Duration"],
                        "startTime" => (int)$value["StartTime"],
                        "endTime" => (int)$value["EndTime"]
                    ];
                }, $respArr["Result"]["VODs"]),
            "responseMetadata" => new ResponseMetadata($respArr["ResponseMetadata"])
        ];
    }

    // 获取录像信息
    public function getRecords($stream) {
        $query = ['Stream' => $stream];

        $response = $this->request('GetRecords', ['query' => $query]);
        $respArr = json_decode((string)$response->getBody(),true);

        return [
            "result" => array_map(function($value) {
                return (object)[
                    "url" => (string)$value["URL"],
                    "type" => (string)$value["Type"],
                    "duration" => (float)$value["Duration"],
                    "startTime" => (int)$value["StartTime"],
                    "endTime" => (int)$value["EndTime"],
                ];
            }, $respArr["Result"]["Records"]),
            "responseMetadata" => new ResponseMetadata($respArr["ResponseMetadata"])
        ];
    }

    // 获取截图信息
    public function getSnapshots($stream) {
        $query = ['Stream' => $stream];

        $response = $this->request('GetSnapshots', ['query' => $query]);
        $respArr = json_decode((string)$response->getBody(),true);

        return (object)[
            "result" => array_map(function($value) {
                return (object)[
                    "url" => (string)$value["URL"],
                    "timestamp" => (int)$value["Timestamp"],
                ];
            }, $respArr["Result"]["Snapshots"]),
            "responseMetadata" => new ResponseMetadata($respArr["ResponseMetadata"])
        ];
    }

    // 获取时移信息
    public function getStreamTimeShiftInfo($stream, $startTime, $endTime) {
        $query = [
            'Stream' => $stream,
            'StartTime' => $startTime,
            'EndTime' => $endTime,
        ];

        $response = $this->request('GetStreamTimeShiftInfo', ['query' => $query]);
        $respArr = json_decode((string)$response->getBody(),true);

        return (object)[
            "result" => (object)[
                "url" => (string)$respArr["Result"]["URL"],
                "startTime" => (int)$respArr["Result"]["StartTime"],
                "endTime" => (int)$respArr["Result"]["EndTime"],
                "vCodec" => (string)$respArr["Result"]["VCodec"],
            ],
            "responseMetadata" => new ResponseMetadata($respArr["ResponseMetadata"])
        ];
    }

    // 获取在线人数
    public function getOnlineUserNum($stream, $startTime, $endTime) {
        $query = [
            'Stream' => $stream,
            'StartTime' => $startTime,
            'EndTime' => $endTime,
        ];

        $response = $this->request('GetOnlineUserNum', ['query' => $query]);
        $respArr = json_decode((string)$response->getBody(),true);

        return (object)[
            "result" => array_map(function($value) {
                return (object)[
                    "num" => (int)$value["Num"],
                    "timestamp" => (int)$value["Timestamp"],
                ];
            }, $respArr["Result"]["OnlineUserNum"]),
            "responseMetadata" => new ResponseMetadata($respArr["ResponseMetadata"])
        ];
    }

    // 禁播单路流
    public function forbidStream($appID, $stream, $forbidInterval=0) {
        $json = [
            'AppID' => $appID,
            'Stream' => $stream,
            'ForbidInterval' => $forbidInterval,
        ];

        $response = $this->request('ForbidStream', ['json' => $json]);
        $respArr = json_decode((string)$response->getBody(),true);
        return (object)[
            "responseMetadata" => new ResponseMetadata($respArr["ResponseMetadata"])
        ];
    }
}
