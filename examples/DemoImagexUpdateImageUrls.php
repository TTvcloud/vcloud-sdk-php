<?php
require('../vendor/autoload.php');
use Vcloud\Service\ImageX;
use Vcloud\Service\ImageXOption;

$client = ImageX::getInstance();

$serviceID = ""; // service ID
$urls = ["url1", "url2"];

echo "\n获取imagex url\n";
$resp = $client->updateImageUrls($serviceID, $urls);
var_dump($resp);
