<?php
use yii\helpers\ArrayHelper;
 
$params = ArrayHelper::merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
 
return [
    'name' => 'SibService',
    'language'=>'ru',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['seo', 'log', 'maintenanceMode'],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'charset' => 'utf8',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
                'enablePrettyUrl' => true,
                'showScriptName' => false,
                'rules' => [
                    '' => 'main/default/index',
                    'contact' => 'main/contact/index',
                    '<_a:error>' => 'main/default/<_a>',
                    '<_a:(login|logout|signup|email-confirm|request-password-reset|password-reset)>' => 'user/default/<_a>',
                    '<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/<_a>',
                    '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/view',
                    '<_m:[\w\-]+>' => '<_m>/default/index',
                    '<_m:[\w\-]+>/<_c:[\w\-]+>' => '<_m>/<_c>/index',
                ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'cache' => [
            'class' => 'yii\caching\DummyCache',
        ],
        'log' => [
            'class' => 'yii\log\Dispatcher',
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'forceTranslation' => true,
                ],
            ],
        ],
        'seo' => [
            'class' => 'aquy\seo\components\Seo'
        ],
        'maintenanceMode'=>[

            'class' => '\brussens\maintenance\MaintenanceMode',

            // Mode status
            'enabled'=>true,

            // Route to action
            'route'=>'maintenance/index',

            // Show message
            'message'=>'Sorry, perform technical works.',

            // Allowed user names
            'users'=>[
                'black',
            ],

            // Allowed roles
            'roles'=>[
                'administrator',
            ],

            // Allowed IP addresses
            'ips'=>[
                '37.192.11.96',
            ],

            // Allowed URLs
            'urls'=>[
                'user/login'
            ],

            // User name attribute name
            'usernameAttribute'=>'login',

            // HTTP Status Code
            'statusCode'=>503,


        ],
    ],
    'modules' => [
        'main' => [
            'class' => 'app\modules\main\Module',
        ],
        'user' => [
            'class' => 'app\modules\user\Module',
        ],
        'seo' => [
            'class' => 'aquy\seo\module\Meta'
        ],
    ],
    'params' => $params,
];

