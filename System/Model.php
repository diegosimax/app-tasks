<?php

     /**
     * Model do Motor da Aplicaчуo
     * @author Diego Simas
     */
    class Model 
    {

        private static $conexao;
        public $query;
        public $table;

        public function __construct()
        {
        }

        private function getInstance()
        {
            if (is_null(self::$conexao)) {
                self::$conexao = new \PDO('mysql:host=localhost;port=;dbname=jestor_tasks', 'root', '');
                self::$conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$conexao->exec('set names utf8');
            }
            return self::$conexao;
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

        // public function getColumns()
        // {
        //     if ($conexao = $this->getInstance()) {
        //         $stmt = $conexao->prepare('SHOW COLUMNS FROM ' . $this->table);
        //         if ($stmt->execute()){ 
        //             $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        //             return $result;
        //         }
        //     }
        // }

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