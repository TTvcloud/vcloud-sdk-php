<?php
namespace Vcloud\Service;

use Vcloud\Base\BaseCurl;

class Tos extends BaseCurl {
	protected function getConfig()
    {
        return [
            'host' => 'http://tos.snssdk.com',
            'config' => [
                'timeout' => 5.0,
                'headers' => [
                    'Accept' => 'application/json'
                ]
            ],
        ];
    }

    protected $apiList = [
        'InitUpload' => [
            'url' => '/{ObjectName}?uploads',
            'method' => 'post',
            'config' => []
        ],
        'Upload' => [
            'url' => '/{ObjectName}',
            'method' => 'put',
            'config' => []
        ],
        'CommitUpload' => [
            'url' => '/{ObjectName}',
            'method' => 'post',
            'config' => []
        ]
    ];
}
