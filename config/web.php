<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';



$modules = scandir(realpath('../modules'));

$module_inc = [];
foreach ($modules as $v) {
    if (in_array($v, ['.', '..'])) {
        continue;
    }
    $module_inc[$v] = [
        'class' => 'app\modules\\' . $v . '\Module',
            //'defaultRoute'=>'index'
    ];
}


$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log',
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@uploads' => '@app/web/uploads/'
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'k_NldjoLQJYbA5AsE7Q_6KB-60eB9znR',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
               ['class' => 'yii\rest\UrlRule', 'controller' => 'api'],
                //'<action:.+>'=>'site/index'
            ],
        ],
    ],
    'params' => $params,
];

$queue = require __DIR__ . '/queue.php';
$config['bootstrap'][] = $queue['bootstrap'][0];
$config['components']['queue'] = $queue['components']['queue'];


$config['modules'] = $module_inc;


if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'panels' => [
            'queue' => \yii\queue\debug\Panel::class,
        ],
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}


return $config;
