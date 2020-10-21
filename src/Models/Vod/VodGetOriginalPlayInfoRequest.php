<?php

namespace Vcloud\Models\Vod;

class VodGetOriginalPlayInfoRequest
{
    /**
     * @var string 视频ID Vid
     */
    public $Vid;

    /**
     * @var string 播放地址是否base64编码，默认否，支持设置： 0-否，1-是 Base64
     */
    public $Base64;

    /**
     * @var string 返回https播放地址，默认否, 1-是；0-否 Ssl
     */
    public $Ssl;

    public function __construct()
    {

    }

    /**
     * For internal only. DO NOT USE IT.
     * @param $param
     */
    public function deserialize($param)
    {
        if ($param === null) {
            return;
        }
        if (array_key_exists("Vid", $param) and $param["Vid"] !== null) {
            $this->Vid = $param["Vid"];
        }

        if (array_key_exists("Base64", $param) and $param["Base64"] !== null) {
            $this->Base64 = $param["Base64"];
        }

        if (array_key_exists("Ssl", $param) and $param["Ssl"] !== null) {
            $this->Ssl = $param["Ssl"];
        }
    }

}