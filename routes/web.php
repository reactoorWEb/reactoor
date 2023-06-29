<?php

use illustrate\Facades\Route;



Route::get('/' , function (){
	return 'Hello';
});
Route::get('/hello/{name}', function (\illustrate\Request $request,$name){
	return 'Hello ' . $request->getRouteParam('name' , 'arshia') ?? $name;
});
