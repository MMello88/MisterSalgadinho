  <div class="alert alert-danger alert-dismissible" id="message-danger" 
    <?= isset($email_nao_encontrado) ? "" : "style=\"display: none;\""; ?> role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true" class="closeX">&times;</span>
    </button>
    <p id="msgError"><?= isset($email_nao_encontrado) ? $email_nao_encontrado : "" ?></p>
  </div>

  <div class="alert alert-success alert-dismissible" id="message-danger" 
    <?= isset($email_encontrado) ? "" : "style=\"display: none;\""; ?> role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true" class="closeX">&times;</span>
    </button>
    <p id="msgError"><?= isset($email_encontrado) ? $email_encontrado : "" ?></p>
  </div>

   <div class="alert alert-success alert-dismissible" id="message-danger" 
    <?= isset($recuperado_sucesso) ? "" : "style=\"display: none;\""; ?> role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true" class="closeX">&times;</span>
    </button>
    <p id="msgError"><?= isset($recuperado_sucesso) ? $recuperado_sucesso : "" ?></p>
  </div>

  <!-- container -->
  <div class="container">
    <div class="row">
    <!-- Titulo -->
      <div class="col align-self-start">
      </div>
      <div class="col align-self-center py-3 ">
        <img class="d-block mx-auto mb-4" src="<?= base_url('assets/img/bonequinho-120.png'); ?>" alt="" width="72" height="72">
        <?php if (empty($hash)) : ?>
          <h2 class="text-center">Recuperar a Senha</h2>
          <hr class='mb-3 mt-1'>
          <?= form_open('clientes/recuperar'); ?>

            <div class="mb-4">
              <label for="email" class="ml-auto">Email <span class="text-muted">(*)</span></label>
              <input type="text" class="form-control mb-0 bg-white" id="email" name="email" placeholder="Ex.: seu@Email.com" value="<?= set_value('email'); ?>" required>
              <div class="invalid-feedback <?= form_error('email') !== null ? "d-block":""; ?>">
                <?= form_error('email'); ?>
              </div>
            </div>
            
            <hr class="mb-4">
            <button class="btn btn-warning btn-lg btn-block" type="submit">Solicitar Recuperação de Senha</button>
          </form>

        <?php else : ?>
          <h2>Recuperar a Senha</h2>
          <hr class='mb-3 mt-1'>
          <?= form_open("clientes/recuperar/$hash"); ?>
            <input type="hidden" name="hash" value="<?= $hash; ?>">
            <div class="mb-4">
              <label for="senha">Senha <span class="text-muted">(* Minimo 8 Caracteres)</span></label>
              <input type="password" class="form-control mb-0 bg-white" id="senha" name="senha" placeholder="Ex.: Password" value="<?= set_value('senha'); ?>" required>
              <div class="invalid-feedback <?= form_error('senha') !== null ? "d-block":""; ?>">
                <?= form_error('senha'); ?>
              </div>
            </div>
            
            <hr class="mb-4">
            <button class="btn btn-warning btn-lg btn-block" type="submit">Alterar a Senha</button>
          </form>
        <?php endif; ?>
      </div>
      <!-- fim do Titulo -->
      <div class="col align-self-end">
      </div>
    </div>
  </div>
  <!-- fim do container -->