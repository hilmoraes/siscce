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
        <h3 class="card-title" style="color: black;"><b>Lançar Convenio</b></h3>
      </div>
    </div>
    <div class="card-body">
      <form method="post" action='<?=BASE_URL;?>convenios/add'>
        <div class="tab-content">
          <div class="row">

            <div><input type="hidden" id="CodEmp" value="1" name="CodEmp"></div>

            <div class="col-md-4">
              <div class="form-group">
                <label col="CodPre">Prefeitura: <strong style="color: red;"> *</strong></label>
                <select name="CodPre" id="CodPre" class="form-control select2bs4" style="width: 100%;"  required="">
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
                  <input type="text" id="EparceriaConv" class="form-control input-sm" name="EparceriaConv" required="">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="NumConv">Nº Convênio: <strong style="color: red;"> *</strong></label>
                  <input type="text" id="NumConv" class="form-control input-sm" name="NumConv" required="">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="DtVigenciaConv">Data Vigência:</label>
                <input type="date" id="DtVigenciaConv" class="form-control input-sm" name="DtVigenciaConv" value='<?php echo date('Y-m-d'); ?>'>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="DtFimVigenciaConv">Data Fim da Vigência: <strong style="color: red;"> *</strong></label>
                <input type="date" id="DtFimVigenciaConv" class="form-control input-sm" name="DtFimVigenciaConv" style="background-color: #ffffcc;">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="OrgaoConv">Orgão: <strong style="color: red;"> *</strong></label>
                  <input type="text" id="OrgaoConv" class="form-control input-sm" name="OrgaoConv" required="">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="CodGes">Gestor:</label>
                <select name="CodGes" id="CodGes" class="form-control select2bs4" style="width: 100%;">
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
                <textarea name="ObjetoConv" rows="2" cols="2" id="ObjetoConv" class="form-control input-sm"  required=""></textarea>
              </div>
            </div>

<!--             <div class="col-md-12">
              <div class="form-group">
                <hr>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <center><label col="">DADOS FINANCEIROS DO INSTRUMENTO</label></center>
              </div>
            </div>
 -->
            <div class="col-md-2">
              <div class="form-group">
                <label col="VrTotalConv">Vr. Total:</label>
                  <input type="text" id="VrTotalConvX" name="VrTotalConvX" value="0" class="VrTotalConvX form-control" style="display:inline-block" readonly="readonly">
                  <input type="hidden" id="VrTotalConv" value="0" name="VrTotalConv">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="VrRepasseConv">Vr. Repasse:</label>
                  <input type="text" id="VrRepasseConv" name="VrRepasseConv" value="0" class="VrRepasseConv form-control" style="display:inline-block" onblur="calcConv()">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="VrCpConv">Vr. Contra Partida:</label>
                  <input type="text" id="VrCpConv" name="VrCpConv" value="0" class="VrCpConv form-control" style="display:inline-block" onblur="calcConv()">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="AditivoConv">Aditivo:</label>
                  <input type="text" id="AditivoConv" class="form-control input-sm" name="AditivoConv" style="background-color: #f4ebdc;">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="VrRepasseAConv">Vr. Repasse:</label>
                  <input type="text" id="VrRepasseAConv" name="VrRepasseAConv" value="0" class="VrRepasseAConv form-control" style="display:inline-block; background-color: #f4ebdc;" onblur="calcConv()">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="VrCpAConv">Vr. Contra Partida:</label>
                  <input type="text" id="VrCpAConv" name="VrCpAConv" value="0" class="VrCpAConv form-control" style="display:inline-block; background-color: #f4ebdc;" onblur="calcConv()">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label col="ObsConv">Observações Importantes:</label>
                <textarea name="ObsConv" rows="2" cols="5" id="ObsConv" class="form-control input-sm"></textarea>
              </div>
            </div>

          </div>
        </div>
        <!-- <hr/> -->
        <div class="col-md-12">
          <input type="submit" value="Salvar" class="btn primary"/>
          <a href="<?=BASE_URL;?>convenios/lista"><input type="button" value="Cancelar" class="btn btn-warning" /></a>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://unpkg.com/number-to-words-pt-br"></script>