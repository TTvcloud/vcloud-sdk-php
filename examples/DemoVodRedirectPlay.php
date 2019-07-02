<?php
require('../vendor/autoload.php');
use Vcloud\Service\Vod;

$vid = "your-vid";
$expire = 3600; // 请求的签名有效期

$string = Vod::getInstance()->getRequestUrl('RedirectPlay', ['query' => ['video_id' => $vid, 'X-Amz-Expires' => $expire]]);
echo $string;
