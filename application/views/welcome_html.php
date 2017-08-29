<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="alert alert-danger alert-dismissible" id="message-danger" style="display: none;" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <p id="msgError"></p>
  </div>

    <h1>Hello, world!</h1>
	<a href="<?php echo base_url("Cart"); ?>" class="btn btn-info" role="button" id="btnSeuPedido" style="display:none;">Seu Pedido <span class="badge badge-secondary" id="count_cart"></span> </a>
		
  	<div class="container">
  		<?php echo $view_produtos; ?>
  	</div>
  	<div class="container" >
      <div class="panel panel-default">
        <div class="panel-body">
      		<?php echo form_open('Clientes/inserir', array('id' => 'formCliente', 'class' => '')); ?>
      			<div class="form-group">
              <input type="hidden" name="id_cliente">
              <label for="InputNome">Nome</label>
              <input type="text" name="nome" class="form-control" id="InputNome" placeholder="Nome">
            </div>
            <div class="form-group">
      				<label for="InputEmail">Email address</label>
      				<input type="email" name="email" class="form-control" id="InputEmail" placeholder="Email">
      			</div>
            <div class="form-group">
              <label for="InputTelefone">Telefone</label>
              <input type="text" name="telefone" class="form-control" id="InputTelefone" placeholder="telefone">
            </div>
            <div class="form-group">
              <label for="InputEndereco">Endereço Completo</label>
              <input type="text" name="endereco" class="form-control" id="InputEndereco" placeholder="Endereço Completo">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
<script>
$(document).ready(function(){
  getCountCart();
});

function getCountCart(){
	
	$.get("<?php echo base_url("index.php/Carts/countBySession"); ?>", function(data, status){
		if (data != '0'){
			$("#btnSeuPedido").removeAttr("style");
			$('#count_cart').text(data);
		}
	});
}

$('form#formCart').on('submit', function(){
	var dados = $( this ).serialize();
  var form = this;
	$.ajax({
		type: "POST",
		url: "<?php echo base_url("index.php/Carts/inserir"); ?>",
		data: dados,
		success: function( data )
		{
			getCountCart();
      $(form).find("#InputQtde").val("");
		},
    error : function(data) {
      console.log(data.responseText);
      $("#msgError").html("<strong>Desculpe!</strong> Erro ao receber seu pedido. Em breve tente novamente!");
      $("#message-danger").removeAttr("style");
    }
	});
	return false;
});
</script>
  </body>
</html>