<?php
require('../vendor/autoload.php');

use Vcloud\Service\Vod;


$client = Vod::getInstance();
// call below method if you dont set ak and sk in ～/.vcloud/config
$client->setAccessKey('AKLTNDQ2YTRlNTBiYTg1NDcyNmE3MDA1MTUzNzc5MWMwNmI');
$client->setSecretKey('1ZOtyBZ89VERZdOfiUrPf24a3tTjRo1XIJbzccVHMrBvZo1jEn60LjClP2t05qWz');


echo "\n上传视频\n";
$space = "james-test";
$file = "/Users/bytedance/Downloads/objects.mp4";


$functionsStr = json_encode([['Name' => 'Snapshot', 'Input' => ['SnapshotTime' => 2.3]], ['Name' => 'GetMeta']]);

    $response = $client->uploadVideoToB(['query' => ['SpaceName' => $space]], $file, $functionsStr);
echo $response;
