<?php

    defined('APP_NAME') OR exit(utf8_encode('Você não tem acesso a esta aplicação!'));

    /**
     * Motor da Aplicação
     * @author Diego Simas
     */

    class Motor
    {

        /**
         * Método Construtor para o Motor da Aplicação
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
                            // Realiza a passagem de parâmetros caso exista ou nulo se não existir
                            $controller->{$actionName}($tokens);
                        } else {
                            //404 -> Esta ação não existe
                            $error = true;
                        }
                    } else {
                        //O default será sempre a index
                        $controller->index();
                    }
                } else {
                    //404 -> Este controller não existe
                    $error = true;
                }
            } else {
                $controllerName = 'HomeController';
                $controller = new $controllerName;
                $controller->index();
            }

            //Página de ERRO
            if ($error) {
                $controllerName = 'Error404Controller';
                $controller = new $controllerName;
                $controller->index();
            }
        }

    }
?>
