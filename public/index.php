<?php

require __DIR__ . '/../bootstrap.php';

use Respect\Rest\Router;

$router = new Router();

$router->get('/about', function() use ($template){
    return $template->twig->render('about.html');
});

$router->any('/', 'WhatsTheMusic/Route/Home');

$router->always('Accept', array(
    'text/html'        => new WhatsTheMusic\Route\Routine\Twig,
    'text/plain'       => $json = new WhatsTheMusic\Route\Routine\Json,
    'application/json' => $json,
    'text/json'        => $json
));

print $router->run();