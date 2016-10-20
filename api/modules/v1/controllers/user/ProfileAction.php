<?php

namespace api\modules\v1\controllers\user;

use api\components\BaseApiAction;
use api\models\User;
use mobidev\swagger\components\api\DataValidationHttpException;


class ProfileAction extends BaseApiAction
{
    public $modelClass = 'api\models\User';

    public function run()
    {
        $model = User::findById(\Yii::$app->user->getId());
        if ($model) {
            return ['profile' => $model->toArray()];
        }

        return new DataValidationHttpException($model->getErrors());
    }

    public function rules()
    {
        return [];
    }
}
