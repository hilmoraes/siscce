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
        <h3 class="card-title" style="color: black;"><b>Editar Contrato</b></h3>
      </div>
    </div>
    <div class="card-body">
      <form method="post" action="<?=BASE_URL;?>convenioscontratos/update">
        <div class="tab-content">
          <div class="row">
            <div><input type="hidden" value="<?=$conveniocontrato['cmpCodCon'];?>" name="id"></div>
            <div><input type="hidden" value="<?=$conveniocontrato['cmpCodConv'];?>" name="conv"></div>

            <div><input type="hidden" id="CodEmp" value="1" name="CodEmp"></div>

            <div class="col-md-4">
              <div class="form-group">
                <label col="CodLic">Licitação:</label>
                <select name="CodLic" id="CodLic" class="form-control select2bs4" style="width: 100%;">
                  <option value="<?php echo $conveniocontrato['cmpCodLic'];?>"><?php echo $conveniocontrato['cmpNumLic'];?></option>
                  <option value="">Escolha...</option>
                  <?php foreach($convenioslicitacoes as $listlic):?>
                    <option value="<?=$listlic['cmpCodLic'];?>"><?=$listlic['cmpNumLic'];?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="DtVigenciaIniCon">Inicio Vigência:</label>
                <input type="date" id="DtVigenciaIniCon" class="form-control input-sm" name="DtVigenciaIniCon" value="<?php if($conveniocontrato['cmpDtVigenciaIniCon']<='1970-01-01') {echo '';} else {echo $conveniocontrato['cmpDtVigenciaIniCon'];}?>">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="DtVigenciaFimCon">Fim Vigência:</label>
                <input type="date" id="DtVigenciaFimCon" class="form-control input-sm" name="DtVigenciaFimCon" value="<?php if($conveniocontrato['cmpDtVigenciaFimCon']<='1970-01-01') {echo '';} else {echo $conveniocontrato['cmpDtVigenciaFimCon'];}?>">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label for="NumCon">Nº Contrato:</label>
                <input type="text" id="NumCon" class="form-control input-sm" name="NumCon" value="<?=$conveniocontrato['cmpNumCon'];?>">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="VrCon">Vr. Proposta:</label>
                  <input type="text" id="VrCon" name="VrCon" class="VrCon form-control" style="display:inline-block" value="<?=$conveniocontrato['cmpVrCon'];?>">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label col="CodPar">Empresa:</label>
                <select name="CodPar" id="CodPar" class="form-control select2bs4" style="width: 100%;">
                  <option value="<?php echo $conveniocontrato['cmpCodPar'];?>"><?php echo $conveniocontrato['cmpNomePar'];?></option>
                  <option value="">Escolha...</option>
                  <?php foreach($parceiros as $listpar):?>
                    <option value="<?=$listpar['cmpCodPar'];?>"><?=$listpar['cmpNomePar'];?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

          </div>

        </div>
        <!-- <hr/> -->
        <div class="col-md-12">
          <input type="submit" value="Alterar" class="btn btn-primary"/>
          <a href="<?=BASE_URL;?>convenioscontratos/lista/<?php echo $conveniocontrato['cmpCodConv'];?>"><input type="button" value="Cancelar" class="btn btn-warning" /></a>
        </div>
      </form>
    </div>
  </div>
</div>
