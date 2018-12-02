<?php

/****En este archivo definimos las inyecciones que queremos tener disponibles para el contenedor****/


//Hacemos las importaciones necesarias
use Application\Controllers\HomeController; 
use Application\Providers\Doctrine;

return [//Array asociativo
    'config.database' => function(){
        return parse_ini_file(base_path('app/Config/database.ini'));//https://secure.php.net/manual/es/function.parse-ini-file.php
    },

    // HomeController::class =>function(\Psr\Container\ContainerInterface $container) {
    //     return new HomeController($container->get(Doctrine::class));//Paso como parámetro una clase Doctrine
    // },

    //Esta es la manera de hacerlo de forma dinámica diciendo al container como resolver las dependencias
    HomeController::class => \DI\create()->constructor(\DI\get(Doctrine::class)),

    Doctrine::class => function(\Psr\Container\ContainerInterface $container){
        return new Doctrine($container);
    }
];

?>

