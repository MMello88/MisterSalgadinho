<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
<head>
    <title>Mister Salgadinho - Salgados feito com massa de mandioca!</title>
    <meta charset="utf-8">
    <meta name="description" content="Mister - Salgadinho; Massa Mandioca; Mini Salsicha; Mini Coxinha; Mini coxinha de Frango; Salgadinhos para festa; Salgadinhos de festa; Salgado de festa;">
    <meta name="author" content="Matheus de Mello">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/template/css/owl.carousel.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/template/css/style-yellow.css"); ?>">
    <link href="<?php echo base_url("assets/css/open-iconic.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/custom.main.css"); ?>" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url("assets/ico/32.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="32x32" href="<?php echo base_url("assets/ico/60.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url("assets/ico/72.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url("assets/ico/120.png"); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url("assets/ico/152.png"); ?>" type="image/png">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-18838216-4"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-18838216-4');
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118826942-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-118826942-1');
    </script>

    <script type="text/javascript" src="<?php echo base_url("assets/template/js/modernizr.min.js"); ?>"></script>
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body id="home">
	<a id="menu-link" href="#" class="">
		<span class="menu-icon"></span>
	</a>
      
	<div class="overlay" id="overlay">
		<nav class="overlay-menu">
			<ul>
				<li><a href="#home" class="smooth-scroll">Home</a></li>
				<li><a href="#start" class="smooth-scroll">Sobre o Produto</a></li>
				<li><a href="#showcase" class="smooth-scroll">Produtos</a></li>
				<li><a href="#requirements" class="smooth-scroll">Comprar</a></li>
				<li><a href="#features" class="smooth-scroll">Caracteristicas</a></li>
				<li><a href="#contact" class="smooth-scroll">Contato</a></li>
				<!--<li><a href="http://www.google.com" class="smooth-scroll">Mister Blog</a></li>-->
			</ul>
		</nav>
	</div>
	
	<div id="wrap">
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
						<br>
						<a class="btn white" href="<?php echo base_url("Shop/{$link_cidade}"); ?>"> <!--data-toggle="modal" data-target="#product-modal"--> COMPRE <b>AGORA</b></a>
					</div>
					<div class="col-sm-12 img-hero"></div>
				</div>
				<a href="#start" class="hero-start-link smooth-scroll anchor-link"><i class="fa fa-angle-double-down"></i></a>
			</div>
		</section>

	<section id="start" class="padding-top-bottom text-center">
      <div class="container">
        <div class="row header">
			<div class="col-md-12">
				<h2>Sobre Nós</h2>
				<p>Um pouco da nossa história</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<p>Idealizado pelo nosso querido avô Guerrino Bugnola, ao longo dos anos sua receita feita com muito carinho e dedicação, uniu amigo, família, proporcionou novas amizades. A sua massa especial e o gostinho único do salgado, misturado com seu carisma levou a uma receita especial, após 2° geração que manteve o padrão e a ideologia, resolvemos entrar para história apresentando ao mundo os sabores maravilhosos de nossos salgados feitos com a massa de mandioca. A tecnologia vai a nosso favor para expandir e mostrar ao mundo a nossa receita. Nós da 3° geração vamos manter vivo a chama acessa que um dia foi a inspiração em acender o gostinho de quero mais e apresenta-la a vocês! uma experiência nova, mantendo o tradicional amor pelos encontros de amigos, famílias e aquela qualidade indiscutível </p>
			</div>
		</div>
	  </div>		
    </section>

    <div class="cta-1 bg-dark padding-top-bottom text-center white-text">
		<div class="container-fluid anima scale-in">
			<span>​Você quer experimentar nossos salgadinhos? </span>
			<!--<a class="btn" href="#map" data-toggle="modal" data-target="#product-modal">Nos encontre</a>-->
			<a class="btn" href="#map">Nos encontre</a>
		</div>
	</div>	
    
    <!-- vertical center / slider -->
	<section id="showcase" class="">
      <div class="container-fluid">
        <div class="row" >
 					<div class="col-sm-6 slider">
            <div id="as-slider" class="owl-carousel" data-autoplay="4000" data-navigation="false" data-dots="true" data-transition="">
              <div class="item m-center" style="background-image:url(<?php echo base_url("assets/img/cup1.jpg"); ?>)"></div>
              <div class="item m-center" style="background-image:url(<?php echo base_url("assets/img/cup2.jpg"); ?>)"></div>
              <div class="item m-center" style="background-image:url(<?php echo base_url("assets/img/cup3.jpg"); ?>)"></div>
              <div class="item m-center" style="background-image:url(<?php echo base_url("assets/img/cup4.jpg"); ?>)"></div>
              <div class="item m-center" style="background-image:url(<?php echo base_url("assets/img/cup5.jpg"); ?>)"></div>
              <div class="item m-center" style="background-image:url(<?php echo base_url("assets/img/cup6.jpg"); ?>)"></div>
              <div class="item m-center" style="background-image:url(<?php echo base_url("assets/img/cup7.jpg"); ?>)"></div>
              <div class="item m-center" style="background-image:url(<?php echo base_url("assets/img/sexta.jpg"); ?>)"></div>
            </div>
          </div> 
          <div class="col-sm-6 bg-shop" style="height:500px;">
            <div class="half-box-right">
                <div class="center-vertical">
                  <div class="center-vertical-box">
                    <h2><b>Veja a variedade de nossos salgadinhos</b></h2>
                    <ul style="padding: 20px;">
                      <li>Bolinho de Carne (Mandioca)</li>
                      <li>Enroladinho c/ Presunto e Queiro (Mandioca)</li>
                      <li>Salsicha (Mandioca)</li>
                      <li>Coxinha de Frango</li>
                      <li>Croquete de Carne</li>
                      <li>Kibe c/ Queijo</li>
                      <li>Batata c/ Presunto e Queijo</li>
                    </ul>
                    <!--<a href="#" data-toggle="modal" data-target="#product-modal" class="btn dark"><b>$5</b> BUY NOW</a> -->
                  </div>
                </div>
            </div>
          </div> 
                </div>
            </div>
        </section> 

		<div class="cta-1 bg-dark padding-top-bottom text-center white-text">
			<div class="container-fluid anima scale-in">
				<span>Deixe seu e-mail para receber as nossas novidades e ofertas.</span>
				<a class="btn" href="#" data-toggle="modal" data-target=".text-modal">Quero Novidade</a>
			</div>
		</div>

	<section id="map" class="padding-top-bottom text-center">
      <div class="container">
        <div class="row header">
			<div class="col-md-12">
				<h2>Veja onde nos encontrar</h2>
			</div>
		</div>
		<div class="row">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.313219427858!2d-47.81120172152708!3d-21.17971280459773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b9befac336a66f%3A0xd095a999cabd2548!2sR.+Prudente+de+Morais%2C+532+-+Centro%2C+Ribeir%C3%A3o+Preto+-+SP!5e0!3m2!1spt-BR!2sbr!4v1519604128668" class="col-md-12" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	  </div>		
    </section>

    <div class="footer-1 text-center">
    <div class="container-fluid">
        <a href="#home" class="back-to-top smooth-scroll"><i class="fa fa-chevron-up"></i></a>
    </div>
  </div>
  
    <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-8 col-sm-12 px-5 pb-3">
          <address class="text-light">
            <img class="icon mr-2" src="<?php echo base_url("assets/ico/social/mail_light.svg"); ?>" alt="E-mail">
            E-mail <a class="text-light" href="mailto:matheus.gnu@gmail.com">contato@<b>mister</b>salgadinho.com.br</a><br> 

            <img class="icon mr-2" src="<?php echo base_url("assets/ico/social/location-pin_light.svg"); ?>" alt="Localização">
            R. Prudente de Morais, 532 - Centro, Ribeirão Preto - SP<br>

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
              </ul>
            </div>
          </div>
          <small class="text-muted">Copyright 2017 &#169; - Matheus de Mello</small> 
        </div>
      </div>
    </div>
  </footer>

		<div class="modal fade text-modal" id="text-modal" tabindex="-1" role="dialog"  aria-hidden="true">
		    <div class="modal-dialog modal-sm2">
		        <div class="modal-content">
		            <div class="modal-header bg-shop">
		                <a class="close-modal" href="#" data-dismiss="modal">
		                    <span class="menu-icon"></span>
		                </a>
		                <h2 class=""><b>Boletim Mister Salgadinho</b></h2>
		            </div>
		            <div class="modal-body">
		                <strong>Sempre enviaremos noticias com informações e promoções.</strong>
		                <br/>
		                <br/>
						<?php echo form_open('Welcome/newsletter', array('id' => 'formCliente', 'class' => 'myformPedido')); ?>
			                <div class="form-group">
			                  <input type="hidden" name="id_cliente">
			                  <label for="InputNome">E-mail</label>
			                  <input type="text" name="email" class="form-control form-control-lg" id="InputEmail" placeholder="Email">
			                </div>
			                <button type="submit" class="btn">Enviar</button>
		                <?php echo form_close(); ?>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="product-modal" tabindex="-1" role="dialog" aria-hidden="true">
		    <div class="modal-dialog modal-sm2">
		        <div class="modal-content">
		            <div class="modal-header">
		                <a class="close-modal" href="#" data-dismiss="modal">
		                    <span class="menu-icon"></span>
		                </a>
		                <img src="<?php echo base_url("assets/img/cup1.jpg"); ?>" alt="" class="img-responsive">
		            </div>
		            <div class="modal-body">
		                <h3 class="text-center"><b>PaperCup - Mockup </b>($5,00)</h3>
		            </div>
		            <div class="modal-footer">
		                <form id="buy" action="buy" class="myform" method="post" novalidate>
		                    <div class="form-group">
		                        <div class=" controls">
		                            <input name="email" placeholder="PayPal Email" class="form-control input-lg requiredField" type="email" data-error-invalid="Invalid email address" data-error-empty="Enter email">
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <div class="controls">
		                            <input id="password" class="form-control" type="password" placeholder="PayPal Password" name="password">
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <button type="button" class="btn btn-block">PAY NOW</button>
		                    </div>
		                    <p class="text-center"><a href="" data-dismiss="modal">Cancel</a>
		                    </p>
		                </form>
		            </div>
		        </div>
		    </div>
		</div>


	</div>
    <!-- Core scrips -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/template/js/core.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/template/js/menu-overlay.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/template/js/placeholders.min.js"); ?>"></script>
    <!-- end core scripts --> 
    <!-- sliders -->
    <script type="text/javascript" src="<?php echo base_url("assets/template/js/owl.carousel.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/template/js/jquery.waitforimages.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/template/js/sliders.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/template/js/jquery.counterup.min.js");?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/template/js/numbers.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/template/js/contact.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/template/js/parallax.js"); ?>"></script>
</body>

</html>
