<?php

/****En este archivo definimos las inyecciones que queremos tener disponibles para el contenedor****/


//Hacemos las importaciones necesarias
use Application\Controllers\HomeController; 
use Application\Providers\Doctrine;

return [//Array asociativo
    'config.database' => function(){
        return parse_ini_file(base_path('app/Config/database.ini'));//https://secure.php.net/manual/es/function.parse-ini-file.php
    },
    HomeController::class =>function() {//Nota: autocargamos la clase (HomeController::class), para cuando la llamemos desde index 
                                        //no de error de que el método no es estático
        return new HomeController;
    },
    Doctrine::class => function(\Psr\Container\ContainerInterface $container){
        return new Doctrine($container);
    }
];

?>

