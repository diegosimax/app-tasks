<?php

    defined('APP_NAME') OR exit(utf8_encode('Voc� n�o tem acesso a esta aplica��o!'));

    /**
     * Controller do Motor da Aplica��o
     * @author Diego Simas
     */

    class Controller 
    {
        public function __construct()
        {
            $this->view = new View();
        }
    }

?>