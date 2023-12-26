<?php if(!empty($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}?>

<?php include("funcoes/funcoes.php"); ?>

<div class="container-fluid">
  <div class="row mb-2"></div>
</div>

<div class="col-md-10">
  <div class="card">
    <div class="card-header">
      <div class="col-md-12">
        <h3 class="card-title" style="color: black;"><b>Editar Gestor</b></h3>
      </div>
    </div>
    <div class="card-body">
      <form method="post" action="<?=BASE_URL;?>gestores/update">
        <div class="tab-content">
          <div class="row">
            <div><input type="hidden" value="<?=$gestor['cmpCodGes'];?>" name="id"></div>

            <div class="col-md-7">
              <div class="form-group">
                <label for="NomeGes">Gestor:</label>
                <input type="text" id="NomeGes" class="form-control input-sm" name="NomeGes" value="<?php echo $gestor['cmpNomeGes'];?>" required="">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="FoneGes">Telefone:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" id="FoneGes" class="form-control input-sm" name="FoneGes" value="<?php echo $gestor['cmpFoneGes'];?>">
                </div>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="CelularGes">Celular:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" id="CelularGes" class="form-control input-sm" name="CelularGes" value="<?php echo $gestor['cmpCelularGes'];?>">
                </div>
              </div>
            </div>

            <div class="col-md-1">
                <div class="form-group">
                  <label for="inativo">Inativo:</label>
                    <?php if ($gestor['inativo'] == 1) {  ?>
                      <center><input type="checkbox" id="inativo" class="" name="inativo" checked></center>
                    <?php
                    } else { ?>
                      <center><input type="checkbox" id="inativo" class="" name="inativo"></center>
                    <?php
                    }
                    ?>
                </div>
              </div>

          </div>

        </div>
        <!-- <hr/> -->
        <div class="col-md-12">
          <input type="submit" value="Alterar" class="btn btn-primary"/>
          <a href="<?=BASE_URL;?>gestores/lista"><input type="button" value="Cancelar" class="btn btn-warning" /></a>
        </div>
      </form>
    </div>
  </div>
</div>
