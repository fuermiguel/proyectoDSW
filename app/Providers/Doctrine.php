<?php
namespace Application\Providers;

//https://www.doctrine-project.org/projects/doctrine-orm/en/latest/


//https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-11-container.md
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Psr\Container\ContainerInterface;


class Doctrine{

    public $em; //Entity Manager

    public function __construct(ContainerInterface $container){
        $dbConfig = $container->get('config.database');
      //  \Kint::dump($dbConfig);


/***Definimos las variables necesarias para la configuración de Doctrine  */
        $paths = [
            base_path('app/Models/Entities'),
            base_path('app/Models/Repositories')
        ];

        $isDevMode = true;

        // Create a simple "default" Doctrine ORM configuration for Annotations
        $config = Setup::createAnnotationMetadataConfiguration(
            $paths, $isDevMode, null, null, false
        );

        AnnotationRegistry::registerLoader('class_exists'); //No tengo muy claro que es lo que hace¿inidica la autocarga de clases con anotaciones  si existen?

        $this->em = EntityManager::create($dbConfig, $config);//le pasamos configuración del acceso a la base de datos y la config del doctrine
    }
}
?>