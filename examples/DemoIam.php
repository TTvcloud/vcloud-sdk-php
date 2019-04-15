<?php
require('../vendor/autoload.php');
use Vcloud\Service\Iam;

$response = Iam::getInstance()->request('ListUsers');
echo (string)$response->getBody();
