<?php if(!empty($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}?>

<!-- <?php $pre = $_SESSION['codPre']; ?> -->

<?php include("funcoes/funcoes.php"); ?>

<div class="container-fluid">
  <div class="row mb-2"></div>
</div>

<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="color: black;"><b>Relatórios de Parceiros</b></h3>
      <div class="card-tools">
        <a href="<?=BASE_URL;?>" type="button" class="btn btn-tool" title="Fechar" data-card-widget=""><input type="button" value="Voltar" class="btn btn-block btn-success btn-sm"/></a>
      </div>  
    </div>
    <div class="card-body">
      <form method="post" action='<?=BASE_URL;?>parceiros/relparceiros'>
        <div class="tab-content">

            <div class="row">
              <input type="hidden" id="relfuncpar" name="relfuncpar" />
              <div class="col-md-8">
                <div class="form-group">
                  <label for="relat">Relatório:</label>
                  <!-- <select name="Relat" id="Relat" class="form-control input-sm" onchange="ocultaPre(this)" required=""> -->
                    <select name="relat" id="relat" class="form-control input-sm" onclick="ocultaPar(this)">
                      <option></option>
                      <option value="relParD">Relação de Parceiro (Detalhado)</option>
                      <option value="relParR">Relação de Parceiro (Resumido)</option>
                  </select>
                </div>
              </div>
            </div>

          <div class="row">

            <div class="col-md-2" id="inativoX">
              <label>(1)Inativo ou (0)Ativo:</label>
                <input type="text" name="inativo" id="inativo" class="form-control input-sm"/>
            </div>

          </div>

          <div class="row">
            <div class="col-md-3" style="margin-top: 22px;">
              <a type="button" target="_blank" class="btn btn-primary btn-form" onclick="relPar()">Gerar Relatório</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
