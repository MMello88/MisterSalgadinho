

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
          <h4><?= $cliente->nome; ?></h4>
          <div class="btn-toolbar mb-2 mb-md-0">
            <ul class="nav">
              <?php if($cliente->tipo === "c") : ?>
              <li class="nav-item">
                <!--<a href="<?= base_url("revendedor/index"); ?>">Seja um Revendedor</a>-->
              </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>

        <div class="container">
          <div class="row pb-5">
            <?php foreach ($enderecos as $end) : ?>
            <div class="col-lg-4 col-md-6 mb-3">
              <div class="card">
                <div class="card-body">
                  <h6><b>CEP:</b> <?= $end->cep; ?></h6>
                  <h6><b>Endereço:</b> <?= $end->endereco; ?>, <?= $end->numero; ?> - <?= $end->nome; ?> <b>Comp.:</b> <?= $end->complemento; ?></h6>
                  <h6><b>Bairro:</b> <?= $end->bairro; ?></h6>
                  <h6><b>End. Principal:</b> <?= $end->principal == 's' ? 'Sim' : 'Não'; ?></h6>
                </div>
                <div class="card-footer">
                  <?= form_open('perfil/enderecos'); ?>
                  <input type="hidden" name="id_endereco" value="<?= $end->id_endereco; ?>">
                  <input type="hidden" name="id_cliente" value="<?= $cliente->id_cliente; ?>">

                  <input type="hidden" name="cep" value="<?= $end->cep; ?>">
                  <input type="hidden" name="endereco" value="<?= $end->endereco; ?>">
                  <input type="hidden" name="numero" value="<?= $end->numero; ?>">
                  <input type="hidden" name="complemento" value="<?= $end->complemento; ?>">
                  <input type="hidden" name="bairro" value="<?= $end->bairro; ?>">
                  <input type="hidden" name="id_cidade" value="<?= $end->id_cidade; ?>">

                  <input type="hidden" name="principal" value="s">
                  <button class="btn" style="padding: 10px; margin: 0px; line-height:10px;">Usar endereço</button>
                  <a class="btn" href="<?= base_url("perfil/enderecos/$end->id_endereco"); ?>" style="padding: 10px; margin: 0px; line-height:10px;">Editar</a> 
                  <?= form_close(); ?>
                  
                </div>
              </div>
            </div>
            <?php endforeach; ?>

            <?= form_open('perfil/enderecos'); ?>
              <div class="row mb-4 border border-dark p-4">
                <h5>Informar o endereço abaixo caso queira um novo endereço de entrega.</h5>
                <hr class="mb-4" style="width:  100%;">
                <input type="hidden" name="id_endereco" value="<?= set_value('id_endereco', $endereco->id_endereco); ?>">
                <input type="hidden" name="id_cliente" value="<?= $cliente->id_cliente; ?>">
                <div class="col-md-3">
                  <?= form_label('CEP', 'cep', array('class' => 'mt-2')); ?>
                  <input type="text" class="form-control mb-0 bg-white" id="validationCustom01" name="cep" placeholder="Ex.: 532" value="<?= set_value('cep', $endereco->cep); ?>">
                </div>
                <div class="col-md-6">
                  <?= form_label('Cidade', 'cidade', array('class' => 'mt-2')); ?>
                  <?= form_dropdown('id_cidade', $end_cidades, set_value('id_cidade', $endereco->id_cidade), array('class' => 'custom-select', 'required' => '')); ?>
                </div>
                <div class="col-md-3">
                  <?= form_checkbox('principal', 's', TRUE, array('class' => 'form-check-input', 'for' => 'principal')); ?>
                  <label class="form-check-label" for="principal">Endereço Principal</label>
                </div>
                <div class="col-md-10">
                  <?= form_label('Endereço de Entrega', 'endereco', array('class' => 'mt-2')); ?>
                  <input type="text" class="form-control mb-0 bg-white" id="validationCustom01" name="endereco" placeholder="Ex.: Rua Prudente de Morais" value="<?= set_value('endereco', $endereco->endereco); ?>">
                </div> 
                <div class="col-md-2">
                  <?= form_label('Numero', 'numero', array('class' => 'mt-2')); ?>
                  <input type="text" class="form-control mb-0 bg-white" id="validationCustom01" name="numero" placeholder="Ex.: 532" value="<?= set_value('numero', $endereco->numero); ?>">
                </div>
                <div class="col-md-6">
                  <?= form_label('Bairro', 'bairro', array('class' => 'mt-2')); ?>
                  <input type="text" class="form-control mb-0 bg-white" id="validationCustom01" name="bairro" placeholder="Ex.: Centro" value="<?= set_value('bairro', $endereco->bairro); ?>">
                </div> 
                <div class="col-md-6">
                  <?= form_label('Complemento', 'complemento', array('class' => 'mt-2')); ?>
                  <input type="text" class="form-control mb-0 bg-white" id="validationCustom01" name="complemento" placeholder="Ex.: Apto 100, BL 1A" value="<?= set_value('complemento', $endereco->complemento); ?>">
                </div> 
                <div class="col-md-6 mt-3">
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
              </div>
            <?= form_close(); ?>
            

          </div>
        </div>
      </main>
    </div>
  </div>
  
