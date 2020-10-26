<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: vod_upload_url.proto

namespace Vcloud\Models\Vod;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>Vcloud.Models.Vod.VodUrlUploadRequest</code>
 */
class VodUrlUploadRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * 上传的空间名
     *
     * Generated from protobuf field <code>string SpaceName = 1;</code>
     */
    protected $SpaceName = '';
    /**
     * 上传URL参数
     *
     * Generated from protobuf field <code>repeated .Vcloud.Models.Vod.URLSet URLSets = 2;</code>
     */
    private $URLSets;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $SpaceName
     *           上传的空间名
     *     @type \Vcloud\Models\Vod\URLSet[]|\Google\Protobuf\Internal\RepeatedField $URLSets
     *           上传URL参数
     * }
     */
    public function __construct($data = NULL) {
        \Vcloud\Models\GPBMetadata\VodUploadUrl::initOnce();
        parent::__construct($data);
    }

    /**
     * 上传的空间名
     *
     * Generated from protobuf field <code>string SpaceName = 1;</code>
     * @return string
     */
    public function getSpaceName()
    {
        return $this->SpaceName;
    }

    /**
     * 上传的空间名
     *
     * Generated from protobuf field <code>string SpaceName = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setSpaceName($var)
    {
        GPBUtil::checkString($var, True);
        $this->SpaceName = $var;

        return $this;
    }

    /**
     * 上传URL参数
     *
     * Generated from protobuf field <code>repeated .Vcloud.Models.Vod.URLSet URLSets = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getURLSets()
    {
        return $this->URLSets;
    }

    /**
     * 上传URL参数
     *
     * Generated from protobuf field <code>repeated .Vcloud.Models.Vod.URLSet URLSets = 2;</code>
     * @param \Vcloud\Models\Vod\URLSet[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setURLSets($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Vcloud\Models\Vod\URLSet::class);
        $this->URLSets = $arr;

        return $this;
    }

}

