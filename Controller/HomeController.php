<?php

    defined('APP_NAME') OR exit(utf8_encode('Vocъ nуo tem acesso a esta aplicaчуo!'));

    /**
     * Controller Home do Motor da Aplicaчуo
     * @author Diego Simas
     */

    class HomeController extends Controller
    {
        public function index()
        {
            //Primeira Pсgina -> LOGIN Da Plataforma
            $this->view->render('Login');
        }
    }

?>