  <!-- container -->
  <div class="container">
    <!-- Titulo -->
    <div class="py-3 text-center">
      <img class="d-block mx-auto mb-4" src="<?= base_url('assets/templateV2/img/bonequinho-120.png'); ?>" alt="" width="72" height="72">
      <h2>Mister Salgadinhos agradece pela preferencia.</h2>
      <hr class='mb-3 mt-1'>
      <p class="lead">Para finalizar a compra precisamos que informe para nós alguns dados importantes. E esperamos que tenha uma experiência agradavél que vamos lhe proporcionar! </p>
    </div>
    <!-- fim do Titulo -->

    <div class="row pb-5">
      <div class="col">
        <button class="btn bigsize desativo" id="btn-registrar">Realizar cadastro</button>
        <button class="btn bigsize ativo" id="btn-loginho">Acessar minha conta</button>
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
              <button type="submit" class="btn btn-warning mais_menos resgatar">Resgatar</button>
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
            <hr class="mb-4">
            <?php if ($this->session->flashdata('erro_loginho')) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Falha no Loginho!</strong> <?= $this->session->flashdata('erro_cadastro'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="closeX" aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php endif; ?>
            <?= form_open('clientes/registrar'); ?>
              <input type="hidden" name="situacao" value="a">
              <input type="hidden" name="tipo" value="c">
              <input type="hidden" name="ativo" value="0">

              <div class="mb-4">
                <label for="nome">Nome <span class="text-muted">(*)</span></label>
                <input type="text" class="form-control mb-0 bg-white" id="nome" name="nome" placeholder="Ex.: Nome Completo " value="<?= set_value('nome'); ?>" required>
                <div class="invalid-feedback <?= form_error('nome') !== null ? "d-block":""; ?>">
                  <?= form_error('nome'); ?>
                </div>
              </div>

              <div class="mb-4">
                <label for="email">Email <span class="text-muted">(*)</span></label>
                <input type="text" class="form-control mb-0 bg-white" id="email" name="email" placeholder="Ex.: seu@Email.com" value="<?= set_value('email'); ?>" required>
                <div class="invalid-feedback <?= form_error('email') !== null ? "d-block":""; ?>">
                  <?= form_error('email'); ?>
                </div>
              </div>

              <div class="mb-4">
                <label for="senha">Senha <span class="text-muted">(* Minimo 8 Caracteres)</span></label>
                <input type="password" class="form-control mb-0 bg-white" id="senha" name="senha" placeholder="Ex.: Password" value="<?= set_value('senha'); ?>" required>
                <div class="invalid-feedback <?= form_error('senha') !== null ? "d-block":""; ?>">
                  <?= form_error('senha'); ?>
                </div>
              </div>

              <div class="mb-4">
                <label for="telefone">Telefone/Celular <span class="text-muted">(*)</span></label>
                <input type="text" class="form-control mb-0 bg-white" name="telefone" id="telefone" placeholder="Ex.: (16) 99999-9999" value="<?= set_value('telefone'); ?>" required>
                <div class="invalid-feedback <?= form_error('telefone') !== null ? "d-block":""; ?>">
                  <?= form_error('telefone'); ?>
                </div>
              </div>

              <?php /*
              <div class="row mb-4">
                <div class="col-md-9">
                  <label for="endereco">Endereço <span class="text-muted">(*)</span></label>
                  <input type="text" class="form-control mb-0 bg-white" name="endereco" id="endereco" placeholder="Ex.: Rua. Prudente de Morais" value="<?= set_value('endereco'); ?>" required>
                  <div class="invalid-feedback <?= form_error('endereco') !== null ? "d-block":""; ?>">
                    <?= form_error('endereco'); ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="numero">Numero <span class="text-muted">(*)</span></label>
                  <input type="text" class="form-control mb-0 bg-white" name="numero" id="numero" placeholder="Ex.: 532" value="<?= set_value('numero'); ?>" required>
                  <div class="invalid-feedback <?= form_error('numero') !== null ? "d-block":""; ?>">
                    <?= form_error('numero'); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="bairro">Bairro <span class="text-muted">(*)</span></label>
                  <input type="text" class="form-control mb-0 bg-white" name="bairro" id="bairro" placeholder="Ex.: Centro" value="<?= set_value('bairro'); ?>" required>
                  <div class="invalid-feedback <?= form_error('bairro') !== null ? "d-block":""; ?>">
                    <?= form_error('bairro'); ?>
                  </div>
                </div>
                <div class="col-md-6">
                <label for="complemento">Complemento</label>
                  <input type="text" class="form-control mb-0 bg-white" name="complemento" id="complemento" placeholder="Ex.: Apto 100, BL 1A" value="<?= set_value('complemento'); ?>">
                  <div class="invalid-feedback <?= form_error('complemento') !== null ? "d-block":""; ?>">
                    <?= form_error('complemento'); ?>
                  </div>
                </div>
              </div>
              */?>

              <hr class="mb-4">
              <button class="btn btn-warning btn-lg btn-block" type="submit">Cadastrar</button>
            </form>
          </div>
          <!-- fim tab item cadastro -->
          <!-- tab item loginho -->
          <div class="tab-pane" id="form-loginho">
            <h4 class="mb-3">Loginho</h4>
            <hr class="mb-4">
            <?php if ($this->session->flashdata('erro_loginho')) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Falha no Loginho!</strong> <?= $this->session->flashdata('erro_loginho'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="closeX" aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php endif; ?>
            
            <?= form_open('clientes/login'); ?>
              <div class="mb-4">
                <label for="email">Email <span class="text-muted">(*)</span></label>
                <input type="email" class="form-control mb-0 bg-white" id="email" name="email" placeholder="Ex.: seu@Email.com" value="<?= set_value('email'); ?>" required>
                <div class="invalid-feedback <?= form_error('email') !== null ? "d-block":""; ?>">
                  <?= form_error('email'); ?>
                </div>
              </div>

              <div class="mb-4">
                <label for="senha">Senha <span class="text-muted">(* Minimo 8 Caracteres)</span></label>
                <input type="password" class="form-control mb-0 bg-white" id="senha" name="senha" placeholder="Ex.: Password" value="<?= set_value('senha'); ?>" required>
                <div class="invalid-feedback <?= form_error('senha') !== null ? "d-block":""; ?>">
                  <?= form_error('senha'); ?>
                </div>
              </div>
              <a href="<?= base_url('clientes/recuperar'); ?>">Esqueceu a senha?</a>
              <hr class="mb-4">
              <button class="btn btn-warning btn-lg btn-block" type="submit">Logar</button>
            </form>
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