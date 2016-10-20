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
        $rules[] = ['username', 'string', 'min' => 3, 'on' => [
            self::SCENARIO_CREATE_REQUEST,
            self::SCENARIO_CREATE,
        ]];
        $rules[] = ['username', 'string', 'max' => 255, 'on' => [
            self::SCENARIO_CREATE_REQUEST,
            self::SCENARIO_CREATE,
        ]];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_LOGIN] = ['email', 'password'];
        $scenarios[self::SCENARIO_CREATE_REQUEST] = ['username', 'email', 'password'];
        $scenarios[self::SCENARIO_CREATE] = ['username', 'email', 'password'];
    }
}
