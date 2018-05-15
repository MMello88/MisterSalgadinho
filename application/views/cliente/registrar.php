<div class="container">
      <div class="py-3 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Mister Salgadinhos agradece pela preferencia.</h2>
        <hr class='mb-3 mt-1'>
        <p class="lead">Para finalizar a compra precisamos que informe para nós alguns dados importantes. E esperamos que tenha uma experiência agradavél que vamos lhe proporcionar! </p>
      </div>

      <div class="row">
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
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Redeem</button>
              </div>
            </div>
          </form>
        </div>

        <div class="col-md-8 order-md-1">

          <h4 class="mb-3">Billing address</h4>

          <form class="needs-validation" novalidate>

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

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="paypal">PayPal</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-cvv">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>
    </div>