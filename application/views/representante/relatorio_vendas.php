

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
          <h1 class="h2">Relatório de Vendas</h1>
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
          <h4><?= $cliente->nome; ?></h4>
          <div class="btn-toolbar mb-2 mb-md-0">
          </div>
        </div>

        <div class="container">
          <div class="row pb-5">
            <?= form_open('AreaComercial/relatorioCompraClientes', array('class' => 'form-inline')) ?>
            	<input type="hidden" name="id_cliente_represent" value="<?= $cliente->id_cliente; ?>">
            	<div class="form-group">
						  	<label class="my-1 mr-2" for="forMesInicial">Mês Inicial</label>
						  	<?= form_dropdown('dt_inicial', $options, set_value('dt_inicial'), 'class="custom-select my-1 mr-sm-5" id="IdMesInicial"') ?>
							</div>

						  <div class="form-group">
						  	<label class="my-1 mr-2" for="inlineFormCustomSelectPref">Mês Final</label>
						  	<?= form_dropdown('dt_final', $options, set_value('dt_final'), 'class="custom-select my-1 mr-sm-5" id="IdMesFinal"') ?>
						  </div>
						  <div class="form-group">
						  <button type="submit" class="btn btn-warning my-1">Filtrar</button>
							</div>
						</form>

            <div class="table-responsive mt-3">
            	<!-- tabela -->
            	<table class="table table-bordered table-hover table-sm bordered">
                <thead>
                  <tr>
                    <th>Nome Cleinte</th>
                    <th>Id Pedido</th>
                    <th>Data Pedido</th>
                    <th>Valor Pedido</th>
                    <th>Situação do pedido</th>
                    <th>Data seu Pgto</th>
                    <th>Valor seu Pgto</th>
                    <th>Já Recebeu</th>
                  </tr>
                </thead>
                <tbody>
                	<?php $totalPago = 0; $totalNaoRec = 0; ?>
                  <?php foreach ($relatRecbiByPedido as $chave => $cliente) : ?>
                  	<tr>
                  		<td colspan="8"><?= $cliente->nome; ?></td>
                  	</tr>
                  	<?php $subTotalPago = 0; $subTotalNaoRec = 0; ?>
                  	<?php foreach ($cliente->pedidos as $key => $Pedido) : ?>
                  		<?php 
                  			if($Pedido->recebido === 's')
                  				$subTotalPago = $subTotalPago + $Pedido->valor_receber; 
                  			else
                  				$subTotalNaoRec = $subTotalNaoRec + $Pedido->valor_receber; 
                  		?>
		                  </tr>
		                  	<td></td>
		                    <td><?= $Pedido->id_pedido; ?></td>
		                    <td><?= date('Y-m-d', strtotime($Pedido->data_pedido)); ?></td>
		                    <td><?= $Pedido->valor; ?></td>
		                    <td><?= $Pedido->situacao_pedido == 'a' ? 'Aberto' : 'Finalizado'; ?></td>
		                    <td><?= $Pedido->data_pgto_pedido; ?></td>
		                    <td><?= $Pedido->valor_receber; ?></td>
		                    <td><?= ($Pedido->recebido === 's' ? 'Sim' : 'Não'); ?></td>
		                  </tr>
                  	<?php endforeach; ?>
                  	<tr>
                  		<td class="text-right" colspan="6">Sub Total Pago R$ <?= number_format($subTotalPago, 2, '.', ''); ?></td>
                  		<td class="text-right" colspan="2">Sub Total a Receber R$ <?= number_format($subTotalNaoRec, 2, '.', ''); ?></td>
                  	</tr>
                  	<?php 
                  		$totalPago = $totalPago + $subTotalPago;
                  		$totalNaoRec = $totalNaoRec + $subTotalNaoRec;
                  	?>
                  <?php endforeach; ?>
                  	<tr class="mt-5">
                  		<td class="text-left" colspan="2">Total Pago <?= number_format($totalPago, 2, '.', ''); ?></td>
                  		<td class="text-left" colspan="6">Total a Receber <?= number_format($totalNaoRec, 2, '.', ''); ?></td>
                  	</tr>
                </tbody>
              </table>
            	<!-- fim tabela -->
            </div>
          </div>
        </div>
      </main>

    </div>
  </div>