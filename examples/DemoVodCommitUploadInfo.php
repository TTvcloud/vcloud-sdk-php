<?php
require('../vendor/autoload.php');

use Vcloud\Service\Vod;


$client = Vod::getInstance();
// call below method if you dont set ak and sk in ～/.vcloud/config
$client->setAccessKey('AKLTNDQ2YTRlNTBiYTg1NDcyNmE3MDA1MTUzNzc5MWMwNmI');
$client->setSecretKey('1ZOtyBZ89VERZdOfiUrPf24a3tTjRo1XIJbzccVHMrBvZo1jEn60LjClP2t05qWz');

$space = 'james-test';
$session = 'eyJleHRyYSI6InZpZGM9Ym9lXHUwMDI2dnRzPTE2MDIzMTE3MTMzODA3Njg5MjVcdTAwMjZob3N0PWVkZ2UtdXBsb2FkLWJvZS5ieXRlZGFuY2UubmV0XHUwMDI2cmVnaW9uPUludHJhbmV0XHUwMDI2ZWRnZV9ub2RlPWJvZVx1MDAyNnVwbG9hZF9tb2RlPXNlcmlhbFx1MDAyNnN0cmF0ZWd5PWlkY19maWx0ZXJcdTAwMjZ1c2VyX2lwPTEwLjEuMTQuOTciLCJmaWxlVHlwZSI6InZpZGVvIiwic2NlbmUiOiIiLCJ0b2tlbiI6ImV5Sm9iM04wSWpvaVpXUm5aUzExY0d4dllXUXRZbTlsTG1KNWRHVmtZVzVqWlM1dVpYUWlMQ0p1YjI1alpTSTZJbnBOVmxKNlEzRldJaXdpZFhCc2IyRmtYM05wWjI0aU9pSlRWMVEwTms5T1YwNDVTakJFVDBaRlQwTTFXRHBRU1c5UFRVNXNkMVpGWVZCT1VucG5iR2xoYnpFeloyWTNPWFpLYWtaRlRuWlZMWFJIY0VFd1lYbEJQVHBhUjFab1drZDRjR0p0VlRaSlJFVXlUVVJKZWs5VVozaE5WRTA5T2s1RWJHaGFSRlpzV20xR2FWbDZUbWhPUjBsNlRXMUtiRnBFVm10YWFrMHdXbTFGTTFwdFVteFpNa1U5SW4wPTo2YWYyMjYzZDRkYjIyZDc4MjgxNGU2MmFiOGZiYjViZjZiYzNmNTI0YjlhZDdkODZjMGViYzhhNzM1OTk2ODExIiwidXJpIjoidG9zLWJvZS12LWRhMTQyMS80OWFkNWVmYWJjM2E0YjMyYmVkNWRmMzRmYTdmZGVjYSIsInZpZCI6InYwYzI1NWZhMDA3YWJ1MGxjOGEwb2VqNzdsYmJ2ZzgwIn0=';
$functions = '[{"Name": "GetMeta"},{"Name":"Snapshot","Input":{"SnapshotTime": 2.0}}]';
$callbackArgs = 'my callback';

$response = $client->commitUploadInfo(['query' => ['SpaceName' => $space, 'SessionKey' => $session, 'Functions' => $functions, 'CallbackArgs' => $callbackArgs]]);
echo $response;
echo "\n";