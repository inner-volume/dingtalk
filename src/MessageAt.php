<?php

namespace Openphp\Dingtalk;

trait MessageAt
{
    /**
     * @param $mobiles
     * @return $this
     */
    public function atMobiles($mobiles)
    {
        $this->message['at']['atMobiles'] = (array)$mobiles;
        return $this;
    }

    public function atUserIds($userIds)
    {
        $this->message['at']['atUserIds'] = (array)$userIds;
        return $this;
    }

    /**
     * @return $this
     */
    public function atAll()
    {
        $this->message['at']['isAtAll'] = true;
        return $this;
    }
}
