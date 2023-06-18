<?php


namespace illustrate\middlewares;


use illustrate\Application;
use illustrate\Exeptions\ForbiddenException;
use illustrate\middlewares\BaseMiddleware;


class Auth extends BaseMiddleware
{
    protected array $actions = [];

    public function __construct($actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
    //code...
    }
}