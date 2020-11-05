<?php
require('../vendor/autoload.php');

use Vcloud\Models\Vod\Request\VodStartWorkflowRequest;
use Vcloud\Models\Vod\Response\VodStartWorkflowResponse;
use Vcloud\Service\Vod\Vod;

$client = Vod::getInstance();
// call below method if you dont set ak and sk in ～/.vcloud/config
$client->setAccessKey("111");
$client->setSecretKey("111");

$vid = "";
$tid = "";

$req = new VodStartWorkflowRequest();
$req->setVid($vid);
$req->setTemplateId($tid);
$response = new VodStartWorkflowResponse();
try {
    $response = $client->startWorkflow($req);
} catch (Exception $e) {
    echo $e;
}
