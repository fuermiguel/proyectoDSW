<?php
//cargamos todo lo que tenemos en vendor en nuestra aplicación
require __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new \DI\ContainerBuilder;
$containerBuilder->useAutowiring(false);
$containerBuilder->addDefinitions(__DIR__ . '/../bootstrap/config.php');

//Ahora generamos el container
try{
    $container = $containerBuilder->build();
    return $container;
}catch(Exception $e){

}
kint::dump($containerBuilder); //Para el debugging

