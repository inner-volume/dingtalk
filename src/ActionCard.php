<?php

namespace Openphp\Dingtalk;

/**
 * @property mixed|string $title
 * @property mixed|string $text
 * @property mixed|string $singleTitle
 * @property mixed|string $btnOrientation
 * @property mixed|string $singleURL
 */
class ActionCard extends Message
{
    /**
     * @var string
     */
    protected $type = 'actionCard';

    /**
     * @param $content
     */
    public function __construct($content = null)
    {
        parent::__construct($content);
        $this->title          = $content['title'] ?? '';
        $this->text           = $content['text'] ?? '';
        $this->singleTitle    = $content['singleTitle'] ?? '';
        $this->btnOrientation = $content['btnOrientation'] ?? '0';
        $this->singleURL      = $content['singleURL'] ?? '';
        $this->btns           = $content['btns'] ?? [];
    }

    /**
     * @param array $btns
     * @return $this
     */
    public function addBtns(array $btns)
    {
        if (!is_array(current($btns))) {
            $buttons[] = $btns;
        } else {
            $buttons = $btns;
        }
        $this->btns = $buttons;
        return $this;
    }
}