  
  <div class="bg-mister-mostarda">
    <div class="container bg-mister-mostarda">
      <div class="row">
        <div class="col m-auto">
          <h2 class="text-center">
            <img class="alo-icon" src="<?= base_url("assets/img/bonequinho-120.png"); ?>" alt="Alô, Mister!">    
            <b>ALÔ, MISTER!</b>
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
      </div>
    </div>
  </div>

  <footer class="footer bg-mister-marrom">
    <div class="container">
  		<div class="row">
  			<div class="col-12 col-md-8 col-sm-12 px-5 pb-3">
          <address class="text-light">
            <img class="icon mr-2" src="<?= base_url("assets/ico/social/mail_light.svg"); ?>" alt="E-mail">
            E-mail <a class="text-light" href="mailto:matheus.gnu@gmail.com">contato@<b>mister</b>salgadinhos.com.br</a><br> 

            <img class="icon mr-2" src="<?= base_url("assets/ico/social/location-pin_light.svg"); ?>" alt="Localização">R. Prudente Morais, n°532<br>

            <img class="icon mr-2" src="<?= base_url("assets/ico/social/phone.svg"); ?>" alt="Celular">
            Matheus (16) 99183-8523<br>

            <img class="icon mr-2" src="<?= base_url("assets/ico/social/phone.svg"); ?>" alt="Celular">
            Rogerio (16) 99135-2685<br>

            <img class="icon mr-2" src="<?= base_url("assets/ico/social/phone.svg"); ?>" alt="Celular">
            Telefone (16) 3325-0364<br>
          </address>
  			</div>
  			<div class="col-12 col-md-4 col-sm-12 px-5 pb-3">
  				<ul class="list-group">
  				  <li class="list-group-item text-warning bg-mister-marrom" style="padding: 0.25rem .75rem;">LINKS</li>
  				  <a href="<?= base_url(); ?>" class="list-group-item text-warning bg-mister-marrom">
  				  HOME
  					  <span class="badge badge-warning float-right">
  						<span class="oi" data-glyph="chevron-right" title="icon name" aria-hidden="true"></span>
  					  </span>
  				  </a>
  				  <a href="<?= base_url("Shop/"); ?>" class="list-group-item text-warning bg-mister-marrom">
  				  SHOP
  					  <span class="badge badge-warning float-right">
  						<span class="oi" data-glyph="chevron-right" title="icon name" aria-hidden="true"></span>
  					  </span>
  				  </a>
  				  <a href="<?= base_url("#start"); ?>" class="list-group-item text-warning bg-mister-marrom">
  				  SOBRE
  					  <span class="badge badge-warning float-right">
  						<span class="oi" data-glyph="chevron-right" title="icon name" aria-hidden="true"></span>
  					  </span>
  				  </a>
  				  <a href="<?= base_url("#contact"); ?>" class="list-group-item text-warning bg-mister-marrom">
  				  CONTATO
  					  <span class="badge badge-warning float-right">
  						<span class="oi" data-glyph="chevron-right" title="icon name" aria-hidden="true"></span>
  					  </span>
  				  </a>
  				</ul>
  			</div>
  			
  			<div class="col-12 col-md-12 col-sm-12 px-5 pb-3 text-center">
  				<h2 class="mt-4 text-light"><b>Mister</b> Salgadinhos</h2>
  				<hr class="mb-3 mt-1 bg-secondary">
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
  				<small class="text-muted">Copyright 2018 &#169; - Matheus de Mello</small> 
  			</div>
  		</div>
  	</div>
  </footer>

  <!-- Alert Modal -->
  <?= form_open('Vitrine/RetiraCidade', array('id' => 'formRetiraCidade')); ?>
    <div id="closeCidade" class="alert bg-mister-mostarda navbar fixed-bottom mb-0 fade <?php if ($cidade !== null) echo 'show'; ?>" role="alert">
      <h5><?php if ($cidade !== null) echo 'Cidade Selecionada: <strong>' . $cidade->nome; ?></strong></h5>
      
      <input type="hidden" name="teste" value="11">
      <button type="submit" class="close"  data-dismiss="alert" aria-label="Close">
        <span class="closeX" aria-hidden="true">&times;</span>
      </button>
      
    </div>
  <?= form_close(); ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	
<script src="<?= base_url("assets/js/owl.carousel.min.js"); ?>"></script>
<script src="<?= base_url("assets/js/isotope.pkgd.min.js"); ?>"></script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="<?= base_url("assets/js/bootstrap.min.js"); ?>"></script>
<script src="<?= base_url("assets/js/main.js"); ?>"></script>

<script type="text/javascript">
$(window).load(function() {
    getCountCart();
    getListaCarrinho();
});

$('#closeCidade').on('closed.bs.alert', function () {
    var url = "<?= base_url('Vitrine/RetiraCidade'); ?>"
    var posting = $.post( url, { remove: 'true' } );
    posting.done(function( data ) {
        if (data == 'Sucesso'){
            window.location.href = "<?= base_url('Vitrine'); ?>";
        }
     });
});

