<?php

return \FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $route){//Con $route manejamos las rutas
    $route->addRoute('GET','/', [\Application\controllers\HomeController::class, 'index']);
    //Como parámetros tiene(el método,la ruta,el manejador para esa ruta).
    //El manejador tiene la clase controladora y el método(método por defecto)
});
?>