<?php

require __DIR__ . '/../bootstrap.php';

use Respect\Rest\Router;

$router = new Router();
$router->isAutoDispatched = false;

$router->any('/quiz/*/question/*', '\WhatsTheMusic\Controller\Question\One', array($em));
$router->any('/quiz', '\WhatsTheMusic\Controller\Quiz\All', array($em));
$router->any('/quiz/*/play', '\WhatsTheMusic\Controller\Quiz\Play', array($em));
$router->any('/quiz/*/init', '\WhatsTheMusic\Controller\Quiz\Init', array($em));
$router->any('/quiz/*', '\WhatsTheMusic\Controller\Quiz\One', array($em));
$router->any('/question/*/validate/*', '\WhatsTheMusic\Controller\Question\Validate', array($em));

$router->get('/about', function() use ($template){
    return array('_view' => 'about.html');
});

$router->get('/', '\WhatsTheMusic\Controller\HomeController', array($em));

$router->exceptionRoute('Exception', function (Exception $e) use ($template){
    return $template->twig->render(
        'error/404.html',
        array('err_message' => $e->getMessage())
    );
});

$router->always('Accept', array(
    'text/html'        => new WhatsTheMusic\Route\Routine\Twig,
    'text/plain'       => $json = new WhatsTheMusic\Route\Routine\Json,
    'application/json' => $json,
    'text/json'        => $json
));

print $router->run();