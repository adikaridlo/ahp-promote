<?php

return [
	'db_remittance' => [
		'class' => 'yii\db\Connection',
	    'dsn' => 'mysql:host=localhost;dbname=app_promote_db',
	    'username' => 'root',
	    'password' => '',
	    'charset' => 'utf8',
	],
	'log_int_remittance' => [
		'class' => 'yii\db\Connection',
	    'dsn' => 'mysql:host=localhost;dbname=app_promote_db_log',
	    'username' => 'root',
	    'password' => '',
	    'charset' => 'utf8',
	]
    

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
