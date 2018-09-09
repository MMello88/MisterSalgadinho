  
  <div class="bg-mister-mostarda">
    <div class="container bg-mister-mostarda">
      <div class="row">
        <div class="col m-auto text-center navbar-brand">
            <h2 class="alo">
              <img class="alo-icon d-inline-block align-top" src="<?= base_url("assets/img/bonequinho-120.png"); ?>" alt="Alô, Mister!">ALÔ, MISTER!
            </h2>
        </div>
        <svg>
            <polyline points="0,0 22,44 0,88 "></polyline>
        </svg>
        <div class="col alo m-auto text-uppercase">
          <p><b>Fale conosco!</b> Faça seu pedido, deixei opnião e tire suas dúvidas.</p>
        </div>
        <svg>
            <polyline points="0,0 22,44 0,88 "></polyline>
        </svg>
        <div class="col m-auto text-uppercase">
          <h5>Telefone</h5>
          <h3>(16) 3325-0364</h3>
        </div>
        <svg>
            <polyline points="0,0 22,44 0,88 "></polyline>
        </svg>
        <div class="col m-auto text-uppercase">
          <h5>Whatsapp</h5>
          <h3>(16) 99167-2820</h3>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer bg-mister-vermelho">
    <div class="container">
  		<div class="row">
  			<div class="col-12 col-md-8 col-sm-12 px-5 pb-3">
          <address class="text-light">
            <img class="icon mr-2" src="<?= base_url("assets/ico/social/mail_light.svg"); ?>" alt="E-mail">
            E-mail <a class="text-light" href="mailto:mistersalgadinhos@gmail.com">contato@<b>mister</b>salgadinhos.com.br</a><br> 

            <img class="icon mr-2" src="<?= base_url("assets/ico/social/location-pin_light.svg"); ?>" alt="Localização">R. Prudente Morais, n°532<br>

            <img class="icon mr-2" src="<?= base_url("assets/ico/social/phone.svg"); ?>" alt="Celular">
            Matheus (16) 99167-2820<br>

            <img class="icon mr-2" src="<?= base_url("assets/ico/social/phone.svg"); ?>" alt="Celular">
            Telefone (16) 3325-0364<br>
          </address>
  			</div>
  			<div class="col-12 col-md-4 col-sm-12 px-5 pb-3">
  				<ul class="list-group">
  				  <li class="list-group-item text-white bg-mister-vermelho" style="padding: 0.25rem .75rem;">Mapa do Site</li>
  				  <a href="<?= base_url(); ?>" class="list-group-item text-white bg-mister-vermelho">
  				  Home
  				  </a>
  				  <a href="<?= base_url("clientes/registrar"); ?>" class="list-group-item text-white bg-mister-vermelho">
  				  Registrar
  					  </span>
  				  </a>
  				  <a href="<?= base_url("clientes/registrar"); ?>" class="list-group-item text-white bg-mister-vermelho">
  				  Loginho
  				  </a>
  				  <a href="<?= base_url("representante/comercial"); ?>" class="list-group-item text-white bg-mister-vermelho">
  				  Representante Comercial
  					  </span>
  				  </a>
  				</ul>
  			</div>
  			
  			<div class="col-12 col-md-12 col-sm-12 px-5 pb-3 text-center">
  				<h2 class="mt-4 text-light"><b>Mister</b> Salgadinhos</h2>
  				<hr class="mb-3 mt-1 bg-white">
  				<div class="row justify-content-center">
  					<div class="col-md-4">
  						<ul class="nav justify-content-center">
  						  <li class="nav-item">
  							<a class="nav-link" href="https://www.facebook.com/mistersalgadinhos/">
  								<img class="icon" src="<?= base_url("assets/ico/social/facebook_light.svg"); ?>" alt="Facebook">
  							</a>
  						  </li>
  						  <li class="nav-item">
  							<a class="nav-link" href="https://www.instagram.com/mistersalgadinhos/">
							<img class="icon" src="<?= base_url("assets/ico/social/instagram_light.svg"); ?>" alt="Instagram">
						  </a>
  						  </li>
  						  <li class="nav-item">
  							<a class="nav-link" href="#">
							<img class="icon" src="<?= base_url("assets/ico/social/youtube_light.svg"); ?>" alt="YouTube">
						  </a>
  						  </li>
  						</ul>
  					</div>
  				</div>
  				<small class="text-white">Copyright 2018 &#169; - Matheus de Mello</small> 
  			</div>
  		</div>
  	</div>
  </footer>

  <!-- Alert Modal -->
  
    <div id="closeCidade" class="alert bg-mister-mostarda navbar fixed-bottom mb-0 fade <?php if ($cidade !== null) echo 'show'; ?>" role="alert">
      <?= form_open('', array('id' => 'formRetiraCidade','style' => 'display: contents')); ?>
      <h5><?php if ($cidade !== null) echo 'Cidade Selecionada: <strong>' . $cidade->nome; ?></strong></h5>
      
      <input type="hidden" name="teste" value="11">
      <button type="submit" class="close"  data-dismiss="alert" aria-label="Close">
        <span class="closeX" aria-hidden="true">&times;</span>
      </button>
      <?= form_close(); ?>
    </div>
  

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<script src="<?= base_url("assets/js/owl.carousel.min.js"); ?>"></script>
<script src="<?= base_url("assets/js/isotope.pkgd.min.js"); ?>"></script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="<?= base_url("assets/js/main.js"); ?>"></script>

<script src="<?= base_url("assets/js/principal.js"); ?>"></script>

</body>
</html>