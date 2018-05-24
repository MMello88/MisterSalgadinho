

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
          <h1 class="h2">Área do Cliente</h1>
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
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h4><?= $cliente['nome']; ?></h4>
          <!--<div class="btn-toolbar mb-2 mb-md-0">
            <ul class="nav">
              <li class="nav-item">
                <span>valor total</span>
              </li>
              <li class="nav-item">
                <span>R$</span>
              </li>
            </ul>
          </div>-->
        </div>

        <div class="container">
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
                <li class="list-group-item justify-content-between d-none" id="gridTaxaEntrega">
                  <span>Taxa Entrega</span>
                  <strong>R$ 7.00</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  <span>Total</span>
                  <strong id="ValorTotalPedido">R$ <?= number_format($total, 2, '.', ''); ?></strong>
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
            <div class="tab-pane show active">
            <?php if(empty($Pedidos)) : ?>
              <?php if (!empty($finalizado)) : ?>
                <div class="text-center border border-warning rounded" id="CarrinhoVazio">
                  <h4 class="mx-5 my-5"> <?= $finalizado; ?> </h4>
                </div>
              <?php else : ?>
                <div class="text-center border border-dark rounded" id="CarrinhoVazio">
                  <h4 class="mx-5 my-5"> SEM PEDIDO EM ANDAMENTO </h4>
                </div>
              <?php endif; ?>
            <?php else : ?>

              <?= form_open('perfil/finalizar', array('id' => 'loja', 'class' => 'visible')); ?>
                <input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente']; ?>">
                <input type="hidden" name="id_cidade" value="<?= $cidade->id_cidade; ?>">
                <input type="hidden" name="valor" value="<?= number_format($total, 2, '.', ''); ?>">
                <input type="hidden" name="taxa_entrega" value="7">
                <input type="hidden" name="valor_total" value="<?= number_format($total, 2, '.', ''); ?>">
                <input type="hidden" name="situacao" value="s">
                <input type="hidden" name="data_pedido" value="<?= now(); ?>">
              

                <div class="form-row align-items-center my-4">
                  <div class="custom-control custom-radio mr-3">
                    <input id="retirar" name="forma_entrega" type="radio" class="custom-control-input" value="r" required>
                    <label class="custom-control-label" for="retirar">Retirar no local</label>
                  </div>
                  <div class="custom-control custom-radio mr-3">
                    <input id="entregar" name="forma_entrega" type="radio" class="custom-control-input" value="e" required>
                    <label class="custom-control-label" for="entregar">Entregar</label>
                  </div>
                </div>
              
                <div class="mb-4">
                  <label for="data_entrega">Dia da Retirada <span class="text-muted">(*)</span></label>
                  <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="data_entrega" class="form-control mb-0 bg-white" value="<?= set_value('data_entrega'); ?>" id="InputDataEntrege" placeholder="Data da Entrega" min="<?php echo date('Y-m-d', strtotime(date("Y-m-d"))); ?>" required>
                  <div class="invalid-feedback <?= form_error('data_entrega') !== null ? "d-block":""; ?>">
                    <?= form_error('data_entrega'); ?>
                  </div>
                </div>

                <div class="mb-4">
                  <label  for="hora_entrega">Horário de Retirada (*)</label>
                  <select name="hora_entrega" class="form-control mb-0 bg-white" id="InputHoraEntrega" required>
                    <option disabled selected value="">Selecione o Horários:</option>
                    <?php foreach ($valoresHoraEntrega as $value) : ?>
                      <option value="<?= $value->tipo; ?>"><?= $value->descricao; ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback <?= form_error('hora_entrega') !== null ? "d-block":""; ?>">
                    <?= form_error('hora_entrega'); ?>
                  </div>
                </div>
                <div class="mb-4 d-none" id="taxaEntrega">
                  <label for="labelEntrega" class="mb-0">Será cobrado a taxa de entrega de R$ 7.00</label>
                </div>
                    
                <div class="row mb-4 border border-dark p-4 d-none" id="novo_endereco">
                  <h5>Informar o endereço abaixo caso queira um novo endereço de entrega.</h5>
                  <hr class="mb-4" style="width:  100%;">
                  <div class="col-md-9">
                    <label for="end_entrega" class="mt-2">Novo Endereço de Entrega</label>
                    <input type="text" class="form-control mb-0 bg-white" id="validationCustom01" name="end_entrega" placeholder="Ex.: Rua Prudente de Morais" value="<?= set_value('end_entrega'); ?>">
                  </div> 
                  <div class="col-md-3">
                    <label for="num_entrega" class="mt-2">Numero</label>
                    <input type="text" class="form-control mb-0 bg-white" id="validationCustom01" name="num_entrega" placeholder="Ex.: 532" value="<?= set_value('num_entrega'); ?>">
                  </div>
                  <div class="col-md-6">
                    <label for="bairro_entrega" class="mt-2">Bairro</label>
                    <input type="text" class="form-control mb-0 bg-white" id="validationCustom01" name="bairro_entrega" placeholder="Ex.: Centro" value="<?= set_value('bairro_entrega'); ?>">
                  </div> 
                  <div class="col-md-6">
                    <label for="comp_entrega" class="mt-2">Complemento</label>
                    <input type="text" class="form-control mb-0 bg-white" id="validationCustom01" name="comp_entrega" placeholder="Ex.: Apto 100, BL 1A" value="<?= set_value('comp_entrega'); ?>">
                  </div> 
                </div>

                <div class="mb-4">
                  <label>Forma de Pagamento (* Pagamento na Entrega)</label><br>
                  <div class="form-row align-items-center">
                    <?php foreach ($valoresFormaPagto as $key => $value) : ?>
                    <div class="custom-control custom-radio mr-3">
                      <input id="forma_pgto<?= $key ?>" name="forma_pgto" type="radio" class="custom-control-input" value="<?= $value->tipo; ?>" required>
                      <label class="custom-control-label" for="forma_pgto<?= $key ?>"><?= $value->descricao; ?></label>
                    </div>
                    <?php endforeach; ?>
                  </div>
                </div>

                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Finalizar Pedido</button>
              </form>
            <?php endif; ?>
            </div>
          </div>
          </div>
        </div>
      </main>

    </div>
  </div>