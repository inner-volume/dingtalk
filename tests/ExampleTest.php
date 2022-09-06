<?php

namespace Openphp\Dingtalk\Tests;

use Openphp\Dingtalk\ActionCard;
use Openphp\Dingtalk\Dingtalk;
use Openphp\Dingtalk\DingtalkManager;
use Openphp\Dingtalk\FeedCard;
use Openphp\Dingtalk\Link;
use Openphp\Dingtalk\Markdown;
use Openphp\Dingtalk\Text;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * @var Dingtalk
     */
    protected $dingtalk;

    /**
     */
    public function __construct()
    {
        $this->dingtalk = new Dingtalk('');
        parent::__construct();
    }

    /**
     * @return void
     */
    public function testEq()
    {
        $this->assertEquals(1, 1);
    }

    /**
     * @return void
     */
    public function testText()
    {
        $text          = new Text();
        $text->content = '我就是我, 是不一样的烟火';
        $this->assertIsArray($this->dingtalk->push($text)->toArray());
    }

    /**
     * @return void
     */
    public function testActionCard1()
    {
        $card        = new ActionCard();
        $card->title = '这是多个按钮的独立跳转';
        $card->text  = '![screenshot](https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png) \n\n #### 乔布斯 20 年前想打造的苹果咖啡厅 \n\n Apple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划';
        $card->addBtns([
            [
                'title'     => '第一个标题',
                'actionURL' => 'https://www.dingtalk.com/',
            ],
            [
                'title'     => '第二个标题',
                'actionURL' => 'https://www.dingtalk.com/',
            ]
        ]);
        $this->assertIsArray($this->dingtalk->push($card)->toArray());
    }

    /**
     * @return void
     */
    public function testActionCard2()
    {
        $card              = new ActionCard();
        $card->title       = '我 20 年前想打造一间苹果咖啡厅，而它正是 Apple Store 的前身';
        $card->text        = '![screenshot](https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png) \n\n #### 乔布斯 20 年前想打造的苹果咖啡厅 \n\n Apple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划';
        $card->singleTitle = '阅读全文';
        $card->singleURL   = 'https://www.dingtalk.com/';
        $this->assertIsArray($this->dingtalk->push($card)->toArray());
    }

    /**
     * @return void
     */
    public function testLink()
    {
        $link             = new Link();
        $link->title      = '时代的火车向前开';
        $link->text       = '这个即将发布的新版本，创始人xx称它为红树林。而在此之前，每当面临重大升级，产品经理们都会取一个应景的代号，这一次，为什么是红树林';
        $link->messageUrl = 'https://www.dingtalk.com/s?__biz=MzA4NjMwMTA2Ng==&mid=2650316842&idx=1&sn=60da3ea2b29f1dcc43a7c8e4a7c97a16&scene=2&srcid=09189AnRJEdIiWVaKltFzNTw&from=timeline&isappinstalled=0&key=&ascene=2&uin=&devicetype=android-23&version=26031933&nettype=WIFI';
        $this->assertIsArray($this->dingtalk->push($link)->toArray());
    }

    /**
     * @return void
     */
    public function testMarkdown()
    {
        $markdown        = new Markdown();
        $markdown->title = '杭州天气';
        $markdown->text  = '#### 杭州天气 @150XXXXXXXX \n > 9度，西北风1级，空气良89，相对温度73%\n > ![screenshot](https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png)\n > ###### 10点20分发布 [天气](https://www.dingtalk.com) \n';
        $markdown->atMobiles(['12345678901']);
        $this->assertIsArray($this->dingtalk->push($markdown)->toArray());
    }

    /**
     * @return void
     */
    public function testFeedCard()
    {
        $card = new FeedCard();
        $card->addLinks([
            'title'      => '时代的火车向前开1',
            'messageURL' => 'https://www.dingtalk.com/',
            'picURL'     => 'https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png'
        ])->addLinks([
            'title'      => '时代的火车向前开2',
            'messageURL' => 'https://www.dingtalk.com/',
            'picURL'     => 'https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png'
        ]);
        $this->assertIsArray($this->dingtalk->push($card)->toArray());
    }

    public function testManager()
    {
        $manager       = new DingtalkManager([
            'access_token' => '',
            'secret'       => '',
            'scenes'       => [
                'info'  => [
                    'access_token' => '',
                    'secret'       => '',
                ],
                'error' => [
                    'access_token' => '',
                    'secret'       => '',
                ]
            ]
        ]);
        $text          = new Text();
        $text->content = '我就是我, 是不一样的烟火';
        $this->assertIsArray($manager->push($text));
    }
}