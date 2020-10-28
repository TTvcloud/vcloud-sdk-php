<?php
require('../vendor/autoload.php');
require('../src/Models/Upload/request/VodQueryUploadTaskInfoRequest.php');

use Vcloud\Service\Vod;
use Vcloud\Models\Vod\QueryUploadTaskInfoResponse;


$client = Vod::getInstance();
// call below method if you dont set ak and sk in ～/.vcloud/config
$client->setAccessKey('your ak');
$client->setSecretKey('your sk');

$jobId = 'url jobId for query';

$request = new VodQueryUploadTaskInfoRequest();
$request->addJobId($jobId);

$response = new QueryUploadTaskInfoResponse();
try {
    $response = $client->queryUploadTaskInfo($request);
} catch (Exception $e) {
    echo $e;
}

echo $response->serializeToJsonString();
echo "\n";
echo $response->getResponseMetadata()->getRequestId();
echo "\n";
echo $response->getResult()->getData()->getVideoInfoList()[0]->getVid();
