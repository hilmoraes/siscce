<!-- <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Painel Administrativo</h1>
          </div>
        </div>
      </div>
    </section> -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <?php if ($_SESSION['status']=="0" || $_SESSION['status']=="1"):?>
          <div class="col-md-4 col-sm-4 col-6">
            <div class="info-box">
              <span class="info-box-icon" style="background-color: #95e2b7"><img src="dist/img/prefeitura.png" class="img-abm" ></span>
              <div class="info-box-content">
                <a href="<?=BASE_URL;?>prefeituras/lista"><span class="info-box-text">Prefeituras</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-4 col-sm-4 col-6">
            <div class="info-box">
              <span class="info-box-icon bg-info"><img src="dist/img/parceiro.png" class="img-abm" ></span>
              <div class="info-box-content">
                <a href="<?=BASE_URL;?>parceiros/lista"><span class="info-box-text">Parceiros</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-4 col-sm-4 col-6">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><img src="dist/img/gestor.png" class="img-abm"></span>
              <div class="info-box-content">
                <a href="<?=BASE_URL;?>gestores/lista"><span class="info-box-text">Gestores</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-4 col-sm-4 col-6">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><img src="dist/img/fiscal.png" class="img-abm"></span>
              <div class="info-box-content">
                <a href="<?=BASE_URL;?>fiscais/lista"><span class="info-box-text">Fiscais</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-4 col-sm-4 col-6">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><img src="dist/img/convenio.png" class="img-abm"></span>
              <div class="info-box-content">
                <a href="<?=BASE_URL;?>convenios/lista"><span class="info-box-text">Convênios</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        <?php endif; ?>

      </div>

    </section>