<?php
require('../vendor/autoload.php');
use Vcloud\Service\Vod;

$vid = "your vid";
$space = "your space";
$tip = "your template id";

echo "\n修改发布状态\n";
$response = Vod::getInstance()->request('StartTranscode', ['query' => ['TemplateId' => $tid], 'json' => ['Vid' => $vid, 'Input' => []]]);
echo (string)$response->getBody();
