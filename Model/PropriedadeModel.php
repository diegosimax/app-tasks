<?php

    defined('APP_NAME') OR exit(utf8_encode('Você não tem acesso a esta aplicação!'));

    class PropriedadeModel extends Model
    {

        public $idTask;
        public $idPropriedade;
        public $nome;
        public $arrNome;

        public function listar()
        {
            if (!empty($this->idTask)) {
                $this->query = "SELECT P.IdPropriedade, P.Nome, TP.Valor
                                  FROM task_propriedade TP
                            INNER JOIN propriedade P ON (TP.IdPropriedade = P.IdPropriedade)
                                 WHERE TP.IdTask = {$this->idTask}
                              ORDER BY P.IdPropriedade ASC";
            } 

            $retorno = $this->getResult();

            if (!$retorno) {
                return array();
            }
            return $retorno;
        }

        public function salvarPropriedade()
        {
            foreach ($this->arrNome as $nome) {
                $this->nome = $nome;
                $retorno = $this->listarPropriedade();
                if (empty($retorno)) {
                    $arrInsert[] = "('" . $nome . "')";
                }
            }

            if (isset($arrInsert) && count($arrInsert) > 0) {
                $txtInsert = join(', ', $arrInsert);
                $this->query = "INSERT INTO propriedade (`Nome`) VALUES " . $txtInsert;
                $this->execute();
            }
        }

        public function listarPropriedade()
        {
            $this->query = "SELECT P.IdPropriedade, P.Nome
                              FROM propriedade P
                             WHERE P.Nome = '{$this->nome}'";
            
            $retorno = $this->getResult();
            
            if (!$retorno) {
                return array();
            }
            
            return $retorno;
        }

        public function listarPropriedadeIn()
        {
            foreach ($this->arrNome as $nome) {
                $arrIn[] = "'" . $nome . "'";
            }
            $txtIn = join(', ', $arrIn);
            


            

            $this->query = "SELECT P.IdPropriedade, P.Nome
                              FROM propriedade P
                             WHERE P.Nome = '{$this->nome}'";
            
            $retorno = $this->getResult();
            
            if (!$retorno) {
                return array();
            }
            
            return $retorno;
        }
       
    }

?> 