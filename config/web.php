<?php

require(__DIR__.'/functions.php');
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$domain = $_SERVER['HTTP_HOST'];

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'layout' => 'main_layout',
    'name' => 'Int Remittance',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'timeZone' => 'Asia/Jakarta',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ImtSkiKhapky6SOqmHk9k4mwHedVpIkn',
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => [],
                    'depends' => ['app\assets\AppAsset']
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => []
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
        ],
        'session' => [
            'class' => 'app\components\FTDbSession',
            'db' => $db['db_remittance'],
            'sessionTable' => 'web_session',
            // 'timeout' => 3600 * 24, //1 hari
            'timeout' => 1800,
//            'useCookies' => false,
            'writeCallback' => function ($session) {
                return [
                    'user_id' => Yii::$app->user->id
                ];
            },
            'cookieParams' => [
                'domain' => $domain, //'portal-dev.smartcom.id'
                'httpOnly' => true,
            ],
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
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                    'db' => $db['log_int_remittance'],
                    'logTable' => 'remittance_log'
                ],
                // [
                //     'class' => 'yii\log\DbTarget',
                //     'levels' => ['info'],
                //     'db' => $db['db_mom'],
                //     'logTable' => 'mom_log_info'
                // ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],

            ],
        ],
        'db' => $db['db_remittance'],
        'log_int_remittance' => $db['log_int_remittance'],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'app\modules\admin\controllers\AssignmentController',
                    'userClassName' => 'app\models\Users',
                    'searchClass' => 'app\models\UsersSearch',
                    // 'usernameField' => 'name',
                    // 'extraColumns'  => ['email', 'user_type']
                ],
            ],
        ],

        // 'audit' => [
        //     'class' => 'app\modules\audit\Audit',
        //     // the layout that should be applied for views within this module
        //     'layout' => 'main',
        //     // Name of the component to use for database access
        //     'db' => 'log_mom_db', 
        //     // List of actions to track. '*' is allowed as the last character to use as wildcard
        //     'trackActions' => ['*'], 
        //     // Actions to ignore. '*' is allowed as the last character to use as wildcard (eg 'debug/*')
        //     'ignoreActions' => ['audit/*', 'debug/*'],
        //     // Maximum age (in days) of the audit entries before they are truncated
        //     'maxAge' => 'debug',
        //     // IP address or list of IP addresses with access to the viewer, null for everyone (if the IP matches)
        //     'accessIps' => ['127.0.0.1', '192.168.*'], 
        //     // Role or list of roles with access to the viewer, null for everyone (if the user matches)
        //     'accessRoles' => ['admin'],
        //     // User ID or list of user IDs with access to the viewer, null for everyone (if the role matches)
        //     'accessUsers' => [1, 2],
        //     // Compress extra data generated or just keep in text? For people who don't like binary data in the DB
        //     'compressData' => true,
        //     // The callback to use to convert a user id into an identifier (username, email, ...). Can also be html.
        //     'userIdentifierCallback' => ['app\models\User', 'userIdentifierCallback'],
        //     // If the value is a simple string, it is the identifier of an internal to activate (with default settings)
        //     // If the entry is a '<key>' => '<string>|<array>' it is a new panel. It can optionally override a core panel or add a new one.
        //     'panels' => [
        //         'audit/request',
        //         'audit/error',
        //         'audit/trail',
        //         'audit/javascript',
        //         'audit/mail',
        //         'app/views' => [
        //             'class' => 'app\panels\ViewsPanel',
        //         ],
        //     ],
        //     'panelsMerge' => [
        //         'app/views' => [
        //             'class' => 'app\panels\ViewsPanel',
        //         ],
        //     ],
        // ],
    ],
    'as access' => [
        'class' => 'app\components\rbac\AccessControl',
        'allowActions' => [
            'site/*',
            // 'dashboard/*',
            '*'
        ]
    ],
    'params' => $params,
];

// configuration adjustments for 'dev' environment
$config['bootstrap'][] = 'debug';
$config['modules']['debug'] = [
    'class' => 'yii\debug\Module',
    // uncomment the following to add your IP if you are not connecting from localhost.
    // 'allowedIPs' => ['127.0.0.1', '::1'],
];

$config['bootstrap'][] = 'gii';
$config['modules']['gii'] = [
    'class' => 'yii\gii\Module',
    // uncomment the following to add your IP if you are not connecting from localhost.
    //'allowedIPs' => ['127.0.0.1', '::1'],
];


$whitelist = array(
    '127.0.0.1',
    '::1'
);
/*
if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    $config['components']['user']['identityCookie'] = [
        'name' => '_identity',
        'httpOnly' => true,
        'secure' => true,
        'domain' => $domain, //'portal-dev.smartcom.id'
    ];

    $config['components']['cookies']= [
        'class' => 'yii\web\Cookie',
        'httpOnly' => true,
        'secure' => true
    ];

    $config['components']['request']['csrfCookie']= [
        'httpOnly' => true,
        'secure' => true
    ];
}
*/
return $config;
