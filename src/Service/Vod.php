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

    protected $apiList = [
    ];
}
