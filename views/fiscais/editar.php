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
        <h3 class="card-title" style="color: black;"><b>Editar Fiscal</b></h3>
      </div>
    </div>
    <div class="card-body">
      <form method="post" action="<?=BASE_URL;?>fiscais/update">
        <div class="tab-content">
          <div class="row">
            <div><input type="hidden" value="<?=$fiscal['cmpCodFis'];?>" name="id"></div>

            <div class="col-md-7">
              <div class="form-group">
                <label for="NomeFis">Fiscal:</label>
                <input type="text" id="NomeFis" class="form-control input-sm" name="NomeFis" value="<?php echo $fiscal['cmpNomeFis'];?>" required="">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="FoneFis">Telefone:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" id="FoneFis" class="form-control input-sm" name="FoneFis" value="<?php echo $fiscal['cmpFoneFis'];?>">
                </div>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="CelularFis">Celular:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" id="CelularFis" class="form-control input-sm" name="CelularFis" value="<?php echo $fiscal['cmpCelularFis'];?>">
                </div>
              </div>
            </div>

            <div class="col-md-1">
                <div class="form-group">
                  <label for="inativo">Inativo:</label>
                    <?php if ($fiscal['inativo'] == 1) {  ?>
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
          <a href="<?=BASE_URL;?>fiscais/lista"><input type="button" value="Cancelar" class="btn btn-warning" /></a>
        </div>
      </form>
    </div>
  </div>
</div>
