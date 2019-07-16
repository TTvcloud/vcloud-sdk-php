<?php
require('../vendor/autoload.php');
use Vcloud\Service\Vod;
use Vcloud\Service\Option;

$space = "popeye";
$uri = 'tos-cn-p-0000/lgtestshutu';
$fallbackWeights = ['p1.test.com' => 10, 'p3.test.com' => 5];

// GetCdnDomainWeights demo
echo "\n获取domain map\n";
$response = Vod::getInstance()->request('GetCdnDomainWeights', ['query' => ['SpaceName' => $space]]);
echo (string)$response->getBody();

$opt = new Option();
$opt->setHttps(true);
$opt->setVodTplSmartCrop(600, 392);
$opt->setFormat(Option::$FORMAT_AWEBP);

echo "\n获取poster url\n";
$resp = Vod::getInstance()->getPosterUrl($space, $uri, $fallbackWeights, $opt);
var_dump($resp);