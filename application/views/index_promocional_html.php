<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo base_url("assets/img/banner-principal.png"); ?>" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url("assets/img/download.png"); ?>" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url("assets/img/download.png"); ?>" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


 <!-- start section portfolio -->
  <div id="portfolio" class="text-center paddsection">

    <div class="container">
      <div class="section-title text-center">
        <h2>Os Salagados mais deliciosos</h2>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <div class="portfolio-list">
            <ul class="nav list-unstyled" id="portfolio-flters">
              <li class="filter filter-active" data-filter=".all">Todos</li>
              <?php foreach ($CategoriasProdutos as $CategProd) : ?>
                <li class="filter" data-filter=".<?= $CategProd->cssClass; ?>"><?= $CategProd->nome; ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="portfolio-container">
            <?php foreach ($Produtos as $Produto) : ?>
            <form method='post' action='' id='formCart'>
              <div class="col-lg-4 col-md-6 portfolio-thumbnail all <?= $Produto->cssClass ?>">
                <div class="hovereffect">
                    <img class="img-responsive" src="<?php echo base_url("assets/img/$Produto->imagem"); ?>" alt="">
                    <div class="overlay">
                      <h6 class="text-dark text-left"><?= $Produto->nome ?></h6>
                      <h4 class="text-danger text-left">R$<?= $Produto->preco ?></h4>
                      <input type='hidden' name='id_produto' value='<?= $Produto->id_produto ?>'>
                      <input type='hidden' name='id_session' value='<?= $id_session ?>'>
                      <input type='hidden' name='situacao'   value='a'>
                      <input type="hidden" name='valor_unitario' value="<?= $Produto->preco ?>" id="valor-<?= $Produto->id_produto ?>">
                      <div class="input-group m-auto pt-5 pb-2 fade-out">
                        <div class="input-group-prepend">
                          <button class="btn" type="button" id="btn-menos" data-whatever="<?= $Produto->id_produto ?>">-</button>
                        </div>
                        <input type="number" min='0' name='qtde' id="qnt-<?= $Produto->id_produto ?>" class="form-control text-center bg-white" value="1" readonly required>
                        <div class="input-group-append">
                          <button class="btn" type="button" id="btn-mais" data-whatever="<?= $Produto->id_produto ?>">+</button>
                        </div>
                      </div>
                      <button class="btn fade-out"
                      <?php if ($cidade === null) { echo " type=\"button\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\""; } else { echo "type=\"submit\""; } ?> >Adicionar ao Carrinho</button>
                      <p class="total">Total: <strong id="total-<?= $Produto->id_produto ?>">R$ <?= $Produto->preco ?></strong></p>
                    </div>
                </div>
              </div>
            </form>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- End section portfolio -->


<!-- Modal da Cidade -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-mister-marrom">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="closeX" aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('Vitrine/SelecionarCidade', array('id' => 'formCidade', 'class' => '')); ?>
          <div class="modal-body">
            <div class="col pb-3">
                <div class="mx-auto" style="width: 70px;">
                    <img class="alo-icon" src="<?= base_url("assets/img/bonequinho-120.png"); ?>" alt="Mister">
                </div>
            </div>
            
            <div class="col">
                <h3 class="text-center">Vamos encontrar o Mister mais perto de você?</h3>
                <h5 class="text-center">Escolhe a sua Cidade:</h5>
                <div class="form-group">
                    <select name="id_cidade" class="form-control form-control-lg" id="InputHoraEntrega" required>
                        <option disabled selected>Selecione a Cidade:</option>
                        <?php if ($Cidades !== null) : ?>
                            <?php foreach ($Cidades as $key => $city) : ?>
                            <option value="<?= $city->id_cidade; ?>"><?= $city->nome; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
          </div>
          <div class="modal-footer bg-mister-mostarda">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Selecionar</button>
          </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>