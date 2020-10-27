<?php
require("AbstractURLSet.php");
require("AbstractVodUrlUploadRequest.php");

class VodUrlUploadRequest extends AbstractVodUrlUploadRequest
{
    public $URLSets = array();

    public function addURLSet($URLSet)
    {
        array_push($this->URLSets, $URLSet);
    }


    public function getURLSetsJson()
    {
        return json_encode($this->URLSets);
    }

}

class URLSet extends AbstractURLSet implements JsonSerializable
{
    public function jsonSerialize()
    {
        $urlSet = array();
        if ($this->SourceUrl != "") {
            $urlSet['SourceUrl'] = $this->SourceUrl;
        }
        if ($this->CallbackArgs != "") {
            $urlSet['CallbackArgs'] = $this->CallbackArgs;
        }
        if ($this->Md5 != "") {
            $urlSet['Md5'] = $this->Md5;
        }
        if ($this->TemplateId != "") {
            $urlSet['TemplateId'] = $this->TemplateId;
        }
        if ($this->Title != "") {
            $urlSet['Title'] = $this->Title;
        }
        if ($this->Description != "") {
            $urlSet['Description'] = $this->Description;
        }
        if ($this->Tags != "") {
            $urlSet['Tags'] = $this->Tags;
        }
        if ($this->Category != "") {
            $urlSet['Category'] = $this->Category;
        }
        return $urlSet;
    }
}