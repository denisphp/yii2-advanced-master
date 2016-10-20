<?php

namespace api\models;

use yii\web\IdentityInterface;

class User extends \common\models\User implements IdentityInterface
{
    const SCENARIO_LOGIN = 'login';
    const SCENARIO_CREATE_REQUEST = 'createRequest';
    const SCENARIO_CREATE = 'create';

    public function rules()
    {
        $rules = parent::rules();
        $rules[] = [['email', 'password'], 'required', 'on' => [
            self::SCENARIO_LOGIN,
            self::SCENARIO_CREATE_REQUEST,
            self::SCENARIO_CREATE,
        ]];
        $rules[] = [['username'], 'required', 'on' => [
            self::SCENARIO_CREATE_REQUEST,
            self::SCENARIO_CREATE,
        ]];
        $rules[] = [['email'], 'email', 'on' => [
            self::SCENARIO_LOGIN,
            self::SCENARIO_CREATE_REQUEST,
            self::SCENARIO_CREATE,
        ]];
        $rules[] = ['password', 'string', 'min' => 6, 'on' => [
            self::SCENARIO_LOGIN,
            self::SCENARIO_CREATE_REQUEST,
            self::SCENARIO_CREATE,
        ]];
        $rules[] = ['password', 'string', 'max' => 255, 'on' => [
            self::SCENARIO_LOGIN,
            self::SCENARIO_CREATE_REQUEST,
            self::SCENARIO_CREATE,
        ]];
        $rules[] = ['password', 'validatePasswordApi', 'on' => [self::SCENARIO_LOGIN]];
        $rules[] = ['username', 'string', 'min' => 3, 'on' => [
            self::SCENARIO_CREATE_REQUEST,
            self::SCENARIO_CREATE,
        ]];
        $rules[] = ['username', 'string', 'max' => 255, 'on' => [
            self::SCENARIO_CREATE_REQUEST,
            self::SCENARIO_CREATE,
        ]];

        return $rules;
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_LOGIN] = ['email', 'password'];
        $scenarios[self::SCENARIO_CREATE_REQUEST] = ['username', 'email', 'password'];
        $scenarios[self::SCENARIO_CREATE] = ['username', 'email', 'password'];

        return $scenarios;
    }

    public function validatePasswordApi()
    {
        $user = self::findByEmail($this->email);
        if (!$user) {
            $this->addError('password', 'Incorrect email or password.');
        } elseif (!\Yii::$app->security->validatePassword($this->password, $user->password_hash)) {
            $this->addError('password', 'Incorrect email or password.');
        }
    }
}
