<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mister - Salgadinho">
    <meta name="author" content="Matheus de Mello">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Administrador - Mister Salgadinho</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
    <link href="<?php echo base_url("assets/css/open-iconic.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/docs.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/custom.shop.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/custom.admin.css"); ?>" rel="stylesheet">
    <!-- Icons -->
    <link rel="shortcut icon" href="<?php echo base_url("assets/template/img/ico/32.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="32x32" href="<?php echo base_url("assets/template/img/ico/60.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url("assets/template/img/ico/72.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url("assets/template/img/ico/120.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url("assets/template/img/ico/152.png"); ?>" type="image/png">
  </head>
  <body>
    <div class="alert alert-danger alert-dismissible" id="message-danger" style="display: none;" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <p id="msgError"></p>
    </div>  

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-warning">
      <a class="navbar-brand" href="<?php echo base_url("Admin/Main"); ?>"><b>Delivery</b> / <b>Mister</b> Salgadinho</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="#Finalizar" class="navbar-brand" class="nav-link">
              
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="alert alert-danger alert-dismissible" id="message-danger" style="display: none;" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <p id="msgError"></p>
    </div>  

	<div class="container-fluid">
		<div class="row">
			<div class="container">
        <form method="post" action="" class="" id="formFiltroPedido">
          <div class="form-row justify-content-end">
            <h2 class="mt-1 mr-auto">Lista de Pedidos</h2>
        
            <div class="form-group col-md-2">
              <select name="tipoPesq" id="inputTipoPesq" class="form-control">
                <option selected>Pesquisar por: </option>
                <option value="nome">Nome</option>
                <option value="email">Email</option>
                <option value="id_pedido">Id do Pedido</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <input type="text" class="form-control" name="valuePesq" id="inputValuePesq" placeholder="Pesquisar ...">
            </div>
            <div class="form-group col-md-1">
              <button type="submit" class="btn btn-warning">Pesquisar</button>
            </div>
          </div>
        </form>
        <hr class="mb-3 mt-1">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Data</th>
              <th>Nome</th>
              <th>Telefone</th>
              <th>Valor</th>
              <th>Festa</th>
              <th>Situação</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
				    <?php echo $view_pedidos; ?>
          </tbody>
        </table>
			</div>
		</div>
	</div>

   
	
	<footer class="footer">
      <div class="container">
    		<div class="row">
    			<div class="col-12 col-md-12 col-sm-12 px-5 pb-3 text-center">
    				<h2 class="mt-4 text-light"><b>Mister</b> Salgadinho</h2>
    				<hr class="mb-3 mt-1 bg-secondary">
    				<div class="row justify-content-center">
    					<div class="col-md-4">
    						<ul class="nav justify-content-center">
    						  <li class="nav-item">
    							<a class="nav-link" href="#">
    								<img class="icon" src="<?php echo base_url("assets/ico/social/facebook_light.svg"); ?>" alt="Facebook">
    							</a>
    						  </li>
    						  <li class="nav-item">
								<a class="nav-link" href="#">
									<img class="icon" src="<?php echo base_url("assets/ico/social/instagram_light.svg"); ?>" alt="Instagram">
								</a>
    						  </li>
    						  <li class="nav-item">
								<a class="nav-link" href="#">
									<img class="icon" src="<?php echo base_url("assets/ico/social/twitter_light.svg"); ?>" alt="Twitter">
							    </a>
    						  </li>
    						  <li class="nav-item">
								<a class="nav-link" href="#">
									<img class="icon" src="<?php echo base_url("assets/ico/social/youtube_light.svg"); ?>" alt="YouTube">
								</a>
    						  </li>
							  <li class="nav-item">
								<a class="nav-link" href="#">
									<img class="icon" src="<?php echo base_url("assets/ico/social/google+_light.svg"); ?>" alt="Google +">
								</a>
							  </li>
    						</ul>
    					</div>
    				</div>
    				<small class="text-muted">Copyright 2017 &#169; - Matheus de Mello</small> 
    			</div>
    		</div>
    	</div>
    </footer>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
  </body>

<script>
$('form#formSitPedido').on('submit', function(event){
  var dados = $( this ).serialize();
  var form = this;

  $.ajax({
    type: "POST",
    url: "<?php echo base_url("index.php/restrito/admin/alterar_situacao_pedido"); ?>",
    data: dados,
    success: function( data )
    {
      console.log(data);
      $(form).parent().parent().parent().parent().remove();
    },
    error : function(data) {
      console.log(data.responseText);
      $("#msgError").html("<strong>Desculpe!</strong> Não foi possível mudar a situação do pedido. Em breve tente novamente!");
      $("#message-danger").removeAttr("style");
    }
  });
  return false;
});

$('form#formFiltroPedido').on('submit', function(event){
  var dados = $( this ).serialize();
  var form = this;

  $.ajax({
    type: "POST",
    url: "<?php echo base_url("index.php/restrito/admin/view_pedidos"); ?>",
    data: dados,
    success: function( data )
    {
      console.log(data);
      $('tbody').empty();
      $('tbody').html(data);
    },
    error : function(data) {
      console.log(data.responseText);
      $("#msgError").html("<strong>Desculpe!</strong> Não foi possível fazer a pesquisa. Em breve tente novamente!");
      $("#message-danger").removeAttr("style");
    }
  });
  return false;
});
</script>
</html>