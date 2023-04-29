<?php
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
  'id' => 'basic',
  'basePath' => dirname(__DIR__),
  'bootstrap' => ['log'],
  'aliases' => [
    '@bower' => '@vendor/bower-asset',
    '@npm'   => '@vendor/npm-asset',
  ],

  'modules' => [
    'admin' => [
      'class' => 'app\modules\admin\Module',
    ],
  ],

  'components' => [
    'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
      'cookieValidationKey' => '1234',
    //    'baseUrl' => '',
    ],
    'cache' => [
      'class' => 'yii\caching\FileCache',
    ],
    'user' => [
      'identityClass' => 'app\models\User',
      'enableAutoLogin' => true,
      'loginUrl' => 'index.php'
		  //'loginUrl' =>'index.php'
    ],
    'errorHandler' => [
      'errorAction' => 'site/error',
    ],
    'mailer' => [
      'class' => 'yii\swiftmailer\Mailer',
      //send all mails to a file by default. You have to set
      //'useFileTransport' to false and configure transport
      //for the mailer to send real emails.
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
      'enableStrictParsing' => true,
      'rules' => [

        '/' => 'site/index',

        //causes an error - Вызывает ошибку:
        //Cannot use yii\web\Controller as Controller because the name is already in use
        //  '/' => 'admin/default/index',
        '<action:\w+>' => 'site/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

      ],
    ],

  ],
  'params' => $params,
  'language' => 'ru-RU',
];

if (YII_ENV_DEV) {
  //configuration adjustments for 'dev' environment
  $config['bootstrap'][] = 'debug';
  $config['modules']['debug'] = [
    'class' => 'yii\debug\Module',
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
