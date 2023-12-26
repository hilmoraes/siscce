<?php if(!empty($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}?>

<?php include("funcoes/funcoes.php"); ?>

<div class="container-fluid">
  <div class="row mb-2"></div>
</div>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
      <div class="card card-default col-md-10">
        <div class="card-header">
          <h3 class="card-title" style="color: black;"><b>Pagamentos do contrato  <?=str_replace("_", "/", $contra);?></b></h3>
          <div class="card-tools">
            <a href="<?=BASE_URL;?>contratos/lista/" type="button" class="btn btn-tool" title="Voltar" data-card-widget=""><input type="button" value="Voltar" class="btn btn-block btn-success btn-sm"/></a>
          </div> 
        </div>

        <div class="cadCor">
          <form method="post" action='<?=BASE_URL;?>contratossub/add'>
            <div class="tab-content">
              <div class="row">

                <div><input type="hidden" value="<?=$id;?>" name="id"></div>
                <div><input type="hidden" value="<?=$contra;?>" name="contra"></div>
                <!-- <div><input type="hidden" id="CodEmp" value="1" name="CodEmp"></div> -->

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="DtBaixaCon">Data da Baixa:</label>
                    <input type="date" id="DtBaixaCon" class="form-control input-sm cadFonte" name="DtBaixaCon" value='<?php echo date('Y-m-d'); ?>'>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="VrCon">Vr. Conta:</label>
                    <input type="text" id="VrCon" name="VrCon" value="0" class="VrCon form-control" style="display:inline-block" onblur="calcPgto();">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="VrAcresCon">Vr. Acres.:</label>
                    <input type="text" id="VrAcresCon" name="VrAcresCon" value="0" class="VrAcresCon form-control" style="display:inline-block" onblur="calcPgto();">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="VrDescCon">Vr. Desc.:</label>
                    <input type="text" id="VrDescCon" name="VrDescCon" value="0" class="VrDescCon form-control" style="display:inline-block" onblur="calcPgto();">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label col="VrTotalCon">Vr. Total:</label>
                      <input type="text" id="VrTotalConX" name="VrTotalConX" value="0" class="VrTotalConX form-control" style="display:inline-block" readonly="readonly">
                      <input type="hidden" id="VrTotalCon" value="0" name="VrTotalCon">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="FormaPgtoCon">Forma Pgto.:</label>
                    <select name="FormaPgtoCon" id="FormaPgtoCon" class="form-control input-sm">
                      <option></option>
                      <option value="Dinheiro">Dinheiro</option>
                      <option value="Pix">Pix</option>
                      <option value="Cartao Debito">Cartão Debito</option>
                      <option value="Cartao Credito">Cartão Debito</option>
                      <option value="Deposito">Deposito</option>
                      <option value="Transferencia">Transferencia</option>
                      <option value="Doc">Doc</option>
                      <option value="Cheque">Cheque</option>
                      <option value="Boleto">Boleto</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="NumChCon">Cheque:</label>
                      <input type="text" name="NumChCon" id="NumChCon" class="form-control input-sm"/>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="DtChCon">Dt cheque:</label>
                      <input type="date" name="DtChCon" id="DtChCon" class="form-control input-sm" value="0"/>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="BancoChCon">Banco:</label>
                      <input type="text" name="BancoChCon" id="BancoChCon" class="form-control input-sm"/>
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="salvar"><?=str_repeat('&nbsp;', 35);?></label>
                    <input type="submit" value="Salvar" class="btn btn-primary"/>
                  </div>
                </div>

              </div>
            </div>
            <!-- <hr/> -->
          </form>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
          <!--Tabela-->
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr style="font-size: 13px;">
              <th width="10%" style="text-align: center;">Baixa</th>
              <th width="10%" style="text-align: right;">Vr.Total</th>
              <th width="8%" style="text-align: right;">Acres.</th>
              <th width="8%" style="text-align: right;">Desc.</th>
              <th width="10%" style="text-align: right;">Vr.Liq.</th>
              <th width="15%" style="text-align: center;">F.Pgto</th>
              <th width="12%" style="text-align: center;">Num.Ch</th>
              <th width="10%" style="text-align: center;">Dt.Ch</th>
              <th width="10%" style="text-align: center;">Banco</th>
              <th width="5%">Excluir</th>
            </tr>
            </thead>
            <tbody>
              <?php foreach($contratossub as $list):?>
                <tr style="font-size: 13px;">
                  <!-- <td><?php echo $list['cmpCodConSub'];?></td> -->
                  <td style="text-align: center;"><?php if ($list['DtBaixaCon'] != '0') { echo gmdate('d/m/Y', strtotime($list['cmpDtBaixaCon']." UTC"));}?></td>
                  <td style="text-align: right;"><?php echo number_format($list['cmpVrCon'],2,",",".");?></td>
                  <td style="text-align: right;"><?php echo number_format($list['cmpVrAcresCon'],2,",",".");?></td>
                  <td style="text-align: right;"><?php echo number_format($list['cmpVrDescCon'],2,",",".");?></td>
                  <td style="text-align: right;"><?php echo number_format($list['cmpVrTotalCon'],2,",",".");?></td>
                  <td style="text-align: center;"><?php echo $list['cmpFormaPgtoCon'];?></td>
                  <td style="text-align: center;"><?php echo $list['cmpNumChCon'];?></td>
                  <td style="text-align: center;"><?php if ($list['DtChCon'] != '0') { echo gmdate('d/m/Y', strtotime($list['cmpDtChCon']." UTC"));}?></td>
                  <td style="text-align: center;"><?php echo $list['cmpBancoChCon'];?></td>
                  <td>
                    <center>
                      <a title="Deletar" data-placement="top" data-toggle="modal"  href="" data-target="#delete<?=$list['cmpCodConSub'];?>" class="btn btn-sm btn-icon btn-outline-danger img-circle" title="Excluir"><i class="far fa-trash-alt"></i></a>
                    </center>
                  </td>
                </tr>

              <!-- Modal Excluir registro-->
                <div id="delete<?=$list['cmpCodConSub'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-sm">
                      <div class="modal-content p-0 b-0">
                          <div class="panel panel-color panel-danger">
                              <div class="panel-heading">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <!-- <h3 class="panel-title"><i class="fa fa-warning aviso"></i> Excluir</h3> -->
                              </div>
                              <div class="panel-body">
                                  <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpCodConSub'];?></strong> ?</p>

                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                      <a href="<?=BASE_URL;?>contratossub/excluir/<?=$id;?>/<?=$contra;?>/<?=$list['cmpCodConSub'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
                                  </div>
                              </div>
                          </div>
                      </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>
                <!--fim Modal Excluir registro-->
              <?php endforeach;?> 
            </tbody>
          </table>
        </div>
    <!-- /.row -->

      </div>
  </div>
  <!-- /.container-fluid -->
</section>

 <!-- Modal Excluir registro-->
              <div id="delete" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-sm">
                    <div class="modal-content p-0 b-0">
                        <div class="panel panel-color panel-danger">
                            <div class="panel-heading">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <!-- <h3 class="panel-title"><i class="fa fa-warning aviso"></i> Excluir</h3> -->
                            </div>
                            <div class="panel-body">
                                <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpCodConSub'];?></strong> ?</p>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                    <a href="<?=BASE_URL;?>contratossub/excluir/<?=$id;?>/<?=$contra;?>/<?=$list['cmpCodConSub'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!--fim Modal Excluir registro-->
    <!-- /.content -->

