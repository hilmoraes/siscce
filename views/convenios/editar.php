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
      <div class="col-md-6">
        <h3 class="card-title" style="color: black;"><b>Editar Convênio</b></h3>
      </div>
    </div>
    <div class="card-body">
      <form method="post" action="<?=BASE_URL;?>convenios/update">
        <div class="tab-content">
          <div class="row">

            <div><input type="hidden" value="<?=$convenio['cmpCodConv'];?>" name="id"></div>
            <div><input type="hidden" id="CodEmp" value="<?=$convenio['cmpCodEmp'];?>" name="CodEmp"></div>

            <div class="col-md-4">
              <div class="form-group">
                <label col="CodPre">Prefeitura: <strong style="color: red;"> *</strong></label>
                <select name="CodPre" id="CodPre" class="form-control select2bs4" style="width: 100%;"  required="">
                  <option value="<?php echo $convenio['cmpCodPre'];?>"><?php echo $convenio['cmpNomPre'];?></option>
                  <option value="">Escolha...</option>
                  <?php foreach($prefeituras as $listpre):?>
                    <option value="<?=$listpre['cmpCodPre'];?>"><?=$listpre['cmpNomPre'];?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="EparceriaConv">E-Parceria: <strong style="color: red;"> *</strong></label>
                  <input type="text" id="EparceriaConv" class="form-control input-sm" name="EparceriaConv" value="<?=$convenio['cmpEparceriaConv'];?>" required="">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="NumConv">Nº Convênio: <strong style="color: red;"> *</strong></label>
                  <input type="text" id="NumConv" class="form-control input-sm" name="NumConv" value="<?=$convenio['cmpNumConv'];?>" required="">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="DtVigenciaConv">Data Vigência:</label>
                <input type="date" id="DtVigenciaConv" class="form-control input-sm" name="DtVigenciaConv" value="<?=$convenio['cmpDtVigenciaConv'];?>">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="DtFimVigenciaConv">Data Fim da Vigência: <strong style="color: red;"> *</strong></label>
                <input type="date" id="DtFimVigenciaConv" class="form-control input-sm" name="DtFimVigenciaConv" style="background-color: #ffffcc;" value="<?php if($convenio['cmpDtFimVigenciaConv']<='1970-01-01') {echo '';} else {echo $convenio['cmpDtFimVigenciaConv'];}?>">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="OrgaoConv">Orgão: <strong style="color: red;"> *</strong></label>
                  <input type="text" id="OrgaoConv" class="form-control input-sm" name="OrgaoConv" value="<?=$convenio['cmpOrgaoConv'];?>" required="">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="CodGes">Gestor:</label>
                <select name="CodGes" id="CodGes" class="form-control select2bs4" style="width: 100%;">
                  <option value="<?php echo $convenio['cmpCodGes'];?>"><?php echo $convenio['cmpNomeGes'];?></option>
                  <option value="">Escolha...</option>
                  <?php foreach($gestores as $listges):?>
                    <option value="<?=$listges['cmpCodGes'];?>"><?=$listges['cmpNomeGes'];?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="CodFis">Fiscal:</label>
                <select name="CodFis" id="CodFis" class="form-control select2bs4" style="width: 100%;">
                  <option value="<?php echo $convenio['cmpCodFis'];?>"><?php echo $convenio['cmpNomeFis'];?></option>
                  <option value="">Escolha...</option>
                  <?php foreach($fiscais as $listfis):?>
                    <option value="<?=$listfis['cmpCodFis'];?>"><?=$listfis['cmpNomeFis'];?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label col="ObjetoConv">Objeto: <strong style="color: red;"> *</strong></label>
                <textarea name="ObjetoConv" rows="2" cols="2" id="ObjetoConv" class="form-control input-sm"  required=""><?php echo $convenio['cmpObjetoConv'];?></textarea>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="VrTotalConv">Vr. Total:</label>
                  <input type="text" id="VrTotalConvX" name="VrTotalConvX" class="VrTotalConvX form-control" style="display:inline-block" value="<?=$convenio['cmpVrTotalConv'];?>" readonly="readonly">
                  <input type="hidden" id="VrTotalConv" name="VrTotalConv" value="<?=$convenio['cmpVrTotalConv'];?>">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="VrRepasseConv">Vr. Repasse:</label>
                  <input type="text" id="VrRepasseConv" name="VrRepasseConv" class="VrRepasseConv form-control" style="display:inline-block" value="<?=$convenio['cmpVrRepasseConv'];?>" onblur="calcConv()">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="VrCpConv">Vr. Contra Partida:</label>
                  <input type="text" id="VrCpConv" name="VrCpConv" class="VrCpConv form-control" style="display:inline-block" value="<?=$convenio['cmpVrCpConv'];?>" onblur="calcConv()">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="AditivoConv">Aditivo:</label>
                  <input type="text" id="AditivoConv" class="form-control input-sm" name="AditivoConv" style="background-color: #f4ebdc;" value="<?=$convenio['cmpAditivoConv'];?>">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="VrRepasseAConv">Vr. Repasse:</label>
                  <input type="text" id="VrRepasseAConv" name="VrRepasseAConv" class="VrRepasseAConv form-control" style="display:inline-block; background-color: #f4ebdc;" value="<?=$convenio['cmpVrRepasseAConv'];?>" onblur="calcConv()">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="VrCpAConv">Vr. Contra Partida:</label>
                  <input type="text" id="VrCpAConv" name="VrCpAConv" class="VrCpAConv form-control" style="display:inline-block; background-color: #f4ebdc;" value="<?=$convenio['cmpVrCpAConv'];?>" onblur="calcConv()">
              </div>
            </div>

            <div class="col-md-10">
              <div class="form-group">
                <label col="ObsConv">Observações Importantes:</label>
                <textarea name="ObsConv" rows="2" cols="5" id="ObsConv" class="form-control input-sm"><?php echo $convenio['cmpObsConv'];?></textarea>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="DataCancel">Data Cancelamento:</label>
                <input type="date" id="DataCancel" class="form-control input-sm" name="DataCancel" style="background-color: #ffffcc;" value="<?php if($convenio['cmpDataCancel']<='1970-01-01') {echo '';} else {echo $convenio['cmpDataCancel'];}?>">
              </div>
            </div>

          </div>
        </div>
        <!-- <hr/> -->
        <div class="col-md-12">
          <input type="submit" value="Alterar" class="btn primary"/>
          <a href="<?=BASE_URL;?>convenios/lista"><input type="button" value="Cancelar" class="btn btn-warning" /></a>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
  var DataLanc = document.getElementById('DataLanc').value;
  if (DataLanc == "0001-01-01") {
      document.getElementById('DataLanc').value = null;
  }

  var DtIdent = document.getElementById('DtIdent').value;
  if (DtIdent == "0001-01-01") {
      document.getElementById('DtIdent').value = null;
  }

  var DataCancel = document.getElementById('DataCancel').value;
  if (DataCancel == "0001-01-01") {
      document.getElementById('DataCancel').value = null;
  }

  var DataVF = document.getElementById('DataVF').value;
  if (DataVF == "0001-01-01") {
      document.getElementById('DataVF').value = null;
  }
</script>