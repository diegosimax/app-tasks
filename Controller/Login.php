<?php

    defined('APP_NAME') OR exit(utf8_encode('Voc� n�o tem acesso a esta aplica��o!'));

    class Login extends Controller
    {

        public $login;
        public $user;

        public function __construct()
        {
            parent::__construct();
            $this->login = new LoginModel();
        }

        public function index()
        {
            $this->view->render('Login');
        }

        public function logarUsuario() 
        {
            $response = ['success' => false];

            if (!empty($_POST['email']) && !empty($_POST['email'])) {
                $this->login->email = $_POST['email'];
                $this->login->senha = $_POST['senha'];
                $retorno = $this->login->verificaUsuario();
                if (!empty($retorno)) {
                    $response = ['success' => true];
                    $_SESSION['USER_LOGADO'] = $retorno[0]->Email;
                } 
            } 

            echo json_encode($response);
            exit;
        }


    }

?> 