<?php


class Functions
{
    private $functions = array();

    function addGetMetaFunc()
    {
        array_push($this->functions, ['Name' => 'GetMeta']);
    }

    function addSnapshotFunc($snapShotTime)
    {
        array_push($this->functions, ['Name' => 'Snapshot', 'Input' => ['SnapshotTime' => $snapShotTime]]);
    }

    function getFunctions()
    {
        return json_encode($this->functions);
    }

}