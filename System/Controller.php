<?php

    defined('APP_NAME') OR exit(utf8_encode('Vocъ nуo tem acesso a esta aplicaчуo!'));

    /**
     * Controller do Motor da Aplicaчуo
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