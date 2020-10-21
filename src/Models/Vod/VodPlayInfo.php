<?php

namespace Vcloud\Models\Vod;

class VodPlayInfo
{

    /**
     * @var string
     */
    public $FileID;
    /**
     * @var string
     */
    public $Md5;
    /**
     * @var string
     */
    public $FileType;
    /**
     * @var string
     */
    public $Format;
    /**
     * @var string
     */
    public $Codec;
    /**
     * @var string
     */
    public $Definition;
    /**
     * @var string
     */
    public $MainPlayUrl;
    /**
     * @var string
     */
    public $BackupPlayUrl;
    /**
     * @var float
     */
    public $Bitrate;
    /**
     * @var integer
     */
    public $Width;
    /**
     * @var integer
     */
    public $Height;
    /**
     * @var integer
     */
    public $Size;
    /**
     * @var string
     */
    public $CheckInfo;
    /**
     * @var string
     */
    public $IndexRange;
    /**
     * @var string
     */
    public $InitRange;
    /**
     * @var integer
     */
    public $PreloadSize;
    /**
     * @var integer
     */
    public $PreloadMinStep;
    /**
     * @var integer
     */
    public $PreloadMaxStep;
    /**
     * @var integer
     */
    public $PreloadInterval;
    /**
     * @var string
     */
    public $P2pVerifyUrl;
    /**
     * @var string
     */
    public $PlayAuth;
    /**
     * @var string
     */
    public $PlayAuthID;
    /**
     * @var string
     */
    public $LogoType;
    /**
     * @var string
     */
    public $Quality;

