<?php
require('../vendor/autoload.php');
use Vcloud\Service\Vod;

$vid = "your vid";
$expire = 3600; // 请求的签名有效期

// query params:
//      Vid
//      Definiton
//      Watermark
$string = Vod::getInstance()->getRequestUrl('RedirectPlay', ['query' => ['Vid' => $vid, 'X-Amz-Expires' => $expire]]);
echo $string;
