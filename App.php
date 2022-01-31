<?php

class App
{
    public static Router $router;
    public static IRequest $request;
    public static Bag $bag;

    // initialize static properties
    public static function init(): void
    {
        self::$router = new Router();
        self::$request = new Request();
        self::$bag = new Bag();
    }
}