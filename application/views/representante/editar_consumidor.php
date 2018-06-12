    

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

        <div class="alert alert-success alert-dismissible text-center" id="message-danger" 
          <?= isset($success_cad_consu) ? "" : "style=\"display: none;\""; ?> role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="closeX">&times;</span>
          </button>
          <p id="msgError"><?= isset($success_cad_consu) ? $success_cad_consu : "" ?></p>
        </div>

        <div class="alert alert-success alert-dismissible text-center" id="message-danger" 
          <?= isset($erro_cad_consu) ? "" : "style=\"display: none;\""; ?> role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="closeX">&times;</span>
          </button>
          <p id="msgError"><?= isset($erro_cad_consu) ? $erro_cad_consu : "" ?></p>
        </div>


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Cadastro de Cliente Consumidor</h1>
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

            <!-- lista cliente -->
            <div class="col-md-4 order-md-2 mb-4">

              <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Lista de Clientes</span>
              </h4>
              <ul class="list-group mb-3">
                <?php if(empty($consumidores)) : ?>
                <li class="list-group-item d-flex justify-content-between">
                  <span>...</span>
                  <strong>...</strong>
                </li>
                <?php endif; ?>
                <?php foreach ($consumidores as $value) : ?>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div>
                    <h6 class="my-0"><?= $value->id_cliente_cliente->nome; ?></h6>
                    <small class="text-muted"><?= $value->id_cliente_cliente->email; ?> </small>
                  </div>
                  <div>
                    <a href="<?= base_url("areacomercial/novo_consumidor/{$value->id_cliente_cliente->id_cliente}"); ?>">Visualizar</a>
                    <p class="text-muted my-0" style="font-size: 80%;"><?= $value->id_cliente_cliente->ativo == '1' ? 'Ativo' : 'Inativo'; ?></p>
                  </div>
                </li>
                <?php endforeach; ?>
              </ul>

            </div>
            <!-- fim do lista cliente -->

            <!-- Cadastro -->
            <div class="col-md-8 order-md-1">
              <!-- tab div -->
              <div class="tab-content" id="pills-tabContent">
                <!-- tab item cadastro -->
                <div class="tab-pane show active" id="form-registrar">
                  
                  <div class="mb-4">
                    <label for="nome">Nome <span class="text-muted">(*)</span></label>
                    <input type="text" class="form-control mb-0" id="nome" name="nome" placeholder="Ex.: Nome Completo " value="<?= $consumidor->nome; ?>" readonly>
                  </div>

                  <div class="mb-4">
                    <label for="cpf_cnpj">CPF ou CNPJ <span class="text-muted">(*)</span></label>
                    <input type="number" class="form-control mb-0" id="cpf_cnpj" name="cpf_cnpj" placeholder="Ex.: 35849945809 ou 43165888000125 " value="<?= $consumidor->cpf_cnpj ?>" maxlength="14" readonly>
                  </div>

                  <div class="mb-4">
                    <label for="email">Email <span class="text-muted">(*)</span></label>
                    <input type="text" class="form-control mb-0" id="email" name="email" placeholder="Ex.: seu@Email.com" value="<?= $consumidor->email; ?>" readonly>
                  </div>

                  <div class="row mb-4">
                    <div class="col-md-9">
                      <label for="endereco">Endereço <span class="text-muted">(*)</span></label>
                      <input type="text" class="form-control mb-0" name="endereco" id="endereco" placeholder="Ex.: Rua. Prudente de Morais" value="<?= $consumidor->endereco; ?>" required>
                      <div class="invalid-feedback <?= form_error('endereco') !== null ? "d-block":""; ?>">
                        <?= form_error('endereco'); ?>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label for="numero">Numero <span class="text-muted">(*)</span></label>
                      <input type="text" class="form-control mb-0" name="numero" id="numero" placeholder="Ex.: 532" value="<?= $consumidor->numero; ?>" required>
                      <div class="invalid-feedback <?= form_error('numero') !== null ? "d-block":""; ?>">
                        <?= form_error('numero'); ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="bairro">Bairro <span class="text-muted">(*)</span></label>
                      <input type="text" class="form-control mb-0" name="bairro" id="bairro" placeholder="Ex.: Centro" value="<?= $consumidor->bairro; ?>" required>
                      <div class="invalid-feedback <?= form_error('bairro') !== null ? "d-block":""; ?>">
                        <?= form_error('bairro'); ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                    <label for="complemento">Complemento</label>
                      <input type="text" class="form-control mb-0" name="complemento" id="complemento" placeholder="Ex.: Apto 100, BL 1A" value="<?= $consumidor->complemento; ?>">
                      <div class="invalid-feedback <?= form_error('complemento') !== null ? "d-block":""; ?>">
                        <?= form_error('complemento'); ?>
                      </div>
                    </div>
                  </div>

                  <div class="mb-4">
                    <label for="telefone">Telefone/Celular <span class="text-muted">(*)</span></label>
                    <input type="text" class="form-control mb-0" name="telefone" id="telefone" placeholder="Ex.: (16) 99999-9999" value="<?= $consumidor->telefone; ?>" required>
                    <div class="invalid-feedback <?= form_error('telefone') !== null ? "d-block":""; ?>">
                      <?= form_error('telefone'); ?>
                    </div>
                  </div>

                  <div class="d-block my-3">
                    <h4 class="mb-3">Tipo do Cliente <span class="text-muted">(*)</span></h4>
                    <div class="custom-control custom-radio">
                      <?= form_radio('tipo', 'c', $consumidor->tipo === 'c' ? TRUE : FALSE , array('class' => 'custom-control-input', 'id' => 'cliente', 'required' => '')); ?>
                      <label class="custom-control-label" for="cliente">Cliente</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <?= form_radio('tipo', 'r', $consumidor->tipo === 'r' ? TRUE : FALSE , array('class' => 'custom-control-input', 'id' => 'revendedor', 'required' => '')); ?>
                      <label class="custom-control-label" for="revendedor">Revendedor</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <?= form_radio('tipo', 'p', $consumidor->tipo === 'p' ? TRUE : FALSE , array('class' => 'custom-control-input', 'id' => 'parceiro', 'required' => '')); ?>
                      <label class="custom-control-label" for="parceiro">Parceiro</label>
                    </div>
                  </div>

                  <hr class="mb-4">
                  <a href="<?= base_url("areacomercial/novo_consumidor"); ?>" class="btn btn-warning btn-block" type="submit">Voltar</a>

                </div>
                <!-- fim tab item cadastro -->
              </div>
            </div>
             
          </div>
        </div>
      </main>

    </div>
  </div>