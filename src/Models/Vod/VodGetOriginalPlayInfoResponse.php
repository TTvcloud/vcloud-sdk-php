<?php


namespace Vcloud\Models\Vod;


class VodGetOriginalPlayInfoResponse
{

    /**
     * @var float
     */
    public $Duration;
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
    public $Md5;

    public function deserialize($param)
    {
        if ($param === null) {
            return;
        }
        if (array_key_exists("Duration", $param) and $param["Duration"] !== null) {
            $this->Duration = $param["Duration"];
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
        if (array_key_exists("Md5", $param) and $param["Md5"] !== null) {
            $this->Md5 = $param["Md5"];
        }
    }

    /**
     * @return float
     */
    public function getDuration(): float
    {
        return $this->Duration;
    }

    /**
     * @param float $Duration
     */
    public function setDuration(float $Duration): void
    {
        $this->Duration = $Duration;
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


}