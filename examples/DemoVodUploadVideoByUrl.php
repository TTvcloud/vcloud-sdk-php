<?php
require('../vendor/autoload.php');
require("../src/Models/Vod/request/VodUploadVideoByUrlRequest.php");
require("../src/Models/Vod/response/VodUploadByUrlResponse.php");

use Vcloud\Service\Vod;


$client = Vod::getInstance();
// call below method if you dont set ak and sk in ～/.vcloud/config
$client->setAccessKey('AKLTNDQ2YTRlNTBiYTg1NDcyNmE3MDA1MTUzNzc5MWMwNmI');
$client->setSecretKey('1ZOtyBZ89VERZdOfiUrPf24a3tTjRo1XIJbzccVHMrBvZo1jEn60LjClP2t05qWz');


$request = new VodUploadVideoRequest();
$request->setSpaceName('james-test');

$urlSet = new URLSet();
$urlSet->setSourceUrl("https://stream7.iqilu.com/10339/upload_transcode/202002/18/20200218114723HDu3hhxqIT.mp4");

$request->addURLSet($urlSet);

$response = $client->uploadVideoByUrl($request);
echo $response;
echo "\n";

$urlUploadResponse = new VodUploadByUrlResponse(json_decode($response, true));
echo json_encode($urlUploadResponse);
echo "\n";
echo $urlUploadResponse->ValuePairs[0]->SourceUrl;
echo "\n";
echo $urlUploadResponse->ValuePairs[0]->JobId;
