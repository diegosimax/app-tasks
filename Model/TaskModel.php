<?php

    defined('APP_NAME') OR exit(utf8_encode('Você não tem acesso a esta aplicação!'));

    class TaskModel extends Model
    {

        public $idTask;
        public $assunto;
        public $descricao;
        public $dataEntrega;

        public function listar()
        {
            if (!empty($this->idTask)) {
                $this->query = "SELECT * FROM task WHERE IdTask = {$this->idTask}";
            } else {
                $this->query = "SELECT * FROM task";
            }

            $retorno = $this->getResult();
            if (!$retorno) {
                return array();
            }
            return $retorno;
        }

        public function salvar()
        {
            if (!empty($this->idTask)) {
                $this->query = "UPDATE task 
                                   SET Assunto = '{$this->assunto}',
                                       Descricao = '{$this->descricao}',
                                       DataEntrega = '{$this->dataEntrega}'
                                 WHERE IdTask = {$this->idTask}";
                $this->execute();
            } else {
                $this->query = "INSERT INTO task 
                                            (
                                                `Assunto`, 
                                                `Descricao`, 
                                                `DataEntrega`
                                            ) 
                                     VALUES ('{$this->assunto}', 
                                             '{$this->descricao}', 
                                             '{$this->dataEntrega}'
                                            )";
                $this->execute();
                return $this->conexao->lastInsertId();
            }
        }
        
        public function deletar()
        {
            $this->query = "DELETE FROM task WHERE IdTask = {$this->idTask}";
            $this->execute();
            $this->query = "DELETE FROM task_propriedade WHERE IdTask = {$this->idTask}";
            $this->execute();
        }

    }

?> 