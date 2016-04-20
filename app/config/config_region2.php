<?php
// app/config/parameters_region2.php
if(@$_ENV['SYMFONY__RDS__HOSTNAME']) {
    $container->setParameter('database_host', $_ENV['SYMFONY__RDS__HOSTNAME']);
    $container->setParameter('database_port', $_ENV['SYMFONY__RDS__PORT']);
    $container->setParameter('database_name', $_ENV['SYMFONY__RDS__DBNAME']);
    $container->setParameter('database_user', $_ENV['SYMFONY__RDS__USER']);
    $container->setParameter('database_password', $_ENV['SYMFONY__RDS__PASSWORD']);
}