$(window).load(function() {
  getCountCart();
  getListaCarrinho();

  if (frmLog === 'FALSE')
    ativaLoginho();
  else
    ativaRegistrar();
});

$( "form#formRetiraCidade" ).on('submit',function( event ) {
    var form = this;
    var dados = $( this ).serialize();
    var myUrl = $(form).attr('action');
    
    var posting = $.post( myUrl, dados );
    posting.done(function( data ) {
      if (data == 'Sucesso'){
          window.location.href = BaseUrl + "Vitrine";
      }
    });
    event.preventDefault();
});

$('#closeCidade').on('close.bs.alert', function () {
  $( "#formRetiraCidade" ).submit();
});

$(document).on('click','#btn-menos', function(){
  var id = $(this).data('whatever');
  var InputValue = getValueInputQtd(id);
  if (InputValue > 10){
      InputValue = InputValue - 10;
      setValueInputQtd(id, InputValue);
      setValueInputValor(id, InputValue);
  }
});

$(document).on('click','#btn-mais', function(){
  var id = $(this).data('whatever');
  var InputValue = getValueInputQtd(id);
  InputValue = Number(InputValue) + 10;
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
      InputValue = InputValue - 10;
      setValueInputQtdCart(id, InputValue);
      setValueInputValorCart(id, InputValue);
      refreshValorTotal(id, 'menos');
      postUpdateQtdProduto(id, -10);
      event.preventDefault();
      return;
  }
});

$(document).on('click','#btn-mais-submit', function(){
  var id = $(this).data('whatever');
  var InputValue = getValueInputQtdCart(id);
  InputValue = Number(InputValue) + 10;
  setValueInputQtdCart(id, InputValue);
  setValueInputValorCart(id, InputValue);
  refreshValorTotal(id, 'mais');
  postUpdateQtdProduto(id, 10);
  event.preventDefault();
  return;
});

function refreshValorTotal(id, sinal){
  var valor = $('#valor-cart-' + id).val();
  var total = $("#valor_total").text().replace("Total Pedido: ","");
  valor = valor * 10;
  if (sinal == 'mais')
    total = Number(total) + Number(valor);
  else if (sinal == 'menos')
    total = Number(total) - Number(valor);
  $("#valor_total").text("Total Pedido: " + total.toFixed(2));
}

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
    $("input[name='valor_subtotal-" + id + "']").val(valor.toFixed(2));
}

function postUpdateQtdProduto(id, qnt){
  var url = BaseUrl + 'index.php/Carts/alterar';

  var csrf_cookie_name = $("form#formCartDel").find("input[name='csrf_test_name']").val();
  var posting = $.post( url, { id_cart: id, qtde: qnt, csrf_test_name: csrf_cookie_name } );
  posting = null;
}

function getCountCart(){
  $.get(BaseUrl + "index.php/Carts/countBySession", function(data, status){
    if (data == 0){
        $("#btnSeuPedido").addClass("disabled");
    }
    $("#btnSeuPedido").removeAttr("style");
    $('#count_cart').text(data);
  });
}

function getListaCarrinho(){
  $.get(BaseUrl + "index.php/Vitrine/getListaCarrinho", function(data, status){
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
        url: BaseUrl + "index.php/Carts/inserir",
        data: dados,
        success: function(data){
            getCountCart();
            $(form).find("input[name='qtde']").val("10");
            $('.cart-popover').popover('show');
        },
        error: function(data) {
          $("#msgError").html("<strong>Desculpe!</strong> Erro ao receber seu pedido. Em breve tente novamente!");
          $("#message-danger").removeAttr("style");
        }
    });
    return false;
});

