<?php

    defined('APP_NAME') OR exit(utf8_encode('Vocъ nуo tem acesso a esta aplicaчуo!'));

    /**
     * Motor da Aplicaчуo
     * @author Diego Simas
     */

    class Motor
    {

        /**
         * Mщtodo Construtor para o Motor da Aplicaчуo
         * @author Diego Simas
         */
        public function __construct()
        {
            $error = false;
            
            //Estabele a rota 
            if (isset($_GET['path'])) {
                $tokens = explode('/', rtrim($_GET['path'], '/'));
                //Dispatcher -> Verifica a URL requisitada e redireciona para o controller correto
                $controllerName = ucfirst(array_shift($tokens));
                if (file_exists('Controller/' . $controllerName . '.php')) {
                    $controller = new $controllerName();
                    if (!empty($tokens)) {
                        $actionName = array_shift($tokens);
                        if (method_exists($controller, $actionName)) {
                            // Realiza a passagem de parтmetros caso exista ou nulo se nуo existir
                            $controller->{$actionName}($tokens);
                        } else {
                            //404 -> Esta aчуo nуo existe
                            $error = true;
                        }
                    } else {
                        //O default serс sempre a index
                        $controller->index();
                    }
                } else {
                    //404 -> Este controller nуo existe
                    $error = true;
                }
            } else {
                $controllerName = 'HomeController';
                $controller = new $controllerName;
                $controller->index();
            }

            //Pсgina de ERRO
            if ($error) {
                $controllerName = 'Error404Controller';
                $controller = new $controllerName;
                $controller->index();
            }
        }

    }
?>