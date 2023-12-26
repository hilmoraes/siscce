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
          <h3 class="card-title" style="color: black;"><b>Lista de Contratos de Compra</b></h3>
          <div class="card-tools">
            <a href="<?=BASE_URL;?>contratos" type="button" class="btn btn-tool" title="Cadastrar Novo" data-widget="" value="Cadastrar"><input type="button" value="Cadastrar" class="btn btn-block btn-primary btn-sm"/></a>
            <a href="<?=BASE_URL;?>" type="button" class="btn btn-tool" title="Fechar" data-card-widget=""><input type="button" value="Voltar" class="btn btn-block btn-success btn-sm"/></a>
          </div>  
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <!--Tabela-->
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr style="font-size: 10pt;">
                <th width="5%">Lanc.</th>
                <th width="8%">Contrato</th>
                <th width="8%">Data</th>
                <th width="18%">Fornecedor</th>
                <th width="10%">Produto</th>
                <th width="8%">Qtd.Ton.</th>
                <th width="8%">Qtd.Sacas</th>
                <th width="5%">V.Saco</th>
                <th width="5%">Tot.Contrato</th>
                <th width="16%">Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($contratos as $list):?>
                <tr style="font-size: 10pt;">
                  <td><?php echo $list['cmpCodLanc'];?></td>
                  <td><?php echo $list['cmpContrato'];?></td>
                  <td><?php if ($list['DataLanc'] != '0') { echo gmdate('d/m/Y', strtotime($list['cmpDataLanc']." UTC"));}?></td>
                  <td><?php echo $list['cmpNomFor'];?></td>
                  <td><?php echo $list['cmpNomePro'];?></td>
                  <td><?php echo number_format($list['cmpQtdTon'],3,",",".");?></td>
                  <td><?php echo number_format($list['cmpQtdSaca'],3,",",".");?></td>
                  <td><?php echo number_format($list['cmpVrKg'],2,",",".");?></td>
                  <td><?php echo number_format($list['cmpPreco'],2,",",".");?></td>
                  <td>
                    <a href="<?=BASE_URL;?>contratossub/lista/<?=$list['cmpCodLanc'];?>/<?=$list['contra'];?>" class="btn btn-sm btn-icon btn-outline-secondary img-circle" title="Incluir Baixas"><i class="fa fa-chevron-down"></i></a>

                    <a href="<?=BASE_URL;?>contratos/edit/<?=$list['cmpCodLanc'];?>" class="btn btn-sm btn-icon btn-outline-primary img-circle" title="Editar"><i class="ik ik-edit-2"></i></a>

                    <a title="Deletar" data-placement="top" data-toggle="modal"  href="" data-target="#delete<?=$list['cmpCodLanc'];?>" class="btn btn-sm btn-icon btn-outline-danger img-circle" title="Excluir"><i class="far fa-trash-alt"></i></a>

                    <?php if ($list['cmpPorTon']=="1") { ?>
                      <a href="" class="btn btn-sm btn-icon btn-outline-success img-circle" title="Contrato M." onclick="relContratoCT(<?=$list['cmpCodLanc'];?>)"><i class="fas fa-print"></i></a>
                     <a href="" class="btn btn-sm btn-icon btn-outline-success img-circle" title="Contrato" onclick="relContratoCFT(<?=$list['cmpCodLanc'];?>)"><i class="fas fa-print"></i></a>
                    <?php } else { ?>
                      <a href="" class="btn btn-sm btn-icon btn-outline-success img-circle" title="Contrato M." onclick="relContratoC(<?=$list['cmpCodLanc'];?>)"><i class="fas fa-print"></i></a>
                     <a href="" class="btn btn-sm btn-icon btn-outline-success img-circle" title="Contrato" onclick="relContratoCF(<?=$list['cmpCodLanc'];?>)"><i class="fas fa-print"></i></a>
                    <?php } ?>
                   
                  </td>
                </tr>

              <!-- Modal Excluir registro-->
                <div id="delete<?=$list['cmpCodLanc'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-sm">
                      <div class="modal-content p-0 b-0">
                          <div class="panel panel-color panel-danger">
                              <div class="panel-heading">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <!-- <h3 class="panel-title"><i class="fa fa-warning aviso"></i> Excluir</h3> -->
                              </div>
                              <div class="panel-body">
                                  <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpCodLanc'];?></strong> ?</p>

                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                      <a href="<?=BASE_URL;?>contratos/excluir/<?=$list['cmpCodLanc'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
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
                                <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpCodLanc'];?></strong> ?</p>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                    <a href="<?=BASE_URL;?>contratos/excluir/<?=$list['cmpCodLanc'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!--fim Modal Excluir registro-->
    <!-- /.content -->

