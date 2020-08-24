<?php

    defined('APP_NAME') OR exit(utf8_encode('Você não tem acesso a esta aplicação!'));

     /**
     * View do Motor da Aplicação
     * @author Diego Simas
     */
    class View 
    {

        /**
         * Método responsável por renderizar a view
         * @author Diego Simas
         */
        public function render($viewPath)
        {
            require('View/' . $viewPath . '.php');
        }
    }

?> 