    /**
     * For internal only. DO NOT USE IT.
     * @param $param
     */
    public function deserialize($param)
    {
        if ($param === null) {
            return;
        }
        if (array_key_exists("FileID", $param) and $param["FileID"] !== null) {
            $this->FileID = $param["FileID"];
        }
        if (array_key_exists("Md5", $param) and $param["Md5"] !== null) {
            $this->Md5 = $param["Md5"];
        }
        if (array_key_exists("FileType", $param) and $param["FileType"] !== null) {
            $this->FileType = $param["FileType"];
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
        if (array_key_exists("MainPlayUrl", $param) and $param["MainPlayUrl"] !== null) {
            $this->MainPlayUrl = $param["MainPlayUrl"];
        }
        if (array_key_exists("BackupPlayUrl", $param) and $param["BackupPlayUrl"] !== null) {
            $this->BackupPlayUrl = $param["BackupPlayUrl"];
        }
        if (array_key_exists("Bitrate", $param) and $param["Bitrate"] !== null) {
            $this->Bitrate = $param["Bitrate"];
        }
        if (array_key_exists("Width", $param) and $param["Width"] !== null) {
            $this->Width = $param["Width"];
        }
        if (array_key_exists("Height", $param) and $param["Height"] !== null) {
            $this->Height = $param["Height"];
        }
        if (array_key_exists("Size", $param) and $param["Size"] !== null) {
            $this->Size = $param["Size"];
        }
        if (array_key_exists("Quality", $param) and $param["Quality"] !== null) {
            $this->Quality = $param["Quality"];
        }
        if (array_key_exists("LogoType", $param) and $param["LogoType"] !== null) {
            $this->LogoType = $param["LogoType"];
        }
        if (array_key_exists("PlayAuthID", $param) and $param["PlayAuthID"] !== null) {
            $this->PlayAuthID = $param["PlayAuthID"];
        }
        if (array_key_exists("PlayAuth", $param) and $param["PlayAuth"] !== null) {
            $this->PlayAuth = $param["PlayAuth"];
        }
        if (array_key_exists("P2pVerifyUrl", $param) and $param["P2pVerifyUrl"] !== null) {
            $this->P2pVerifyUrl = $param["P2pVerifyUrl"];
        }
        if (array_key_exists("PreloadInterval", $param) and $param["PreloadInterval"] !== null) {
            $this->PreloadInterval = $param["PreloadInterval"];
        }
        if (array_key_exists("PreloadMaxStep", $param) and $param["PreloadMaxStep"] !== null) {
            $this->PreloadMaxStep = $param["PreloadMaxStep"];
        }
        if (array_key_exists("PreloadMinStep", $param) and $param["PreloadMinStep"] !== null) {
            $this->PreloadMinStep = $param["PreloadMinStep"];
        }
        if (array_key_exists("PreloadSize", $param) and $param["PreloadSize"] !== null) {
            $this->PreloadSize = $param["PreloadSize"];
        }
        if (array_key_exists("InitRange", $param) and $param["InitRange"] !== null) {
            $this->InitRange = $param["InitRange"];
        }
        if (array_key_exists("IndexRange", $param) and $param["IndexRange"] !== null) {
            $this->IndexRange = $param["IndexRange"];
        }
        if (array_key_exists("CheckInfo", $param) and $param["CheckInfo"] !== null) {
            $this->CheckInfo = $param["CheckInfo"];
        }
    }

    /**
     * @return string
     */
    public function getFileID(): string
    {
        return $this->FileID;
    }

    /**
     * @param string $FileID
     */
    public function setFileID(string $FileID): void
    {
        $this->FileID = $FileID;
    }

    /**
     * @return string
     */
    public function getMd5(): string
    {
        return $this->Md5;
    }

    /**
     * @param string $Md5
     */
    public function setMd5(string $Md5): void
    {
        $this->Md5 = $Md5;
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
    public function getMainPlayUrl(): string
    {
        return $this->MainPlayUrl;
    }

    /**
     * @param string $MainPlayUrl
     */
    public function setMainPlayUrl(string $MainPlayUrl): void
    {
        $this->MainPlayUrl = $MainPlayUrl;
    }

    /**
     * @return string
     */
    public function getBackupPlayUrl(): string
    {
        return $this->BackupPlayUrl;
    }

    /**
     * @param string $BackupPlayUrl
     */
    public function setBackupPlayUrl(string $BackupPlayUrl): void
    {
        $this->BackupPlayUrl = $BackupPlayUrl;
    }

    /**
     * @return float
     */
    public function getBitrate(): float
    {
        return $this->Bitrate;
    }

    /**
     * @param float $Bitrate
     */
    public function setBitrate(float $Bitrate): void
    {
        $this->Bitrate = $Bitrate;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->Width;
    }

    /**
     * @param int $Width
     */
    public function setWidth(int $Width): void
    {
        $this->Width = $Width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->Height;
    }

    /**
     * @param int $Height
     */
    public function setHeight(int $Height): void
    {
        $this->Height = $Height;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->Size;
    }

    /**
     * @param int $Size
     */
    public function setSize(int $Size): void
    {
        $this->Size = $Size;
    }

    /**
     * @return string
     */
    public function getCheckInfo(): string
    {
        return $this->CheckInfo;
    }

    /**
     * @param string $CheckInfo
     */
    public function setCheckInfo(string $CheckInfo): void
    {
        $this->CheckInfo = $CheckInfo;
    }

    /**
     * @return string
     */
    public function getIndexRange(): string
    {
        return $this->IndexRange;
    }

    /**
     * @param string $IndexRange
     */
    public function setIndexRange(string $IndexRange): void
    {
        $this->IndexRange = $IndexRange;
    }

    /**
     * @return string
     */
    public function getInitRange(): string
    {
        return $this->InitRange;
    }

    /**
     * @param string $InitRange
     */
    public function setInitRange(string $InitRange): void
    {
        $this->InitRange = $InitRange;
    }

    /**
     * @return int
     */
    public function getPreloadSize(): int
    {
        return $this->PreloadSize;
    }

    /**
     * @param int $PreloadSize
     */
    public function setPreloadSize(int $PreloadSize): void
    {
        $this->PreloadSize = $PreloadSize;
    }

    /**
     * @return int
     */
    public function getPreloadMinStep(): int
    {
        return $this->PreloadMinStep;
    }

    /**
     * @param int $PreloadMinStep
     */
    public function setPreloadMinStep(int $PreloadMinStep): void
    {
        $this->PreloadMinStep = $PreloadMinStep;
    }

    /**
     * @return int
     */
    public function getPreloadMaxStep(): int
    {
        return $this->PreloadMaxStep;
    }

    /**
     * @param int $PreloadMaxStep
     */
    public function setPreloadMaxStep(int $PreloadMaxStep): void
    {
        $this->PreloadMaxStep = $PreloadMaxStep;
    }

    /**
     * @return int
     */
    public function getPreloadInterval(): int
    {
        return $this->PreloadInterval;
    }

    /**
     * @param int $PreloadInterval
     */
    public function setPreloadInterval(int $PreloadInterval): void
    {
        $this->PreloadInterval = $PreloadInterval;
    }

    /**
     * @return string
     */
    public function getP2pVerifyUrl(): string
    {
        return $this->P2pVerifyUrl;
    }

    /**
     * @param string $P2pVerifyUrl
     */
    public function setP2pVerifyUrl(string $P2pVerifyUrl): void
    {
        $this->P2pVerifyUrl = $P2pVerifyUrl;
    }

    /**
     * @return string
     */
    public function getPlayAuth(): string
    {
        return $this->PlayAuth;
    }

    /**
     * @param string $PlayAuth
     */
    public function setPlayAuth(string $PlayAuth): void
    {
        $this->PlayAuth = $PlayAuth;
    }

    /**
     * @return string
     */
    public function getPlayAuthID(): string
    {
        return $this->PlayAuthID;
    }

    /**
     * @param string $PlayAuthID
     */
    public function setPlayAuthID(string $PlayAuthID): void
    {
        $this->PlayAuthID = $PlayAuthID;
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
    public function getQuality(): string
    {
        return $this->Quality;
    }

    /**
     * @param string $Quality
     */
    public function setQuality(string $Quality): void
    {
        $this->Quality = $Quality;
    }



}