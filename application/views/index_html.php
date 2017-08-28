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
						<a class="btn white" href="<?php echo base_url("shop/ribeirao_preto"); ?>" <!--data-toggle="modal" data-target="#product-modal"--> COMPRE <b>AGORA</b></a>
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
						<h2>PAPER CUP</h2>
						<p>HQ PSD Mock-up</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<p>Assault voodoo god paranoid tattoo modem kanji <a href="#" title="">drone</a> urban hotdog uplink computer. Dome car papier-mache geodesic wonton soup RAF warehouse woman military-grade numinous shrine nodality pre. Physical drone chrome sunglasses footage vinyl disposable office denim youtube. Systemic-ware advert geodesic alcohol assassin monofilament shrine Chiba voodoo god film convenience store disposable industrial grade camera cartel. Artisanal marketing RAF into advert geodesic sprawl realism woman dome footage courier table drone media youtube ablative.</p>
					</div>
				</div>
			</div>		
        </section>

       		<!-- vertical center / slider -->
		<section id="showcase" class="">
            <div class="container-fluid">
                <div class="row" >
 					<div class="col-sm-6 slider">
                        <div id="as-slider" class="owl-carousel" data-autoplay="4000" data-navigation="false" data-dots="true" data-transition="">
                            <div class="item m-center" style="background-image:url(<?php echo base_url("assets/template/img/cup2.jpg"); ?>)"></div>
                            <div class="item m-center" style="background-image:url(<?php echo base_url("assets/template/img/cup3.jpg"); ?>)"></div>
                            <div class="item m-center" style="background-image:url(<?php echo base_url("assets/template/img/cup4.jpg"); ?>)"></div>
                            <div class="item m-center" style="background-image:url(<?php echo base_url("assets/template/img/cup1.jpg"); ?>)"></div>
                        </div>
                    </div> 
                    <div class="col-sm-6 bg-shop" style="height:500px;">
                        <div class="half-box-right">
                            <div class="center-vertical">
                                <div class="center-vertical-box">
                                    <h1><b>See what's included</b></h1>	
                                    <ul style="padding: 20px;">
										<li>Changeable lid color</li>
										<li>Changeable cup color</li>
										<li>Changeable cup label via smart object</li>
										<li>On/off shadows</li>
										<li>On/off specular</li>
										<li>Changeable background</li>
										<li>High resolution 3000 × 1875px</li>
                                    </ul>
                                    <a href="#" data-toggle="modal" data-target="#product-modal" class="btn dark"><b>$5</b> BUY NOW</a> 
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </section> 
        <!-- end vertical center / slider -->

        <section id="requirements" class="padding-top-bottom bg-clouds text-center">
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
        </section>

		
		<section id="features" class="features-1">
			<div class="container padding-top-bottom">
				<div class="row header">
					<div class="col-md-12">
						<h2>Features</h2>
						<p>We are here for you</p>
					</div>
				</div>
				<div class="container" >
		            <div class="col-md-4 col-sm-4 col-xs-12 anima scale-in ">
		                <article class="text-center">
			                <img src="<?php echo base_url("assets/template/img/demo1.jpg"); ?>" alt="#" class="zoom-img img-responsive center-block">
		                    <h3>​ORGANISED LAYERS</h3>
		                    <p>Nodal point courier towards decay dome advert wonton soup chrome voodoo.</p>
		                </article>
		            </div>                       
					<div class="col-md-4 col-sm-4 col-xs-12 anima scale-in d1">
		                <article class="text-center">	
							<img src="<?php echo base_url("assets/template/img/demo2.jpg"); ?>" alt="#" class="zoom-img img-responsive center-block">
		                    <h3>​SMART OBJECT</h3>
		                    <p>Table plastic concrete silent nano-dome industrial grade. Hotdog marketing.</p>
		                </article>
		            </div>             
					<div class="col-md-4 col-sm-4 col-xs-12 anima scale-in d2">
		                <article class="text-center">	
							<img src="<?php echo base_url("assets/template/img/demo3.jpg"); ?>" alt="#" class="zoom-img img-responsive center-block">
		                    <h3>TRANSPARENT BG</h3>
		                    <p>Grenade wonton soup faded disposable dome cardboard spook refrigerator dolphin.</p>
		                </article>
		            </div>             
        		</div>
			</div>	
		</section>

		<div class="cta-1 bg-dark padding-top-bottom text-center white-text">
			<div class="container-fluid anima scale-in">
				<span>​Do you like PAPER CUP - Mockup? </span>
				<a class="btn" href="#" data-toggle="modal" data-target="#product-modal"><b>$5</b> Buy now</a>
			</div>
		</div>	

		<section id="news" class="content-1 bg-image-2 padding-top-bottom">
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
		</section>

			
		<section id="facts" class="numbers-1 padding-top-bottom text-center">
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
		</section>

		<div class="cta-1 bg-shop padding-top-bottom text-center ">
			<div class="container-fluid anima scale-in">
				<span>​Email for a custom and/or unlimited license.</span>
				<a class="btn dark" href="#" data-toggle="modal" data-target=".text-modal">Mock-up License</a>
			</div>
		</div>

		<section class="parallax-container white-text">
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
		</section>

		<section id="contact" class=" padding-top-bottom">
			<div class="container">
				<div class="row header">
					<div class="col-md-12">
						<h2>Contact me</h2>
						<p>For any questions fill in the form below & we'll get back to you ASAP!</p>
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
		</section>	

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
        </div>

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