$(document).on('click','#btn-menos', function(){
    var id = $(this).data('whatever');
    var InputValue = getValueInputQtd(id);
    if (InputValue > 1){
        InputValue = InputValue - 1;
        setValueInputQtd(id, InputValue);
        setValueInputValor(id, InputValue);
    }
});

$(document).on('click','#btn-mais', function(){
    var id = $(this).data('whatever');
    var InputValue = getValueInputQtd(id);
    InputValue = Number(InputValue) + 1;
    setValueInputQtd(id, InputValue);
    setValueInputValor(id, InputValue);
});

function getValueInputQtd(id){
    return $('#qnt-' + id).val();
}

function setValueInputQtd(id, value) {
    $('#qnt-' + id).val(value);
}

function setValueInputValor(id, qnt) {
    var valor = $('#valor-' + id).val();
    valor = Number(valor) * qnt;
    $('#total-' + id).text('R$ ' + valor.toFixed(2));
}

$(document).on('click','#btn-menos-submit', function(){
    var id = $(this).data('whatever');
    var InputValue = getValueInputQtdCart(id);
    if (InputValue > 0){
        InputValue = InputValue - 1;
        setValueInputQtdCart(id, InputValue);
        setValueInputValorCart(id, InputValue);
        postUpdateQtdProduto(id, InputValue);
    }
});

$(document).on('click','#btn-mais-submit', function(){
    var id = $(this).data('whatever');
    var InputValue = getValueInputQtdCart(id);
    InputValue = Number(InputValue) + 1;
    setValueInputQtdCart(id, InputValue);
    setValueInputValorCart(id, InputValue);
    postUpdateQtdProduto(id, InputValue);
});

function getValueInputQtdCart(id){
    return $('#qnt-cart-' + id).val();
}

function setValueInputQtdCart(id, value) {
    $('#qnt-cart-' + id).val(value);
}

function setValueInputValorCart(id, qnt) {
    var valor = $('#valor-cart-' + id).val();
    valor = Number(valor) * qnt;
    $('#subtotal-' + id).text('Sub Total: R$ ' + valor.toFixed(2));
}

function postUpdateQtdProduto(id, qnt){
  console.log('teste' + id + ' : ' + qnt);
  var url = "<?= base_url('index.php/Carts/alterar'); ?>"
  var posting = $.post( url, { id_cart: id, qtde: qnt } );
  /*posting.done(function( data ) {
      if (data == 'Sucesso'){
          window.location.href = "<?= base_url('Vitrine'); ?>";
      }
   });*/
}

function getCountCart(){
    $.get("<?= base_url("index.php/Carts/countBySession"); ?>", function(data, status){
        if (data == 0){
            $("#btnSeuPedido").addClass("disabled");
        }
        $("#btnSeuPedido").removeAttr("style");
        $('#count_cart').text(data);
    });
}

function getListaCarrinho(){
    $.get("<?= base_url("index.php/Vitrine/getListaCarrinho"); ?>", function(data, status){
        if (data !== ''){
            $('#resultCarrinho').empty();
            $('#resultCarrinho').append(data);
            $('#CarrinhoVazio').addClass('disabled');
        }
    });
}

$('#ModalCarrinho').on('shown.bs.modal', function (e) {
    getListaCarrinho();
})

$('form#formCart').on('submit', function(){
    var dados = $( this ).serialize();
    var form = this;
    $.ajax({
        type: "POST",
        url: "<?= base_url("index.php/Carts/inserir"); ?>",
        data: dados,
        success: function( data )
        {
            getCountCart();
            $(form).find("input[name='qtde']").val("1");
            $('.cart-popover').popover('show');
        },
        error : function(data) {
          console.log(data);
          $("#msgError").html("<strong>Desculpe!</strong> Erro ao receber seu pedido. Em breve tente novamente!");
          $("#message-danger").removeAttr("style");
        }
    });
    return false;
});

$('form#formCartDel').on('submit', function(){
  var dados = $( this ).serialize();
  var form = this;
  var valor_item = $(this).find("#valor_subtotal").val();
  var total = $("#valor_total").text().replace("Total: ","");
  total = parseInt(total) - parseInt(valor_item);
  $.ajax({
    type: "POST",
    url: "<?php echo base_url("index.php/Carts/deletarByProduto"); ?>",
    data: dados,
    success: function( data )
    {
      $(form).parent().parent().parent().prev().children().remove();
      $(form).parent().parent().remove();
      $("#valor_total").text("Total: " + total);
    },
    error : function(data) {
      console.log(data.responseText);
      $("#msgError").html("<strong>Desculpe!</strong> Erro ao remover seu pedido. Em breve tente novamente!");
      $("#message-danger").removeAttr("style");
    }
  });
  return false;
});

$(function () {
  $('.cart-popover').popover({
    container: 'body'
  })
});

$('.cart-popover').on('show.bs.popover', function () {
  setTimeout(function() {
        $('.cart-popover').popover('hide');
    }, 2000);
});
</script>

</body>
</html>