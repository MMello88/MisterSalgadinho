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
    <title>Carrinho - Seus Pedidos - Mister Salgadinho</title>

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
      <a class="navbar-brand" href="<?php echo base_url(); ?>"><b>Delivery</b> / <b>Mister</b> Salgadinho</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="#Finalizar" class="navbar-brand" class="nav-link">
              Finalizar a Compra
              <img class="icon" src="<?php echo base_url("assets/ico/social/shopping-cart.svg"); ?>" alt="Carrinho">
              <span class="badge badge-danger" id="count_cart"></span>
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
      <ol class="breadcrumb bg-transparent">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url("Shop/{$link_cidade}"); ?>">Shop</a></li>
        <li class="breadcrumb-item active">Carrinho</li>
      </ol>

      <h2 class="mt-4">Lista de Pedido</h2>
      <hr class="mb-3 mt-1">
      <div class="row">
        <div class="col-3 col-md-2 col-sm-2 pr-3 pb-3" style="border-color: #F3F3F4;"></div>
          <div class="col-7 col-md-10 col-sm-6 pl-3 pb-3">
            <div class="row texto-esquerdo text-center">
              <div class="col-12 col-md-4 col-sm-12">Item
              </div>
              <div class="col-12 col-md-2 col-sm-12">Preço
              </div>
              <div class="col-12 col-md-2 col-sm-12">Quantidade
              </div>
              <div class="col-12 col-md-2 col-sm-12">Subtotal
              </div>
            </div>
          </div>
      </div>
		  <?php echo $view_pedido_produtos; ?>
  	</div>

    <div class="cta-1 bg-escuro padding-top-bottom text-center white-text">
      <div class="container-fluid anima scale-in">
        <span>Esperamos que tenha uma experiência agradavél que vamos lhe proporcionar! </span>
        <a href="#Finalizar" class="nbtn">Finalizar a Compra</a>
      </div>
    </div>
    
	<section class="finalizar bg-white" id="Finalizar">
		<div class="container bg-white" >
      <div class="row text-center">
        <div class="col-md-12 mb-5">
          <h2>Finalize sua Compra</h2>
          <p class="text-muted">Para finalizar a compra precisamos que informe para nós alguns dados importantes.</p>
        </div>
      </div>
      
      
      <div class="col-10 col-md-10 col-xl-10 mx-md-auto bd-content">
        <nav class='nav nav-tabs' id='myTab' role='tablist'>
          <a class='nav-item nav-link active' id='nav-delivery-tab' data-toggle='tab' href='#nav-delivery' role='tab' aria-controls='nav-delivery' aria-expanded='true'>Delivery</a>
          <a class='nav-item nav-link' id='nav-festa-tab' data-toggle='tab' href='#nav-festa' role='tab' aria-controls='nav-festa' aria-expanded='true'>Para Festa</a>
        </nav>
        
        <div class='tab-content' id='nav-tabContent' style='padding: 15px 15px 0 15px;'>
          <div class='tab-pane fade show active' id='nav-delivery' role='tabpanel' aria-labelledby='nav-delivery-tab'>
            <div class="row">
              <div class="col-xs-12 col-sm-10 col-md-8 mx-md-auto">
                <?php echo form_open('Carts/finalizar', array('id' => 'formCliente', 'class' => 'myformPedido')); ?>
                
                <div class="form-group">
                  <input type="hidden" name="id_cliente">
                  <label for="InputNome">Nome</label>
                  <input type="text" name="nome" class="form-control form-control-lg" id="InputNome" placeholder="Nome" required>
                </div>
                <div class="form-group">
                  <label for="InputEmail">Email address</label>
                  <input type="email" name="email" class="form-control form-control-lg" id="InputEmail" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <label for="InputTelefone">Telefone</label>
                  <input type="text" name="telefone" class="form-control form-control-lg" id="InputTelefone" placeholder="Telefone/Celular" required>
                </div>
                <div class="form-group">
                  <label for="InputEndereco">Endereço Completo</label>
                  <input type="text" name="endereco" class="form-control form-control-lg" id="InputEndereco" placeholder="Ex.: Av. Plinio de Castro Prado 431, ap 33" required>
                </div>
                
                <?php echo $combobox_cidade; ?>
                
                <div class="form-group">
                  <label for="InputEndereco">Data da Entrega</label>
                  <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="data_entrega" class="form-control form-control-lg" min="<?php echo date('Y-m-d', strtotime(date("Y-m-d"). ' + 2 days')); ?>" id="InputDataEntrege" placeholder="Data da Entrege" required>
                  <small class="form-text text-muted">
                    Estamos trabalhando muito para melhorar nosso tempo de entrega. Hoje a previsão é de 2 dias para a entrega de seu pedido.
                  </small>
                </div>

                <?php echo $combobox_horario; ?>
                <label for="InputHoraEvento">Forma de Pagamento</label>
                <br/>
                <?php echo $forma_pagto; ?>
                <div class="form-check">
                  <input type="hidden" name="festa" id="festa" value="off" >
                  <!--Pedido para Festa?-->
                </div>
                
                
                <!--<label for="InputEnderecoEvento">Endereço do Local do Envento</label>-->
                <input type="hidden" name="end_evento" class="form-control form-control-lg" id="InputEnderecoEvento" placeholder="Endereço do Evento Ex.: Rua Amador Bueno 22, casa 1">
                <!--<label for="InputCelularEvento">Celular p/ Contato</label>-->
                <input type="hidden" name="cel_evento" class="form-control form-control-lg" id="InputCelularEvento" placeholder="(16) 91111-0000">
                <!--<label for="InputDataEvento">Data do Envento</label>-->
                <input type="hidden" name="data_evento" class="form-control form-control-lg" min="<?php echo date('Y-m-d', strtotime(date("Y-m-d"). ' + 2 days')); ?>" id="InputDataEvento" placeholder="Data do Evento">
                <!--<label for="InputHoraEvento">Horário do Envento</label>-->
                <input type="hidden" name="hora_evento" class="form-control form-control-lg" id="InputHoraEvento" placeholder="Horário do Evento">

                <button type="submit" class="nbtn ml-auto">Comprar</button>
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>

          <div class='tab-pane fade' id='nav-festa' role='tabpanel' aria-labelledby='nav-festa-tab'>
            <div class="row">
              <div class="col-xs-12 col-sm-10 col-md-8 mx-md-auto">
                <?php echo form_open('Carts/finalizar', array('id' => 'formCliente', 'class' => 'myformPedido')); ?>
                
                <input type="hidden" name="hora_entrega">
                <input type="hidden" name="data_entrega">
                
                <div class="form-group">
                  <input type="hidden" name="id_cliente">
                  <label for="InputNome">Nome</label>
                  <input type="text" name="nome" class="form-control form-control-lg" id="InputNome" placeholder="Nome" required>
                </div>
                <div class="form-group">
                  <label for="InputEmail">Email address</label>
                  <input type="email" name="email" class="form-control form-control-lg" id="InputEmail" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <label for="InputTelefone">Telefone</label>
                  <input type="text" name="telefone" class="form-control form-control-lg" id="InputTelefone" placeholder="Telefone/Celular" required>
                </div>
                <div class="form-group">
                  <label for="InputEndereco">Endereço Completo</label>
                  <input type="text" name="endereco" class="form-control form-control-lg" id="InputEndereco" placeholder="Ex.: Av. Plinio de Castro Prado 431, ap 33" required>
                </div>

                <?php echo $combobox_cidade; ?>
                
                <div class="form-check">
                  <input type="hidden" name="festa" id="festa" value="on">
                  <!--Pedido para Festa?-->
                </div>

                <p class="text-dark text-center">Precisamos de algumas informações do local do evento da festa.<br> Por favor preencha algumas informações abaixo.</p>
                
                <div class="form-group">
                  <label for="InputEnderecoEvento">Endereço do Local do Envento</label>
                  <input type="text" name="end_evento" class="form-control form-control-lg" id="InputEnderecoEvento" placeholder="Endereço do Evento Ex.: Rua Amador Bueno 22, casa 1" required>
                </div>

                <div class="form-group">
                  <label for="InputCelularEvento">Celular p/ Contato</label>
                  <input type="text" name="cel_evento" class="form-control form-control-lg" id="InputCelularEvento" placeholder="Celular p/ Contato Ex.: (16) 91111-0000" required>
                </div>

                <div class="form-group">
                  <label for="InputDataEvento">Data do Envento</label>
                  <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="data_evento" class="form-control form-control-lg" min="<?php echo date('Y-m-d', strtotime(date("Y-m-d"). ' + 2 days')); ?>" id="InputDataEvento" placeholder="Data do Evento" required>
                  <small class="form-text text-muted">
                    Estamos trabalhando muito para melhorar nosso tempo de entrega. Hoje a previsão é de 2 dias para a entrega de seu pedido.
                  </small>
                </div>
                
                <div class="form-group">
                  <label for="InputHoraEvento">Horário do Envento</label>
                  <input type="text" name="hora_evento" class="form-control form-control-lg" id="InputHoraEvento" placeholder="Horário do Evento" required>                  
                </div>
                
                <label for="InputHoraEvento">Forma de Pagamento</label>
                <br/>
                <?php echo $forma_pagto; ?>
                <br/>
                <button type="submit" class="nbtn ml-auto">Comprar</button>
                
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>

        </div>
      </div>
		</div>
	</section>
	
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
    				  <a href="<?php echo base_url("Shop/{$link_cidade}"); ?>" class="list-group-item text-warning">
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
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
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

$(window).resize(function() {
   var valor;
   var texto;
   var i;
   var count = $("p#forTotal").text();
   for (i = 0; i < count; i++) {
      valor = "";
      valor = $("p#preco"+i).text().replace("Preço: ", "");
      $("p#preco"+i).text(valor);

      valor = $("p#qtde"+i).text().replace("Qtde: ", "");
      $("p#qtde"+i).text(valor);

      valor = $("p#subtotal"+i).text().replace("Subtotal: ", "");
      $("p#subtotal"+i).text("Subtotal: " + valor);  

    if ($(this).width() <= 575) {
      texto = "";
      texto = $("p#preco"+i).text();
      $("p#preco"+i).text("Preço: " + texto);
      texto = $("p#qtde"+i).text();
      $("p#qtde"+i).text("Qtde: " + texto);
      texto = $("p#subtotal"+i).text();
      $("p#subtotal"+i).text("Subtotal: " + texto);
    } 
  }
});

</script>
</html>