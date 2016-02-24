<?php
namespace frontend\components;
use yii\base\Component;
use yii\base\Event;
class MessageEvent extends Event
{
    public $message;
}
class Foo extends Component
{
    const EVENT_MESSAGE_SENT = 'messageSent';
    public function send($message)
    {
        $event = new MessageEvent;
        $event->message = $message;
        $this->trigger(self::EVENT_MESSAGE_SENT, $event);
    }
}