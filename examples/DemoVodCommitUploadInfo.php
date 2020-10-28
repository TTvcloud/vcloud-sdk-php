<?php
require('../vendor/autoload.php');

use Vcloud\Service\Vod;


$client = Vod::getInstance();
// call below method if you dont set ak and sk in ～/.vcloud/config
$client->setAccessKey('your ak');
$client->setSecretKey('your sk');

$space = 'your space name';
$session = '';
$functions = '[{"Name": "GetMeta"},{"Name":"Snapshot","Input":{"SnapshotTime": 2.0}}]';
$callbackArgs = 'my callback';

$response = $client->commitUploadInfo(['query' => ['SpaceName' => $space, 'SessionKey' => $session, 'Functions' => $functions, 'CallbackArgs' => $callbackArgs]]);
echo $response;
echo "\n";