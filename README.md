## 安装

~~~
composer require openphp/dingtalk dev-main
~~~

## 初始化

~~~
$dingtalk      = new Dingtalk('access_token', 'secret');
~~~

## 消息类型

1. text
2. link
3. markdown
4. ActionCard
5. FeedCard

### text

~~~
$text          = new Text();
$text->content = '我就是我, 是不一样的烟火';
$dingtalk->push($text)->toArray();
~~~

或

~~~
$text          = new Text('我就是我, 是不一样的烟火');
$dingtalk->push($text)->toArray();
~~~

### link

~~~
$link = new Link();
$link->title = '时代的火车向前开';
$link->text = '这个即将发布的新版本，创始人xx称它为红树林。而在此之前，每当面临重大升级，产品经理们都会取一个应景的代号，这一次，为什么是红树林';
$link->messageUrl = 'https://www.dingtalk.com/s?__biz=MzA4NjMwMTA2Ng==&mid=2650316842&idx=1&sn=60da3ea2b29f1dcc43a7c8e4a7c97a16&scene=2&srcid=09189AnRJEdIiWVaKltFzNTw&from=timeline&isappinstalled=0&key=&ascene=2&uin=&devicetype=android-23&version=26031933&nettype=WIFI';
$dingtalk->push($link);
~~~

### Markdown

~~~
$markdown = new Markdown();
$markdown->title = '杭州天气';
$markdown->text = '#### 杭州天气 @150XXXXXXXX \n > 9度，西北风1级，空气良89，相对温度73%\n > ![screenshot](https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png)\n > ###### 10点20分发布 [天气](https://www.dingtalk.com) \n';
$markdown->atMobiles(['12345678901']);
$dingtalk->push($markdown);
~~~

### ActionCard

~~~
$card = new ActionCard();
$card->title = '我 20 年前想打造一间苹果咖啡厅，而它正是 Apple Store 的前身';
$card->text = '![screenshot](https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png) \n\n #### 乔布斯 20 年前想打造的苹果咖啡厅 \n\n Apple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划';
$card->singleTitle = '阅读全文';
$card->singleURL = 'https://www.dingtalk.com/';
$dingtalk->push($card);
~~~

### FeedCard

~~~
$card = new FeedCard();
$card->addLinks([ 
    'title' => '时代的火车向前开1',
    'messageURL' => 'https://www.dingtalk.com/',
    'picURL' => 'https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png'
])->addLinks([
    'title' => '时代的火车向前开2',
    'messageURL' => 'https://www.dingtalk.com/',
    'picURL' => 'https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png'
]);
$dingtalk->push($card);
~~~





