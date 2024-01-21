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
        <h3 class="card-title" style="color: black;"><b>Editar Licitação</b></h3>
      </div>
    </div>
    <div class="card-body">
      <form method="post" action="<?=BASE_URL;?>convenioslicitacoes/update">
        <div class="tab-content">
          <div class="row">
            <div><input type="hidden" value="<?=$conveniolicitacao['cmpCodLic'];?>" name="id"></div>
            <div><input type="hidden" value="<?=$conveniolicitacao['cmpCodConv'];?>" name="conv"></div>

            <div><input type="hidden" id="CodEmp" value="1" name="CodEmp"></div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="DtHomologacaoLic">Data Homologação:</label>
                <input type="date" id="DtHomologacaoLic" class="form-control input-sm" name="DtHomologacaoLic" value="<?php echo $conveniolicitacao['cmpDtHomologacaoLic'];?>">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label for="ModalidadeLic">Modalidade:</label>
                <input type="text" id="ModalidadeLic" class="form-control input-sm" name="ModalidadeLic" value="<?php echo $conveniolicitacao['cmpModalidadeLic'];?>">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label for="NumLic">Número:</label>
                <input type="text" id="NumLic" class="form-control input-sm" name="NumLic" value="<?php echo $conveniolicitacao['cmpNumLic'];?>">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="VrPropostaLic">Vr. Proposta:</label>
                  <input type="text" id="VrPropostaLic" name="VrPropostaLic" class="VrPropostaLic form-control" style="display:inline-block" value="<?php echo $conveniolicitacao['cmpVrPropostaLic'];?>">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label col="CodPar">Empresa:</label>
                <select name="CodPar" id="CodPar" class="form-control select2bs4" style="width: 100%;">
                  <option value="<?php echo $conveniolicitacao['cmpCodPar'];?>"><?php echo $conveniolicitacao['cmpNomePar'];?></option>
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
          <a href="<?=BASE_URL;?>convenioslicitacoes/lista/<?php echo $conveniolicitacao['cmpCodConv'];?>"><input type="button" value="Cancelar" class="btn btn-warning" /></a>
        </div>
      </form>
    </div>
  </div>
</div>
