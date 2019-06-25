<?php
require('../vendor/autoload.php');
use Vcloud\Service\Vod;

$vid = "your-vid";

echo "\nstaging 获取播放地址\n";
$response = Vod::getInstance()->request('GetPlayInfo', ['query' => ['video_id' => $vid]]);
echo (string)$response->getBody();

echo "\n获取新版本签名以后的openAPI连接\n";
$response = Vod::getInstance()->getPlayAuthToken(['query' => ['video_id' => $vid]]);
echo (string)$response;

echo "\n获取老版本签名以后的openAPI连接\n";
$response = Vod::getInstance()->getPlayAuthToken(['query' => ['video_id' => $vid]], "v0");
echo (string)$response;

