<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $contentKey; ?>">
    <meta name="author" content="Matheus de Mello">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= $titulo; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  	<link href="<?php echo base_url("assets/css/custom.header_fixed_top.css"); ?>" rel="stylesheet">
  	<link href="<?php echo base_url("assets/css/custom.promocional.index.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/custom.style.folio.css"); ?>" rel="stylesheet">
    <!-- Icons -->
    <link rel="shortcut icon" href="<?php echo base_url("assets/ico/32.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="32x32" href="<?php echo base_url("assets/ico/60.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url("assets/ico/72.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url("assets/ico/120.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url("assets/ico/152.png"); ?>" type="image/png">
    <?= $script_google; ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <script src="<?= base_url("assets/js/owl.carousel.min.js"); ?>"></script>
    <script src="<?= base_url("assets/js/isotope.pkgd.min.js"); ?>"></script>
  </head>
<body> 

  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-mister-marrom">
    <img class="icon mx-3" src="<?php echo base_url("assets/img/bonequinho-120.png"); ?>" alt="O Mister">
    <a class="navbar-brand mr-auto" href="<?php echo base_url("vitrine"); ?>"><b>Mister</b> Salgadinho</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ml-auto">
          <?php if(!empty($cliente)) : ?>
            <?php if($cliente->tipo !== "s") : ?>
            <a class="navbar-brand" href="<?= base_url("perfil/index"); ?>">
            <?php else : ?>
              <a class="navbar-brand" href="<?= base_url("areacomercial/dashboard"); ?>">
            <?php endif; ?>
          <?php else : ?>
              <a class="navbar-brand" href="<?= base_url("perfil/index"); ?>">
          <?php endif; ?>
            <span class="ml-auto">Sua Conta</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none"  stroke-linecap="round" stroke-linejoin="round" class="ml-auto feather"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
          </a>
        </li>
        <li class="nav-item ml-auto">
          <a href="#" class="navbar-brand" id="btnSeuPedido" data-toggle="modal" data-target="#ModalCarrinho">
            Seu Pedido
            <img class="icon" src="<?php echo base_url("assets/img/media/shopping-cart-amarelo.png"); ?>" alt="Carrinho">
            <span class="badge badge-danger cart-popover" id="count_cart" tabindex="0" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Produto adicionado com sucesso!" data-content="Click no carrinho para finalizar a compra."></span>
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="alert alert-danger alert-dismissible" id="message-danger" 
    <?= isset($cidade_nao_selecionada) ? "" : "style=\"display: none;\""; ?> role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <p id="msgError"><?= isset($cidade_nao_selecionada) ? $cidade_nao_selecionada : "" ?></p>
  </div>

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
          <a href="<?= base_url("clientes/registrar") ?>" class="btn btn-warning dark btn-block" role="button"><span>Finalizar Pedido</span></a>
        </div>
      </div>
    </div>
  </div>