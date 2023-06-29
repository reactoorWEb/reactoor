<?php


namespace App\Controllers;


use illustrate\Controller;
use illustrate\Request;


class LoginController extends Controller
{
	public function login(){
		return (new Request())->isGet();
	}
}
			