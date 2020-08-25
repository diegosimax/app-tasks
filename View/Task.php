<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
	<div class="row">
    <div class="col-md-12">
      <h4>Tarefas</h4>
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
              echo "<td><p title='Deletar'><button class='btn btn-danger btn-xs' id='modal'><span class='glyphicon glyphicon-trash'></span></button></p></td>";
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
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
