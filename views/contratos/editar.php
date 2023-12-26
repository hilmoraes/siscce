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
        <h3 class="card-title" style="color: black;"><b>Editar Contrato</b></h3>
      </div>
    </div>
    <div class="card-header p-2">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab"><b>Dados do contrato</b></a></li>
        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab"><b>Complementares</b></a></li>
      </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
      <form method="post" action="<?=BASE_URL;?>contratos/update">
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <div class="row">

              <div><input type="hidden" value="<?=$contrato['cmpCodLanc'];?>" name="id"></div>
              <div><input type="hidden" value="<?=$contrato['cmpTipo'];?>" name="Tipo"></div>
              <!-- <div><input type="hidden" id="PorTon" value="<?=$contrato['cmpPorTon'];?>" name="PorTon"></div> -->

              <div class="col-md-2">
                <div class="form-group">
                  <label col="Contrato">Contrato:</label>
                    <input type="text" id="Contrato" class="form-control input-sm" name="Contrato" value="<?=$contrato['cmpContrato'];?>" readonly="readonly">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label col="CodEmp">Empresa: <strong style="color: red;"> *</strong></label>
                  <select name="CodEmp" id="CodEmp" class="form-control select2bs4" style="width: 100%;" required="">
                    <option value="<?php echo $contrato['cmpCodEmp'];?>"><?php echo $contrato['cmpNomeEmp'];?></option>
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
                  <input type="date" id="DataLanc" class="form-control input-sm" name="DataLanc" value="<?=$contrato['cmpDataLanc'];?>" required="">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="DtIdent">Data Finalização:</label>
                  <input type="date" id="DtIdent" class="form-control input-sm" name="DtIdent" value="<?=$contrato['cmpDtIdent'];?>">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label for="Ident">Finalizado/Parcial:</label>
                  <select name="Ident" id="Ident" class="form-control input-sm">
                    <option value="<?php echo $contrato['cmpIdent'];?>"><?php echo $contrato['cmpIdent'];?></option>
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
                    <option value="<?php echo $contrato['cmpCodFor'];?>"><?php echo $contrato['cmpNomFor'];?></option>
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
                    <option value="<?php echo $contrato['cmpCodCli'];?>"><?php echo $contrato['cmpNomCli'];?></option>
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
                    <option value="<?php echo $contrato['cmpCodPro'];?>"><?php echo $contrato['cmpNomePro'];?></option>
                    <option value="">Escolha... </option>
                    <?php foreach($produtos as $listpro):?>
                      <option value="<?=$listpro['cmpCodPro'];?>"><?=$listpro['NomePro'];?></option>
                    <?php endforeach;?>
                  </select>

                  <input type="hidden" id="PorTonelada" name="PorTon" value="<?=$contrato['cmpPorTon'];?>" readonly>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label col="Embalagem">Embalagem:</label>
                    <input type="text" id="Embalagem" class="form-control input-sm" name="Embalagem" value="<?=$contrato['cmpEmbalagem'];?>">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label col="Embarque">Embarque:</label>
                    <input type="text" id="Embarque" class="form-control input-sm" name="Embarque" value="<?=$contrato['cmpEmbarque'];?>">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="QtdSaca">Qtd. Sacas:</label>
                    <input type="text" id="QtdSaca" name="QtdSaca" value="<?=$contrato['cmpQtdSaca'];?>" class="QtdSaca form-control" style="display:inline-block" onblur="calcContrato()">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="QtdKgSaca">Kg p/ Saca:</label>
                    <input type="text" id="QtdKgSaca" name="QtdKgSaca" value="<?=$contrato['cmpQtdKgSaca'];?>" class="QtdKgSaca form-control" style="display:inline-block" onblur="calcContrato()">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="QtdTonX">Qtd. Toneladas: <strong style="color: red;"> *</strong></label>
                    <input type="text" id="QtdTonX" name="QtdTonX" value="<?=$contrato['cmpQtdTon'];?>" class="QtdTonX form-control" style="display:inline-block" onblur="calcContrato()" required="">
                    <input type="hidden" id="QtdTon" value="<?=$contrato['cmpQtdTon'];?>" name="QtdTon">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="QtdKg">Qtd. Kg Total:</label>
                    <input type="text" id="QtdKgX" class="form-control input-sm" name="QtdKgX" value="<?=$contrato['cmpQtdKg'];?>" readonly="readonly">
                    <input type="hidden" id="QtdKg"  value="<?=$contrato['cmpQtdKg'];?>" name="QtdKg">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="VrKg">Vr. Saco/Tonelada:</label>
                    <input type="text" id="VrKg" name="VrKg" value="<?=$contrato['cmpVrKg'];?>" class="VrKg form-control" style="display:inline-block" onblur="calcContrato()">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="Preco">Vr. Total:</label>
                    <input type="text" id="PrecoX" name="PrecoX" value="<?=$contrato['cmpPreco'];?>" class="PrecoX form-control" style="display:inline-block" readonly="readonly">
                    <input type="hidden" id="Preco" value="<?=$contrato['cmpPreco'];?>" name="Preco">
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label col="DescCarreg">Descrição do Carregamento:</label>
                  <textarea name="DescCarreg" rows="4" cols="5" id="DescCarreg" class="form-control input-sm"><?php echo $contrato['cmpDescCarreg'];?></textarea>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="DataCancel">Data Cancelamento: <strong style="color: red;"> *</strong></label>
                  <input type="date" id="DataCancel" class="form-control input-sm" name="DataCancel" value="<?=$contrato['cmpDataCancel'];?>">
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
                    <option value="<?php echo $contrato['cmpTpFrete'];?>"><?php echo $contrato['cmpTpFrete'];?></option>
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
                    <option value="<?php echo $contrato['cmpQtde'];?>"><?php echo $contrato['cmpQtde'];?></option>
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
                    <input type="text" id="CondPgto" class="form-control input-sm" name="CondPgto" value="<?=$contrato['cmpCondPgto'];?>">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="Carretas">Carretas:</label>
                    <input type="text" id="Carretas" class="form-control input-sm" name="Carretas" value="<?=$contrato['cmpCarretas'];?>">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="Funrural">Funrural:</label>
                    <input type="text" id="Funrural" class="form-control input-sm" name="Funrural" value="<?=$contrato['cmpFunRural'];?>">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label col="LocRetirada">Local de Retirada:</label>
                    <input type="text" id="LocRetirada" class="form-control input-sm" name="LocRetirada" value="<?=$contrato['cmpLocRetirada'];?>">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label for="Prazo">Prazo Venc.:</label>
                  <select name="Prazo" id="Prazo" class="form-control input-sm">
                    <option value="<?php echo $contrato['cmpPrazo'];?>"><?php echo $contrato['cmpPrazo'];?></option>
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
                  <input type="date" id="DataVF" class="form-control input-sm" name="DataVF" value="<?=$contrato['cmpDataVF'];?>">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label col="V">Vendedor:</label>
                    <input type="text" id="V" class="form-control input-sm" name="V" value="<?=$contrato['cmpV'];?>">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="VrV">Vr. Vendedor:</label>
                    <input type="text" id="VrV" name="VrV" value="<?=$contrato['cmpVrV'];?>" class="VrV form-control" style="display:inline-block">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label col="Contratante">Contratante:</label>
                  <select name="Contratante" id="Contratante" class="form-control select2bs4" style="width: 100%;">
                    <option value="<?php echo $contrato['cmpContratante'];?>"><?php echo $contrato['cmpNomCliC'];?></option>
                    <option value="">Escolha...</option>
                    <?php foreach($contratantes as $listcon):?>
                      <option value="<?=$listcon['cmpCodCli'];?>"><?=$listcon['cmpNomCli'];?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- <hr/> -->
        <div class="col-md-12">
          <input type="submit" value="Alterar" class="btn btn-primary"/>
          <a href="<?=BASE_URL;?>contratos/lista"><input type="button" value="Cancelar" class="btn btn-warning" /></a>
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