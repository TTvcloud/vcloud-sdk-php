<?php

namespace Vcloud\Service;

use Vcloud\Base\V4Curl;
use GuzzleHttp\Client;

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
                    'Version' => '2019-01-01',
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
    ];

    // 创建直播流
    public function createStream($appID, $stream = '', $delayTime = 3, $extra = '') {
        $json = [
            'AppID' => $appID,
            'Stream' => $stream,
            'DelayTime' => $delayTime,
            'Extra' => $extra
        ];

        $response = $this->request('CreateStream', ['json' => $json]);
        return (string)$response->getBody();
    }

    // 获取推流信息
    public function getStreamsPushInfo(array $streams, $expireDuration = 60) {
        $json = [
            'Streams' => $streams,
            'ExpireDuration' => $expireDuration
        ];

        $response = $this->request('MGetStreamsPushInfo', ['json' => $json]);
        return (string)$response->getBody();
    }

    // 获取播放地址
    public function getStreamsPlayInfo(array $streams) {
        $json = [
            'Streams' => $streams,
        ];

        $response = $this->request('MGetStreamsPlayInfo', ['json' => $json]);
        return (string)$response->getBody();
    }

    // 获取点播信息
    public function getVODs($stream) {
        $query = ['Stream' => $stream];

        $response = $this->request('GetVODs', ['query' => $query]);
        return (string)$response->getBody();
    }

    // 获取录像信息
    public function getRecords($stream) {
        $query = ['Stream' => $stream];

        $response = $this->request('GetRecords', ['query' => $query]);
        return (string)$response->getBody();
    }

    // 获取截图信息
    public function getSnapshots($stream) {
        $query = ['Stream' => $stream];

        $response = $this->request('GetSnapshots', ['query' => $query]);
        return (string)$response->getBody();
    }

    // 获取时移信息
    public function getStreamTimeShiftInfo($stream, $startTime, $endTime) {
        $query = [
            'Stream' => $stream,
            'StartTime' => $startTime,
            'EndTime' => $endTime,
        ];

        $response = $this->request('GetStreamTimeShiftInfo', ['query' => $query]);
        return (string)$response->getBody();
    }
}
