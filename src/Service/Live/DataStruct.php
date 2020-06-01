<?php

namespace Vcloud\Service\Live;

use Garoevans\PhpEnum\Enum;

class ResponseMetadata{
    public $requestId="";
    public $action="";
    public $version="";
    public $service="";
    public $region="";
    public $error;

    public function __construct($arr=[])
    {
        if ($arr["Error"] != null){
            $this->error = (object)[
                "codeN" => (int)$arr["Error"]["CodeN"],
                "code" => (string)$arr["Error"]["Code"],
                "message" => (string)$arr["Error"]["Message"],
            ];
        }

        $this->requestId = (string)$arr["RequestId"];
        $this->action = (string)$arr["Action"];
        $this->version = (string)$arr["Version"];
        $this->service = (string)$arr["Service"];
        $this->region = (string)$arr["Region"];
    }
}

class PushInfo {
    public $streamBase;
    public $main;
    public $backup;
    public $suggest="";

    public function __construct($arr=[])
    {
        $this->streamBase = new StreamBase($arr["StreamBase"]);
        $this->main = new ElePushInfo($arr["Main"]);
        if ($arr["Backup"] != null){
            $this->backup = new ElePushInfo($arr["Backup"]);
        }

        $this->suggest = (string)$arr["Suggest"];
    }
}

class StreamBase {
    public $appID = 0;
    public $stream = "";
    public $refID = "";
    public $status = EStreamStatus::unknown;
    public $extra = "";
    public $createTime = 0;

    public function __construct($arr=[])
    {
        $this->appID = (int)$arr["AppId"];
        $this->stream = (string)$arr["Stream"];
        $this->refID = (string)$arr["RefId"];
        $this->extra = (string)$arr["Extra"];
        $this->createTime = (int)$arr["CreateTime"];

        $this->status = new EStreamStatus($arr["Status"]);
    }
}

class EStreamStatus extends Enum {
    const __default = self::unknown;
    const unknown = -1;
    const create = 0;
    const living = 1;
    const stoped = 8;
}

class ElePushInfo{
    public $urls = [];
    public $vCodec = [];
    public $sdkParams = "";
    public $rtmpUrl = "";

    public function __construct($arr=[])
    {
        for ($i=0; $i<count($arr["Urls"]); $i++){
            $this->urls[$i] = (string)$arr["Urls"][$i];
        }

        for ($i=0; $i<count($arr["VCodec"]); $i++){
            $this->vCodec[$i] = (string)$arr["VCodec"][$i];
        }

        $this->sdkParams = (string)$arr["SdkParams"];
        $this->rtmpUrl = (string)$arr["RtmpUrl"];
    }
}

class PlayInfo {
    public $streamBase;
    public $main;
    public $backup;
    public $suggest="";
    public $streamData="";
    public $streamSizes = [];
    public $mainRecommendInfo;
    public $backupRecommendInfo;

    public function __construct($arr=[])
    {
        foreach ($arr["Main"] as $_ => $value) {
            $this->main[] = new ElePlayInfo($value);
        }

        if ($arr["Backup"] != null){
            foreach ($arr["Backup"] as $_ => $value) {
                $this->backup[] = new ElePlayInfo($value);
            }
        }

        for ($i=0; $i<count($arr["StreamSizes"]); $i++){
            $this->streamSizes[$i] = (string)$arr["StreamSizes"][$i];
        }

        $this->streamBase = new StreamBase($arr["StreamBase"]);
        $this->mainRecommendInfo = new Recommendation($arr["MainRecommendInfo"]);
        $this->backupRecommendInfo = new Recommendation($arr["BackupRecommendInfo"]);

        $this->suggest = (string)$arr["Suggest"];
        $this->streamData = (string)$arr["StreamData"];
    }
}

class ElePlayInfo{
    public $urls;
    public $vCodec = "";
    public $sdkParams = "";
    public $size = "";

    public function __construct($arr=[])
    {
        $this->urls = (object)[
            "flvUrl" => (string)$arr["Url"]["FlvUrl"],
            "hlsUrl" => (string)$arr["Url"]["HlsUrl"],
            "rtmpUrl" => (string)$arr["Url"]["RtmpUrl"],
            "cmafUrl" => (string)$arr["Url"]["CmafUrl"],
            "dashUrl" => (string)$arr["Url"]["DashUrl"],
        ];

        $this->vCodec = (string)$arr["VCodec"];
        $this->sdkParams = (string)$arr["SdkParams"];
        $this->size = (string)$arr["Size"];
    }
}

class Recommendation{
    public $defaultSize = "";

    public function __construct($arr=[])
    {
        $this->defaultSize = (string)$arr["DefaultSize"];
    }
}

