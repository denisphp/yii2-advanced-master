<?php

namespace api\modules\v1\controllers;

use api\components\BaseApiController;

class UserController extends BaseApiController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        return $behaviors;
    }

    public function verbs()
    {
        return [
            'profile' => ['get']
        ];
    }

    public function actions()
    {
        return [
            'profile' => 'api\modules\v1\controllers\user\ProfileAction',
        ];
    }
}
