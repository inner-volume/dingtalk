<?php

namespace Openphp\Dingtalk;

/**
 * @property mixed|null $links
 */
class FeedCard extends Message
{
    protected $type = 'feedCard';

    /**
     * @param $content
     */
    public function __construct($content = null)
    {
        parent::__construct($content);
        $this->links = $content;
    }

    /**
     * @param array $links
     * @return $this
     */
    public function addLinks(array $links)
    {
        if (!is_array(current($links))) {
            $newLinks[] = $links;
        } else {
            $newLinks = $links;
        }
        $this->links = $newLinks;
        return $this;
    }
}