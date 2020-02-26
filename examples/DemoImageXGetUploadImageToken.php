<?php
require('../vendor/autoload.php');

use Vcloud\Service\ImageX;


$xclient = ImageX::getInstance();
// call below method if you dont set ak and sk in ～/.vcloud/config
// $xclient->setAccessKey("your ak");
// $xclient->setSecretKey("your sk");


echo "\n上传ImageX\n";
$serviceIDList = ["your service id"];
$response = $xclient->getUploadAuth($serviceIDList, 3600);
echo json_encode($response);

echo "\n=======================\n";

$query = ['query' => ['ServiceId' => $serviceIDList]];
$response = $xclient->getUploadAuthToken($query);
echo $response;
