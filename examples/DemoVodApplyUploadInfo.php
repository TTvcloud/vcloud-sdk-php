<?php
require('../vendor/autoload.php');

use Vcloud\Service\Vod;


$client = Vod::getInstance();
// call below method if you dont set ak and sk in ～/.vcloud/config
$client->setAccessKey('your ak');
$client->setSecretKey('your sk');

$space = 'your space name';

$response = $client->applyUploadInfo(['query' => ['SpaceName' => $space]]);
echo $response;
echo "\n";