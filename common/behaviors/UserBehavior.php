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
        ];
    }

    public function afterCreate($event)
    {
        User::addApiSessionToRedis($event->userId, $event->sessionId);
    }
}
