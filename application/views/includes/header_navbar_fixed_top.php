<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
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
  	<link href="<?php echo base_url("assets/css/custom.header_fixed_top.css"); ?>" rel="stylesheet">
  	<link href="<?php echo base_url("assets/css/custom.promocional.index.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/custom.style.folio.css"); ?>" rel="stylesheet">
    <!-- Icons -->
    <link rel="shortcut icon" href="<?php echo base_url("assets/ico/32.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="32x32" href="<?php echo base_url("assets/ico/60.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url("assets/ico/72.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url("assets/ico/120.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url("assets/ico/152.png"); ?>" type="image/png">
  </head>
<body> 

  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-mister-marrom">
    <img class="icon mx-3" src="<?php echo base_url("assets/img/bonequinho-120.png"); ?>" alt="O Mister">
    <a class="navbar-brand" href="<?php echo base_url(""); ?>"><b>Mister</b> Salgadinho</a>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ml-auto">
        <a href="#" class="navbar-brand" id="btnSeuPedido" data-toggle="modal" data-target="#ModalCarrinho">
        <!-- antigo carrinho no formato toggle
        <a href="#" class="navbar-brand" id="btnSeuPedido" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        -->
          Seu Pedido
          <img class="icon" src="<?php echo base_url("assets/img/media/shopping-cart-amarelo.png"); ?>" alt="Carrinho">
          <span class="badge badge-danger cart-popover" id="count_cart" tabindex="0" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Produto adicionado com sucesso!" data-content="Click no carrinho para finalizar a compra."></span>
        </a>
      </li>
    </ul>
  </nav>

    <!-- funcionando para o carrinho, porém troquei --
    <div class="row collapse fixed-top" id="navbarToggleExternalContent" style="top: 56px;">
      <div class="col-sm-6 col-md-5 col-lg-6 ml-auto">
        <div class="card">
          <div class="card-header bg-mister-amarelo">
            <h5 class="text-center">CONFIRA SEU PEDIDO</h5>
          </div>
          <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </div>
    -->

  <div class="alert alert-danger alert-dismissible" id="message-danger" 
    <?= isset($cidade_nao_selecionada) ? "" : "style=\"display: none;\""; ?> role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <p id="msgError"><?= isset($cidade_nao_selecionada) ? $cidade_nao_selecionada: "" ?></p>
  </div>


<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCarrinho">
  Launch demo modal
</button>
-->

  <!-- Modal -->
  <div class="modal fade" id="ModalCarrinho" tabindex="-1" role="dialog" aria-labelledby="CarrinhoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-mister-amarelo">
          <h5 class="color-marrom" id="exampleModalLabel">CONFIRA SEU PEDIDO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="closeX" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center pb-0" id="resultCarrinho">
          <div class="text-center border border-dark rounded" id="CarrinhoVazio" >
            <h4 class="mx-5 my-5"> SEU CARRINHO ESTÁ VAZIO </h4>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning btn-lg btn-block fade-out">Finalizar Pedido</button>
        </div>
      </div>
    </div>
  </div>