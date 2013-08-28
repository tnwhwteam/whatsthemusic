<?php
ini_set('display_errors', 0);
$autoload = __DIR__ . '/vendor/autoload.php';

require $autoload;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Respect\Config\Container;

// Configuration file
$c = new Container(__DIR__ . '/config/config.ini');

// Set enviroment
$isDevMode = ($c->env !== 'dev') ? false : true;

if($isDevMode){
    ini_set('display_errors', 1);
    error_reporting(E_ALL | E_STRICT);
}

date_default_timezone_get($c->timezone);

$em = $c->entityManager;

$platform = $em->getConnection()->getDatabasePlatform();
$platform->registerDoctrineTypeMapping('enum', 'string');

//Twig
$template = new Container( __DIR__ . '/config/twig.ini');