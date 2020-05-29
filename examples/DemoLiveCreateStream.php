<?php
require('../vendor/autoload.php');
use Vcloud\Service\Live;

$client = Live::getInstance('cn-north-1');

echo "\nDemo 1\n";
$appID = 200002; // 获取必要参数
$response = $client->createStream($appID);
echo print_r($response);
