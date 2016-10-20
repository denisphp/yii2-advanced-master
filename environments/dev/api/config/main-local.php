<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ahX8poodoxai1uothiePh5ieNgaxkg',
        ],
        'session' => [
            'class' => 'api\components\ApiSession',
            'useCookies' => false, //set php.ini to session.use_cookies = 0, session.use_only_cookies = 0
            'useTransparentSessionID' => true, //set php.ini to session.use_trans_sid = 1
            'name' => 'api_key',
            'timeout' => 86400, //24h
            'keyPrefix' => \common\models\User::REDIS_API_SESSION_KEY_PREFIX,
            'redis' => [
                'hostname' => 'localhost',
                'port' => 6379,
                'database' => \common\models\User::REDIS_API_SESSION_DATABASE,
            ]
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];
}

return $config;
