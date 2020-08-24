<?php

    defined('APP_NAME') OR exit(utf8_encode('Você não tem acesso a esta aplicação!'));

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