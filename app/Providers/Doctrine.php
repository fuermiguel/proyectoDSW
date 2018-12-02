<?php
namespace Application\Providers;

//https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-11-container.md
use Psr\Container\ContainerInterface; //La inerface del container

class Doctrine{

    public $em; //Entity Manager

    public function __construct(ContainerInterface $container){
        $dbConfig = $container->get('config.database');
        \Kint::dump($dbConfig);
    }
}
?>