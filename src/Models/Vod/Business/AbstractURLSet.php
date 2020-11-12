<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: vod/business/vod_upload.proto

namespace Vcloud\Models\Vod\Business;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>Vcloud.Models.Vod.AbstractURLSet</code>
 */
class AbstractURLSet extends \Google\Protobuf\Internal\Message
{
    /**
     *视频的URL
     *
     * Generated from protobuf field <code>string SourceUrl = 1;</code>
     */
    protected $SourceUrl = '';
    /**
     *透传的回调信息
     *
     * Generated from protobuf field <code>string CallbackArgs = 2;</code>
     */
    protected $CallbackArgs = '';
    /**
     *视频的MD5
     *
     * Generated from protobuf field <code>string Md5 = 3;</code>
     */
    protected $Md5 = '';
    /**
     * 模板Id
     *
     * Generated from protobuf field <code>string TemplateId = 4;</code>
     */
    protected $TemplateId = '';
    /**
     *标题
     *
     * Generated from protobuf field <code>string Title = 5;</code>
     */
    protected $Title = '';
    /**
     *描述信息
     *
     * Generated from protobuf field <code>string Description = 6;</code>
     */
    protected $Description = '';
    /**
     *标签
     *
     * Generated from protobuf field <code>string Tags = 7;</code>
     */
    protected $Tags = '';
    /**
     *分类
     *
     * Generated from protobuf field <code>string Category = 8;</code>
     */
    protected $Category = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $SourceUrl
     *          视频的URL
     *     @type string $CallbackArgs
     *          透传的回调信息
     *     @type string $Md5
     *          视频的MD5
     *     @type string $TemplateId
     *           模板Id
     *     @type string $Title
     *          标题
     *     @type string $Description
     *          描述信息
     *     @type string $Tags
     *          标签
     *     @type string $Category
     *          分类
     * }
     */
    public function __construct($data = NULL) {
        \Vcloud\Models\GPBMetadata\VodUpload::initOnce();
        parent::__construct($data);
    }

    /**
     *视频的URL
     *
     * Generated from protobuf field <code>string SourceUrl = 1;</code>
     * @return string
     */
    public function getSourceUrl()
    {
        return $this->SourceUrl;
    }

    /**
     *视频的URL
     *
     * Generated from protobuf field <code>string SourceUrl = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setSourceUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->SourceUrl = $var;

        return $this;
    }

    /**
     *透传的回调信息
     *
     * Generated from protobuf field <code>string CallbackArgs = 2;</code>
     * @return string
     */
    public function getCallbackArgs()
    {
        return $this->CallbackArgs;
    }

    /**
     *透传的回调信息
     *
     * Generated from protobuf field <code>string CallbackArgs = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setCallbackArgs($var)
    {
        GPBUtil::checkString($var, True);
        $this->CallbackArgs = $var;

        return $this;
    }

    /**
     *视频的MD5
     *
     * Generated from protobuf field <code>string Md5 = 3;</code>
     * @return string
     */
    public function getMd5()
    {
        return $this->Md5;
    }

    /**
     *视频的MD5
     *
     * Generated from protobuf field <code>string Md5 = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setMd5($var)
    {
        GPBUtil::checkString($var, True);
        $this->Md5 = $var;

        return $this;
    }

    /**
     * 模板Id
     *
     * Generated from protobuf field <code>string TemplateId = 4;</code>
     * @return string
     */
    public function getTemplateId()
    {
        return $this->TemplateId;
    }

    /**
     * 模板Id
     *
     * Generated from protobuf field <code>string TemplateId = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setTemplateId($var)
    {
        GPBUtil::checkString($var, True);
        $this->TemplateId = $var;

        return $this;
    }

    /**
     *标题
     *
     * Generated from protobuf field <code>string Title = 5;</code>
     * @return string
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     *标题
     *
     * Generated from protobuf field <code>string Title = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setTitle($var)
    {
        GPBUtil::checkString($var, True);
        $this->Title = $var;

        return $this;
    }

    /**
     *描述信息
     *
     * Generated from protobuf field <code>string Description = 6;</code>
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     *描述信息
     *
     * Generated from protobuf field <code>string Description = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->Description = $var;

        return $this;
    }

    /**
     *标签
     *
     * Generated from protobuf field <code>string Tags = 7;</code>
     * @return string
     */
    public function getTags()
    {
        return $this->Tags;
    }

    /**
     *标签
     *
     * Generated from protobuf field <code>string Tags = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setTags($var)
    {
        GPBUtil::checkString($var, True);
        $this->Tags = $var;

        return $this;
    }

    /**
     *分类
     *
     * Generated from protobuf field <code>string Category = 8;</code>
     * @return string
     */
    public function getCategory()
    {
        return $this->Category;
    }

    /**
     *分类
     *
     * Generated from protobuf field <code>string Category = 8;</code>
     * @param string $var
     * @return $this
     */
    public function setCategory($var)
    {
        GPBUtil::checkString($var, True);
        $this->Category = $var;

        return $this;
    }

}
