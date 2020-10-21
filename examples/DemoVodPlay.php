<?php
require('../vendor/autoload.php');

use Vcloud\Models\Vod\VodGetOriginalPlayInfoRequest;
use Vcloud\Models\Vod\VodGetOriginalPlayInfoResponse;
use Vcloud\Models\Vod\VodGetPlayInfoRequest;
use Vcloud\Models\Vod\VodGetPlayInfoResponse;
use Vcloud\Service\Vod;

$client = Vod::getInstance();
// call below method if you dont set ak and sk in ～/.vcloud/config
// $client->setAccessKey($ak);
// $client->setSecretKey($sk);

$vid = "v0c2c369007abu04ru8riko30uo9n73g";
$expire = 60; // 请求的签名有效期

echo "\nstaging 获取播放地址\n";
$req = new VodGetPlayInfoRequest();
$req->Vid = $vid;
$req->Ssl = '1';
$response = new VodGetPlayInfoResponse();
try {
    $response = $client->getPlayInfo($req);
} catch (Exception $e) {
    echo $e;
}
echo $response->getPlayInfoList()[0]->getMainPlayUrl(), "\n";
echo $response->getPlayInfoList()[0]->getBackupPlayUrl(), "\n";

echo "\n获取源片播放地址\n";
$req2 = new VodGetOriginalPlayInfoRequest();
$req2->Vid = $vid;
$req2->Ssl = '1';
$response2 = new VodGetOriginalPlayInfoResponse();
try {
    $response2 = $client->getOriginVideoPlayInfo($req2);
} catch (Exception $e) {
    echo $e;
}
echo $response2->getBackupPlayUrl();