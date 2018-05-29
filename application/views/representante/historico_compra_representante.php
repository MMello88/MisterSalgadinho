

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
          <h1 class="h2">Histórico de Compra</h1>
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
            <ul class="nav">
              <?php if($cliente->tipo === "c") : ?>
              <li class="nav-item">
                <a href<?= base_url("revendedor/index"); ?>Seja um Revendedor</a>
              </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>

        <div class="container">
          <div class="row pb-5">
            <h2>Pedidos Realizados</h2>
            <div class="table-responsive mt-3">
              <table class="table table-hover table-sm bordered">
                <thead>
                  <tr>
                    <th>Id Pedido</th>
                    <th>Situação</th>
                    <th>Data Pedido</th>
                    <th>Valor Pedido</th>
                    <th>Forma Pgto</th>
                    <th>Forma Entrega</th>
                    <th>Dia Entrega/Retirada</th>
                    <th>Cidade</th>
                    <th>Outro Endereço</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($Pedidos as $Pedido) : ?>
                  <tr>
                    <td><?= $Pedido->id_pedido; ?></td>
                    <td><?= $Pedido->situacao == 's' ? 'Solicitado' : 'Entregue'; ?></td>
                    <td><?= $Pedido->data_pedido; ?></td>
                    <td><?= $Pedido->valor_total; ?></td>
                    <td><?= $Pedido->forma_pgto == 'd' ? 'Dinheiro' : $Pedido->forma_pgto == 'cd' ? 'Cartão Débito' : 'Cartão Crédito'; ?></td>
                    <td><?= $Pedido->forma_entrega == 'e' ? 'Entregar' : 'Retirar'; ?></td>
                    <td><?= $Pedido->data_entrega . " " . $Pedido->hora_entrega; ?></td>
                    <td><?= $Pedido->id_cidade[0]->nome; ?></td>
                    <td><?= $Pedido->end_entrega . ", " . $Pedido->num_entrega . " - " . $Pedido->bairro_entrega . " " . $Pedido->comp_entrega; ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>

    </div>
  </div>