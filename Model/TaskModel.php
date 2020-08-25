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
            $this->query = "UPDATE task 
                               SET Assunto = '{$this->assunto}',
                                   Descricao = '{$this->descricao}',
                                   DataEntrega = '{$this->dataEntrega}'
                             WHERE IdTask = {$this->idTask}";

            $this->execute();
        }

    }

?> 