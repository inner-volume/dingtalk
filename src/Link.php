<?php

namespace Openphp\Dingtalk;

/**
 * @property mixed|string $messageUrl
 * @property mixed|string $picUrl
 * @property mixed|string $title
 * @property mixed|string $text
 */
class Link extends Message
{
    /**
     * @var string
     */
    protected $type = 'link';

    /**
     * @param $content
     */
    public function __construct($content = null)
    {
        parent::__construct($content);
        $this->messageUrl = $content['messageUrl'] ?? '';
        $this->picUrl     = $content['picUrl'] ?? '';
        $this->title      = $content['title'] ?? '';
        $this->text       = $content['text'] ?? '';
    }
}