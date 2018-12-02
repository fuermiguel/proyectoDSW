<?php
namespace Application\Controllers; //Esta es una manera de encapsular elementos  evitar conflictos de nombres.

use Application\Providers\Doctrine;

class HomeController {

    protected $doctrine;

    //Inyectamos doctrine como dependencia y ya podemos usarlo desde el controlador 
    public function __construct(Doctrine $doctrine){
        $this->doctrine = $doctrine;
    }
    public function index(){
        \kint::dump($this->doctrine);
    }
}
?>