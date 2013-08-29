<?php

require __DIR__ . '/../bootstrap.php';

use Respect\Rest\Router;

$router = new Router();

$router->any('/quiz/*/question/*', '\WhatsTheMusic\Controller\QuestionController', array($em));
$router->any('/quiz/*', '\WhatsTheMusic\Controller\QuizController', array($em));

$router->get('/about', function() use ($template){
    return array('_view' => 'about.html');
});

$router->get('/', function() use ($template){
    return array('_view' => 'index.html');
});

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