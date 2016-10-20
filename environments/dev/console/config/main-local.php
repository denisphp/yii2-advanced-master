<?php
return [
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => 'yii\gii\Module',
        'swagger' => [
            'class' => 'mobidev\swagger\Module',
            'jsonPath' => '@api/web/swagger.json',
            'host' => 'api.advanced-master.local',
            'basePath' => '/v1',
            'description' => 'Yii2-advanced-master API documentation (swagger-2.0 specification)',
            'defaultInput' => 'body',
            'additionalFields' => []
        ],
    ],
];
