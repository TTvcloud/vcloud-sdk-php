<?php
require('../vendor/autoload.php');
use Vcloud\Service\Live;

$client = Live::getInstance('cn-north-1');

echo "\nDemo 1\n";
$stream = 'stream-1106753608883634317';
$response = $client->getStreamsPlayInfo([$stream]);
echo print_r($response);
