<?php

    defined('APP_NAME') OR exit(utf8_encode('Voc� n�o tem acesso a esta aplica��o!'));

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