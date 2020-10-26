<?php
require ("BaseResponse.php");


class VodUploadByUrlResponse extends BaseResponse
{
    public $ValuePairs;

    public function __construct($resp)
    {
        parent::__construct($resp);
        if ($resp['ResponseMetadata']['Error'] == null) {
            $data = $resp['Result']['Data'];
            $this->ValuePairs = array_map(function ($item) {
                return new ValuePair($item['JobId'], $item['SourceUrl']);
            }, $data);
        }
    }

}

class ValuePair
{
    public $JobId;
    public $SourceUrl;

    /**
     * ValuePairs constructor.
     * @param $JobId
     * @param $SourceUrl
     */
    public function __construct($JobId, $SourceUrl)
    {
        $this->JobId = $JobId;
        $this->SourceUrl = $SourceUrl;
    }


    /**
     * @return mixed
     */
    public function getJobId()
    {
        return $this->JobId;
    }

    /**
     * @param mixed $JobId
     */
    public function setJobId($JobId): void
    {
        $this->JobId = $JobId;
    }

    /**
     * @return mixed
     */
    public function getSourceUrl()
    {
        return $this->SourceUrl;
    }

    /**
     * @param mixed $SourceUrl
     */
    public function setSourceUrl($SourceUrl): void
    {
        $this->SourceUrl = $SourceUrl;
    }


}
