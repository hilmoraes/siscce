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
      <div class="col-md-10">
        <h3 class="card-title" style="color: black;"><b>Editar Desembolso</b></h3>
      </div>
    </div>
    <div class="card-body">
      <form method="post" action="<?=BASE_URL;?>conveniosdesembolsos/update">
        <div class="tab-content">
          <div class="row">
            <div><input type="hidden" value="<?=$conveniodesembolso['cmpCodDes'];?>" name="id"></div>
            <div><input type="hidden" value="<?=$conveniodesembolso['cmpCodConv'];?>" name="conv"></div>

            <div><input type="hidden" id="CodEmp" value="1" name="CodEmp"></div>

            <div class="col-md-3">
              <div class="form-group">
                <label col="DtDes">Data:</label>
                <input type="date" id="DtDes" class="form-control input-sm" name="DtDes" value="<?php if($conveniodesembolso['cmpDtDes']<='1970-01-01') {echo '';} else {echo $conveniodesembolso['cmpDtDes'];}?>">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label col="VrRepasseDes">Repasse:</label>
                  <input type="text" id="VrRepasseDes" name="VrRepasseDes" class="VrRepasseDes form-control" style="display:inline-block" value="<?=$conveniodesembolso['cmpVrRepasseDes'];?>" onblur="calcDes()">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label col="VrCpDes">Contra Partida:</label>
                  <input type="text" id="VrCpDes" name="VrCpDes" class="VrCpDes form-control" style="display:inline-block" value="<?=$conveniodesembolso['cmpVrCpDes'];?>" onblur="calcDes()">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label col="VrTotalDes">Vr. Total:</label>
                  <input type="text" id="VrTotalDesX" name="VrTotalDesX" class="VrTotalDesX form-control" style="display:inline-block" value="<?php echo $conveniodesembolso['cmpVrTotalDes'];?>" readonly="readonly">
                  <input type="hidden" id="VrTotalDes" name="VrTotalDes" value="<?php echo $conveniodesembolso['cmpVrTotalDes'];?>">
              </div>
            </div>

          </div>

        </div>
        <!-- <hr/> -->
        <div class="col-md-12">
          <input type="submit" value="Alterar" class="btn btn-primary"/>
          <a href="<?=BASE_URL;?>conveniosdesembolsos/lista/<?php echo $conveniodesembolso['cmpCodConv'];?>"><input type="button" value="Cancelar" class="btn btn-warning" /></a>
        </div>
      </form>
    </div>
  </div>
</div>
