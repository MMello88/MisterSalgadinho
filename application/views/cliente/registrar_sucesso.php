  <!-- container -->
  <div class="container">
    <!-- Titulo -->
    <div class="py-3 text-center">
      <img class="d-block mx-auto mb-4" src="<?= base_url('assets/img/bonequinho-120.png'); ?>" alt="" width="72" height="72">
      <h2>Mister Salgadinhos!</h2>
      <hr class='mb-3 mt-1'>
      <p class="lead"><?= $cliente->nome; ?> Agradecemos o seu Cadastro!</p>
      <p class="lead">Só tem mais um passo! Enviamos um e-mail de Ativação da sua conta, nele contém instruções de como proceder.</p>
      <p class="lead">Obrigado.</p>
      <a class="btn btn-warning btn-lg" href="<?= base_url("vitrine/index"); ?>" role="button">Voltar ao Inicio</a>
    </div>
    <!-- fim do Titulo -->

  </div>
  <!-- fim do container -->