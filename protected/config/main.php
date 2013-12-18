<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
	'application.models.*',
	'application.components.*',
        'application.extensions.*',
        'application.extensions.cocoCod.*',
        'application.helpers.*',
        'application.extensions.eoauth.*',
        'application.extensions.eoauth.lib.*',
        'application.extensions.lightopenid.*',
        'application.extensions.eauth.services.*',
        'application.extensions.eauth.*',
	),

	'modules'=>array(
                'admin',
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
            'eauth' => array(
            'class' => 'ext.eauth.EAuth',
            'popup' => true, // Use the popup window instead of redirecting.
            'services' => array(// You can change the providers and their classes.
                'facebook' => array(
                'class' => 'FacebookOAuthService',
                'client_id' => '571754816223022',
                'client_secret' => '6b7a432fb69b7ff9985547711fe1c2de',
            ),
            ),
        ),
             'clientScript' => array(
            'packages' => array(
                'jquery' => array(
                    'baseUrl' => '//ajax.googleapis.com/ajax/libs/jquery/1/',
                    //'baseUrl'=>'/js/jquery/',  
                    'js' => array('jquery.min.js'),
                )
            ),
        ),
         'errorHandler'=>array(
            'errorAction'=>'site/error',
        ),    
        'bootstrap' => array(
                'class' => 'application.extensions.yiibooster.components.Bootstrap',
               ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
            
                'authManager' => array(
                        'class' => 'AuthManager',
                        // Default role
                        'defaultRoles' => array('guest'),
                ),
            
                'user' => array(
                        'class' => 'WebUser',
                        'table' => 'UserModel',
                        'fieldRole' => 'type',
                        'loginUrl' => array('site/login'),
                        // enable cookie-based authentication
                        'allowAutoLogin' => true,
                ),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
                        'showScriptName' => false,
			'rules'=>array(
                                'admin'           =>'admin/default/index',
                                'contacts'        => 'site/contact',
                                'blog'            => 'blog/index',
                                '/'               => 'site/index',
                                'registration'    => 'site/register',
                                'login'           => 'site/login',
                                '<alias:[\w\-]+>' => 'site/page',
				                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=Maximus',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'q1w2e3r4',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);