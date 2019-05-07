<?php
require('../vendor/autoload.php');
use Vcloud\Service\Vod;

$space = "your space";
$url = "";

$response = Vod::getInstance()->request('UploadMediaByUrl', ['query' => ['SpaceName' => $space, 'Format' => 'mp4', 'SourceUrls' => $url]]);
echo (string)$response->getBody();
echo "\n";
