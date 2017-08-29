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
    <title>Shop - Mister Salgadinho</title>

    <!-- Bootstrap -->
  	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
  	<link href="<?php echo base_url("assets/css/open-iconic.css"); ?>" rel="stylesheet">
  	<link href="<?php echo base_url("assets/css/docs.min.css"); ?>" rel="stylesheet">
  	<link href="<?php echo base_url("assets/css/custom.shop.css"); ?>" rel="stylesheet">
    <!-- Icons -->
    <link rel="shortcut icon" href="<?php echo base_url("assets/template/img/ico/32.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="32x32" href="<?php echo base_url("assets/template/img/ico/60.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url("assets/template/img/ico/72.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url("assets/template/img/ico/120.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url("assets/template/img/ico/152.png"); ?>" type="image/png">

  </head>
  <body> 

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-warning">
      <a class="navbar-brand" href="<?php echo base_url(""); ?>"><b>Delivery</b> / <b>Mister</b> Salgadinho</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="<?php echo base_url("Cart"); ?>" class="navbar-brand" id="btnSeuPedido">
              Seu Pedido
              <img class="icon" src="<?php echo base_url("assets/ico/social/shopping-cart.svg"); ?>" alt="Carrinho">
              <span class="badge badge-danger cart-popover" id="count_cart" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Produto adicionado com sucesso!" data-content="Click no carrinho para finalizar a compra."></span>
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
	
		
  	<div class="container">
		<?php echo $view_produtos; ?>
  	</div>

    <footer class="footer">
      <div class="container">
    		<div class="row">
    			<div class="col-12 col-md-8 col-sm-12 px-5 pb-3">
            <address class="text-light">
              <img class="icon mr-2" src="<?php echo base_url("assets/ico/social/mail_light.svg"); ?>" alt="E-mail">
              E-mail <a class="text-light" href="mailto:matheus.gnu@gmail.com">contato@<b>mister</b>salgadinho.com.br</a><br> 

              <img class="icon mr-2" src="<?php echo base_url("assets/ico/social/location-pin_light.svg"); ?>" alt="Localização">
              R. Amador Bueno 1372<br>

              <img class="icon mr-2" src="<?php echo base_url("assets/ico/social/phone.svg"); ?>" alt="Celular">
              Matheus (16) 99183-8523<br>

              <img class="icon mr-2" src="<?php echo base_url("assets/ico/social/phone.svg"); ?>" alt="Celular">
              Rogerio (16) 99135-2685<br>

            </address>
    			</div>
    			<div class="col-12 col-md-4 col-sm-12 px-5 pb-3">
    				<ul class="list-group">
    				  <li class="list-group-item text-warning" style="padding: 0.25rem .75rem;">LINKS</li>
    				  <a href="<?php echo base_url(); ?>" class="list-group-item text-warning">
    				  HOME
    					  <span class="badge badge-warning float-right">
    						<span class="oi" data-glyph="chevron-right" title="icon name" aria-hidden="true"></span>
    					  </span>
    				  </a>
    				  <a href="<?php echo base_url("Shop/ribeirao_preto"); ?>" class="list-group-item text-warning">
    				  SHOP
    					  <span class="badge badge-warning float-right">
    						<span class="oi" data-glyph="chevron-right" title="icon name" aria-hidden="true"></span>
    					  </span>
    				  </a>
    				  <a href="<?php echo base_url("#start"); ?>" class="list-group-item text-warning">
    				  SOBRE
    					  <span class="badge badge-warning float-right">
    						<span class="oi" data-glyph="chevron-right" title="icon name" aria-hidden="true"></span>
    					  </span>
    				  </a>
    				  <a href="<?php echo base_url("#contact"); ?>" class="list-group-item text-warning">
    				  CONTATO
    					  <span class="badge badge-warning float-right">
    						<span class="oi" data-glyph="chevron-right" title="icon name" aria-hidden="true"></span>
    					  </span>
    				  </a>
    				</ul>
    			</div>
    			
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

	<!-- Modal -->
	<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="infoModalLabel">Modal title</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			...
		  </div>
		</div>
	  </div>
	</div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
<script>
$(document).ready(function(){
  getCountCart();
  <?php if ($showInfoModal == "true") { ?>
  $('#infoModal').modal('show');
  <?php } ?>
});

function getCountCart(){
	
	$.get("<?php echo base_url("index.php/Carts/countBySession"); ?>", function(data, status){
      if (data == 0){
        $("#btnSeuPedido").addClass("disabled");
      }
			$("#btnSeuPedido").removeAttr("style");
			$('#count_cart').text(data);
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
      $('.cart-popover').popover('show');
		},
    error : function(data) {
      console.log(data.responseText);
      $("#msgError").html("<strong>Desculpe!</strong> Erro ao receber seu pedido. Em breve tente novamente!");
      $("#message-danger").removeAttr("style");
    }
	});
	return false;
});

$(function () {
  $('.cart-popover').popover({
    container: 'body'
  })
});

$('.cart-popover').on('show.bs.popover', function () {
  setTimeout(function() {
        $('.cart-popover').popover('hide');
    }, 3000);
});
</script>
  </body>
</html>