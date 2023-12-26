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
        <h3 class="card-title" style="color: black;"><b>Lançar Contrato</b></h3>
      </div>
    </div>
    <div class="card-header p-2">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab"><b>Dados do contrato</b></a></li>
        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab"><b>Complementares</b></a></li>
<!--         <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab"><b>Faturamento e Garantias</b></a></li>
        <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab"><b>Imformações Complementares</b></a></li> -->
      </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
      <form method="post" action='<?=BASE_URL;?>contratos/add'>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <div class="row">

              <!-- <div><input type="hidden" id="CodEmp" value="1" name="CodEmp"></div> -->
              <div><input type="hidden" id="Tipo" value="COMPRA" name="Tipo"></div>
              <div><input type="hidden" id="PorTon" value="0" name="PorTon"></div>

              <div class="col-md-3">
                <div class="form-group">
                  <label col="CodEmp">Empresa: <strong style="color: red;"> *</strong></label>
                  <select name="CodEmp" id="CodEmp" class="form-control select2bs4" style="width: 100%;" required="">
                    <!-- <option value="">Escolha...</option> -->
                    <?php foreach($empresas as $listemp):?>
                      <option value="<?=$listemp['cmpCodEmp'];?>"><?=$listemp['cmpNomeEmp'];?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="DataLanc">Data Contrato: <strong style="color: red;"> *</strong></label>
                  <input type="date" id="DataLanc" class="form-control input-sm" name="DataLanc" value='<?php echo date('Y-m-d'); ?>' required="">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="DtIdent">Data Finalização:</label>
                  <input type="date" id="DtIdent" class="form-control input-sm" name="DtIdent">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label for="Ident">Finalizado/Parcial:</label>
                  <select name="Ident" id="Ident" class="form-control input-sm">
                    <option value="">Selecione...</option>
                    <option value="finalizado">finalizado</option>
                    <option value="parcial">parcial</option>
                  </select>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label col="CodFor">Fornecedor: <strong style="color: red;"> *</strong></label>
                  <select name="CodFor" id="CodFor" class="form-control select2bs4" style="width: 100%;" required="">
                    <option value="">Escolha...</option>
                    <?php foreach($fornecedores as $listfor):?>
                      <option value="<?=$listfor['cmpCodFor'];?>"><?=$listfor['cmpNomFor'];?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label col="CodCli">Cliente: <strong style="color: red;"> *</strong></label>
                  <select name="CodCli" id="CodCli" class="form-control select2bs4" style="width: 100%;" required="">
                    <option value="">Escolha...</option>
                    <?php foreach($clientes as $listcli):?>
                      <option value="<?=$listcli['cmpCodCli'];?>"><?=$listcli['cmpNomCli'];?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="CodPro">Produto: <strong style="color: red;"> *</strong></label>
                  <select name="CodPro" id="CodPro" class="form-control select2bs4" style="width: 100%;" onchange="atualizarPorTon()" required="">
                    <option value="">Escolha... </option>
                    <?php foreach($produtos as $listpro):?>
                      <option value="<?=$listpro['cmpCodPro'];?>"><?=$listpro['NomePro'];?></option>
                    <?php endforeach;?>
                  </select>

                  <input type="hidden" id="PorTonelada" name="PorTon" readonly>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label col="Embalagem">Embalagem:</label>
                    <input type="text" id="Embalagem" class="form-control input-sm" name="Embalagem">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label col="Embarque">Embarque:</label>
                    <input type="text" id="Embarque" class="form-control input-sm" name="Embarque">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="QtdSaca">Qtd. Sacas:</label>
                    <input type="text" id="QtdSaca" class="form-control input-sm" name="QtdSaca" value="0" onblur="calcContrato()">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="QtdKgSaca">Kg p/ Saca:</label>
                    <input type="text" id="QtdKgSaca" class="form-control input-sm" name="QtdKgSaca" value="60" onblur="calcContrato()">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="QtdTonX">Qtd. Toneladas: <strong style="color: red;"> *</strong></label>
                    <input type="text" id="QtdTonX" name="QtdTonX" value="0" class="QtdTonX form-control" style="display:inline-block" onblur="calcContrato()" required="">
                    <input type="hidden" id="QtdTon" value="0" name="QtdTon">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="QtdKg">Qtd. Kg Total:</label>
                    <input type="text" id="QtdKgX" class="form-control input-sm" name="QtdKgX" value="0" readonly="readonly">
                    <input type="hidden" id="QtdKg" value="0" name="QtdKg">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="VrKg">Vr. Saco/Tonelada:</label>
                    <input type="text" id="VrKg" name="VrKg" value="0" class="VrKg form-control" style="display:inline-block" onblur="calcContrato()">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="Preco">Vr. Total:</label>
                    <input type="text" id="PrecoX" name="PrecoX" value="0" class="PrecoX form-control" style="display:inline-block" readonly="readonly">
                    <input type="hidden" id="Preco" value="0" name="Preco">
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label col="DescCarreg">Descrição do Carregamento:</label>
                  <textarea name="DescCarreg" rows="4" cols="5" id="DescCarreg" class="form-control input-sm"></textarea>
                </div>
              </div>

            </div>
          </div>

          <div class="tab-pane" id="tab_2">
            <div class="row">

              <div class="col-md-2">
                <div class="form-group">
                  <label for="TpFrete">Tp. Frete:</label>
                  <select name="TpFrete" id="TpFrete" class="form-control input-sm">
                    <option value="">Selecione...</option>
                    <option value="CIF">CIF</option>
                    <option value="FOB">FOB</option>
                  </select>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="Qtde">Nota e Icms M.:</label>
                  <select name="Qtde" id="Qtde" class="form-control input-sm">
                    <option value="">Selecione...</option>
                    <option value="COMPRADOR">COMPRADOR</option>
                    <option value="VENDEDOR">VENDEDOR</option>
                    <option value="VENDEDORDE">VENDEDOR P/ DENTRO DO ESTADO</option>
                  </select>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label col="CondPgto">Condições de Pgto.:</label>
                    <input type="text" id="CondPgto" class="form-control input-sm" name="CondPgto">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="Carretas">Carretas:</label>
                    <input type="text" id="Carretas" class="form-control input-sm" name="Carretas">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="Funrural">Funrural:</label>
                    <input type="text" id="Funrural" class="form-control input-sm" name="Funrural">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label col="LocRetirada">Local de Retirada:</label>
                    <input type="text" id="LocRetirada" class="form-control input-sm" name="LocRetirada">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label for="Prazo">Prazo Venc.:</label>
                  <select name="Prazo" id="Prazo" class="form-control input-sm">
                    <option value="0">0</option>
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="45">45</option>
                    <option value="60">60</option>
                  </select>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="DataVF">Data Pagamento:</label>
                  <input type="date" id="DataVF" class="form-control input-sm" name="DataVF">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label col="V">Vendedor:</label>
                    <input type="text" id="V" class="form-control input-sm" name="V">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="VrV">Vr. Vendedor:</label>
                    <input type="text" id="VrV" name="VrV" value="0" class="VrV form-control" style="display:inline-block">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label col="Contratante">Contratante:</label>
                  <select name="Contratante" id="Contratante" class="form-control select2bs4" style="width: 100%;">
                    <option value="">Escolha...</option>
                    <?php foreach($contratantes as $listcon):?>
                      <option value="<?=$listcon['cmpCodCli'];?>"><?=$listcon['cmpNomCli'];?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>

<!--               <div class="col-md-4">
                <div class="form-group">
                  <label col="Extenso">Extenso:</label>
                    <input type="text" id="Extenso" class="form-control input-sm" name="Extenso">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label col="Extenso1">Extenso 1:</label>
                    <input type="text" id="Extenso1" class="form-control input-sm" name="Extenso1">
                </div>
              </div> -->

            </div>
          </div>
        </div>
        <!-- <hr/> -->
        <div class="col-md-12">
          <input type="submit" value="Salvar" class="btn btn-primary"/>
          <a href="<?=BASE_URL;?>contratos/lista"><input type="button" value="Cancelar" class="btn btn-warning" /></a>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://unpkg.com/number-to-words-pt-br"></script>