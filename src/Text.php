<?php

namespace Openphp\Dingtalk;

/**
 * @property string $content
 */
class Text extends Message
{
    use MessageAt;

    /**
     * @var string
     */
    protected $type = 'text';

    /**
     * @param $content
     */
    public function __construct($content = null)
    {
        parent::__construct($content);
        $this->content = (string)$content;
        $extra         = $this->getExtra();
        $this->message = array_merge($this->message, $extra);
    }

    /**
     * @return array[]
     */
    protected function getExtra()
    {
        return [
            'at' => [
                'atMobiles' => [],
                'isAtAll'   => false,
            ]
        ];
    }
}