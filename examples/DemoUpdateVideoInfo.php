<?php
require('../vendor/autoload.php');

use Vcloud\Models\Vod\Request\VodUpdateVideoInfoRequest;
use Vcloud\Service\Vod\Vod;

$client = Vod::getInstance();
// call below method if you dont set ak and sk in ～/.vcloud/config
// $client->setAccessKey("");
// $client->setSecretKey("");

$vid = "vid";
$title = "title";
$tags = "tag1,tag2";

echo "\n修改发布状态\n";

$req = new VodUpdateVideoInfoRequest();
$req->setVid($vid);
$req->setTitleUnwrapped($title);
$req->setTagsUnwrapped($tags);
try {
    $response = $client->updateVideoInfo($req);
} catch (Throwable $e) {
    print($e);
}

echo $response->serializeToJsonString();


