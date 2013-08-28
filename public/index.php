<?php

require __DIR__ . '/../bootstrap.php';

use Respect\Rest\Router;

$router = new Router();

$router->get('/about', function() use ($template){
    return $template->twig->render('about.html');
});

$router->get('/', function() use ($template){
    $var = $template->twig->render('index.html', array('name'=>'Respect'));
    return $var;
});

print $router->run();