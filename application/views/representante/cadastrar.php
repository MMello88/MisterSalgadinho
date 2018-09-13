    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="<?= base_url('assets/templateV2/img/bonequinho-120.png'); ?>" alt="" width="72" height="72">
        <h2>Mister Salgadinho agradece a confiança que nos deu tornando-se um Representante.</h2>
        <hr class='mb-3 mt-1'>
        <p class="lead">Para finalizar a compra precisamos que informe para nós alguns dados importantes. E então tornará membro da equipe Mister.</p>
      </div>

      <div class="row mx-auto pb-5">
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Realizar Cadastro</h4>
          <?= form_open('representante/cadastrar'); ?>
            <input type="hidden" name="situacao" value="a">
            <input type="hidden" name="tipo" value="s">
            <input type="hidden" name="ativo" value="0">

            <div class="mb-4">
              <label for="nome">Nome <span class="text-muted">(*)</span></label>
              <input type="text" class="form-control mb-0 bg-white" id="nome" name="nome" placeholder="Ex.: Nome Completo " value="<?= set_value('nome'); ?>" required>
              <div class="invalid-feedback <?= form_error('nome') !== null ? "d-block":""; ?>">
                <?= form_error('nome'); ?>
              </div>
            </div>

            <div class="mb-4">
              <label for="cpf_cnpj">CPF ou CNPJ <span class="text-muted">(*)</span></label>
              <input type="number" class="form-control mb-0 bg-white" id="cpf_cnpj" name="cpf_cnpj" placeholder="Ex.: 35849945809 ou 43165888000125 " value="<?= set_value('cpf_cnpj'); ?>" maxlength="14" required>
              <div class="invalid-feedback <?= form_error('cpf_cnpj') !== null ? "d-block":""; ?>">
                <?= form_error('cpf_cnpj'); ?>
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

            <div class="mb-4">
              <label for="telefone">Telefone/Celular <span class="text-muted">(*)</span></label>
              <input type="text" class="form-control mb-0 bg-white" name="telefone" id="telefone" placeholder="Ex.: (16) 99999-9999" value="<?= set_value('telefone'); ?>" required>
              <div class="invalid-feedback <?= form_error('telefone') !== null ? "d-block":""; ?>">
                <?= form_error('telefone'); ?>
              </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-warning btn-lg btn-block" type="submit">Cadastrar</button>
          </form>
        </div>
      </div>


    </div>