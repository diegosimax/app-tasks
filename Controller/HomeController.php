<?php

    defined('APP_NAME') OR exit(utf8_encode('Voc� n�o tem acesso a esta aplica��o!'));

    /**
     * Controller Home do Motor da Aplica��o
     * @author Diego Simas
     */

    class HomeController extends Controller
    {
        public function index()
        {
            //Primeira P�gina -> LOGIN Da Plataforma
            $this->view->render('Login');
        }
    }

?>