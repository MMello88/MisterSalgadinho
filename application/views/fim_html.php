<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
<head>
    <title>Mister Salgadinho - Salgados feito com massa de mandioca!</title>
    <meta charset="utf-8">
    <meta name="description" content="Mister - Salgadinho">
    <meta name="author" content="Matheus de Mello">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/template/css/owl.carousel.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/template/css/style-yellow.css"); ?>">
	<link rel="shortcut icon" href="<?php echo base_url("assets/template/img/ico/32.png"); ?>" type="image/png">
	<link rel="apple-touch-icon" sizes="32x32" href="<?php echo base_url("assets/template/img/ico/60.png"); ?>" type="image/png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url("assets/template/img/ico/72.png"); ?>" type="image/png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url("assets/template/img/ico/120.png"); ?>" type="image/png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url("assets/template/img/ico/152.png"); ?>" type="image/png">
    <script type="text/javascript" src="<?php echo base_url("assets/template/js/modernizr.min.js"); ?>"></script>
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body id="home">     
	<div id="wrap">
		<section id="hero" class="m-center text-center bg-shop full-height">
			<div class="center-box">
				<div class="container-fluid nopadding">
					<div class="hero-unit ">
						<h1 class="title"><b>Mister</b> Salgadinho</h1>
						<h3><b><?php echo $nome_cliente; ?></b></h3>
						<p><br>
						<?php echo $mensagem; ?>
						<br>
						</p>
						<br>
						<a class="btn white" href="<?php echo base_url(""); ?>"> Voltar a página principal</a>
					</div>
					<div class="col-sm-12 img-hero"></div>
				</div>
			</div>
		</section>
	</div>
</body>

</html>
