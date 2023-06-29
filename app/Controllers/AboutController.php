<?php


namespace App\Controllers;


use illustrate\Controller;


class AboutController extends Controller
{
    public function index()
    {
        return $this->render('about');
    }
}