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
  	<link href="<?php echo base_url("assets/css/custom.email.marketing.css"); ?>" rel="stylesheet">
  </head>
  <body> 

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-warning justify-content-center">
      <a class="navbar-brand " href="<?php echo base_url(""); ?>"><b>Mister</b> Salgadinho</a>
    </nav>

		<div class="wrap">

			<section id="hero" class="m-center text-center bg-shop full-height">
				<div class="center-box">
					<div class="container-fluid nopadding">
						<div class="hero-unit ">
							<h1 class="title"><b>Mister</b> Salgadinho</h1>
							<h3><b>Muito / Mais muito / Gostoso</b></h3>	
							<p><br>
							Sagadinho feito com <b>Massa de Mandioca</b>. Variedades que <b>vão agradar</b> seu gosto.<br>
							<b>Sabores surpreendente! </b> Venha provar o nosso salgadinho. <br>Faça seu pedido agora mesmo!<br>
							</p>
						</div>
						<div class="col-sm-12 img-hero"></div>
					</div>
				</div>
			</section>
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
    			</div>
    		</div>
    	</div>
    </footer>

	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	
		<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
  </body>
</html>