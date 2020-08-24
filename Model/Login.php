<?php

    defined('APP_NAME') OR exit(utf8_encode('Você não tem acesso a esta aplicação!'));

    class Login extends Model
    {

        public $email;
        public $senha;

        public function consultar(){
        $this->query = "SELECT Email FROM user WHERE Email = '{$this->email}'";
            $retorno = $this->getResult();
            if (!$retorno) {
                return false;
            }
            return true;
        }

    }

?> 