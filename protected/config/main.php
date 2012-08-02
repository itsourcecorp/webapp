<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'RoboAristocrat',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
        'application.models.*',
		'application.models.instagram.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'password',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>false,
		),
        */
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
        /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
        */
		'db'=>array(
			'connectionString' => 'mysql:host='.DB_HOST.';dbname=' .DB_NAME,
			'emulatePrepare' => true,
			'username' => DB_USER,
			'password' => DB_PASSWORD,
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
        
        'instagram'=>array(
            'class'=>'InstagramComponent',
            'config'=>array(
                'client_id' => '4c16df11bd544975884fa74244d14dd7',
                'client_secret' => '7772cf2a645349bc935784e8d0db523c',
                'grant_type' => 'authorization_code',
                'redirect_uri' => 'http://localhost/roboaristoctat/example/callback.php',
            ),
        ),
        
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
        'adminEmail'=>ADMIN_MAIL,
		'contactEmail'=>CONTACT_MAIL,
	),
);