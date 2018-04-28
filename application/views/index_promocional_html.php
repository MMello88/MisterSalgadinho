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
            <div class="col-lg-4 col-md-6 portfolio-thumbnail all <?= $Produto->cssClass ?>">
              <div class="hovereffect">
                  <img class="img-responsive" src="<?php echo base_url("assets/img/$Produto->imagem"); ?>" alt="">
                  <div class="overlay">
                    <h6 class="text-dark text-left"><?= $Produto->nome ?></h6>
                    <h4 class="text-danger text-left">R$<?= $Produto->preco ?></h4>


                    <div class="input-group m-auto pt-5 pb-2 fade-out">
                      <div class="input-group-prepend">
                        <button class="btn" type="button" id="btn-menos" data-whatever="<?= $Produto->id_produto ?>">-</button>
                      </div>
                      <input type="text" id="qnt-<?= $Produto->id_produto ?>" class="form-control text-center bg-white" value="1" readonly>
                      <input type="hidden" id="valor-<?= $Produto->id_produto ?>" value="<?= $Produto->preco ?>">
                      <div class="input-group-append">
                        <button class="btn" type="button" id="btn-mais" data-whatever="<?= $Produto->id_produto ?>">+</button>
                      </div>
                    </div>
                    
                    <button class="btn fade-out" type="button">Adicionar ao Carrinho</button>
                    
                    <p class="total">Total: <strong id="total-<?= $Produto->id_produto ?>">R$ <?= $Produto->preco ?></strong></p>

                  </div>
              </div>
            </div>
            <?php endforeach; ?>
            
 <?php /*
            <div class="col-lg-4 col-md-6 portfolio-thumbnail all mockups uikits photography">
              <div class="hovereffect">
                  <img class="img-responsive" src="<?php echo base_url("assets/img/mini_cro.png"); ?>" alt="">
                  <div class="overlay">
                    <h6 class="text-dark text-left">Espetacular Croquete</h6>
                    <h4 class="text-danger text-left">R$3.00</h4>


                    <div class="input-group m-auto pt-5 pb-2 fade-out">
                      <div class="input-group-prepend">
                        <button class="btn" type="button">-</button>
                      </div>
                      <input type="text" class="form-control text-center bg-white" value="1" readonly>
                      <div class="input-group-append">
                        <button class="btn" type="button">+</button>
                      </div>
                    </div>
                    
                    <button class="btn fade-out" type="button">Adicionar ao Carrinho</button>
                    
                    <p class="total"><small>Total: </small><strong>R$ 3.00</strong></p>

                  </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-thumbnail all branding webdesig photographyn">
              <div class="hovereffect">
                  <img class="img-responsive" src="<?php echo base_url("assets/img/mini_enr.png"); ?>" alt="">
                  <div class="overlay">
                    <h6 class="text-dark text-left">Magnifico Enroladinho</h6>
                    <h4 class="text-danger text-left">R$3.00</h4>


                    <div class="input-group m-auto pt-5 pb-2 fade-out">
                      <div class="input-group-prepend">
                        <button class="btn" type="button">-</button>
                      </div>
                      <input type="text" class="form-control text-center bg-white" value="1" readonly>
                      <div class="input-group-append">
                        <button class="btn" type="button">+</button>
                      </div>
                    </div>
                    
                    <button class="btn fade-out" type="button">Adicionar ao Carrinho</button>
                    
                    <p class="total"><small>Total: </small><strong>R$ 3.00</strong></p>

                  </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-thumbnail all mockups webdesign photography">
              <div class="hovereffect">
                  <img class="img-responsive" src="<?php echo base_url("assets/img/mini_kib.png"); ?>" alt="">
                  <div class="overlay">
                    <h6 class="text-dark text-left">Robusto Kibe</h6>
                    <h4 class="text-danger text-left">R$3.00</h4>


                    <div class="input-group m-auto pt-5 pb-2 fade-out">
                      <div class="input-group-prepend">
                        <button class="btn" type="button">-</button>
                      </div>
                      <input type="text" class="form-control text-center bg-white" value="1" readonly>
                      <div class="input-group-append">
                        <button class="btn" type="button">+</button>
                      </div>
                    </div>
                    
                    <button class="btn fade-out" type="button">Adicionar ao Carrinho</button>
                    
                    <p class="total"><small>Total: </small><strong>R$ 3.00</strong></p>

                  </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-thumbnail all branding uikits photography">
              <div class="hovereffect">
                  <img class="img-responsive" src="<?php echo base_url("assets/img/mini_sal.png"); ?>" alt="">
                  <div class="overlay">
                    <h6 class="text-dark text-left">Senhora Salsicha</h6>
                    <h4 class="text-danger text-left">R$3.00</h4>


                    <div class="input-group m-auto pt-5 pb-2 fade-out">
                      <div class="input-group-prepend">
                        <button class="btn" type="button">-</button>
                      </div>
                      <input type="text" class="form-control text-center bg-white" value="1" readonly>
                      <div class="input-group-append">
                        <button class="btn" type="button">+</button>
                      </div>
                    </div>
                    
                    <button class="btn fade-out" type="button">Adicionar ao Carrinho</button>
                    
                    <p class="total"><small>Total: </small><strong>R$ 3.00</strong></p>

                  </div>
              </div>
            </div>


            <div class="col-lg-4 col-md-6 portfolio-thumbnail all mockups uikits webdesign">
              <div class="hovereffect">
                  <img class="img-responsive" src="<?php echo base_url("assets/img/mini_bol_sem.png"); ?>" alt="">
                  <div class="overlay">
                    <h6 class="text-dark text-left">El Bolinho de Carne</h6>
                    <h4 class="text-danger text-left">R$3.00</h4>


                    <div class="input-group m-auto pt-5 pb-2 fade-out">
                      <div class="input-group-prepend">
                        <button class="btn" type="button">-</button>
                      </div>
                      <input type="text" class="form-control text-center bg-white" value="1" readonly>
                      <div class="input-group-append">
                        <button class="btn" type="button">+</button>
                      </div>
                    </div>
                    
                    <button class="btn fade-out" type="button">Adicionar ao Carrinho</button>
                    
                    <p class="total"><small>Total: </small><strong>R$ 3.00</strong></p>

                  </div>
              </div>
            </div>
 */ ?>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- End section portfolio -->