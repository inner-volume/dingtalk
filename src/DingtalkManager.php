<?php


namespace Openphp\Dingtalk;

use GuzzleHttp\Client;

class DingtalkManager
{
    /**
     * @var array
     */
    protected $config = [
        'default' => 'info',
        'scenes'  => [
            'info'  => [
                'access_token' => '',
                'secret'       => '',
            ],
            'error' => [
                'access_token' => '',
                'secret'       => '',
            ]
        ]
    ];
    /**
     * @var array
     */
    protected $scenes = [];
    /**
     * @var Client
     */
    protected $client = null;

    /**
     * @var null
     */
    protected static $_instance = null;

    /**
     * @param $config
     */
    public function __construct($config)
    {
        $this->config = array_merge($this->config, $config);
        $this->scenes($this->config['default']);
    }

    /**
     * @return $this |null
     */
    public static function getInstance(...$config)
    {
        //如果实例不存在生成实例
        if (!self::$_instance) {
            self::$_instance = new self(...$config);
        }
        return self::$_instance;
    }

    /**
     * @param string|array $scene
     * @return $this
     */
    public function scenes($scene = '')
    {
        $this->scenes = (array)$scene;
        return $this;
    }

    /**
     * @param Client $client
     * @return $this
     */
    public function client(Client $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * 通道推送
     * @param Message     $message
     * @param string      $scene
     * @param Client|null $client
     * @return DingTalkResponse[]
     */
    public function push(Message $message)
    {
        $resp = [];
        foreach ($this->scenes as $scene) {
            list($access_token, $secret) = $this->getConfig($scene);
            $resp[$scene] = (new Dingtalk($access_token, $secret, $this->client))->push($message);
        }
        return $resp;
    }

    /**
     * @param string $scene
     * @return array
     */
    protected function getConfig($scene)
    {
        $secret       = $this->config['scenes'][$scene]['secret'];
        $access_token = $this->config['scenes'][$scene]['access_token'] ?? '';
        return [$access_token, $secret];
    }
}