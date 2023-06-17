<?php

/*
* Application:Reactoor\Phoenix Team
* Date: 6/11/2023
* Creator: Arshiamohammadei
*/


return [
	'driver' => $_ENV['DATABASE_DRIVER'] ?? 'mysql',
	'host' => $_ENV['DATABASE_HOST'] ?? 'localhost',
	'database' => $_ENV['DATABASE_NAME'] ?? null,
	'username' => $_ENV['DATABASE_USER'] ?? '',
	'password' => $_ENV['DATABASE_PASSWORD']?? '',
	'options' => [
		'ATTR_DEFAULT_FETCH_MODE' => PDO::ATTR_DEFAULT_FETCH_MODE,
		'ATTR_STRINGIFY_FETCHES' => false,
	],
	'userClass' => 'help',
	'migrations' => __DIR__.'/../database/migrations/'
];