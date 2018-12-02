<?php
namespace Application\Controllers; //Esta es una manera de encapsular elementos  evitar conflictos de nombres.

use Application\Providers\Doctrine;
use Application\Models\Entities\User;
use Application\Providers\View;

class HomeController {

    protected $doctrine;

    //Inyectamos doctrine como dependencia y ya podemos usarlo desde el controlador 
    public function __construct(Doctrine $doctrine){
        $this->doctrine = $doctrine;
    }
    public function index(){
        $user = $this->doctrine->em->getRepository(User::class)->find(1)
;        \kint::dump($user);
    }

    public function hello(string $name, View $view){
        echo $view->render('home.twig',compact('name'));//compact Crea un array que contiene variables y sus valores
    }
}
?>