<?php

    defined('APP_NAME') OR exit(utf8_encode('Voc� n�o tem acesso a esta aplica��o!'));

    class UserController extends Controller
    {  

        // public function __construct()
        // {
        //     parent::__construct();
        // }

        public function index()
        {
            $this->view->tasks = 'parei aqui';
            $this->view->render('User');
        }

    }

?> 