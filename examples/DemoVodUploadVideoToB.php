<?php
require('../vendor/autoload.php');
require('../src/Models/Upload/request/Functions.php');

use Vcloud\Service\Vod;
use Vcloud\Models\Vod\VodUploadVideoRequest;
use Vcloud\Models\Vod\UploadVideoResponse;


$client = Vod::getInstance();
// call below method if you dont set ak and sk in ～/.vcloud/config
$client->setAccessKey('your ak');
$client->setSecretKey('your sk');


echo "\n上传视频\n";
$space = "your space name";
$filePath = "file path";


$functionsStr = json_encode([['Name' => 'Snapshot', 'Input' => ['SnapshotTime' => 2.3]], ['Name' => 'GetMeta']]);

Functions::addGetMetaFunc();
Functions::addSnapshotFunc(2.3);

$request = new VodUploadVideoRequest();
$request->setSpaceName($space);
$request->setFilePath($filePath);
$request->setCallbackArgs("my callback");
$request->setFunctions(Functions::getFunctions());

$response = $client->uploadVideoToB($request);
echo $response;

$uploadVideoResponse = new UploadVideoResponse();
try {
    $uploadVideoResponse->mergeFromJsonString($response, true);
} catch (Exception $e) {
    echo $e;
}
echo "\n";
echo $uploadVideoResponse->getResponseMetadata()->getRequestId();
echo "\n";
echo $uploadVideoResponse->getResult()->getData()->getVid();

