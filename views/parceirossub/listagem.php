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
          <h3 class="card-title" style="color: black;"><b>Contatos do Parceiro Nº  <?=$id;?></b></h3>
          <div class="card-tools">
            <a href="<?=BASE_URL;?>parceiros/lista/" type="button" class="btn btn-tool" title="Voltar" data-card-widget=""><input type="button" value="Voltar" class="btn btn-block btn-success btn-sm"/></a>
          </div> 
        </div>

        <div class="cadCor">
          <form method="post" action='<?=BASE_URL;?>parceirossub/add'>
            <div class="tab-content">
              <div class="row">

                <div><input type="hidden" value="<?=$id;?>" name="id"></div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="NomeCon">Nome:</label>
                    <input type="text" id="NomeCon" class="form-control input-sm cadFonte" name="NomeCon">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="EmailCon">E-Mail:</label>
                    <input type="text" id="EmailCon" class="form-control input-sm cadFonte" name="EmailCon">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="FoneCon">Telefone:</label>
                    <input type="text" id="FoneCon" class="form-control input-sm cadFonte" name="FoneCon">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="CelularCon">Celular:</label>
                    <input type="text" id="CelularCon" class="form-control input-sm cadFonte" name="CelularCon">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="CargoCon">Cargo:</label>
                    <input type="text" id="CargoCon" class="form-control input-sm cadFonte" name="CargoCon">
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
              <th>Nome</th>
              <th width="25%">E-Mail</th>
              <th width="12%">Telefone</th>
              <th width="12%">Celular</th>
              <th width="15%">Cargo</th>
              <th width="5%">Ações</th>
            </tr>
            </thead>
            <tbody>
              <?php foreach($parceirossub as $list):?>
                <tr style="font-size: 13px;">
                  <td><?php echo $list['cmpNomeCon'];?></td>
                  <td><?php echo $list['cmpEmailCon'];?></td>
                  <td><?php echo $list['cmpFoneCon'];?></td>
                  <td><?php echo $list['cmpCelularCon'];?></td>
                  <td><?php echo $list['cmpCargoCon'];?></td>
                  <td>
                    <center>
                      <a title="Deletar" data-placement="top" data-toggle="modal"  href="" data-target="#delete<?=$list['cmpCodCon'];?>" class="btn btn-sm btn-icon btn-outline-danger img-circle" title="Excluir"><i class="far fa-trash-alt"></i></a>
                    </center>
                  </td>
                </tr>

              <!-- Modal Excluir registro-->
                <div id="delete<?=$list['cmpCodCon'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-sm">
                      <div class="modal-content p-0 b-0">
                          <div class="panel panel-color panel-danger">
                              <div class="panel-heading">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <!-- <h3 class="panel-title"><i class="fa fa-warning aviso"></i> Excluir</h3> -->
                              </div>
                              <div class="panel-body">
                                  <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpCodCon'];?></strong> ?</p>

                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                      <a href="<?=BASE_URL;?>parceirossub/excluir/<?=$id;?>/<?=$list['cmpCodCon'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
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
                                <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpCodCon'];?></strong> ?</p>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                    <a href="<?=BASE_URL;?>parceirossub/excluir/<?=$id;?>/<?=$list['cmpCodCon'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!--fim Modal Excluir registro-->
    <!-- /.content -->

