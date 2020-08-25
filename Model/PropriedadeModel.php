<?php

    defined('APP_NAME') OR exit(utf8_encode('Você não tem acesso a esta aplicação!'));

    class PropriedadeModel extends Model
    {

        public $idTask;
        public $idPropriedade;
        public $nome;
        public $arrNome;
        public $arrValor;
        public $arrPropriedade;
        public $idInserido;

        public function listar()
        {
            $strAs = "'' AS Valor";
            $strLeftJoin = "";
            
            if (!empty($this->idTask)) {
                $strAs = "TP.Valor";
                $strLeftJoin = " LEFT JOIN task_propriedade TP ON (TP.IdPropriedade = P.IdPropriedade AND TP.IdTask = {$this->idTask}) ";
            } 

            $this->query = "SELECT P.IdPropriedade, P.Nome, " . $strAs .
                            " FROM propriedade P " . $strLeftJoin .
                         " ORDER BY P.IdPropriedade ASC";
            
            $retorno = $this->getResult();

            if (!$retorno) {
                return array();
            }
            return $retorno;
        }

        public function salvarPropriedade()
        {
            //Salva propriedades existentes
            foreach ($this->arrPropriedade as $idPropriedade => $valor) {
                if (!empty($this->idTask)) {
                    $this->query = "UPDATE task_propriedade 
                                       SET `Valor` = '{$valor}' 
                                     WHERE `IdTask` = {$this->idTask} 
                                       AND `IdPropriedade` = {$idPropriedade}";
                    $this->execute();
                } else {
                    $this->query = "INSERT INTO task_propriedade 
                                               (`Valor`,
                                                `IdTask`,
                                                `IdPropriedade`)
                                         VALUES('{$valor}',
                                                {$this->idInserido},
                                                {$idPropriedade})";
                    $this->execute();
                }
               
            }

            //Salva propriedades criadas
            foreach ($this->arrNome as $key => $nome) {
                if (!empty(rtrim($nome))) {
                    $this->nome = $nome;
                    $retorno = $this->listarPropriedade();
                     if (empty($retorno)) {
                        $this->query = "INSERT INTO propriedade (`Nome`) VALUES ('{$this->nome}')";
                        $this->execute();
                        $idPropriedade = $this->conexao->lastInsertId();
                        $this->query = "INSERT INTO task_propriedade 
                                                    (`IdTask`, 
                                                    `IdPropriedade`, 
                                                    `Valor`) 
                                             VALUES ({$this->idTask}, 
                                                    {$idPropriedade}, 
                                                    '{$this->arrValor[$key]}')";
                        $this->execute();
                    }
                }
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

    }

?> 