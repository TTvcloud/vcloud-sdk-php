<?php
require('../vendor/autoload.php');
use Vcloud\Service\Vod;
use Vcloud\Service\Tos;

$space = "your space";

echo "\n获取上传的Token\n";
$response = Vod::getInstance()->getUploadAuthToken($space);
echo (string)$response;

echo "\nstaging-1:获取Space列表\n";
$response = Vod::getInstance()->request('GetSpace', ['query' => ['Type' => 'list', 'ProjectNames' => 'default']]);
echo (string)$response->getBody();

echo "\nstaging-2:获取上传地址\n";
$response = Vod::getInstance()->request('ApplyUpload', ['query' => ['SpaceName' => $space]]);
echo (string)$response->getBody();

echo "\nstaging-3:初始化上传\n";
$uploadAddress = json_decode((string)$response->getBody(), true);

$oid = $uploadAddress['Result']['UploadAddress']['StoreInfos'][0]['StoreUri'];
$session = $uploadAddress['Result']['UploadAddress']['SessionKey'];
$auth = $uploadAddress['Result']['UploadAddress']['StoreInfos'][0]['Auth'];

echo "\nstaging-4:分片上传\n";
$uploadInfo = json_decode((string)$response->getBody(), true);
$uploadID = $uploadInfo['payload']['uploadID'];
$content = file_get_contents("./demo.mp4");
$crc32 = dechex(crc32($content));
$response = Tos::getInstance()->request('Upload', [
    'replace' => ['ObjectName' => $oid], 
    'headers' => ['Authorization' => $auth, 'Content-CRC32' => $crc32], 
    'query' => ['partNumber' =>0, 'uploadID' => $uploadID],
    'body' => $content
]);
echo (string)$response->getBody();

echo "\nstaing-5:确认上传\n";
$response = Vod::getInstance()->request('CommitUpload', ['query' => ['SpaceName' => $space], 'json' => ['SessionKey' => $session]]);
echo (string)$response->getBody();

