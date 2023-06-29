<?php

/*
* Application:Reactoor\Phoenix Team
* Date: 6/11/2023
* Creator: Arshiamohammadei
*/
define('REACTOOR_START' , microtime(true));
use Symfony\Component\HttpFoundation\Request;
/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/
require '../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$kernel = $app->make(
	\illustrate\Kernel::class
);
$kernel->content($app->run());
$response = $kernel->handle(Request::createFromGlobals());
$response->send();
