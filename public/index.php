<?php

//Activar errores para la depuración
//https://secure.php.net/manual/es/function.error-reporting.php
error_reporting(E_ALL);// establece la directiva error_reporting en tiempo de ejecución

$container = require __DIR__ . '/../bootstrap/container.php';

$dispatcher = require __DIR__ . '/../routes/web.php';

$httpMethod = $_SERVER['REQUEST_METHOD'];

//https://secure.php.net/manual/es/function.parse-url.php
$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

$route = $dispatcher->dispatch($httpMethod, $uri);

//Configuración de las rutas
//Las constantes de dispatch se encuentran en https://github.com/nikic/FastRoute/blob/master/src/Dispatcher.php
switch ($route[0]){
    case \FastRoute\Dispatcher::NOT_FOUND:{
        echo "Ruta no encontrada";
        break;
    }
    case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:{
        echo "Método HTTP no permitido";
        break;
    }
    case \FastRoute\Dispatcher::FOUND:{
       $controller = $route[1];
       $params = $route[2];
       $container->call($controller,$params);
        break;
    }
}



// kint::dump($dispatcher);
// kint::dump($uri);



?>