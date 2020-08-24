<?php

    defined('APP_NAME') OR exit(utf8_encode('Você não tem acesso a esta aplicação!'));

    class LoginController extends Controller
    {

        public $login;
        public $user;

        public function __construct()
        {
            parent::__construct();
            $this->login = new Login();
        }

        public function logarUsuario() 
        {
            $response = ['success' => false];

            if (!empty($_POST['email']) && !empty($_POST['email'])) {
                $this->login->email = $_POST['email'];
                $this->login->senha = $_POST['senha'];
                if ($this->login->consultar()) {
                    $response = ['success' => true];
                } 
            } 

            echo json_encode($response);
            exit;
        }


    }

?> 