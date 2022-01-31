<?php

include_once 'Request.php';
include_once 'Router.php';

// initialize components - Router, Request, etc
App::init();

App::$router->get('/', function(Request $request) {
    $products = ['banana', 'cd disk', 'dvd player'];
    return App::$bag->render('products.php');
});

