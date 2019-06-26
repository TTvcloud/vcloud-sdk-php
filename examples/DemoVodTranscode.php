<?php
require('../vendor/autoload.php');
use Vcloud\Service\Vod;

$vid = "your vid";
$space = "your space";
$tid = "your template id";

echo "\n修改发布状态\n";
$response = Vod::getInstance()->request('StartTranscode', ['query' => ['TemplateId' => $tid], 'json' => ['Vid' => $vid]]);
echo (string)$response->getBody();
