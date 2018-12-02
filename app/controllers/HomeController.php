<?php
namespace Application\Controllers; //Esta es una manera de encapsular elementos  evitar conflictos de nombres.

use Application\Providers\Doctrine;

class HomeController {
    public function index(Doctrine $doctrine){//Inyectamos doctrine como dependencia y ya podemos usarlo desde el controlador 
        \kint::dump($doctrine);
    }
}
?>