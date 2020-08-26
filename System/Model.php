<?php

     /**
     * Model do Motor da Aplicação
     * @author Diego Simas
     */
    class Model
    {

        public $conexao;
        public $query;
        public $table;

        public function __construct()
        {
        }

        /**
        * Método responsável por conectar ao banco e criar uma instância PDO
        * @author Diego Simas
        */
        private function getInstance()
        {
            if (is_null($this->conexao)) {
                $this->conexao = new \PDO('mysql:host=localhost;port=;dbname=jestor_tasks', 'root', '');
                $this->conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $this->conexao->exec('set names utf8');
            }
            return $this->conexao;
        }

        /**
        * Método responsável por trazer um array de objetos da instância do banco
        * @author Diego Simas
        */
        public function getResult()
        {
            if ($conexao = $this->getInstance()) {
                $stmt = $conexao->prepare($this->query);
                if ($stmt->execute()) {
                    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                    return $result;
                }
            }
        }

        /**
        * Método responsável por realizar uma execução INSERT/DELETE ou UPDATE da instância do banco
        * @author Diego Simas
        */
        public function execute()
        {
            if ($conexao = $this->getInstance()) {
                $stmt = $conexao->prepare($this->query);
                if ($stmt->execute()) {
                    return true;
                }
                return false;
            }
        }

    }

?>
