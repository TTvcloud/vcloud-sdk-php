<?php
namespace Vcloud\Service;

use Vcloud\Base\V4Curl;

class Iam extends V4Curl {
	protected function getConfig()
    {
        return [
            'host' => 'https://iam.bytedanceapi.com',
            'config' => [
                'timeout' => 5.0,
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'v4_credentials' => [
                    'region' => 'cn-north-1',
                    'service' => 'iam',
                ],
            ],
        ];
    }

    protected $apiList = [
        'CreateUser' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateUser',
                    'Version' => '2018-01-01',
                ],
            ],
        ],
        'ListUsers' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ListUsers',
                    'Version' => '2018-01-01',
                ],
            ],
        ],
    ];
}
