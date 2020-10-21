<?php


namespace Vcloud\Models\Vod;


class VodAdaptiveInfo
{
    /**
     * @var string
     */
    public $MainPlayUrl;
    /**
     * @var string
     */
    public $BackupPlayUrl;
    /**
     * @var string
     */
    public $AdaptiveType;

    /**
     * For internal only. DO NOT USE IT.
     * @param $param
     */
    public function deserialize($param)
    {
        if ($param === null) {
            return;
        }
        if (array_key_exists("MainPlayUrl", $param) and $param["MainPlayUrl"] !== null) {
            $this->MainPlayUrl = $param["MainPlayUrl"];
        }
        if (array_key_exists("BackupPlayUrl", $param) and $param["BackupPlayUrl"] !== null) {
            $this->BackupPlayUrl = $param["BackupPlayUrl"];
        }
        if (array_key_exists("AdaptiveType", $param) and $param["AdaptiveType"] !== null) {
            $this->AdaptiveType = $param["AdaptiveType"];
        }
    }
}