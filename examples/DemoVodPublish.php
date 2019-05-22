<?php
require('../vendor/autoload.php');
use Vcloud\Service\Vod;

$vid = "your vid";
$space = "your space";

echo "\n修改发布状态\n";
$response = Vod::getInstance()->request('SetVideoPublishStatus', ['json' => ['Vid' => $vid, 'SpaceName' => $space, 'Status' => 'Published']]);
echo (string)$response->getBody();
