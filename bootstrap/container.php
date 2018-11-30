<?php
//cargamos todo lo que tenemos en vendor en nuestra aplicación
require __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new \DI\ContainerBuilder;
$containerBuilder->useAutowiring(false);//Esto es para que no inyecte de manera automatica las dependencias
$containerBuilder->addDefinitions(base_path('/../bootstrap/config.php'));

//Ahora generamos el container
try{
    $container = $containerBuilder->build();
    return $container;
}catch(Exception $e){

}
//kint::dump($container); //Para el debugging

