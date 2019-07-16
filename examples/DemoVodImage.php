<?php
require('../vendor/autoload.php');
use Vcloud\Service\Vod;
use Vcloud\Service\VodOption;

$space = "your spaceName";
$uri = 'your uri';
$fallbackWeights = ['p1.test.com' => 10, 'p3.test.com' => 5];

$opt = new VodOption();
$opt->setHttps(true);
$opt->setVodSig();
$opt->setFormat(VodOption::$FORMAT_AWEBP);
$opt->setSig('your sig');
$opt->setKV(array('from' => 'my测试'));

echo "\n获取image url\n";
$resp = Vod::getInstance()->getImageUrl($space, $uri, $fallbackWeights, $opt);
var_dump($resp);
