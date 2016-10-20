<?php

namespace common\behaviors;

use common\models\User;
use yii\base\Behavior;

class UserBehavior extends Behavior
{
    public function events()
    {
        return [
            User::EVENT_AFTER_CREATE => 'afterCreate',
            User::EVENT_AFTER_LOGIN => 'afterLogin'
        ];
    }

    public function afterCreate($event)
    {
        User::addApiSessionToRedis($event->userId, $event->sessionId);
    }

    public function afterLogin($event)
    {
        User::addApiSessionToRedis($event->userId, $event->sessionId);
    }
}
