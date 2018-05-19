

			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
				<div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
					<div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
					</div>
				</div>

				<div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
					<div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
					</div>
				</div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Área do Cliente - <?= $cliente['nome']; ?></h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link active" href="<?= base_url('Vitrine'); ?>">Continuar Comprando</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('clientes/logout'); ?>">Sair</a>
              </li>
            </ul>
            
          </div>
        </div>
<?php print_r($cliente['nome']); ?>


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
              <input type="hidden" name="id_cliente" value="a">
              <input type="hidden" name="id_cidade" value="a">
              <input type="hidden" name="valor" value="a">
              
forma_entrega (r - retirar / e - entregar)
taxa_entrega
hora_entrega
data_entrega
valor_total
situacao (s - solicitado / v - visualizado / p - produzindo / t - saiu entrega / e - entregue)
festa (s - sim / n - não)
forma_pgto (d - dinheiro / cd - cartao debito / cc - cartao crédito)


<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
  <label class="form-check-label" for="inlineCheckbox1">1</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
  <label class="form-check-label" for="inlineCheckbox2">2</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled>
  <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
</div>


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
                <label for="endereco">Endereço <span class="text-muted">(*)</span></label>
                <input type="text" class="form-control mb-0 bg-white" name="endereco" id="endereco" placeholder="Ex.: Rua. Prudente de Morais, 532" value="<?= set_value('endereco'); ?>" required>
                <div class="invalid-feedback <?= form_error('endereco') !== null ? "d-block":""; ?>">
                  <?= form_error('endereco'); ?>
                </div>
              </div>


              <div class="mb-4">
                <label for="telefone">Telefone/Celular <span class="text-muted">(*)</span></label>
                <input type="text" class="form-control mb-0 bg-white" name="telefone" id="telefone" placeholder="Ex.: (16) 99999-9999" value="<?= set_value('telefone'); ?>" required>
                <div class="invalid-feedback <?= form_error('telefone') !== null ? "d-block":""; ?>">
                  <?= form_error('telefone'); ?>
                </div>
              </div>

              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Cadastrar</button>
            </form>
          </div>
      </main>

    </div>
  </div>