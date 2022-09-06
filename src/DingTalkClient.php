<?php

namespace Openphp\Dingtalk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;

class DingTalkClient
{
    /**
     * @var string
     */
    public $uri = 'https://oapi.dingtalk.com/robot/send';
    /**
     * @var mixed|string
     */
    public $secret = '';
    /**
     * @var string
     */
    public $access_token = '';
    /**
     * @var string
     */
    public $sign = '';
    /**
     * @var Client
     */
    protected $client;

    /**
     * @param Client $client
     * @param $access_token
     * @param string $secret
     */
    public function __construct(Client $client, $access_token, string $secret = '')
    {
        $this->client       = $client;
        $this->access_token = $access_token;
        $this->secret       = $secret;
    }


    /**
     * @param array $json
     * @param array $header
     * @return string
     */
    public function postJson(array $json, array $header = [])
    {
        try {
            $content = $this->client->request('POST', $this->buildUri(), [
                RequestOptions::HEADERS => $header,
                RequestOptions::JSON    => $json,
            ]);
            return $content->getBody()->getContents();
        } catch (RequestException|GuzzleException $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * @return string
     */
    public function buildUri()
    {
        $param['access_token'] = $this->access_token;
        if ($secret = $this->secret) {
            $timestamp          = time() * 1000;
            $param['timestamp'] = $timestamp;
            $param['sign']      = base64_encode(hash_hmac("sha256", $timestamp . "\n" . $secret, $secret, true));
        }
        return $this->uri . '?' . http_build_query($param);
    }

}