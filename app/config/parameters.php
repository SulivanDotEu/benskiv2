<?php


$dir = __DIR__.
    DIRECTORY_SEPARATOR.'..'.
    DIRECTORY_SEPARATOR.'..'.
    //DIRECTORY_SEPARATOR.'..'.
    DIRECTORY_SEPARATOR.'shared'.
    DIRECTORY_SEPARATOR.'config'.
    DIRECTORY_SEPARATOR.'database.php';

//echo (realpath(__DIR__.'/../../../shared/config/database.php'));



$dataBaseParameters = include($dir);

$container->setParameter('facebook_client_id', '262093937323580');
$container->setParameter('facebook_client_secret', 'f9f04815667280cac2709b4a9c4ad771');

$container->setParameter('mailer_transport', 'smtp');
$container->setParameter('mailer_host', 'ns0.ovh.net');
$container->setParameter('mailer_user', 'info@benski.be');
$container->setParameter('mailer_password', 'ben141516');

$container->setParameter('locale', 'fr');
$container->setParameter('secret', 'aizrhaoirhiazroh');

$container->setParameter('database_driver', 'pdo_mysql');
$container->setParameter('database_port', null);
$container->setParameter('database_name', $dataBaseParameters['database_name']);
$container->setParameter('database_host', $dataBaseParameters['database_host']);
$container->setParameter('database_user', $dataBaseParameters['database_user']);
$container->setParameter('database_password', $dataBaseParameters['database_password']);