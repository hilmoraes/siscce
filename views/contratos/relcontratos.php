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
      <h3 class="card-title" style="color: black;"><b>Relatórios de Contratos</b></h3>
      <div class="card-tools">
        <a href="<?=BASE_URL;?>" type="button" class="btn btn-tool" title="Fechar" data-card-widget=""><input type="button" value="Voltar" class="btn btn-block btn-success btn-sm"/></a>
      </div>  
    </div>
    <div class="card-body">
      <form method="post" action='<?=BASE_URL;?>contratos/relcontratos'>
        <div class="tab-content">

            <div class="row">
              <input type="hidden" id="relfunccon" name="relfunccon" />
              <div class="col-md-8">
                <div class="form-group">
                  <label for="relat">Relatório:</label>
                  <!-- <select name="Relat" id="Relat" class="form-control input-sm" onchange="ocultaPre(this)" required=""> -->
                    <select name="relat" id="relat" class="form-control input-sm" onclick="ocultaCon(this)">
                      <option></option>
                      <option value="relConP">Relação de Contratos Por Periodo</option>
                      <option value="relConPCli">Relação de Contratos Por Periodo e Por Cliente</option>
                      <option value="relConPFor">Relação de Contratos Por Periodo e Por Fornecedor</option>
                      <option value="relConPTipo">Relação de Contratos Por Periodo e Por Tipo</option>
                      <option value="relConPTipoPro">Relação de Contratos Por Periodo, Por Tipo e Produto</option>
                      <option value="relConPEstoqueDet">Relação de Estoque Por Periodo (Detalhado)</option>
                      <option value="relConPEstoquePro">Relação de Estoque Por Periodo e Produto</option>
                      <option value="relConPEstoqueTipoPro">Relação de Estoque Por Periodo, Por Tipo e Produto</option>
                      <option value="relConPCancel">Relação de Contratos Por Periodo Cancelados</option>
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

            <div class="col-sm-4" id="CodForX" style="display: none;">
              <label></label>
              <div class="form-group">
                <label col="CodFor">Fornecedor:</label>
                <select name="CodFor" id="CodFor" class="form-control select2bs4" style="width: 100%;"  >
                  <option value="">Escolha...</option>
                  <?php foreach($fornecedores as $listfor):?>
                    <option value="<?=$listfor['cmpCodFor'];?>"><?=$listfor['cmpCodFor'] . ' - ' . $listfor['cmpNomFor'];?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

            <div class="col-sm-4" id="CodCliX" style="display: none;">
              <label></label>
              <div class="form-group">
                <label col="CodCli">Cliente:</label>
                <select name="CodCli" id="CodCli" class="form-control select2bs4" style="width: 100%;"  >
                  <option value="">Escolha...</option>
                  <?php foreach($clientes as $listcli):?>
                    <option value="<?=$listcli['cmpCodCli'];?>"><?=$listcli['cmpCodCli'] . ' - ' . $listcli['cmpNomCli'];?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

            <div class="col-sm-4" id="tipocX" style="display: none;">
              <label></label>
              <div class="form-group">
                <label col="tipoc">Tipo:</label>
                <select name="tipoc" id="tipoc" class="form-control input-sm">
                  <option value="1">COMPRA</option>
                  <option value="2">VENDA</option>
                </select>
              </div>
            </div>

            <div class="col-sm-4" id="CodProX" style="display: none;">
              <label></label>
              <div class="form-group">
                <label col="CodPro">Produto:</label>
                <select name="CodPro" id="CodPro" class="form-control select2bs4" style="width: 100%;"  >
                  <option value="">Escolha...</option>
                  <?php foreach($produtos as $listpro):?>
                    <option value="<?=$listpro['cmpCodPro'];?>"><?=$listpro['cmpCodPro'] . ' - ' . $listpro['cmpNomePro'];?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-md-3" style="margin-top: 22px;">
              <a type="button" target="_blank" class="btn btn-primary btn-form" onclick="relCon()">Gerar Relatório</a>
              <a type="button" target="_blank" class="btn btn-primary btn-form" onclick="csvCon()">Gerar CSV</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
