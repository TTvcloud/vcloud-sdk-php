<?php


class Functions
{
    static private $functions = array();

    public static function addGetMetaFunc()
    {
        array_push(self::$functions, ['Name' => 'GetMeta']);
    }

    public static function addSnapshotFunc($snapShotTime)
    {
        array_push(self::$functions, ['Name' => 'Snapshot', 'Input' => ['SnapshotTime' => $snapShotTime]]);
    }

    public static function addOptionInfoFunc($title, $tags, $description, $category)
    {
        array_push(self::$functions, ['Name' => 'AddOptionInfo'
            , 'Input' => [
                'Title' => $title,
                'Tags' => $tags,
                'Description' => $description,
                'Category' => $category,
            ]]);
    }

    public static function addStartWorkflowFunc($templateId)
    {
        array_push(self::$functions, ['Name' => 'StartWorkflow', 'Input' => ['TemplateId' => $templateId]]);
    }

    public static function addEncryptionFunc($config, $policyParams)
    {
        array_push(self::$functions, ['Name' => 'Encryption', 'Input' => ['Config' => $config, 'PolicyParams' => $policyParams]]);
    }


    public static function getFunctions()
    {
        return json_encode(self::$functions);
    }

}