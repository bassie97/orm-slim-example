<?php
use Doctrine\ORM\Tools\Setup;
require 'vendor/autoload.php';

$path = array('src/app/Entities');
$devMode = true;

$config = Setup::createAnnotationMetadataConfiguration($path, $devMode, null, null, false);

$connectionOptions = array(
    'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'dbname'   => 'orm_db',
    'user'     => 'root',
    'password' => '',
);

$em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);

$helpers = new Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));