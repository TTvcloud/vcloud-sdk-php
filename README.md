##使用方式
####composer引用
```shell
composer require ttvcloud/vcloud-sdk-php
```
####aksk配置

1. 配置在业务代码中，直接使用

2. 配置相关的环境变量`VCLOUD_ACCESSKEY`,`VCLOUD_SECRETKEY`

3. 配置在默认的系统文件中`~/./vcloud/config`

   config文件结构

   ```json
   {
       "ak":"your ak",
       "sk":"your sk"
   }
   ```

##功能列表

>敬请期待

##Demo

1. 直接调用，会去获取`~/.vcloud/config`下的aksk信息，并且使用服务默认的region信息(这里使用cn-north-1)。

```php
<?php
require('../vendor/autoload.php');
use Vcloud\Service\Iam;
$response = Iam::getInstance()->request('ListUsers');
echo (string)$response->getBody();
```

2. 在有多个region的服务的场景，支持显示的指定调用的目标region。

```php
<?php
require('../vendor/autoload.php');
use Vcloud\Service\Iam;
$response = Iam::getInstance()->request('ListUsers', [], 'cn-north-1');
echo (string)$response->getBody();
```

3. 参数传递支持[guzzle的传参模式](<http://docs.guzzlephp.org/en/stable/request-options.html>)。

```php
<?php
require('../vendor/autoload.php');
use Vcloud\Service\Iam;
$response = Iam::getInstance()->request('ListUsers', ['query'=>['Limit'=>10, 'Offset'=>0]], 'cn-north-1');
echo (string)$response->getBody();
```

4. 也支持显示的传递aksk的场景。

```php
<?php
require('../vendor/autoload.php');
use Vcloud\Service\Iam;
$response = Iam::getInstance()->request('ListUsers', ['v4_credentials'=>['ak'=>$ak, 'sk'=>$sk], 'query'=>['Limit'=>10, 'Offset'=>0]], 'cn-north-1');
echo (string)$response->getBody();
```

5. 也支持独立初始化client的场景

```php
<?php
require('../vendor/autoload.php');
use Vcloud\Service\Iam;
$client = new Iam($ak, $sk);
$response = $client->request('ListUsers');
echo (string)$response->getBody();
```

