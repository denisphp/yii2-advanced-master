<?php

namespace api\modules\v1\controllers\auth;

use api\components\BaseApiAction;
use api\models\User;
use common\components\jobs\LogJob;
use common\events\UserEvent;
use mobidev\swagger\components\api\DataValidationHttpException;

class SignUpAction extends BaseApiAction
{
    public $modelClass = 'api\models\User';
    public $scenario = User::SCENARIO_CREATE_REQUEST;

    public function run()
    {
        $job = new LogJob();
        $job->message = 'background job success';
        \Yii::$app->beanstalk->putInTube('tube', $job);
        die();
        $model = new User(['scenario' => User::SCENARIO_CREATE]);
        $model->username = $this->model->username;
        $model->email = $this->model->email;
        $model->password = $this->model->password;
        $model->setPassword($model->password);
        $model->generatePasswordResetToken();
        $model->status = User::STATUS_ACTIVE;
        if ($model->save()) {
            \Yii::$app->session->set('userId', $model->id);
            \Yii::$app->session->regenerateID(true);
            $event = new UserEvent();
            $event->userId = $model->id;
            $event->sessionId = \Yii::$app->session->getId();
            $model->trigger(User::EVENT_AFTER_CREATE, $event);
            return ['api_key' => \Yii::$app->session->getId(), 'user_id' => $model->id];
        }
        return new DataValidationHttpException($model->getErrors());
    }

    public function rules()
    {
        return (new User(['scenario' => $this->scenario]))->rules();
    }
}
