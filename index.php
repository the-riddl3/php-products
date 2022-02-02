<?php
namespace Products\public_html;

use Products\core\Request;
use Products\models\Product;
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

// add product page
App::$router->get('/add-product', function(Request $request) {
   return Bag::render('add-product.php',[]);
});

// add a product action
App::$router->post('/add-product', function(Request $request) {
    $body = $request->getBody();

    $product = new Product($body['sku'],$body['name'],$body['price'],[]);

    // set metadata
    unset($body['sku'],$body['name'],$body['price']);
    $meta = [];
    foreach($body as $key => $value) {
        $meta[$key] = $value;
    }

    $product->meta = $meta;

    // persist product to db
    $product->save();

    Bag::redirect('/');
});

// delete multiple products action
App::$router->post('/mass-delete', function(Request $request) {
    // get checkbox array from incoming JSON data
    $checkboxes = json_decode(file_get_contents('php://input'), true)['checkboxes'];

    // iterate over checkbox array and delete every product
    foreach($checkboxes as $sku) {
        ProductDao::get($sku)->delete();
    }
});



