<?php

    defined('APP_NAME') OR exit(utf8_encode('Voc� n�o tem acesso a esta aplica��o!'));

     /**
     * View do Motor da Aplica��o
     * @author Diego Simas
     */
    class View 
    {

        /**
         * M�todo respons�vel por renderizar a view
         * @author Diego Simas
         */
        public function render($viewPath)
        {
            require('View/' . $viewPath . '.php');
        }
    }

?> 