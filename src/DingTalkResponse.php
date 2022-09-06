<?php

namespace Openphp\Dingtalk;

/**
 * Class Result
 * @package Openphp\Dingtalk
 * @property int $errcode
 * @property string $errmsg
 */
class DingTalkResponse
{
    /**
     * @param $result
     */
    public function __construct($result)
    {
        $result = json_decode($result, true);
        foreach ($result as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }

    /**
     * @return false|string
     */
    public function toJson()
    {
        return json_encode(get_object_vars($this));
    }

}