<?php
require('../vendor/autoload.php');
require("../src/Models/Upload/request/VodUrlUploadRequest.php");
require("../src/Models/Upload/response/VodUploadByUrlResponse.php");

use Vcloud\Service\Vod;


$client = Vod::getInstance();
// call below method if you dont set ak and sk in ～/.vcloud/config
$client->setAccessKey('your ak');
$client->setSecretKey('your sk');


$request = new VodUrlUploadRequest();
$request->setSpaceName('your space name');

$urlSet = new URLSet();
$urlSet->setSourceUrl("url");

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
