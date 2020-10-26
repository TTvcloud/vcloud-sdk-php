<?php
require('../vendor/autoload.php');

use Vcloud\Service\Vod;


$client = Vod::getInstance();
// call below method if you dont set ak and sk in ～/.vcloud/config
$client->setAccessKey('AKLTNDQ2YTRlNTBiYTg1NDcyNmE3MDA1MTUzNzc5MWMwNmI');
$client->setSecretKey('1ZOtyBZ89VERZdOfiUrPf24a3tTjRo1XIJbzccVHMrBvZo1jEn60LjClP2t05qWz');

$jobIds = ['b7a12ad6ce4541b9895b13067b36c204'];

$response = $client->queryUploadTaskInfo(['query' => ['JobIds' => implode(",", $jobIds)]]);
echo $response;
echo "\n";