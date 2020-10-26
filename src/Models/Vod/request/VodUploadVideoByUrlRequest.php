<?php

class VodUploadVideoRequest
{
    public $SpaceName;
    public $URLSets = array();

    /**
     * @return mixed
     */
    public function getSpaceName()
    {
        return $this->SpaceName;
    }

    /**
     * @param mixed $SpaceName
     */
    public function setSpaceName($SpaceName): void
    {
        $this->SpaceName = $SpaceName;
    }

    public function addURLSet($URLSet)
    {
        array_push($this->URLSets, $URLSet);
    }


    public function getURLSetsJson()
    {
        return json_encode($this->URLSets);
    }
}

class URLSet implements JsonSerializable
{
    public $SourceUrl;
    public $CallbackArgs;
    public $Md5;
    public $TemplateId;
    public $Title;
    public $Description;
    public $Tags;
    public $Category;

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

    /**
     * @return mixed
     */
    public function getCallbackArgs()
    {
        return $this->CallbackArgs;
    }

    /**
     * @param mixed $CallbackArgs
     */
    public function setCallbackArgs($CallbackArgs): void
    {
        $this->CallbackArgs = $CallbackArgs;
    }

    /**
     * @return mixed
     */
    public function getMd5()
    {
        return $this->Md5;
    }

    /**
     * @param mixed $Md5
     */
    public function setMd5($Md5): void
    {
        $this->Md5 = $Md5;
    }

    /**
     * @return mixed
     */
    public function getTemplateId()
    {
        return $this->TemplateId;
    }

    /**
     * @param mixed $TemplateId
     */
    public function setTemplateId($TemplateId): void
    {
        $this->TemplateId = $TemplateId;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * @param mixed $Title
     */
    public function setTitle($Title): void
    {
        $this->Title = $Title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param mixed $Description
     */
    public function setDescription($Description): void
    {
        $this->Description = $Description;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->Tags;
    }

    /**
     * @param mixed $Tags
     */
    public function setTags($Tags): void
    {
        $this->Tags = $Tags;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->Category;
    }

    /**
     * @param mixed $Category
     */
    public function setCategory($Category): void
    {
        $this->Category = $Category;
    }


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