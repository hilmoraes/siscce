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
      <div class="card card-default col-md-10">
        <div class="card-header">
          <h3 class="card-title" style="color: black;"><b>Lista de Fiscais</b></h3>
          <div class="card-tools">
            <a href="<?=BASE_URL;?>" type="button" class="btn btn-tool" title="Fechar" data-card-widget=""><input type="button" value="Voltar" class="btn btn-block btn-success btn-sm"/></a>
          </div>
        </div>

        <div class="card-body col-md-12 cadCor">
          <form method="post" action='<?=BASE_URL;?>fiscais/add'>
            <div class="tab-content">
              <div class="row">

<!--                 <div><input type="hidden" id="CodEmp" value="1" name="CodEmp"></div> -->

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="NomeFis">Novo Fiscal:</label>
                    <input type="text" id="NomeFis" class="form-control input-sm" name="NomeFis" required="">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label col="FoneFis">Telefone:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" id="FoneFis" class="form-control input-sm" name="FoneFis">
                    </div>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label col="CelularFis">Celular:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" id="CelularFis" class="form-control input-sm" name="CelularFis">
                    </div>
                  </div>
                </div>

                <div class="col-md-1">
                  <label for="salvar"><?=str_repeat('&nbsp;', 25);?></label>
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
            <tr>
              <th>Fiscais</th>
              <th width="15%">Fone</th>
              <th width="15%">Celular</th>
              <th width="14%">Ações</th>
            </tr>
            </thead>
            <tbody>
              <?php foreach($fiscais as $list):?>
              <tr <?=$list['inativo']==1?'style="color: #f39c12;"':'';?>>
                <td><?php echo $list['cmpNomeFis'];?></td>
                <td><?php echo $list['cmpFoneFis'];?></td>
                <td><?php echo $list['cmpCelularFis'];?></td>
                <td>
                  <a href="<?=BASE_URL;?>fiscais/edit/<?=$list['cmpCodFis'];?>" class="btn btn-sm btn-icon btn-outline-primary img-circle" title="Editar"><i class="ik ik-edit-2"></i></a>
                  <a title="Deletar" data-placement="top" data-toggle="modal"  href="" data-target="#delete<?=$list['cmpCodFis'];?>" class="btn btn-sm btn-icon btn-outline-danger img-circle" title="Excluir"><i class="far fa-trash-alt"></i></a>
                </td>
              </tr>

            <!-- Modal Excluir registro-->
              <div id="delete<?=$list['cmpCodFis'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-sm">
                    <div class="modal-content p-0 b-0">
                        <div class="panel panel-color panel-danger">
                            <div class="panel-heading">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <!-- <h3 class="panel-title"><i class="fa fa-warning aviso"></i> Excluir</h3> -->
                            </div>
                            <div class="panel-body">
                                <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpNomeFis'];?></strong> ?</p>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                    <a href="<?=BASE_URL;?>fiscais/excluir/<?=$list['cmpCodFis'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
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
                                <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpNomeFis'];?></strong> ?</p>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                    <a href="<?=BASE_URL;?>fiscais/excluir/<?=$list['cmpCodFis'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!--fim Modal Excluir registro-->
    <!-- /.content -->




