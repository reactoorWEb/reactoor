<?php

use illustrate\Facades\Route;



Route::get('/' , function (){
	return  view('home');
});
Route::get('/hello/{name}', function (\illustrate\Request $request,$name){
	return 'Hello ' . $request->getRouteParam('name' , 'arshia') ?? $name;
});
