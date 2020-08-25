<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tarefa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h4>Tarefa</h4>
      <form class="form-horizontal" id="formTask" name="formTask">
    <div class="form-group">
      <label for="validationCustom01" class="control-label col-sm-2">Assunto:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="assunto" placeholder="Assunto" name="assunto" value="<?=$this->task->Assunto?>" <? if(!$this->edicao) { echo "disabled"; } ?> required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Descrição:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="descricao" placeholder="Descrição" name="descricao" value="<?=$this->task->Descricao?>" <? if(!$this->edicao) { echo "disabled"; } ?> required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Data de Entrega:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="dataEntrega" placeholder="00/00/0000" name="dataEntrega" value="<?=date("d/m/Y", strtotime($this->task->DataEntrega))?>" <? if(!$this->edicao) { echo "disabled"; } ?> required>
      </div>
    </div>
    <?php foreach ($this->propriedades as $propriedade) { ?>
      <div class="form-group">
      <label class="control-label col-sm-2"><?=$propriedade->Nome?>:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="propriedades[<?=$propriedade->IdPropriedade?>]" placeholder="<?=$propriedade->Nome?>" name="propriedades[<?=$propriedade->IdPropriedade?>]" value="<?=$propriedade->Valor?>" <? if(!$this->edicao) { echo "disabled"; } ?>>
      </div>
      </div>
    <?php } ?>
    <div id="propriedades"></div>
    <div id="mensagem" name="mensagem" align="center"></div>
    <br>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-1">
        <button type="submit" class="btn btn-primary" <? if(!$this->edicao) { echo "disabled"; } ?>>Salvar</button>
      </div>
      <div class="col-sm-offset-2 col-sm-1">
        <a href="<?=constant('APP_URL')?>task" class="btn btn-default">Voltar</a>
      </div>
      <div class="col-sm-offset-2 col-sm-1">
        <button type="submit" class="btn btn-primary" id="adicionar" <? if(!$this->edicao) { echo "disabled"; } ?>>Adicionar Propriedade</button>
      </div>     
    </div>
    <input type="hidden" value="<?=$this->task->IdTask?>" id="idTask" name="idTask"/>
  </form>
    </div>
	</div>
</div>

</body>
</html>

<script>
    
    $(document).ready(function(){       
        $('#formTask').submit(function(){
            
            var formData = new FormData(this);
            
            $('#resEditarAnimal').html("<b>Processando...</b>");
            
            $.ajax({
                url: '<?=constant('APP_URL')?>Task/salvar', 
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST'
            })
            .done(function(data){   
              $('#mensagem').html('Tarefa salva com sucesso!');
            })
            .fail(function() {         
                alert( "Posting failed." );             
            });
            return false; 
        });
    });


    const propriedades = document.querySelector("#propriedades")

    $( "#adicionar" ).click(function() {

        let div = document.createElement("div");
        div.classList.add('form-group');

        let divPropriedade = document.createElement("div");
        divPropriedade.classList.add('col-sm-2');

        let propriedade = document.createElement("input");
        propriedade.name = "novoNomePropriedade[]";
        propriedade.placeholder = "Nome da Propriedade";
        propriedade.classList.add('form-control');
        propriedade.type="text";

        divPropriedade.appendChild(propriedade);

        let divValor = document.createElement("div");
        divValor.classList.add('col-sm-10');

        let valor = document.createElement("input");
        valor.name = "novoValorPropriedade[]";
        valor.placeholder = "Valor";
        valor.classList.add('form-control');
        valor.type="text";

        divValor.appendChild(valor);
        
        div.appendChild(divPropriedade);
        div.appendChild(divValor);
        propriedades.appendChild(div);
    });

</script>

