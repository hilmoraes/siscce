<?php if(!empty($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}?>

<?php include("funcoes/funcoes.php"); ?>

<div class="container-fluid">
  <div class="row mb-2"></div>
</div>

<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="col-md-12">
        <h3 class="card-title" style="color: black;"><b>Editar Aditivo</b></h3>
      </div>
    </div>
    <div class="card-body">
      <form method="post" action="<?=BASE_URL;?>conveniosaditivos/update">
        <div class="tab-content">
          <div class="row">
            <div><input type="hidden" value="<?=$convenioaditivo['cmpCodCon'];?>" name="id"></div>
            <div><input type="hidden" value="<?=$convenioaditivo['cmpCodConv'];?>" name="conv"></div>

            <div><input type="hidden" id="CodEmp" value="1" name="CodEmp"></div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="CodCon">Contrato:</label>
                <select name="CodCon" id="CodCon" class="form-control select2bs4" style="width: 100%;">
                  <option value="<?php echo $convenioaditivo['cmpCodCon'];?>"><?php echo $convenioaditivo['cmpNumCon'];?></option>
                  <option value="">Escolha...</option>
                  <?php foreach($convenioscontratos as $listcon):?>
                    <option value="<?=$listcon['cmpCodCon'];?>"><?=$listcon['cmpNumCon'];?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="DtVigenciaIniAdi">Inicio Vigência:</label>
                <input type="date" id="DtVigenciaIniAdi" class="form-control input-sm" name="DtVigenciaIniAdi" value="<?php if($convenioaditivo['cmpDtVigenciaIniAdi']<='1970-01-01') {echo '';} else {echo $convenioaditivo['cmpDtVigenciaIniAdi'];}?>">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="DtVigenciaFimAdi">Fim Vigência:</label>
                <input type="date" id="DtVigenciaFimAdi" class="form-control input-sm" name="DtVigenciaFimAdi" value="<?php if($convenioaditivo['cmpDtVigenciaFimAdi']<='1970-01-01') {echo '';} else {echo $convenioaditivo['cmpDtVigenciaFimAdi'];}?>">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label for="NumAdi">Aditivo:</label>
                <input type="text" id="NumAdi" class="form-control input-sm" name="NumAdi" value="<?=$convenioaditivo['cmpNumAdi'];?>">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label for="TipoAdi">Tipo:</label>
                <select name="TipoAdi" id="TipoAdi" class="form-control input-sm">
                  <option value="<?php echo $convenioaditivo['cmpTipoAdi'];?>"><?php echo $convenioaditivo['cmpTipoAdi'];?></option>
                  <option></option>
                  <option value="ACRESCIMO">ACRESCIMO</option>
                  <option value="SUPRESSAO">SUPRESSAO</option>
                  <option value="PRAZO">PRAZO</option>
                </select>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="VrAdi">Vr. Aditivo:</label>
                  <input type="text" id="VrAdi" name="VrAdi" class="VrAdi form-control" style="display:inline-block" value="<?=$convenioaditivo['cmpVrAdi'];?>">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="VrNovoVrConAdi">Novo Vr. Contrato:</label>
                  <input type="text" id="VrNovoVrConAdi" name="VrNovoVrConAdi" class="VrNovoVrConAdi form-control" style="display:inline-block" value="<?=$convenioaditivo['cmpVrNovoVrConAdi'];?>">
              </div>
            </div>

          </div>

        </div>
        <!-- <hr/> -->
        <div class="col-md-12">
          <input type="submit" value="Alterar" class="btn btn-primary"/>
          <a href="<?=BASE_URL;?>conveniosaditivos/lista/<?php echo $convenioaditivo['cmpCodConv'];?>"><input type="button" value="Cancelar" class="btn btn-warning" /></a>
        </div>
      </form>
    </div>
  </div>
</div>
