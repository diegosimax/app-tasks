<?php

     /**
     * Model do Motor da Aplicaчуo
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

        private function getInstance()
        {
            if (is_null($this->conexao)) {
                $this->conexao = new \PDO('mysql:host=localhost;port=;dbname=jestor_tasks', 'root', '');
                $this->conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $this->conexao->exec('set names utf8');
            }
            return $this->conexao;
        }

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