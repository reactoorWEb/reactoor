<?php

use illustrate\Facades\Route;


Route::get('/', function () {
	return view('welcome');
});