<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\core\Application;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

echo dirname(__DIR__);

print_r($_ENV);
print_r($_SERVER);

$config = [
    'db' => [
        'dsn' => $_ENV['DSN'],
        'user' => $_ENV['USERNAME'],
        'password' => $_ENV['PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

/*$app->router->get('/', 'home');
$app->router->get('/contact', 'contact');
$app->router->post('/contact', function () {
    return "Procesando informacion";
});*/

$app->router->get('/', [\app\controllers\SiteController::class, 'home']);
$app->router->get('/contact', [\app\controllers\SiteController::class, 'contact']);
$app->router->post('/contact', [\app\controllers\SiteController::class, 'handleContact']);

$app->router->get('/register', [\app\controllers\AuthController::class, 'register']);
$app->router->post('/register', [\app\controllers\AuthController::class, 'register']);

$app->router->get('/login', [\app\controllers\AuthController::class, 'login']);
$app->router->post('/login', [\app\controllers\AuthController::class, 'login']);

$app->run();
