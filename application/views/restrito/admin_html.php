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
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
    <link href="<?php echo base_url("assets/css/open-iconic.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/docs.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/custom.shop.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/custom.admin.css"); ?>" rel="stylesheet">
  </head>
  <body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-warning">
      <a class="navbar-brand" href="<?php echo base_url("restrito/admin"); ?>"><b>Delivery</b> / <b>Mister</b> Salgadinho</a>
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
			  <h2 class="mt-4">Lista de Pedidos</h2>
			  <hr class="mb-3 mt-1">
			  <div class="row">
				  <div class="col-12 col-md-12 col-sm-12 pl-3 pb-3">
  					<div class="row texto-esquerdo text-center">
  					  <div class="col-12 col-md-2 col-sm-12">Nome
  					  </div>
  					  <div class="col-12 col-md-2 col-sm-12">Endereço
  					  </div>
  					  <div class="col-12 col-md-2 col-sm-12">Telefone
  					  </div>
  					  <div class="col-12 col-md-2 col-sm-12">E-mail
  					  </div>
              <div class="col-12 col-md-1 col-sm-12">Data
              </div>
              <div class="col-12 col-md-1 col-sm-12">Valor
              </div>
              <div class="col-12 col-md-1 col-sm-12">Festa
              </div>
              <div class="col-12 col-md-1 col-sm-12">xxx
              </div>
  					</div>
				  </div>
			  </div>
				  <?php echo $view_pedidos; ?>
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
$('form#formCartDel').on('submit', function(){
  var dados = $( this ).serialize();
  console.log(dados);
  console.log(this);
  var form = this;
  var valor_item = $(this).find("#valor_subtotal").val();
  var total = $("#valor_total").text().replace("Total: ","");
  total = parseInt(total) - parseInt(valor_item);
  $.ajax({
    type: "POST",
    url: "<?php echo base_url("index.php/Carts/deletarByProduto"); ?>",
    data: dados,
    success: function( data )
    {
      $(form).parent().parent().parent().prev().children().remove();
      $(form).parent().parent().remove();
      $("#valor_total").text("Total: " + total);
    },
    error : function(data) {
      console.log(data.responseText);
      $("#msgError").html("<strong>Desculpe!</strong> Erro ao remover seu pedido. Em breve tente novamente!");
      $("#message-danger").removeAttr("style");
    }
  });
  return false;
});
</script>
</html>