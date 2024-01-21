<?php if(!empty($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}?>

<?php include("funcoes/funcoes.php");?>

<div class="container-fluid">
  <div class="row mb-2"></div>
</div>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
      <div class="card card-default col-md-10">
        <div class="card-header">
          <h3 class="card-title" style="color: black;"><b>Desembolsos do convênio Nº  <?=$id;?></b></h3>
          <div class="card-tools">
            <a href="<?=BASE_URL;?>convenios/lista/" type="button" class="btn btn-tool" title="Voltar" data-card-widget=""><input type="button" value="Voltar" class="btn btn-block btn-success btn-sm"/></a>
          </div> 
        </div>

        <div class="cadCor">
          <form method="post" action='<?=BASE_URL;?>conveniosdesembolsos/add'>
            <div class="tab-content">
              <div class="row">

                <div><input type="hidden" value="<?=$id;?>" name="id"></div>
                <div><input type="hidden" id="CodEmp" value="1" name="CodEmp"></div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label col="DtDes">Data:</label>
                    <input type="date" id="DtDes" class="form-control input-sm" name="DtDes">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label col="VrRepasseDes">Repasse:</label>
                      <input type="text" id="VrRepasseDes" name="VrRepasseDes" value="0" class="VrRepasseDes form-control" style="display:inline-block" onblur="calcDes()">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label col="VrCpDes">Contra Partida:</label>
                      <input type="text" id="VrCpDes" name="VrCpDes" value="0" class="VrCpDes form-control" style="display:inline-block" onblur="calcDes()">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label col="VrTotalDes">Vr. Total:</label>
                      <input type="text" id="VrTotalDesX" name="VrTotalDesX" value="0" class="VrTotalDesX form-control" style="display:inline-block" readonly="readonly">
                      <input type="hidden" id="VrTotalDes" value="0" name="VrTotalDes">
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
              <th width="14%">Data</th>
              <th width="12%">Repasse</th>
              <th width="16%">Contra Partida</th>
              <th width="12%">Total</th>
              <th width="10%">Ações</th>
            </tr>
            </thead>
            <tbody>
              <?php foreach($conveniosdesembolsos as $list):?>
                <tr style="font-size: 13px;">
                  <td><?php if ($list['DtDes'] != '0') { echo gmdate('d/m/Y', strtotime($list['cmpDtDes']." UTC"));}?></td>
                  <td><?php echo number_format($list['cmpVrRepasseDes'],2,",",".");?></td>
                  <td><?php echo number_format($list['cmpVrCpDes'],2,",",".");?></td>
                  <td><?php echo number_format($list['cmpVrTotalDes'],2,",",".");?></td>
                  <td>
                    <center>
                      <a href="<?=BASE_URL;?>conveniosdesembolsos/edit/<?=$list['cmpCodConv'];?>/<?=$list['cmpCodDes'];?>" class="btn btn-sm btn-icon btn-outline-primary img-circle" title="Editar"><i class="ik ik-edit-2"></i></a>
                      <a title="Deletar" data-placement="top" data-toggle="modal"  href="" data-target="#delete<?=$list['cmpCodDes'];?>" class="btn btn-sm btn-icon btn-outline-danger img-circle" title="Excluir"><i class="far fa-trash-alt"></i></a>
                    </center>
                  </td>
                </tr>

              <!-- Modal Excluir registro-->
                <div id="delete<?=$list['cmpCodDes'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-sm">
                      <div class="modal-content p-0 b-0">
                          <div class="panel panel-color panel-danger">
                              <div class="panel-heading">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <!-- <h3 class="panel-title"><i class="fa fa-warning aviso"></i> Excluir</h3> -->
                              </div>
                              <div class="panel-body">
                                  <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpCodDes'];?></strong> ?</p>

                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                      <a href="<?=BASE_URL;?>conveniosdesembolsos/excluir/<?=$id;?>/<?=$list['cmpCodDes'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
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
                <?php foreach($conveniosdesembolsostotais as $listtotais):?>
                  <tr style="font-size: 10pt;">
                    <td style="text-align: right;"><?php echo number_format($listtotais['totVrRepasseDes'],2,",",".");?></td>
                    <td style="text-align: right;"><?php echo number_format($listtotais['totVrCpDes'],2,",",".");?></td>
                    <td style="text-align: right;"><?php echo number_format($listtotais['totVrTotalDes'],2,",",".");?></td>
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
                                <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpCodDes'];?></strong> ?</p>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                    <a href="<?=BASE_URL;?>conveniosdesembolsos/excluir/<?=$id;?>/<?=$list['cmpCodDes'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!--fim Modal Excluir registro-->
    <!-- /.content -->

