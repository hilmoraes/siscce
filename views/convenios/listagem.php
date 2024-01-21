<?php if(!empty($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}?>

<div class="container-fluid">
  <div class="row mb-2"></div>
</div>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title" style="color: black;"><b>Lista de Convênios</b></h3>
          <div class="card-tools">
            <a href="<?=BASE_URL;?>convenios" type="button" class="btn btn-tool" title="Cadastrar Novo" data-widget="" value="Cadastrar"><input type="button" value="Cadastrar" class="btn btn-block btn-sm cad_salvar"/></a>
            <a href="<?=BASE_URL;?>" type="button" class="btn btn-tool" title="Fechar" data-card-widget=""><input type="button" value="Voltar" class="btn btn-block btn-sm btn-success"/></a>
          </div>  
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <!--Tabela-->
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr style="font-size: 10pt;">
                <th width="5%">Lanc.</th>
                <th width="8%">NºConvênio</th>
                <th width="8%">Data</th>
                <th width="19%">Objeto</th>
                <th width="7%">Orgão</th>
                <th width="8%">Situação</th>
                <th width="8%">Total</th>
                <th width="10%">Saldo(D-P)</th>
                <th width="17%">Complementares</th>
                <th width="8%">Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($convenios as $list):?>
                <tr style="font-size: 10pt;">
                  <td><?php echo $list['cmpCodConv'];?></td>
                  <td><?php echo $list['cmpNumConv'];?></td>
                  <td><?php if ($list['DtVigenciaConv'] != '0') { echo gmdate('d/m/Y', strtotime($list['cmpDtVigenciaConv']." UTC"));}?></td>
                  <td><?php echo $list['cmpObjetoConv'];?></td>
                  <td><?php echo $list['cmpOrgaoConv'];?></td>
                  <td><?php echo $list['situacao'];?></td>
                  <td style="text-align: right;"><?php echo number_format($list['cmpVrTotalConv'],2,",",".");?></td>
                  <td style="text-align: right;"><?php echo number_format($list['SaldoConv'],2,",",".");?></td>
                  <td>
                    <a href="<?=BASE_URL;?>convenioslicitacoes/lista/<?=$list['cmpCodConv'];?>" class="btn btn-sm btn-icon btn-outline-info img-circle" title="Licitações"><i class="fa fa-atlas"></i></a>

                    <a href="<?=BASE_URL;?>convenioscontratos/lista/<?=$list['cmpCodConv'];?>" class="btn btn-sm btn-icon btn-outline-dark img-circle" title="Contratos"><i class="fas fa-file-alt"></i></a>

                    <a href="<?=BASE_URL;?>conveniosaditivos/lista/<?=$list['cmpCodConv'];?>" class="btn btn-sm btn-icon btn-outline-success img-circle" title="Aditivos"><i class="fa fa-audio-description"></i></a>

                    <a href="<?=BASE_URL;?>conveniosdesembolsos/lista/<?=$list['cmpCodConv'];?>" class="btn btn-sm btn-icon btn-outline-warning img-circle" title="Desembolso"><i class="fa fa-cog"></i></a>

                    <a href="<?=BASE_URL;?>conveniospagamentos/lista/<?=$list['cmpCodConv'];?>" class="btn btn-sm btn-icon btn-outline-secondary img-circle" title="Pagamentos"><i class="fa fa-comment-dollar"></i></a>
                  </td>
                  <td>
                    <a href="<?=BASE_URL;?>convenios/edit/<?=$list['cmpCodConv'];?>" class="btn btn-sm btn-icon btn-outline-primary img-circle" title="Editar"><i class="ik ik-edit-2"></i></a>

                    <a title="Deletar" data-placement="top" data-toggle="modal"  href="" data-target="#delete<?=$list['cmpCodConv'];?>" class="btn btn-sm btn-icon btn-outline-danger img-circle" title="Excluir"><i class="far fa-trash-alt"></i></a>

                  </td>
                </tr>

              <!-- Modal Excluir registro-->
                <div id="delete<?=$list['cmpCodConv'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-sm">
                      <div class="modal-content p-0 b-0">
                          <div class="panel panel-color panel-danger">
                              <div class="panel-heading">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <!-- <h3 class="panel-title"><i class="fa fa-warning aviso"></i> Excluir</h3> -->
                              </div>
                              <div class="panel-body">
                                  <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpCodConv'];?></strong> ?</p>

                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                      <a href="<?=BASE_URL;?>convenios/excluir/<?=$list['cmpCodConv'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
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
          <div class="col-md-4">
            <table id="example1" class="table table-bordered table-hover">
              <thead style="background-color: #d4b074;">
                <tr style="font-size: 10pt; color: #fff">
                  <th style="text-align: center;">Total</th>
                  <th style="text-align: center;">Saldo (D-P)</th>
                </tr>
              </thead>
              <tbody style="background-color: #ffffcc;">
                <?php foreach($conveniostotais as $listtotais):?>
                  <tr style="font-size: 10pt;">
                    <td style="text-align: right;"><?php echo number_format($listtotais['totVrTotalConv'],2,",",".");?></td>
                    <td style="text-align: right;"><?php echo number_format($listtotais['totSaldoConv'],2,",",".");?></td>
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
                                <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpCodConv'];?></strong> ?</p>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                    <a href="<?=BASE_URL;?>convenios/excluir/<?=$list['cmpCodConv'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!--fim Modal Excluir registro-->
    <!-- /.content -->

