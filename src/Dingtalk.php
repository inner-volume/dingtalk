<?php

namespace Openphp\Dingtalk;

use GuzzleHttp\Client;

class Dingtalk
{
    /**
     * @var DingTalkClient
     */
    public $clinet;

    /**
     * @param string      $access_token
     * @param string      $secret
     * @param Client|null $client
     */
    public function __construct($access_token, $secret = '', Client $client = null)
    {
        $client       = $client ?: new Client();
        $this->clinet = new DingTalkClient($client, $access_token, $secret);
    }

    /**
     * @param Message $message
     * @return DingTalkResponse
     */
    public function push(Message $message)
    {
        $result = $this->clinet->postJson($message->toArray());
        return new DingTalkResponse($result);
    }
}