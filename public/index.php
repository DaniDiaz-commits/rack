<?php
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require '../vendor/autoload.php'; //Para generar las peticiones

$router = new AltoRouter();
$loader = new FilesystemLoader("../src/views");
$twig = new Environment($loader, [ 'cache' => '../cache','debug' => true ]);

if(isset($_POST['_method'])){
    $_SERVER['REQUEST_METHOD'] = $_POST['_method'];
}

$router->map('GET', '/', function() use ($twig) {
    echo $twig->render('index.html.twig');
});

include "../src/routers/company.php";
include "../src/routers/product.php";
// D.A.O -> Data Access Object


// match current request
$match = $router->match();

if(is_array($match)){
    if(is_callable($match['target'])) {
        call_user_func_array($match['target'], $match['params']);
        return;
    } else if(is_string($match['target'])){
        list($controller, $action) = explode('#', $match['target']);
        $controller = "Danie\\Rack\\Controllers\\$controller";
        call_user_func_array([new $controller(), $action], $match['params']);
        return;
    }
}

header($_SERVER['SERVER_PROTOCOL']). ' 404 Not found';
echo '404 Not found';