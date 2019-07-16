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

##封面图和图片功能

1.GetDomainInfo 产品化对外域名调度接口，根据space_name获取CDN域名（定期获取，本地缓存）
2.getPosterUrl 获取封面图地址
3.getImageUrl 获取其它图片地址

2/3 包含四个参数，分别为：
1）space 空间名称
2）图片uri地址
3）降级域名及权重，形如['p1.test.com' => 10, 'p3.test.com' => 5]
4）option参数

VOD_TPL_OBJ: 获取图片源文件，无参数

VOD_TPL_NOOP: 获取压缩的原图，无参数(png为无损压缩，如果编码为png可能会变大)

VOD_TPL_RESIZE: 仅下采样的等比缩略，需要参数宽高。如果某条边为0，则以另一条边进行等比缩略，否则以宽高比较短的来

VOD_TPL_CENTER_CROP: 居中裁剪，需要参数宽高。居中裁剪尽量少的像素到指定的宽高比后缩略为指定的裁剪宽高，如果某条边为0，则使用原图的对应边的分辨率

VOD_TPL_SMART_CROP: 智能裁剪，需要参数宽高。智能分析了图片内容，尽可能保留图片中想要保留的内容。

VOD_TPL_SIG: 带签名鉴权的图片地址

示例参见demo。
