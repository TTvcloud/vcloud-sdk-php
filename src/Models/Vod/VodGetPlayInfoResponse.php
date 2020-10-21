<?php

namespace Vcloud\Models\Vod;

class VodGetPlayInfoResponse
{
    /**
     * @var string
     */
    public $Vid;
    /**
     * @var integer
     */
    public $Status;
    /**
     * @var string
     */
    public $PosterUrl;
    /**
     * @var float
     */
    public $Duration;
    /**
     * @var string
     */
    public $FileType;
    /**
     * @var boolean
     */
    public $EnableAdaptive;
    /**
     * @var integer
     */
    public $TotalCount;

    /**
     * @var VodAdaptiveInfo
     */
    public $AdaptiveInfo;
    /**
     * @var array(VodPlayInfo)
     */
    public $PlayInfoList;


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
        } else {
            throw new \Exception("InternalError.InvalidResponse");
        }

        if (array_key_exists("Status", $param) and $param["Status"] !== null) {
            $this->Status = $param["Status"];
        }

        if (array_key_exists("PosterUrl", $param) and $param["PosterUrl"] !== null) {
            $this->PosterUrl = $param["PosterUrl"];
        }

        if (array_key_exists("Duration", $param) and $param["Duration"] !== null) {
            $this->Duration = $param["Duration"];
        }

        if (array_key_exists("FileType", $param) and $param["FileType"] !== null) {
            $this->FileType = $param["FileType"];
        }

        if (array_key_exists("EnableAdaptive", $param) and $param["EnableAdaptive"] !== null) {
            $this->EnableAdaptive = $param["EnableAdaptive"];
        }

        if (array_key_exists("TotalCount", $param) and $param["TotalCount"] !== null) {
            $this->TotalCount = $param["TotalCount"];
        }

        if (array_key_exists("PlayInfoList", $param) and $param["PlayInfoList"] !== null) {
            $playInfoList = array();
            foreach ($param["PlayInfoList"] as $key => $row) {
                $playInfo = new VodPlayInfo();
                $playInfo->deserialize($row);
                $playInfoList[] = $playInfo;
            }
            $this->PlayInfoList = $playInfoList;
        }

        if (array_key_exists("AdaptiveInfo", $param) and $param["AdaptiveInfo"] !== null) {
            $adaptiveInfo = new VodAdaptiveInfo();
            $adaptiveInfo->deserialize($param["AdaptiveInfo"]);
            $this->AdaptiveInfo = $adaptiveInfo;
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
     * @return int
     */
    public function getStatus(): int
    {
        return $this->Status;
    }

    /**
     * @param int $Status
     */
    public function setStatus(int $Status): void
    {
        $this->Status = $Status;
    }

    /**
     * @return string
     */
    public function getPosterUrl(): string
    {
        return $this->PosterUrl;
    }

    /**
     * @param string $PosterUrl
     */
    public function setPosterUrl(string $PosterUrl): void
    {
        $this->PosterUrl = $PosterUrl;
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
     * @return bool
     */
    public function isEnableAdaptive(): bool
    {
        return $this->EnableAdaptive;
    }

    /**
     * @param bool $EnableAdaptive
     */
    public function setEnableAdaptive(bool $EnableAdaptive): void
    {
        $this->EnableAdaptive = $EnableAdaptive;
    }

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->TotalCount;
    }

    /**
     * @param int $TotalCount
     */
    public function setTotalCount(int $TotalCount): void
    {
        $this->TotalCount = $TotalCount;
    }

    /**
     * @return VodAdaptiveInfo
     */
    public function getAdaptiveInfo(): VodAdaptiveInfo
    {
        return $this->AdaptiveInfo;
    }

    /**
     * @param VodAdaptiveInfo $AdaptiveInfo
     */
    public function setAdaptiveInfo(VodAdaptiveInfo $AdaptiveInfo): void
    {
        $this->AdaptiveInfo = $AdaptiveInfo;
    }

    /**
     * @return array
     */
    public function getPlayInfoList(): array
    {
        return $this->PlayInfoList;
    }

    /**
     * @param array $PlayInfoList
     */
    public function setPlayInfoList(array $PlayInfoList): void
    {
        $this->PlayInfoList = $PlayInfoList;
    }


}

