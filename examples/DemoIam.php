<?php
require('../vendor/autoload.php');
use Vcloud\Service\Iam;

echo "\nDemo 1\n";
$response = Iam::getInstance()->request('ListUsers');
echo (string)$response->getBody();

echo "\nDemo 2\n";
$response = Iam::getInstance()->request('ListUsers', [], 'cn-north-1');
echo (string)$response->getBody();

echo "\nDemo 3\n";
$response = Iam::getInstance()->request('ListUsers', ['query'=>['Limit'=>10, 'Offset'=>0]], 'cn-north-1');
echo (string)$response->getBody();

echo "\nDemo 4\n";
$ak = "YourAK";
$sk = "YourSK";
$response = Iam::getInstance()->request('ListUsers', ['v4_credentials'=>['ak'=>$ak, 'sk'=>$sk], 'query'=>['Limit'=>10, 'Offset'=>0]], 'cn-north-1');
echo (string)$response->getBody();


echo "\nDemo 5\n";
$client = new Iam($ak, $sk);
$response = $client->request('ListUsers');
echo (string)$response->getBody();

