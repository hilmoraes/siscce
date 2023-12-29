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
      <h3 class="card-title" style="color: black;"><b>Relatórios de Convênios</b></h3>
      <div class="card-tools">
        <a href="<?=BASE_URL;?>" type="button" class="btn btn-tool" title="Fechar" data-card-widget=""><input type="button" value="Voltar" class="btn btn-block btn-success btn-sm"/></a>
      </div>  
    </div>
    <div class="card-body">
      <form method="post" action='<?=BASE_URL;?>convenios/relconvenios'>
        <div class="tab-content">

            <div class="row">
              <input type="hidden" id="relfuncconv" name="relfuncconv" />
              <div class="col-md-8">
                <div class="form-group">
                  <label for="relat">Relatório:</label>
                  <!-- <select name="Relat" id="Relat" class="form-control input-sm" onchange="ocultaPre(this)" required=""> -->
                    <select name="relat" id="relat" class="form-control input-sm" onclick="ocultaConv(this)">
                      <option></option>
                      <option value="relConvP">Relação de convenios Por Periodo</option>
                      <option value="relConvPGes">Relação de convenios Por Periodo e Por Gestor</option>
                      <option value="relConvPFis">Relação de convenios Por Periodo e Por Fiscal</option>
                  </select>
                </div>
              </div>
            </div>

          <div class="row">
            <div class="col-sm-6" id="data12X" style="display: none;">
              <label></label>
              <div class="col-12" style="margin-top: 0%; padding-bottom: 2%;">
                <div class="row">
                  <div class="col-sm-6"><label>Período Inicial:</label>
                    <input type="date" id="data1" name="data1" class="form-control" />
                  </div>
                  <div class="col-sm-6"><label>Período Final:</label>
                    <input type="date" id="data2" name="data2" class="form-control" />
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-4" id="CodGesX" style="display: none;">
              <label></label>
              <div class="form-group">
                <label col="CodGes">Gestor:</label>
                <select name="CodGes" id="CodGes" class="form-control select2bs4" style="width: 100%;"  >
                  <option value="">Escolha...</option>
                  <?php foreach($gestores as $listges):?>
                    <option value="<?=$listges['cmpCodGes'];?>"><?=$listges['cmpCodGes'] . ' - ' . $listges['cmpNomeGes'];?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

            <div class="col-sm-4" id="CodFisX" style="display: none;">
              <label></label>
              <div class="form-group">
                <label col="CodFis">Fiscal:</label>
                <select name="CodFis" id="CodFis" class="form-control select2bs4" style="width: 100%;"  >
                  <option value="">Escolha...</option>
                  <?php foreach($fiscais as $listfis):?>
                    <option value="<?=$listfis['cmpCodFis'];?>"><?=$listfis['cmpCodFis'] . ' - ' . $listfis['cmpNomeFis'];?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-md-3" style="margin-top: 22px;">
              <a type="button" target="_blank" class="btn btn-primary btn-form" onclick="relConv()">Gerar Relatório</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
