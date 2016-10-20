<?php

namespace api\modules\v1\controllers;

use api\components\BaseApiController;

class AuthController extends BaseApiController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['except'] = ['signin', 'signup'];
        return $behaviors;
    }

    public function verbs()
    {
        return [
            'signin' => ['post'],
            'signup'  => ['post'],
        ];
    }

    public function actions()
    {
        return [
            'signin' => 'api\modules\v1\controllers\auth\SignInAction',
            'signup' => 'api\modules\v1\controllers\auth\SignUpAction',
        ];
    }
}
