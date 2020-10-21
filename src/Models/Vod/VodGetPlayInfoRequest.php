<?php

namespace Vcloud\Models\Vod;

class VodGetPlayInfoRequest
{
    /**
     * @var string 视频ID Vid
     */
    public $Vid;

    /**
     * @var string 封装格式，支持mp4,dash,hls，默认mp4 Format
     */
    public $Format;

    /**
     * @var string 编码类型，默认h264，可选值为h264,h265等 Codec
     */
    public $Codec;

    /**
     * @var string 视频流清晰度，默认返回全部，支持：240p，360p，480p，540p，720p，1080p Definition
     */
    public $Definition;

    /**
     * @var string 流文件类型，默认video，支持：加密视频流evideo，加密音频流传eaudio，非加密视频流video，普通音频音频流audio FileType
     */
    public $FileType;

    /**
     * @var string 播放策略-水印贴片标签 LogoType
     */
    public $LogoType;

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

        if (array_key_exists("Format", $param) and $param["Format"] !== null) {
            $this->Format = $param["Format"];
        }

        if (array_key_exists("Codec", $param) and $param["Codec"] !== null) {
            $this->Codec = $param["Codec"];
        }

        if (array_key_exists("Definition", $param) and $param["Definition"] !== null) {
            $this->Definition = $param["Definition"];
        }

        if (array_key_exists("FileType", $param) and $param["FileType"] !== null) {
            $this->FileType = $param["FileType"];
        }

        if (array_key_exists("LogoType", $param) and $param["LogoType"] !== null) {
            $this->LogoType = $param["LogoType"];
        }

        if (array_key_exists("Base64", $param) and $param["Base64"] !== null) {
            $this->Base64 = $param["Base64"];
        }

        if (array_key_exists("Ssl", $param) and $param["Ssl"] !== null) {
            $this->Ssl = $param["Ssl"];
        }
    }

    /**
     * @return string
     */
    public function getVid(): string
    {
        return $this->Vid;
    }

    /**
     * @param string $Vid
     */
    public function setVid(string $Vid): void
    {
        $this->Vid = $Vid;
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->Format;
    }

    /**
     * @param string $Format
     */
    public function setFormat(string $Format): void
    {
        $this->Format = $Format;
    }

    /**
     * @return string
     */
    public function getCodec(): string
    {
        return $this->Codec;
    }

    /**
     * @param string $Codec
     */
    public function setCodec(string $Codec): void
    {
        $this->Codec = $Codec;
    }

    /**
     * @return string
     */
    public function getDefinition(): string
    {
        return $this->Definition;
    }

    /**
     * @param string $Definition
     */
    public function setDefinition(string $Definition): void
    {
        $this->Definition = $Definition;
    }

    /**
     * @return string
     */
    public function getFileType(): string
    {
        return $this->FileType;
    }

    /**
     * @param string $FileType
     */
    public function setFileType(string $FileType): void
    {
        $this->FileType = $FileType;
    }

    /**
     * @return string
     */
    public function getLogoType(): string
    {
        return $this->LogoType;
    }

    /**
     * @param string $LogoType
     */
    public function setLogoType(string $LogoType): void
    {
        $this->LogoType = $LogoType;
    }

    /**
     * @return string
     */
    public function getBase64(): string
    {
        return $this->Base64;
    }

    /**
     * @param string $Base64
     */
    public function setBase64(string $Base64): void
    {
        $this->Base64 = $Base64;
    }

    /**
     * @return string
     */
    public function getSsl(): string
    {
        return $this->Ssl;
    }

    /**
     * @param string $Ssl
     */
    public function setSsl(string $Ssl): void
    {
        $this->Ssl = $Ssl;
    }


}