<?php

namespace Openphp\Dingtalk;

/**
 * @property mixed|string $title
 * @property mixed|string $text
 */
class Markdown extends Message
{
    use MessageAt;

    /**
     * @var string
     */
    protected $type = 'markdown';

    /**
     * @param $content
     */
    public function __construct($content = null)
    {
        parent::__construct($content);
        $extra         = $this->getExtra();
        $this->message = array_merge($this->message, $extra);
        $this->title   = $content['title'] ?? '';
        $this->text    = $content['text'] ?? '';
    }

    /**
     * @return array[]
     */
    public function getExtra()
    {
        return [
            'at' => [
                'atMobiles' => [],
                'isAtAll'   => false,
            ]
        ];
    }
}