<?php


use illustrate\Facades\Route;


Route::get('/hello', function (){
	return 'Hello:)';
});
Route::get('/', function (){
	return view('home');
});
Route::get('/login', function (){
	return view('login');
});
Route::post('/login', [\App\Controllers\LoginController::class , 'index']);