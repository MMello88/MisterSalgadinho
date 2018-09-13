  <!-- container -->
  <div class="container">
    <!-- Titulo -->
    <div class="py-3 text-center">
      <img class="d-block mx-auto mb-4" src="<?= base_url('assets/templateV2/img/bonequinho-120.png'); ?>" alt="" width="72" height="72">
      <h2>Seja Bem Vindo ao Mister Salgadinhos!</h2>
      <hr class='mb-3 mt-1'>
      <p class="lead"><?= $cliente->nome; ?> Seja Bem Vindo!</p>
      <p class="lead">Espero que aproveite as promoções que em breve estaram disponíveis e faça boas compras!</p>
      <a class="btn btn-warning btn-lg" href="<?= base_url("clientes/registrar"); ?>" role="button">Loginho</a>
    </div>
    <!-- fim do Titulo -->

  </div>
  <!-- fim do container -->