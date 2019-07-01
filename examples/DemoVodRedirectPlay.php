<?php
require('../vendor/autoload.php');
use Vcloud\Service\Vod;

$vid = "your-vid";

$string = Vod::getInstance()->getRequestUrl('RedirectPlay', ['query' => ['video_id' => $vid]]);
echo $string;
