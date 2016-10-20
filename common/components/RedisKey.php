<?php

namespace common\components;

class RedisKey
{
    public static function userSessions($id)
    {
        return 'user::'.$id.'::sessions';
    }

}