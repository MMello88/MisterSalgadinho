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
  	<link href="<?php echo base_url("assets/css/custom.header_fixed_top.css"); ?>" rel="stylesheet">
  	<link href="<?php echo base_url("assets/css/custom.promocional.index.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/custom.style.folio.css"); ?>" rel="stylesheet">

    <!-- Icons -->
    <link rel="shortcut icon" href="<?php echo base_url("assets/template/img/ico/32.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="32x32" href="<?php echo base_url("assets/template/img/ico/60.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url("assets/template/img/ico/72.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url("assets/template/img/ico/120.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url("assets/template/img/ico/152.png"); ?>" type="image/png">

  </head>
  <body> 

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-warning">
      <a class="navbar-brand" href="<?php echo base_url(""); ?>"><b>Mister</b> Salgadinho</a>
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

