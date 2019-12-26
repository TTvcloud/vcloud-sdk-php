<?php
require('../vendor/autoload.php');
use Vcloud\Service\Live;

$client = Live::getInstance('cn-north-1');

echo "\nDemo 1\n";
$stream = ''; // 流信息
$startTime = 1; // 正确的时间戳
$endTime = 2; // 正确的时间戳
$response = $client->getOnlineUserNum($stream, $startTime, $endTime);
echo $response;

