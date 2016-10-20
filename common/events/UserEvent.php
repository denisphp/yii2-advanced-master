<?php

namespace common\events;

use yii\base\Event;

class UserEvent extends Event
{
    public $userId;
    public $sessionId;
}
