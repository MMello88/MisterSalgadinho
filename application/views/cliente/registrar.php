  <!-- container -->
  <div class="container">
    <!-- Titulo -->
    <div class="py-3 text-center">
      <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h2>Mister Salgadinhos agradece pela preferencia.</h2>
      <hr class='mb-3 mt-1'>
      <p class="lead">Para finalizar a compra precisamos que informe para nós alguns dados importantes. E esperamos que tenha uma experiência agradavél que vamos lhe proporcionar! </p>
    </div>
    <!-- fim do Titulo -->

    <div class="row pb-5">
      <div class="col">
        <button class="btn ativo" id="btn-registrar">Realizar cadastro</button>
        <button class="btn desativo" id="btn-loginho">Acessar minha conta</button>
      </div>
    </div>
    <!-- formulário -->
    <div class="row pb-5">

      <!-- carrinho -->
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Seu Carrinho</span>
        </h4>
        <ul class="list-group mb-3">
          <?php $total = 0; ?>
          <?php foreach ($Pedidos as $item) : ?>
            <?php $total = $total + ($item->valor_unitario*$item->qtde); ?>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0"><?= $item->id_produto[0]->nome; ?> (<?= $item->qtde; ?>)</h6>
              <small class="text-muted">Valor <?= $item->valor_unitario; ?></small>
            </div>
            <span class="text-muted">Subtotal R$ <?= number_format(($item->valor_unitario*$item->qtde), 2, '.', ''); ?></span>
          </li>
          <?php endforeach; ?>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total</span>
            <strong>R$ <?= number_format($total, 2, '.', ''); ?></strong>
          </li>
        </ul>

        <form class="card p-2">
          <div class="input-group max-width">
            <input type="text" class="form-control" placeholder="Código promocional">
            <div class="input-group-append">
              <button type="submit" class="btn btn-secondary">Resgatar</button>
            </div>
          </div>
        </form>
      </div>
      <!-- fim do carrinho -->

      <!-- Cadastro -->
      <div class="col-md-8 order-md-1">
        <!-- tab div -->
        <div class="tab-content" id="pills-tabContent">
          <!-- tab item cadastro -->
          <div class="tab-pane show active" id="form-registrar">
            <h4 class="mb-3">Realizar Cadastro</h4>
            <?php echo validation_errors(); ?>

            <?php echo form_open('news/create'); ?>
              <input type="hidden" name="situacao" value="a">

              <div class="mb-3">
                <label for="nome">Nome <span class="text-muted">(*)</span></label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex.: Nome Completo " required>
                <div class="invalid-feedback">
                  Por favor, informe o Nome Completo.
                </div>
              </div>

              <div class="mb-3">
                <label for="email">Email <span class="text-muted">(*)</span></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Ex.: seu@Email.com" required>
                <div class="invalid-feedback">
                  Por favor, informar o endereço de E-mail correto.
                </div>
              </div>

              <div class="mb-3">
                <label for="senha">Senha <span class="text-muted">(* Minimo 8 Caracteres)</span></label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Ex.: Password" required>
                <div class="invalid-feedback">
                  Por favor, informar o endereço de E-mail correto.
                </div>
              </div>

              <div class="mb-3">
                <label for="endereco">Endereço <span class="text-muted">(*)</span></label>
                <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Ex.: Rua. Prudente de Morais, 532" required>
                <div class="invalid-feedback">
                  Por favor, informar o seu endereço.
                </div>
              </div>


              <div class="mb-3">
                <label for="telefone">Telefone/Celular <span class="text-muted">(*)</span></label>
                <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Ex.: (16) 99999-9999" required>
                <div class="invalid-feedback">
                  Por favor, informar o seu telefone ou celular.
                </div>
              </div>

              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Concluir Pedido</button>
            </form>
          </div>
          <!-- fim tab item cadastro -->
          <!-- tab item loginho -->
          <div class="tab-pane" id="form-loginho">
            matheus
          </div>
          <!-- fim tab item loginho -->
        </div>
        <!-- tab div -->
      </div>
      <!-- fim do cadastro -->
    </div>
    <!-- fim do formulário -->
  </div>
  <!-- fim do container -->


<script type="text/javascript">
$('#btn-registrar').click(function(e) {
    $("#form-registrar").delay(100).fadeIn(100);
  $("#form-loginho").fadeOut(100);
  $("#form-loginho").removeClass('active');
  $(this).addClass('active');
  e.preventDefault();
});
$('#btn-loginho').click(function(e) {
  $("#register-form").delay(100).fadeIn(100);
  $("#login-form").fadeOut(100);
  $('#login-form-link').removeClass('active');
  $(this).addClass('active');
  e.preventDefault();
});
</script>