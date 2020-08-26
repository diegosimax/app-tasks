<?php

    defined('APP_NAME') OR exit(utf8_encode('Você não tem acesso a esta aplicação!'));

    /**
     * Controller Home do Motor da Aplicação
     * @author Diego Simas
     */
    class HomeController extends Controller
    {
        public function index()
        {
            //Primeira Página -> LOGIN Da Plataforma
            $this->view->render('Login');
        }
    }

?>
