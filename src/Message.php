<?php

namespace Openphp\Dingtalk;

abstract class Message
{
    /**
     * @var array
     */
    protected $message;

    /**
     * @var
     */
    protected $type;

    /**
     * @param $data
     */
    public function __construct($data)
    {
        $this->message = [
            'msgtype'   => $this->type,
            $this->type => [],
        ];
    }

    /**
     * @return array
     */
    protected function getExtra()
    {
        return [];
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->message;
    }

    /**
     * @return false|string
     */
    public function toString()
    {
        return json_encode($this->message);
    }

    /**
     * @param $name
     * @param $value
     * @return void
     * @throws \InvalidArgumentException
     */
    public function __set($name, $value)
    {
        if (!isset($this->message[$this->type])) {
            throw new \InvalidArgumentException("Property does not exist");
        }
        $this->message[$this->type][$name] = $value;
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        if (isset($this->message[$this->type])) {
            return $this->message[$this->type][$name] ?? null;
        }
        return null;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $content
     * @return $this
     */
    public function replace($content)
    {
        $this->message[$this->getType()] = $content;
        return $this;
    }
}