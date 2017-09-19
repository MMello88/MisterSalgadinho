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
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/template/css/style-yellow.css"); ?>">
    <link href="<?php echo base_url("assets/css/open-iconic.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/custom.main.css"); ?>" rel="stylesheet">
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
						<a class="btn white" href="<?php echo base_url("Shop/ribeirao_preto"); ?>" <!--data-toggle="modal" data-target="#product-modal"--> COMPRE <b>AGORA</b></a>
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
						<!--
						<p>Assault voodoo god paranoid tattoo modem kanji <a href="#" title="">drone</a> urban hotdog uplink computer. Dome car papier-mache geodesic wonton soup RAF warehouse woman military-grade numinous shrine nodality pre. Physical drone chrome sunglasses footage vinyl disposable office denim youtube. Systemic-ware advert geodesic alcohol assassin monofilament shrine Chiba voodoo god film convenience store disposable industrial grade camera cartel. Artisanal marketing RAF into advert geodesic sprawl realism woman dome footage courier table drone media youtube ablative.</p> -->
					</div>
				</div>
			</div>		
    </section>

    <div class="cta-1 bg-dark padding-top-bottom text-center white-text">
			<div class="container-fluid anima scale-in">
				<span>​Você quer experimentar nossos salgadinhos? </span>
				<a class="btn" href="#" data-toggle="modal" data-target="#product-modal">Nos encontre</a>
			</div>
		</div>	
    
    <!-- vertical center / slider -->
		<section id="showcase" class="">
      <div class="container-fluid">
        <div class="row" >
 					<div class="col-sm-6 slider">
            <div id="as-slider" class="owl-carousel" data-autoplay="4000" data-navigation="false" data-dots="true" data-transition="">
              <div class="item m-center" style="background-image:url(<?php echo base_url("assets/template/img/cup7.jpg"); ?>)"></div>
              <div class="item m-center" style="background-image:url(<?php echo base_url("assets/template/img/cup6.jpg"); ?>)"></div>
              <div class="item m-center" style="background-image:url(<?php echo base_url("assets/template/img/cup5.jpg"); ?>)"></div>
              <div class="item m-center" style="background-image:url(<?php echo base_url("assets/template/img/cup4.jpg"); ?>)"></div>
              <div class="item m-center" style="background-image:url(<?php echo base_url("assets/template/img/cup3.jpg"); ?>)"></div>
              <div class="item m-center" style="background-image:url(<?php echo base_url("assets/template/img/cup2.jpg"); ?>)"></div>
              <div class="item m-center" style="background-image:url(<?php echo base_url("assets/template/img/cup1.jpg"); ?>)"></div>
            </div>
          </div> 
          <div class="col-sm-6 bg-shop" style="height:500px;">
            <div class="half-box-right">
                <div class="center-vertical">
                  <div class="center-vertical-box">
                    <h1><b>Veja a variedade de nossos salgadinhos</b></h1>	
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
        <!-- end vertical center / slider -->

      <!--  <section id="requirements" class="padding-top-bottom bg-clouds text-center">
        	<div class="container">
        		<div class="row header">
					<div class="col-md-12">
						<h2>Requirements</h2>
						<p>Adobe Photoshop CS4+</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<img src="<?php echo base_url("assets/template/img/ps.png"); ?>" alt="#" class="img-responsive center-block" width="200" height="200">
					</div>
				</div>
			</div>		
        </section> -->

		
		<!-- <section id="features" class="features-1">
			<div class="container padding-top-bottom">
				<div class="row header">
					<div class="col-md-12">
						<h2>Características</h2>
						<p>Foram feitos para vocês</p>
					</div>
				</div>
				<div class="container" >
		            <div class="col-md-4 col-sm-4 col-xs-12 anima scale-in ">
		                <article class="text-center">
			                <img src="<?php echo base_url("assets/template/img/demo1.jpg"); ?>" alt="#" class="zoom-img img-responsive center-block">
		                    <h3>A MASSSA DE MANDIOCA</h3>
		                    <p>Porque não uma massa de mandioca além da massa feita com farinha. Foi assim que deu a vida em nossos salgados.</p>
		                </article>
		            </div>                       
					<div class="col-md-4 col-sm-4 col-xs-12 anima scale-in d1">
		                <article class="text-center">	
							<img src="<?php echo base_url("assets/template/img/demo2.jpg"); ?>" alt="#" class="zoom-img img-responsive center-block">
		                    <h3>​LEVEMENTE APIMENTADO</h3>
		                    <p>As receitas trazemos o sabor da pimenta e não a ardência complementado em nossos salgadinhos.</p>
		                </article>
		            </div>             
					<div class="col-md-4 col-sm-4 col-xs-12 anima scale-in d2">
		                <article class="text-center">	
							<img src="<?php echo base_url("assets/template/img/demo3.jpg"); ?>" alt="#" class="zoom-img img-responsive center-block">
		                    <h3>VARIEDADE A SEU GOSTO</h3>
		                    <p>Através do simples trazemos a variedade que vão surpreender seu paladar.</p>
		                </article>
		            </div>             
        		</div>
			</div>	
		</section> -->

		<!-- <section id="news" class="content-1 bg-image-2 padding-top-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-6">
						<div class="white-box">
							<h2><b>NICE Product :)</b></h2>
							<p>Scelerisque pulvinar praesent ultrices, amet condimentum wisi felis et. At lobortis risus ipsum praesent urna. Metus lectus duis porttitor. Tellus debitis suspendisse feugiat, non tellus in sed luctus lacus rutrum, iaculis at risus cras vel sit, qui morbi lacus, ultricies semper. Odio ac, diam donec. Tincidunt cursus vel nulla tincidunt, vitae ut tempor ut orci tortor mi</p>
							<blockquote class="blockquote-reverse">
							  <p>Jessica Red</p>
							</blockquote>
						</div>
					</div>
				</div>
			</div>
		</section>-->

			
		<!-- <section id="facts" class="numbers-1 padding-top-bottom text-center">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<div class="numbers-item">
							<h2 class="counter">367</h2>
							<h4>Purchases</h4>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="numbers-item">
							<h2><span class="counter">99.1</span> <span>%</span></h2>
							<h4>User Ratings</h4>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="numbers-item">
							<h2><span class="counter">17</span> <span>k</span></h2>
							<h4>Followers</h4>
						</div>
					</div>
				</div>
			</div>
		</section> -->

		<div class="cta-1 bg-dark padding-top-bottom text-center white-text">
			<div class="container-fluid anima scale-in">
				<span>Deixe seu e-mail para receber as nossas novidades e ofertas.</span>
				<a class="btn" href="#" data-toggle="modal" data-target=".text-modal">Quero Novidade</a>
			</div>
		</div>

		<!-- <section class="parallax-container white-text">
			<div class="dark-overlay"></div>
			<div class="parallax"><img src="<?php echo base_url("assets/template/img/creator.jpg"); ?>" alt="About the creator"></div>
	        <div class="container">
            	<div class="row">
            		<div class="col-md-8 col-md-offset-2 text-center"  style="height:500px;">
            			<div class="center-vertical">
                            <div class="center-vertical-box">
                                <h2>ABOUT THE CREATOR</h2>
                                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><br>
                                <a class="btn" href="#" data-toggle="modal" data-target="#product-modal"><b>$5</b> Buy now</a>
                    		</div>
                    	</div>
                    </div>
				</div>
           </div>
		</section> -->

		<!--<section id="contact" class=" padding-top-bottom">
			<div class="container">
				<div class="row header">
					<div class="col-md-12">
						<h2>Contate-nos</h2>
						<p>Para qualquer dúvida, preencha o formulário abaixo e nós retornaremos para você o mais rápido possível!</p>
					</div>
				</div>
				<div class="row">

					<div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 contact-info">
						<div id="alert-contact"> 
							<div class="alert alert-success" role="alert"><strong>Your message has been sent.</strong></div>
						</div>
						<form id="contact-form" action="sendemail.php" class="myform" method="post" novalidate>
							<div class="row clearfix">
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<div class="controls">
											<input name="contactName" placeholder="Your name" class="form-control input-lg requiredField" type="text" data-error-empty="Enter name">
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<div class=" controls">
											<input name="email" placeholder="Your email" class="form-control input-lg requiredField" type="email" data-error-invalid="Invalid email address" data-error-empty="Enter email">
										</div>
									</div>
								</div>	
							</div>	
							<div class="form-group">
								<div class="controls">
									<textarea name="comments" placeholder="Your message" class="form-control input-lg requiredField" rows="5" data-error-empty="Enter message"></textarea>
								</div>
							</div>
							<p><button name="submit" type="submit" class="btn btn-store btn-block" data-error-message="Error!" data-sending-message="Sending..." data-ok-message="Email Sent">Send Message</button></p>
							<input type="hidden" name="submitted" id="submitted3" value="true">
						</form>	
					</div>		
				</div>
			</div>
		</section>	-->

      <!--  
      <div class="footer-1 text-center">
            <div class="container-fluid">
                <a href="#home" class="back-to-top smooth-scroll"><i class="fa fa-chevron-up"></i></a>
                <p>Made with <i class="fa fa-heart color-text"></i> by <a href="http://demo.angelostudio.net">ANGELO Studio</a>.</p>
            	<ul class="social-links-2 ">
					<li><a href="https://twitter.com/angelo_studio"><i class="fa fa-facebook"></i></a></li>
					<li><a href="http://dribbble.com/angelo_studio"><i class="fa fa-dribbble"></i></a></li>
					<li><a href="https://vimeo.com/user10293733"><i class="fa fa-twitter"></i></a></li>
				</ul>
            </div>
      </div> !-->
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

		<div class="modal fade text-modal" id="text-modal" tabindex="-1" role="dialog"  aria-hidden="true">
		    <div class="modal-dialog modal-sm2">
		        <div class="modal-content">
		            <div class="modal-header bg-shop">
		                <a class="close-modal" href="#" data-dismiss="modal">
		                    <span class="menu-icon"></span>
		                </a>
		                <h2 class=""><b>License</b></h2>
		            </div>
		            <div class="modal-body">
		                <p>In order to simplify the legal terms, here are the rules of the game written in plain English, that you are obliged to follow when using the digital goods at 1E-shop.</p>
		                <p>
		                    <br><strong>You are free to…</strong>
		                </p>
		                <ul>
		                    <li>Use the digital goods in a website for yourself or a client for personal, open-source or commercial use.</li>
		                    <li>Use the digital goods to create an icon for your app or button icons.</li>
		                    <li>Use the digital goods to create a logo or other brand material.</li>
		                </ul>
		                <p>
		                    <br><strong>You are forbidden to…</strong>
		                </p>
		                <ul>
		                    <li>Re-sell the digital goods, host the digital goods or rent the digital goods (either in existing or modiﬁed form).</li>
		                    <li>Include the digital goods with a website offered for sale or distributed for free.</li>
		                    <li>Convert the digital goods to a theme to sell or distribute for free.</li>
		                </ul>
		                <br>
		                <p>While attribution is optional, it is always appreciated. Intellectual property rights are not transferred with the download of the icons.</p>
		                <p>Should you happen to lost the purchased good, let me know the email you've used upon your purchase, and I will provide you with the new files.</p>
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
		                <img src="<?php echo base_url("assets/template/img/cup1.jpg"); ?>" alt="" class="img-responsive">
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
