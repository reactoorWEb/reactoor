<?php

/*
* Application:Reactoor Team
* Date: 6/12/2023
* Creator: Arshiamohammadei
*/
$app = new illustrate\Application(
	realpath(__DIR__.'/../')
);

$app->make(
	\illustrate\Router::class
)->bundle();

return $app;
