<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
	<div class="row">
    <div class="col-md-12">
      <h4>Tarefas</h4>
      <a href='http://localhost/app-tasks/task/criar/'><button type="button" class="btn btn-primary">+ Adicionar</button></a>
      <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped">
          <thead>
            <th>Id</th>
            <th>Assunto</th>
            <th>Descrição</th>
            <th>Data de Entrega</th>
            <th>Visualizar</th>
            <th>Editar</th>
            <th>Deletar</th>
          </thead>
          <tbody>
            <?php foreach ($this->tasks as $task) {
              echo "<tr>";
              echo "<td>" . $task->IdTask . "</td>";
              echo "<td>" . $task->Assunto . "</td>";
              echo "<td>" . $task->Descricao . "</td>";
              echo "<td>" . date("d/m/Y", strtotime($task->DataEntrega)) . "</td>";
              echo "<td><p title='Visualizar'><a href='http://localhost/app-tasks/task/visualizar/".$task->IdTask."'><button class='btn btn-primary btn-xs' id='visualizar'><span class='glyphicon glyphicon-eye-open'></span></button></a></p></td>";
              echo "<td><p title='Editar'><a href='http://localhost/app-tasks/task/alterar/".$task->IdTask."'><button class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil'></span></button></a></p></td>";
              echo "<td><p title='Deletar'><button class='btn btn-danger btn-xs pegaId' id='modal' data-toggle='modal' data-nome='".$task->Assunto."' data-id='".$task->IdTask."' data-target='#exampleModal'><span class='glyphicon glyphicon-trash'></span></button></p></td>";              
            } ?>
          </tbody>
        </table>
      </div>
    </div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formExcluir" name="formExcluir" enctype="multipart/form-data" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Exclusão</h5>        
      </div>
      <div class="modal-body">
        Deseja excluir <label id="nomeTarefaLabel" name="nomeTarefaLabel"></label>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Tenho Certeza!</button>
      </div>
    </div>
    <input type="hidden" value="" name="idTask" id="idTask">
    </form>
  </div>
</div>

</body>
</html>

<script>
    
    $(document).on("click", ".pegaId", function () {        
        var nomeTarefa = $(this).data('nome');
        var idTarefa = $(this).data('id');
        $("#nomeTarefaLabel").text( nomeTarefa ); 
        $("#idTask").val( idTarefa ); 
    });     
    
    $(document).ready(function(){       
        $('#formExcluir').submit(function(){
            
            var formData = new FormData(this);
            
            $('#resEditarAnimal').html("<b>Processando...</b>");
            
            $.ajax({
                url: '<?=constant('APP_URL')?>Task/excluir', 
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST'
            })
            .done(function(data){   
                window.location.href = "<?=constant('APP_URL')?>task";
            })
            .fail(function() {         
                alert( "Posting failed." );             
            });
            return false; 
        });
    });     

</script>



