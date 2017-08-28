<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
	<link href="<?php echo base_url("assets/css/custom.shop.css"); ?>" rel="stylesheet">
  </head>

  <body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-md-4 mx-md-auto">
				<div class="alert alert-warning alert-dismissible fade show <?php echo $login_erro; ?>" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				  <strong>Falha ao logar!</strong><br/> Usuário e senha inválido.
				</div>
			</div>
		</div>
	</div>
	
    <div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-md-4 mx-md-auto">
			  <?php echo form_open('restrito/admin/logar', array('id' => 'formLogin', 'class' => 'myformPedido')); ?>
				<h2 class="text-center">Área restrita.</h2>
				<div class="form-group">
					<label for="inputUser" class="sr-only">Usuário</label>
					<input type="text" id="inputUser" name="user" class="form-control" placeholder="Usuário" required autofocus>
				</div>
				<div class="form-group">
					<label for="inputPassword" class="sr-only">Senha</label>
					<input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Senha" required>
				</div>
				<div class="form-group">
					<button class="btn btn-lg btn-warning btn-block" type="submit">Logar</button>
				</div>
			  <?php echo form_close(); ?>
			</div> <!-- /col center -->
		</div> <!-- /row -->
    </div> <!-- /container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
  </body>
</html>
