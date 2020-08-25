<?php

    defined('APP_NAME') OR exit(utf8_encode('Você não tem acesso a esta aplicação!'));

    class Task extends Controller
    {  

        public $task;
        public $propriedade;

        public function __construct()
        {
            parent::__construct();
            $this->task = new TaskModel();
            $this->propriedade = new PropriedadeModel();
        }

        public function index()
        {
            if (isset($_SESSION['USER_LOGADO'])) {
                //$this->view->colunas = $this->task->listarColunas();
                $this->view->tasks = $this->task->listar();
                $this->view->render('Task');
            }
        }

        public function visualizar()
        {           
            $this->view->edicao = false;
            $this->trataView();
        }

        public function alterar()
        {
            $this->view->edicao = true;
            $this->trataView();
        }

        public function trataView() {
            $arrParam = explode('/', $_GET['path']);
            $idTask = $arrParam[2];
            
            $this->task->idTask = $idTask;
            $retorno = $this->task->listar();

            if (!empty($retorno)) {
                $this->view->task = $retorno[0];
                $this->propriedade->idTask = $idTask;
                $this->view->propriedades = $this->propriedade->listar();
                ;
                $this->view->render('TaskView');
            }
        }
        
        public function salvar()
        {   
            $dataEntrega = date("Y-m-d",strtotime(str_replace('/','-',$_POST['dataEntrega'])));
            
            if (empty(rtrim($_POST['assunto']))) {
                echo "ERRO ASS";
                exit;
            }

            if (empty(rtrim($_POST['descricao']))) {
                echo "ERRO DESC";
                exit;
            }

            if (empty(rtrim($_POST['dataEntrega']))) {
                echo "ERRO DTENTR";
                exit;
            }

            $this->task->idTask = $_POST['idTask'];
            $this->task->assunto = $_POST['assunto'];
            $this->task->descricao = $_POST['descricao'];
            $this->task->dataEntrega = $dataEntrega;
            $this->task->salvar();


            $this->propriedade->arrNome = isset($_POST['nomePropriedade']) ? $_POST['nomePropriedade'] : array() ;
            $this->propriedade->salvarPropriedade();
           
        }

        

        
    }

?> 