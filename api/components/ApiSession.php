<?php

namespace api\components;

use common\models\User;
use yii\redis\Session;

class ApiSession extends Session
{
    public function calculateKey($id)
    {
        return User::calculateRedisApiSessionKey($id);
    }
}
