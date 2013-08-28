<?php
ini_set('display_errors', 0);
$autoload = __DIR__ . '/vendor/autoload.php';

require $autoload;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Respect\Config\Container;

// Project Constants
define('PROJECT_ROOT', __DIR__);
define('CONFIG_DIR', __DIR__ . '/config');
define('WEB_DIR', __DIR__ . '/public');



// Configuration file
$c = new Container(CONFIG_DIR . '/config.ini');

// Set enviroment
$isDevMode = ($c->env !== 'dev') ? false : true;

if($isDevMode){
    ini_set('display_errors', 1);
    error_reporting(-1);
}

date_default_timezone_get($c->timezone);

$em = $c->entityManager;

$platform = $em->getConnection()->getDatabasePlatform();
$platform->registerDoctrineTypeMapping('enum', 'string');

//Twig
$template = new Container( CONFIG_DIR . '/twig.ini');
