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
      <div class="card card-default col-md-11">
        <div class="card-header">
          <h3 class="card-title" style="color: black;"><b>Cantas Bancárias do Parceiro Nº  <?=$id;?></b></h3>
          <div class="card-tools">
            <a href="<?=BASE_URL;?>parceiros/lista/" type="button" class="btn btn-tool" title="Voltar" data-card-widget=""><input type="button" value="Voltar" class="btn btn-block btn-success btn-sm"/></a>
          </div> 
        </div>

        <div class="cadCor">
          <form method="post" action='<?=BASE_URL;?>parceiroscontas/add'>
            <div class="tab-content">
              <div class="row">

                <div><input type="hidden" value="<?=$id;?>" name="id"></div>

                <div class="col-md-5">
                  <div class="form-group">
                    <label for="BancoPar">Banco:</label>
                    <input type="text" id="BancoPar" class="form-control input-sm cadFonte" name="BancoPar">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="AgPar">Agência:</label>
                    <input type="text" id="AgPar" class="form-control input-sm cadFonte" name="AgPar">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="ContaPar">Conta:</label>
                    <input type="text" id="ContaPar" class="form-control input-sm cadFonte" name="ContaPar">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="TipoContaPar">Tipo de Conta</label>
                    <select name="TipoContaPar" id="TipoContaPar" class="form-control input-sm">
                      <option></option>
                      <option value="CORRENTE">CORRENTE</option>
                      <option value="POUPANCA">POUPANÇA</option>
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
              <th>Banco</th>
              <th width="20%">Agência</th>
              <th width="20%">Conta</th>
              <th width="20%">Tipo</th>
              <th width="5%">Ações</th>
            </tr>
            </thead>
            <tbody>
              <?php foreach($parceiroscontas as $list):?>
                <tr style="font-size: 13px;">
                  <td><?php echo $list['cmpBancoPar'];?></td>
                  <td><?php echo $list['cmpAgPar'];?></td>
                  <td><?php echo $list['cmpContaPar'];?></td>
                  <td><?php echo $list['cmpTipoContaPar'];?></td>
                  <td>
                    <center>
                      <a title="Deletar" data-placement="top" data-toggle="modal"  href="" data-target="#delete<?=$list['cmpCodParC'];?>" class="btn btn-sm btn-icon btn-outline-danger img-circle" title="Excluir"><i class="far fa-trash-alt"></i></a>
                    </center>
                  </td>
                </tr>

              <!-- Modal Excluir registro-->
                <div id="delete<?=$list['cmpCodParC'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-sm">
                      <div class="modal-content p-0 b-0">
                          <div class="panel panel-color panel-danger">
                              <div class="panel-heading">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <!-- <h3 class="panel-title"><i class="fa fa-warning aviso"></i> Excluir</h3> -->
                              </div>
                              <div class="panel-body">
                                  <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpCodParC'];?></strong> ?</p>

                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                      <a href="<?=BASE_URL;?>parceiroscontas/excluir/<?=$id;?>/<?=$list['cmpCodParC'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
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
                                <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpCodParC'];?></strong> ?</p>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                    <a href="<?=BASE_URL;?>parceiroscontas/excluir/<?=$id;?>/<?=$list['cmpCodParC'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!--fim Modal Excluir registro-->
    <!-- /.content -->

