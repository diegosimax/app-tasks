<?php

    defined('APP_NAME') OR exit(utf8_encode('Voc� n�o tem acesso a esta aplica��o!'));

    /**
     * Motor da Aplica��o
     * @author Diego Simas
     */

    class Motor
    {

        /**
         * M�todo Construtor para o Motor da Aplica��o
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
                            // Realiza a passagem de par�metros caso exista ou nulo se n�o existir
                            $controller->{$actionName}($tokens);
                        } else {
                            //404 -> Esta a��o n�o existe
                            $error = true;
                        }
                    } else {
                        //O default ser� sempre a index
                        $controller->index();
                    }
                } else {
                    //404 -> Este controller n�o existe
                    $error = true;
                }
            } else {
                $controllerName = 'HomeController';
                $controller = new $controllerName;
                $controller->index();
            }

            //P�gina de ERRO
            if ($error) {
                $controllerName = 'Error404Controller';
                $controller = new $controllerName;
                $controller->index();
            }
        }

    }
?>