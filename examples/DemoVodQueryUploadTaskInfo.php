<?php
require('../vendor/autoload.php');
require('../src/Models/Vod/request/VodQueryUploadTaskInfoRequest.php');
require('../src/Models/Vod/response/QueryUploadTaskInfoResponse.php');

use Vcloud\Service\Vod;
use Vcloud\Models\Vod\QueryUploadTaskInfoResponse;


$client = Vod::getInstance();
// call below method if you dont set ak and sk in ～/.vcloud/config
$client->setAccessKey('AKLTNDQ2YTRlNTBiYTg1NDcyNmE3MDA1MTUzNzc5MWMwNmI');
$client->setSecretKey('1ZOtyBZ89VERZdOfiUrPf24a3tTjRo1XIJbzccVHMrBvZo1jEn60LjClP2t05qWz');

$jobId = '020960ee78a441b1856b49abfa122938';

$request = new VodQueryUploadTaskInfoRequest();
$request->addJobId($jobId);

$response = new QueryUploadTaskInfoResponse();
try {
    $response = $client->queryUploadTaskInfo($request);
} catch (Exception $e) {
    echo $e;
}

echo $response->getResponseMetadata()->getRequestId();
echo $response->getResult()->getData()->getVideoInfoList()[0]->getVid();