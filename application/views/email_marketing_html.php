<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
  	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
  <style>
    body{
      font-family: 'Source Sans Pro', sans-serif;
      font-weight: 400;
      color: #202020;
      font-size: 16px;
      background-color: #f7c723;
      padding-top: 5rem;
    }
    .wrap{
      padding-bottom: 6rem;
    }
    .bg-shop {
      background-color: #f7c723;
    }
    .footer{
      background-color: #1d2023;
        padding: 80px 0 70px 0;
        color: #b6b6b6;
        overflow: visible;
    }

    .list-group-item{
      padding: 0.25rem 1.5rem;
      border:0px;
      background-color: #1d2023;
    }
    .list-group a{
      font-size: smaller;
    }

    footer .icon{
      width: 20px;
    }
    #hero {
      height: 550px;
    }
    #hero .hero-unit {
      text-align: center;
      padding: 0;
      margin: 0;
      background-color: transparent;
    }
    #hero .hero-unit h1 {
      font-size: 70px;
      font-weight: 200;
      margin-top: 70px;
    }
    #hero .hero-start-link,
    #hero .hero-start-link:focus {
      position: absolute;
      left: 50%;
      bottom: 0;
      margin-left: -19px;
      margin-bottom: 15px !important;
      display: block;
      width: 40px;
      height: 40px;
      border: 2px solid #202020;
      border-radius: 50%;
      line-height: 36px;
      text-align: center;
      font-size: 28px;
      color: #ffffff;
      background-color: #202020;
    }
    #hero .hero-start-link:hover,
    #hero .hero-start-link:focus:hover {
      color: #f7c723;
      text-decoration: none;
    }
    #hero .img-hero {
      background-image: url('<?php echo $link; ?>assets/img/mockup4.png');
      background-repeat: no-repeat;
      background-position: center top !important;
      text-align: center;
      padding-top: 100px;
      height: 400px;
    }
    @media (max-width: 767px) {
      #hero .img-hero {
        margin-top: 30px;
      }
    }  
  </style>
  </head>
  <body> 
    <h4 class="text-center"><b>Mister</b> Salgadinho</h4>
    <?php echo $mensagem; ?>
		<div id="wrap">
			<section id="hero" class="m-center text-center bg-shop full-height">
				<div class="center-box">
					<div class="container-fluid nopadding">
						<div class="hero-unit ">
							<h1 class="title"><b>Mister</b> Salgadinho</h1>
							<h3><b>Muito / Mais muito / Gostoso</b></h3>	
							<p><br>
              <b>Agradecemos pela preferência.</b> Seu pedido foi recebido com <b>sucesso.</b> <br>
              Em breve este <b>delicioso salgadinho</b> será produzido.<br>
              Seu pedido será entrege no <b>local, data e hora</b> nos informado.<br>
							</p>
						</div>
						<div class="col-sm-12 img-hero"></div>
					</div>
				</div>
			</section>
		</div>
  </body>
</html>