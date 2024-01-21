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
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
      <div class="card card-default col-md-12">
        <div class="card-header">
          <h3 class="card-title" style="color: black;"><b>Pagamento do convênio Nº  <?=$id;?></b></h3>
          <div class="card-tools">
            <a href="<?=BASE_URL;?>convenios/lista/" type="button" class="btn btn-tool" title="Voltar" data-card-widget=""><input type="button" value="Voltar" class="btn btn-block btn-success btn-sm"/></a>
          </div> 
        </div>

        <div class="cadCor">
          <form method="post" action='<?=BASE_URL;?>conveniospagamentos/add'>
            <div class="tab-content">
              <div class="row">

                <div><input type="hidden" value="<?=$id;?>" name="id"></div>
                <div><input type="hidden" id="CodEmp" value="1" name="CodEmp"></div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label col="DtPag">Data:</label>
                    <input type="date" id="DtPag" class="form-control input-sm" name="DtPag">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="DocPag">Documento:</label>
                    <input type="text" id="DocPag" class="form-control input-sm" name="DocPag">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label col="VrRepassePag">Repasse:</label>
                      <input type="text" id="VrRepassePag" name="VrRepassePag" value="0" class="VrRepassePag form-control" style="display:inline-block" onblur="calcPag()">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label col="VrCpPag">Contra Partida:</label>
                      <input type="text" id="VrCpPag" name="VrCpPag" value="0" class="VrCpPag form-control" style="display:inline-block" onblur="calcPag()">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label col="VrTotalPag">Vr. Total:</label>
                      <input type="text" id="VrTotalPagX" name="VrTotalPagX" value="0" class="VrTotalPagX form-control" style="display:inline-block" readonly="readonly">
                      <input type="hidden" id="VrTotalPag" value="0" name="VrTotalPag">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="TipoPag">Tipo:</label>
                    <select name="TipoPag" id="TipoPag" class="form-control input-sm">
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
                      <option></option>
                      <?php
                      foreach ($situacaopagamento as $situacaopgto) {
                        echo "<option value=\"$situacaopgto\">$situacaopgto</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label col="CodPar">Empresa:</label>
                    <select name="CodPar" id="CodPar" class="form-control select2bs4" style="width: 100%;">
                      <option value="">Escolha...</option>
                      <?php foreach($parceiros as $listpar):?>
                        <option value="<?=$listpar['cmpCodPar'];?>"><?=$listpar['cmpNomePar'];?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>

                <div class="col-md-1">
                  <label for="salvar"><?=str_repeat('&nbsp;', 35);?></label>
                  <input type="submit" value="Salvar" class="btn btn-primary"/>
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
              <th width="10%">Data</th>
              <th width="10%">Documento</th>
              <th width="10%">Repasse</th>
              <th width="10%">Cont.Partida</th>
              <th width="10%">Vr.Total</th>
              <th width="10%">Tipo</th>
              <th width="10%">Situação</th>
              <th>Empresa</th>
              <th width="10%">Ações</th>
            </tr>
            </thead>
            <tbody>
              <?php foreach($conveniospagamentos as $list):?>
                <tr style="font-size: 13px;">
                  <td><?php if ($list['DtPag'] != '0') { echo gmdate('d/m/Y', strtotime($list['cmpDtPag']." UTC"));}?></td>
                  <td><?php echo $list['cmpDocPag'];?></td>
                  <td><?php echo number_format($list['cmpVrRepassePag'],2,",",".");?></td>
                  <td><?php echo number_format($list['cmpVrCpPag'],2,",",".");?></td>
                  <td><?php echo number_format($list['cmpVrTotalPag'],2,",",".");?></td>
                  <td style="max-width: 80px;" class="truncate" title="<?php echo $list['cmpTipoPag'];?>">
                    <?php echo $list['cmpTipoPag'];?>
                  </td>
                  <td style="max-width: 80px;" class="truncate" title="<?php echo $list['cmpSituacaoPag'];?>">
                    <?php echo $list['cmpSituacaoPag'];?>
                  </td>
                  <td style="max-width: 150px;" class="truncate" title="<?php echo $list['cmpNomePar'];?>">
                    <?php echo $list['cmpNomePar'];?>
                  </td>
                  <td>
                    <center>
                      <a href="<?=BASE_URL;?>conveniospagamentos/edit/<?=$list['cmpCodConv'];?>/<?=$list['cmpCodPag'];?>" class="btn btn-sm btn-icon btn-outline-primary img-circle" title="Editar"><i class="ik ik-edit-2"></i></a>
                      <a title="Deletar" data-placement="top" data-toggle="modal"  href="" data-target="#delete<?=$list['cmpCodPag'];?>" class="btn btn-sm btn-icon btn-outline-danger img-circle" title="Excluir"><i class="far fa-trash-alt"></i></a>
                    </center>
                  </td>
                </tr>

              <!-- Modal Excluir registro-->
                <div id="delete<?=$list['cmpCodPag'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-sm">
                      <div class="modal-content p-0 b-0">
                          <div class="panel panel-color panel-danger">
                              <div class="panel-heading">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <!-- <h3 class="panel-title"><i class="fa fa-warning aviso"></i> Excluir</h3> -->
                              </div>
                              <div class="panel-body">
                                  <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpCodPag'];?></strong> ?</p>

                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                      <a href="<?=BASE_URL;?>conveniospagamentos/excluir/<?=$id;?>/<?=$list['cmpCodPag'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
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

    <!-- /.card-header -->
        <div class="card-body">
          <!--Tabela-->
          <div class="col-md-6">
            <table id="example1" class="table table-bordered table-hover">
              <thead style="background-color: #d4b074;">
                <tr style="font-size: 10pt; color: #fff">
                  <th style="text-align: center;">Repasse</th>
                  <th style="text-align: center;">Contra Partida</th>
                  <th style="text-align: center;">Total</th>
                </tr>
              </thead>
              <tbody style="background-color: #ffffcc;">
                <?php foreach($conveniospagamentostotais as $listtotais):?>
                  <tr style="font-size: 10pt;">
                    <td style="text-align: right;"><?php echo number_format($listtotais['totVrRepassePag'],2,",",".");?></td>
                    <td style="text-align: right;"><?php echo number_format($listtotais['totVrCpPag'],2,",",".");?></td>
                    <td style="text-align: right;"><?php echo number_format($listtotais['totVrTotalPag'],2,",",".");?></td>
                  </tr>
                <?php endforeach;?> 
              </tbody>
            </table>
          </div>
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
                                <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpCodPag'];?></strong> ?</p>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                    <a href="<?=BASE_URL;?>conveniospagamentos/excluir/<?=$id;?>/<?=$list['cmpCodPag'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!--fim Modal Excluir registro-->
    <!-- /.content -->

