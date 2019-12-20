<?php
require('../vendor/autoload.php');
use Vcloud\Service\Live;

$client = Live::getInstance('cn-north-1');

echo "\nDemo 1\n";
$stream = '';
$startTime = 0;
$endTime = 0;
$response = $client->getStreamTimeShiftInfo($stream, $startTime, $endTime);
echo $response;

