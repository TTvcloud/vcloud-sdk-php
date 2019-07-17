<?php
require('../vendor/autoload.php');
use Vcloud\Service\Vod;

$vid = "your vid";

echo "\n获取源片播放地址\n";
$response = Vod::getInstance()->request('GetOriginVideoPlayInfo', ['query' => ['Vid' => $vid, 'Ssl' => 1]]);
echo (string)$response->getBody();