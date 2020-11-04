## 使用方式

### composer引用
```
composer require ttvcloud/vcloud-sdk-php
```

### 地域Region设置
- 目前已开放三个地域设置，分别为
  ```
  - cn-north-1 (默认)
  - ap-singapore-1
  - us-east-1
  ```
- 默认为cn-north-1，如果需要调用其它地域服务，请在初始化函数getInstance中传入指定地域region，例如：
  ```
  $client = Vod::getInstance('us-east-1');
  ```
- 注意：IAM模块目前只开放cn-north-1区域

### AK/SK设置
- 在代码里显示调用VodService的方法setAccessKey/setSecretKey

- 在当前环境变量中分别设置 VCLOUD_ACCESSKEY="your ak"  VCLOUD_SECRETKEY = "your sk"

- json格式放在～/.vcloud/config中，格式为：{"ak":"your ak","sk":"your sk"}

以上优先级依次降低，建议在代码里显示设置，以便问题排查

### API

#### 上传

- 通过指定url地址上传

[uploadMediaByUrl](https://open.bytedance.com/docs/4/4652/)

- 服务端直接上传


上传视频包括 [applyUpload](https://open.bytedance.com/docs/4/2915/) 和 [commitUpload](https://open.bytedance.com/docs/4/2916/) 两步

上传封面图包括 [applyUpload](https://open.bytedance.com/docs/4/2915/) 和 [modifyVideoInfo](https://open.bytedance.com/docs/4/4367/) 两步


为方便用户使用，封装方法 uploadVideo 和 uploadPoster， 一步上传


#### 转码
[startTranscode](https://open.bytedance.com/docs/4/1670/)


#### 发布
[setVideoPublishStatus](https://open.bytedance.com/docs/4/4709/)


#### 播放
[getPlayInfo](https://open.bytedance.com/docs/4/2918/)

[getOriginVideoPlayInfo](https://open.bytedance.com/docs/4/11148/)

[getRedirectPlay](https://open.bytedance.com/docs/4/9205/)

#### 封面图
[getPosterUrl](https://open.bytedance.com/docs/4/5335/)

#### token相关
上传 非STS2 token [getUploadAuthToken](https://open.bytedance.com/docs/4/6275/)

上传 STS2 token [参考STS2示例](./examples/DemoVodSts2Upload.php)

[getPlayAuthToken](https://open.bytedance.com/docs/4/6275/)

PS: 上述两个接口和 [getRedirectPlay](https://open.bytedance.com/docs/4/9205/) 接口中均含有 X-Amz-Expires 这个参数

关于这个参数的解释为：设置返回的playAuthToken或uploadToken或follow 302地址的有效期，目前服务端默认该参数为15min（900s），如果用户认为该有效期过长，可以传递该参数来控制过期时间
。


#### 更多示例参见
example


## 封面图

1.GetDomainInfo 产品化对外域名调度接口，根据spaceName获取CDN域名（定期获取，本地缓存）

2.getPosterUrl 获取封面图地址

 包含四个参数，分别为：

1）space 空间名称

2）图片uri地址

3）降级域名及权重，形如['p1.test.com' => 10, 'p3.test.com' => 5]

4）option参数

- VOD_TPL_OBJ: 获取图片源文件，无参数

- VOD_TPL_NOOP: 获取压缩的原图，无参数(png为无损压缩，如果编码为png可能会变大)

- VOD_TPL_RESIZE: 仅下采样的等比缩略，需要参数宽高。如果某条边为0，则以另一条边进行等比缩略，否则以宽高比较短的来

- VOD_TPL_CENTER_CROP: 居中裁剪，需要参数宽高。居中裁剪尽量少的像素到指定的宽高比后缩略为指定的裁剪宽高，如果某条边为0，则使用原图的对应边的分辨率

- VOD_TPL_SMART_CROP: 智能裁剪，需要参数宽高。智能分析了图片内容，尽可能保留图片中想要保留的内容。

- VOD_TPL_SIG: 带签名鉴权的图片地址
