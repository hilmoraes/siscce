<?php if(!empty($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}?>

<?php 
  include("funcoes/funcoes.php");
  $tipopagamento = tipoPagamento::getTipoPagamentoArray();
  $situacaopagamento = situacaoPagamento::getSituacaoPagamentoArray();
?>

<div class="container-fluid">
  <div class="row mb-2"></div>
</div>

<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="col-md-12">
        <h3 class="card-title" style="color: black;"><b>Editar Pagamento</b></h3>
      </div>
    </div>
    <div class="card-body">
      <form method="post" action="<?=BASE_URL;?>conveniospagamentos/update">
        <div class="tab-content">
          <div class="row">
            <div><input type="hidden" value="<?=$conveniopagamento['cmpCodPag'];?>" name="id"></div>
            <div><input type="hidden" value="<?=$conveniopagamento['cmpCodConv'];?>" name="conv"></div>

            <div><input type="hidden" id="CodEmp" value="1" name="CodEmp"></div>

            <div class="col-md-3">
              <div class="form-group">
                <label col="DtPag">Data:</label>
                <input type="date" id="DtPag" class="form-control input-sm" name="DtPag" value="<?php echo $conveniopagamento['cmpDtPag'];?>">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="DocPag">Documento:</label>
                <input type="text" id="DocPag" class="form-control input-sm" name="DocPag" value="<?php echo $conveniopagamento['cmpDocPag'];?>">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="VrRepassePag">Repasse:</label>
                  <input type="text" id="VrRepassePag" name="VrRepassePag" class="VrRepassePag form-control" style="display:inline-block" value="<?php echo $conveniopagamento['cmpVrRepassePag'];?>" onblur="calcPag()">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="VrCpPag">Contra Partida:</label>
                  <input type="text" id="VrCpPag" name="VrCpPag" class="VrCpPag form-control" style="display:inline-block" value="<?php echo $conveniopagamento['cmpVrCpPag'];?>" onblur="calcPag()">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="VrTotalPag">Vr. Total:</label>
                  <input type="text" id="VrTotalPagX" name="VrTotalPagX" class="VrTotalPagX form-control" style="display:inline-block" value="<?php echo $conveniopagamento['cmpVrTotalPag'];?>" readonly="readonly">
                  <input type="hidden" id="VrTotalPag" name="VrTotalPag" value="<?php echo $conveniopagamento['cmpVrTotalPag'];?>">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="TipoPag">Tipo:</label>
                <select name="TipoPag" id="TipoPag" class="form-control input-sm">
                  <option value="<?php echo $conveniopagamento['cmpTipoPag'];?>"><?php echo $conveniopagamento['cmpTipoPag'];?></option>
                  <option></option>
                  <?php
                    foreach ($tipopagamento as $tipopgto) {
                      echo "<option value=\"$tipopgto\">$tipopgto</option>";
                    }
                  ?>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="SituacaoPag">Situação:</label>
                <select name="SituacaoPag" id="SituacaoPag" class="form-control input-sm">
                  <option value="<?php echo $conveniopagamento['cmpSituacaoPag'];?>"><?php echo $conveniopagamento['cmpSituacaoPag'];?></option>
                  <option></option>
                  <?php
                    foreach ($situacaopagamento as $situacaopgto) {
                      echo "<option value=\"$situacaopgto\">$situacaopgto</option>";
                    }
                  ?>
                  
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label col="CodPar">Empresa:</label>
                <select name="CodPar" id="CodPar" class="form-control select2bs4" style="width: 100%;">
                  <option value="<?php echo $conveniopagamento['cmpCodPar'];?>"><?php echo $conveniopagamento['cmpNomePar'];?></option>
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
          <a href="<?=BASE_URL;?>conveniospagamentos/lista/<?php echo $conveniopagamento['cmpCodConv'];?>"><input type="button" value="Cancelar" class="btn btn-warning" /></a>
        </div>
      </form>
    </div>
  </div>
</div>
