<?php
require('../vendor/autoload.php');
use Vcloud\Service\Vod;
use Vcloud\Service\VodOption;

$space = "your spaceName";
$uri = 'your uri';
// set fallbackWeights if necessary
$fallbackWeights = ['p1.test.com' => 10, 'p3.test.com' => 5];

// GetCdnDomainWeights demo
echo "\n获取domain map\n";
$response = Vod::getInstance()->request('GetCdnDomainWeights', ['query' => ['SpaceName' => $space]]);
echo (string)$response->getBody();

$opt = new VodOption();
$opt->setHttps(true);
$opt->setVodTplSmartCrop(600, 392);
$opt->setFormat(VodOption::$FORMAT_AWEBP);

echo "\n获取poster url\n";
$resp = Vod::getInstance()->getPosterUrl($space, $uri, $fallbackWeights, $opt);
var_dump($resp);