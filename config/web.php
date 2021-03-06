<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'Atipica.org',
    'language' => 'it',
    'sourceLanguage' => 'it_IT',
    
    //---- END layout configuration
 //   'timeZone' => 'Europe/Rome',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
    // Date/time format
        'formatter' => [
			    'locale' => 'it_IT',
			    'timeZone' => 'Europe/Rome',
             'dateFormat' => 'php: d/M/Y',
             'datetimeFormat' => 'php: d/M/Y H:i:s',
             'dateFormat' => 'php: d/M/Y',
            'timeFormat' => 'php: H:i:s',
            'thousandSeparator' => ' ',
            'currencyCode' => 'EUR',
       ],
    //---- Layout configuration ----

/*    'view' => [
        'theme' => [
          'pathMap' => ['@app/views' => '@app/themes/tf-dorian'],
          'baseUrl'   => '@web/../themes/tf-dorian',
 //         'pathMap' => ['@app/views' => '@app/themes/material-default'],
  //        'baseUrl'   => '@web/../themes/material-default',
        ],
    ], */
         // Use Rule Based Access Control
         'authManager' => [
                 'class' => 'yii\rbac\DbManager',       
               ],      
         'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'atipica',
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
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
