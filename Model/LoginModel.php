<?php

    defined('APP_NAME') OR exit(utf8_encode('Voc� n�o tem acesso a esta aplica��o!'));

    class LoginModel extends Model
    {
        public $idLogin;
        public $email;
        public $senha;

        public function verificaUsuario(){
        $this->query = "SELECT Email FROM user WHERE Email = '{$this->email}' AND Password = '" . md5($this->senha) . "'";
            $retorno = $this->getResult();
            if (!$retorno) {
                return array();
            }
            return $retorno;
        }

    }

?> 