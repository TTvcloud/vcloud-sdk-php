<?php

class BaseResponse
{
    public $RequestId;
    public $Action;
    public $Version;
    public $Service;
    public $Region;
    public $Error;

    public function __construct($resp)
    {
        $responseMetaData = $resp['ResponseMetadata'];
        if ($responseMetaData['Error'] == null) {
            $this->RequestId = $responseMetaData['RequestId'];
            $this->Action = $responseMetaData['Action'];
            $this->Version = $responseMetaData['Version'];
            $this->Service = $responseMetaData['Service'];
            $this->Region = $responseMetaData['Region'];
        } else {
            $this->Error = new ResponseError($responseMetaData['Error']);
        }
    }

}

class ResponseError
{
    public $Code;
    public $Message;

    public function __construct($code, $message)
    {
        $this->Code = $code;
        $this->Message = $message;
    }

}