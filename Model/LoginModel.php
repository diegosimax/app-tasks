<?php

    defined('APP_NAME') OR exit(utf8_encode('Você não tem acesso a esta aplicação!'));

    /**
    * Model de Login
    * @author Diego Simas
    */
    class LoginModel extends Model
    {
        public $idLogin;
        public $email;
        public $senha;

        /**
        * Método para verificar se o usuário existe
        * @author Diego Simas
        */
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
