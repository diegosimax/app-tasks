<?php

    defined('APP_NAME') OR exit(utf8_encode('Você não tem acesso a esta aplicação!'));

    /**
     * Controller do Motor da Aplicação
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