$(document).on('submit','form#formCartDel', function(){
  var form = this;
  var idCart = $(form).find("input[name='id_cart']").val();
  var dados = $(form).serialize();
  var valor_item = $(form).find("input[name='valor_subtotal-"+idCart+"']").val();
  var total = $("#valor_total").text().replace("Total Pedido: ","");
  total = Number(total) - Number(valor_item);
  $.ajax({
    type: "POST",
    url: BaseUrl + "index.php/Carts/deletarByProduto",
    data: dados,
    success: function( data )
    {
      getCountCart();
      $("#carrinho-"+idCart).remove();
      $("#valor_total").text("Total Pedido: " + total.toFixed(2));
    },
    error : function(data) {
      $("#msgError").html("<strong>Desculpe!</strong> Erro ao remover seu pedido. Em breve tente novamente!");
      $("#message-danger").removeAttr("style");
    }
  });
  event.preventDefault();
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

$('#btn-loginho').click(function(e) {
  ativaLoginho();
  e.preventDefault();
});
$('#btn-registrar').click(function(e) {
  ativaRegistrar();
  e.preventDefault();
});

function ativaLoginho(){
  $("#form-loginho").delay(100).fadeIn(80);
  $("#form-registrar").fadeOut(80);
  $("#form-registrar").removeClass('active');

  $('#btn-loginho').addClass('desativo');
  $('#btn-loginho').removeClass('ativo');
  $('#btn-registrar').addClass('ativo');
  $('#btn-registrar').removeClass('desativo');
}

function ativaRegistrar(){
  $("#form-registrar").delay(100).fadeIn(80);
  $("#form-loginho").fadeOut(80);
  $('#form-loginho').removeClass('active');
  
  $('#btn-registrar').addClass('desativo');
  $('#btn-registrar').removeClass('ativo');
  $('#btn-loginho').addClass('ativo');
  $('#btn-loginho').removeClass('desativo');
}

$(document).on('click','input#retirar', function(){
  $("label[for='data_entrega']").text('Dia da Retirada (*)');
  $("label[for='hora_entrega']").text('Horário de Retirada (*)');
  $("label[name='data_entrega']").attr('placeholder','Dia da Retirada');
  $("#taxaEntrega").addClass('d-none');
  $("#gridTaxaEntrega").addClass('d-none');
  $("#gridTaxaEntrega").removeClass('d-flex');
  //$("#novo_endereco").addClass('d-none');
  //calc
  var valor = Number($("input[name='valor']").val());
  $("#ValorTotalPedido").text('R$ ' + valor.toFixed(2));
});

$('#entregar').on('click', function(){
  $("label[for='data_entrega']").text('Data da Entrega (*)');
  $("label[for='hora_entrega']").text('Horário de Entrega (*)');
  $("label[name='data_entrega']").attr('placeholder','Data da Retirada');
  $("#taxaEntrega").removeClass('d-none');  
  $("#gridTaxaEntrega").removeClass('d-none');
  $("#gridTaxaEntrega").addClass('d-flex');
  //$("#novo_endereco").removeClass('d-none');

  //calc
  var total;
  var valor = $("input[name='valor']").val();
  var taxa = $("input[name='taxa_entrega']").val();
  total = Number(valor) + Number(taxa);
  $("#ValorTotalPedido").text('R$ ' + total.toFixed(2));
});

function buscarClienteRepresentante(event, tipoHtml){
  var form      = event;
  var dados     = $(form).serialize();
  var pesqValue = $(form).find("input[name='pesqValue']").val();
  var myUrl     = $(form).attr('action');
  alert(myUrl);
  $.ajax({
    type: "POST",
    url: myUrl,
    data: dados,
    success: function(data){
      if (data !== ''){
        data = JSON.parse(data);
        if (tipoHtml == 'li'){
          $("#lista-cliente").empty();
        } else if (tipoHtml == 'tabela'){
          $("tbody#tabela-cliente").empty();
        }

        var csrf = $(document).find("input[name='csrf_test_name']").val();

        $.each(data, function(i, item) {
          var status = 'Inativo';
          if (item.ativo == '1'){
            status = 'Ativo';
          }
          item.complemento = (item.complemento == null) ? '' : item.complemento;

          if (tipoHtml == 'li'){
            $("#lista-cliente").append("<li class='list-group-item d-flex justify-content-between lh-condensed'><div><h6 class='my-0'>"+item.nome+"</h6><small class='text-muted'>"+item.email+"</small></div><div><a href='"+BaseUrl+'AreaComercial/novo_consumidor/'+item.id_cliente+"'>Visualizar</a><p class='text-muted my-0' style='font-size: 80%;'>"+status+"</p></div></li>");
          } else if (tipoHtml == 'tabela'){
            var tabela = '';
            tabela = '<tr><td>'+item.nome+'</td><td>'+item.email+'</td><td>'+item.cpf_cnpj+'</td><td>'+item.endereco+ ', '+ item.numero+' - '+item.bairro+' Compl.:'+item.complemento+'</td><td>'+item.telefone+'</td><td><form action='+BaseUrl+'"/index.php/AreaComercial/dashboard" id="formSelecionarCliente" method="post" accept-charset="utf-8"><input type="hidden" name="csrf_test_name" value="'+csrf+'"/><input name="selectIdCliente" type="hidden" class="form-control" value="'+item.id_cliente+'"><button class="btn-sm" type="submit" id="pesq-cliente" style="min-width:100%;">Selecionar</button></td></tr>';
            $("tbody#tabela-cliente").append(tabela);
          }
        })
      }
    },
    error : function(data){
      console.log(data);
    }
  });
}

$(document).on('submit','form#formPesqCliente', function(){
  buscarClienteRepresentante(this, 'li');
  event.preventDefault();
});

$(document).on('submit','form#formPesqClienteRepre', function(){
  buscarClienteRepresentante(this, 'tabela');
  event.preventDefault();
});

$(document).on('submit','form#formSelecionarCliente', function(){
  var form      = this;
  var dados     = $(form).serialize();
  var pesqValue = $(form).find("input[name='pesqValue']").val();
  var myUrl     = $(form).attr("action");
  alert(myUrl);
  $.ajax({
    type: "POST",
    url: myUrl,
    data: dados,
    success: function(data){
      if (data === 'selecionado'){
        $(form).find("button[id='pesq-cliente']").text('Deselecionado');
        $(form).parent().parent().addClass('table-primary');
      } else if (data === 'deselecionado'){
        $(form).find("button[id='pesq-cliente']").text('Selecionar');
        $(form).parent().parent().removeAttr("class");
      }
    },
    error : function(data){
      console.log(data);
    }
  });
  event.preventDefault();
});