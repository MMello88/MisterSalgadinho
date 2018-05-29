

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
          <h1 class="h2">Editar Perfil</h1>
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
                <a href="<?= base_url("revendedor/index"); ?>">Seja um Revendedor</a>
              </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>

        <?php if (isset($edtClienteSucesso)) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Sucesso!</strong> <?= $edtClienteSucesso; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="closeX" aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php endif; ?>

        <div class="container">
          <div class="row pb-5">
            <?= form_open('perfil/editar'); ?>
              <input type="hidden" name="id_cliente" value="<?= $edtCliente->id_cliente; ?>">
              <input type="hidden" name="tipo" value="<?= $edtCliente->tipo; ?>">

              <div class="mb-4">
                <label for="nome">Nome <span class="text-muted">(*)</span></label>
                <input type="text" class="form-control mb-0" id="nome" name="nome" value="<?= $edtCliente->nome; ?>" readonly>
              </div>

              <div class="mb-4">
                <label for="cpf_cnpj">CPF ou CNPJ <span class="text-muted">(*)</span></label>
                <input type="text" class="form-control mb-0" id="cpf_cnpj" name="cpf_cnpj" value="<?= $edtCliente->cpf_cnpj; ?>" readonly>
              </div>

              <div class="mb-4">
                <label for="email">Email <span class="text-muted">(*)</span></label>
                <input type="text" class="form-control mb-0" id="email" name="email" value="<?= $edtCliente->email; ?>" readonly>
              </div>

              <div class="mb-4">
                <label for="senha">Nova Senha <span class="text-muted">(* Minimo 8 Caracteres)</span></label>
                <input type="password" class="form-control mb-0 bg-white" id="senha" name="senha" placeholder="Ex.: Password" value="" required>
                <div class="invalid-feedback <?= form_error('senha') !== null ? "d-block":""; ?>">
                <?= form_error('senha'); ?>
                </div>
              </div>

              <div class="row mb-4">
                <div class="col-md-9">
                  <label for="endereco">Endereço <span class="text-muted">(*)</span></label>
                  <input type="text" class="form-control mb-0 bg-white" name="endereco" id="endereco" placeholder="Ex.: Rua. Prudente de Morais" value="<?= $edtCliente->endereco; ?>" required>
                  <div class="invalid-feedback <?= form_error('endereco') !== null ? "d-block":""; ?>">
                    <?= form_error('endereco'); ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="numero">Numero <span class="text-muted">(*)</span></label>
                  <input type="text" class="form-control mb-0 bg-white" name="numero" id="numero" placeholder="Ex.: 532" value="<?= $edtCliente->numero; ?>" required>
                  <div class="invalid-feedback <?= form_error('numero') !== null ? "d-block":""; ?>">
                    <?= form_error('numero'); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="bairro">Bairro <span class="text-muted">(*)</span></label>
                  <input type="text" class="form-control mb-0 bg-white" name="bairro" id="bairro" placeholder="Ex.: Centro" value="<?= $edtCliente->bairro; ?>" required>
                  <div class="invalid-feedback <?= form_error('bairro') !== null ? "d-block":""; ?>">
                    <?= form_error('bairro'); ?>
                  </div>
                </div>
                <div class="col-md-6">
                <label for="complemento">Complemento</label>
                  <input type="text" class="form-control mb-0 bg-white" name="complemento" id="complemento" placeholder="Ex.: Apto 100, BL 1A" value="<?= $edtCliente->complemento; ?>">
                  <div class="invalid-feedback <?= form_error('complemento') !== null ? "d-block":""; ?>">
                    <?= form_error('complemento'); ?>
                  </div>
                </div>
              </div>

              <div class="mb-4">
                <label for="telefone">Telefone/Celular <span class="text-muted">(*)</span></label>
                <input type="text" class="form-control mb-0 bg-white" name="telefone" id="telefone" placeholder="Ex.: (16) 99999-9999" value="<?= $edtCliente->telefone; ?>" required>
                <div class="invalid-feedback <?= form_error('telefone') !== null ? "d-block":""; ?>">
                  <?= form_error('telefone'); ?>
                </div>
              </div>

              <hr class="mb-4">
              <button class="btn btn-warning btn-block" type="submit">Salvar</button>
            </form>
          </div>
        </div>
      </main>

    </div>
  </div>