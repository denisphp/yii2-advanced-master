<?php

namespace api\modules\v1\controllers\auth;

use api\components\BaseApiAction;
use api\models\User;
use common\events\UserEvent;
use mobidev\swagger\components\api\DataValidationHttpException;

class SignInAction extends BaseApiAction
{
    public $modelClass = 'api\models\User';
    public $scenario = User::SCENARIO_LOGIN;

    public function run()
    {
        $user = User::findByEmail($this->model->email);
        if ($user) {
            \Yii::$app->session->set('userId', $user->id);
            \Yii::$app->session->regenerateID(true);
            $event = new UserEvent();
            $event->userId = $user->id;
            $event->sessionId = \Yii::$app->session->getId();
            $user->trigger(User::EVENT_AFTER_LOGIN, $event);

            return ['api_key' => \Yii::$app->session->getId(), 'user_id' => $user->id];
        }

        return new DataValidationHttpException('user does not exist');
    }

    public function rules()
    {
        return (new User(['scenario' => $this->scenario]))->rules();
    }
}
