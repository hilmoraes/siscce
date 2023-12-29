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
      <div class="card card-default col-md-12">
        <div class="card-header">
          <h3 class="card-title" style="color: black;"><b>Contratos do convênio Nº  <?=$id;?></b></h3>
          <div class="card-tools">
            <a href="<?=BASE_URL;?>convenios/lista/" type="button" class="btn btn-tool" title="Voltar" data-card-widget=""><input type="button" value="Voltar" class="btn btn-block btn-success btn-sm"/></a>
          </div> 
        </div>

        <div class="cadCor">
          <form method="post" action='<?=BASE_URL;?>convenioscontratos/add'>
            <div class="tab-content">
              <div class="row">

                <div><input type="hidden" value="<?=$id;?>" name="id"></div>
                <div><input type="hidden" id="CodEmp" value="1" name="CodEmp"></div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label col="CodLic">Licitação:</label>
                    <select name="CodLic" id="CodLic" class="form-control select2bs4" style="width: 100%;">
                      <option value="">Escolha...</option>
                      <?php foreach($convenioslicitacoes as $listlic):?>
                        <option value="<?=$listlic['cmpCodLic'];?>"><?=$listlic['cmpNumLic'];?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label col="DtVigenciaIniCon">Inicio Vigência:</label>
                    <input type="date" id="DtVigenciaIniCon" class="form-control input-sm" name="DtVigenciaIniCon">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label col="DtVigenciaFimCon">Fim Vigência:</label>
                    <input type="date" id="DtVigenciaFimCon" class="form-control input-sm" name="DtVigenciaFimCon">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="NumCon">Nº Contrato:</label>
                    <input type="text" id="NumCon" class="form-control input-sm" name="NumCon">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label col="VrCon">Vr. Proposta:</label>
                      <input type="text" id="VrCon" name="VrCon" value="0" class="VrCon form-control" style="display:inline-block">
                  </div>
                </div>

                <div class="col-md-4">
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
              <th width="10%">Licitação</th>
              <th width="10%">Ini.Virgência</th>
              <th width="10%">Fim.Virgência</th>
              <th width="12%">Contrato</th>
              <th width="10%">Valor</th>
              <th>Empresa</th>
              <th width="10%">Ações</th>
            </tr>
            </thead>
            <tbody>
              <?php foreach($convenioscontratos as $list):?>
                <tr style="font-size: 13px;">
                  <td><?php echo $list['cmpNumLic'];?></td>
                  <td><?php if ($list['DtVigenciaIniCon'] != '0') { echo gmdate('d/m/Y', strtotime($list['cmpDtVigenciaIniCon']." UTC"));}?></td>
                  <td><?php if ($list['DtVigenciaFimCon'] != '0') { echo gmdate('d/m/Y', strtotime($list['cmpDtVigenciaFimCon']." UTC"));}?></td>
                  <td><?php echo $list['cmpNumCon'];?></td>
                  <td><?php echo number_format($list['cmpVrCon'],2,",",".");?></td>
                  <td><?php echo $list['cmpNomePar'];?></td>
                  <td>
                    <center>
                      <a href="<?=BASE_URL;?>convenioscontratos/edit/<?=$list['cmpCodConv'];?>/<?=$list['cmpCodCon'];?>" class="btn btn-sm btn-icon btn-outline-primary img-circle" title="Editar"><i class="ik ik-edit-2"></i></a>
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
                                      <a href="<?=BASE_URL;?>convenioscontratos/excluir/<?=$id;?>/<?=$list['cmpCodCon'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
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
                                    <a href="<?=BASE_URL;?>convenioscontratos/excluir/<?=$id;?>/<?=$list['cmpCodCon'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!--fim Modal Excluir registro-->
    <!-- /.content -->

