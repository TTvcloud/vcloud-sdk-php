<?php
require('../vendor/autoload.php');
use Vcloud\Service\Vod;

$client = Vod::getInstance();
// call below method if you dont set ak and sk in ～/.vcloud/config
// $client->setAccessKey($ak);
// $client->setSecretKey($sk);

$vid = "";
$tid = "";
$callbackArgs = "";
echo "\n启动工作流\n";
$input = json_encode(array());
$response = $client->startWorkflow([
    'form_params' => ['TemplateId' => $tid], 
    'Vid' => $vid, 
    'Input' => $input, 
    'Priority' => 0,
    'CallbackArgs' => $callbackArgs]); 
echo $response;
