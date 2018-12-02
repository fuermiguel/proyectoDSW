<?php
namespace Application\Providers;

class View {
    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * view constructor
     */

    public function __construct(){
        $loader = new \Twig_Loader_FileSystem(base_path('resources/views'));
        $twig = new \Twig_Environment($loader);

        $twigFunctions = new \Twig_simpleFunction(\TwigFunctions::class, function($method, $params = []){
            return \TwigFunctions::$method($params);
        });

        $twig->addFunction($twigFunctions);//Añado las funciones propias a las de twig

        $this->twig = $twig;
    }

    /**
     * @param string $view
     * @param array $data
     * 
     * @return string
     * @throws \Twig_error_Loader 
     * @throws \Twig_error_Runtime
     * @throws \Twig_error_Syntax
     */
    public function render (string $view, array $data = []): string {
        return $this->twig->render($view, $data);
    }

}
?>