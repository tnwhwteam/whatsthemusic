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

$entitiesPath = array(__DIR__ . $c->entities_path);


// the connection configuration
$dbParams = $c->database;

$config = Setup::createAnnotationMetadataConfiguration($entitiesPath, $isDevMode);
// or if you prefer yaml or xml
//$config = Setup::createXMLMetadataConfiguration($entitiesPath, $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration($entitiesPath, $isDevMode);

$em = EntityManager::create($dbParams, $config);

$platform = $em->getConnection()->getDatabasePlatform();
$platform->registerDoctrineTypeMapping('enum', 'string');

//Twig
$template = new Container( __DIR__ . '/config/twig.ini');