<?php


class VodQueryUploadTaskInfoRequest
{
    private $jobIds = array();

    public function addJobId(string $jobId)
    {
        array_push($this->jobIds, $jobId);
    }

    public function getRequestArray()
    {
        return ['query' => ['JobIds' => implode(",", $this->jobIds)]];
    }
}