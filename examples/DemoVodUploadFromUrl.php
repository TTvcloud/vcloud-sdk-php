<?php
require('../vendor/autoload.php');
use Vcloud\Service\Vod;

$space = "your space";
$url = "";

$response = Vod::getInstance()->request('UploadMediaByURL', ['query' => ['Space' => $space, 'Format' => 'mp4', 'SourceURLs' => $url]]);
echo (string)$response->getBody();
echo "\n";
