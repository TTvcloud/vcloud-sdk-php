<?php
require('../vendor/autoload.php');
use Vcloud\Service\Vod;

$vid = "your vid";
$space = "your space";

echo "\n修改发布状态\n";
$response = Vod::getInstance()->request('MediaSetVideoPublishStatus', ['json' => ['VideoId' => $vid, 'Space' => $space]]);
echo (string)$response->getBody();
