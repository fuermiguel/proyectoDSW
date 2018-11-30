<?php

use Application\Controllers\HomeController; //Hacemos una importación

//Nota: autocargamos la clase , para cuando la llamemos desde index 
//no de error de que el método no es estático
return [
    HomeController::class =>function() {//¿¿Estoy creando una función constructora estatuca??
        return new HomeController;
    }
];//Todo lo que queramos tener disponible autocargado dentro del contenedor php-di

echo ("EStoy en config");


// La constante especial ::class está disponible a partir de PHP 5.5.0, y 
// permite la resolución de nombres de clase completamente cualificados en 
// la compilación. Esto es útil para clases en espacios de nombres: 
?>

