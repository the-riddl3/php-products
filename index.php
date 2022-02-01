<?php
namespace Products\public_html;
use Products\core\Request;
use Products\models\ProductDao;
use Products\core\App;
use Products\utils\Bag;
use Products\utils\Envy;

require_once 'vendor/autoload.php';

// load environment variables from .env
(new Envy(__DIR__. '/.env'))->load();

// initialize app with passed config
App::init([
    'database' => [
        'hostname' => getenv('HOSTNAME'),
        'name' => getenv('NAME'),
        'user' => getenv('USER'),
        'password' => getenv('PASS')
    ],
]);

// routes
App::$router->get('/', function(Request $request) {
    // get all available products
    $products = ProductDao::all();

    return Bag::render('products.php',[
        'products' => $products
    ]);
});

App::$router->get('/add-product', function(Request $request) {
   return Bag::render('add-product.php',[]);
});

App::$router->post('/add-product', function(Request $request) {
   var_dump($request->getBody());
});



