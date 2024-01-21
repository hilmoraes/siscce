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
          <h3 class="card-title" style="color: black;"><b>Aditivos do convênio Nº  <?=$id;?></b></h3>
          <div class="card-tools">
            <a href="<?=BASE_URL;?>convenios/lista/" type="button" class="btn btn-tool" title="Voltar" data-card-widget=""><input type="button" value="Voltar" class="btn btn-block btn-success btn-sm"/></a>
          </div> 
        </div>

        <div class="cadCor">
          <form method="post" action='<?=BASE_URL;?>conveniosaditivos/add'>
            <div class="tab-content">
              <div class="row">

                <div><input type="hidden" value="<?=$id;?>" name="id"></div>
                <div><input type="hidden" id="CodEmp" value="1" name="CodEmp"></div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label col="CodCon">Contrato:</label>
                    <select name="CodCon" id="CodCon" class="form-control select2bs4" style="width: 100%;">
                      <option value="">Escolha...</option>
                      <?php foreach($convenioscontratos as $listcon):?>
                        <option value="<?=$listcon['cmpCodCon'];?>"><?=$listcon['cmpNumCon'];?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label col="DtVigenciaIniAdi">Inicio Vigência:</label>
                    <input type="date" id="DtVigenciaIniAdi" class="form-control input-sm" name="DtVigenciaIniAdi">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label col="DtVigenciaFimAdi">Fim Vigência:</label>
                    <input type="date" id="DtVigenciaFimAdi" class="form-control input-sm" name="DtVigenciaFimAdi">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="NumAdi">Aditivo:</label>
                    <input type="text" id="NumAdi" class="form-control input-sm" name="NumAdi">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="TipoAdi">Tipo:</label>
                    <select name="TipoAdi" id="TipoAdi" class="form-control input-sm">
                      <option></option>
                      <option value="ACRESCIMO">ACRESCIMO</option>
                      <option value="SUPRESSAO">SUPRESSAO</option>
                      <option value="PRAZO">PRAZO</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label col="VrAdi">Vr. Aditivo:</label>
                      <input type="text" id="VrAdi" name="VrAdi" value="0" class="VrAdi form-control" style="display:inline-block">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label col="VrNovoVrConAdi">Novo Vr. Contrato:</label>
                      <input type="text" id="VrNovoVrConAdi" name="VrNovoVrConAdi" value="0" class="VrNovoVrConAdi form-control" style="display:inline-block">
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
              <th width="14%">Contrato</th>
              <th width="12%">Ini.Virgência</th>
              <th width="12%">Fim.Virgência</th>
              <th width="12%">Aditivo</th>
              <th width="12%">Tipo</th>
              <th width="12%">Vr.Aditivo</th>
              <th width="16%">Novo Vr. Contrato</th>
              <th width="10%">Ações</th>
            </tr>
            </thead>
            <tbody>
              <?php foreach($conveniosaditivos as $list):?>
                <tr style="font-size: 13px;">
                  <td><?php echo $list['cmpNumCon'];?></td>
                  <td><?php if ($list['DtVigenciaIniAdi'] != '0') { echo gmdate('d/m/Y', strtotime($list['cmpDtVigenciaIniAdi']." UTC"));}?></td>
                  <td><?php if ($list['DtVigenciaFimAdi'] != '0') { echo gmdate('d/m/Y', strtotime($list['cmpDtVigenciaFimAdi']." UTC"));}?></td>
                  <td><?php echo $list['cmpNumAdi'];?></td>
                  <td><?php echo $list['cmpTipoAdi'];?></td>
                  <td><?php echo number_format($list['cmpVrAdi'],2,",",".");?></td>
                  <td><?php echo number_format($list['cmpVrNovoVrConAdi'],2,",",".");?></td>
                  <td>
                    <center>
                      <a href="<?=BASE_URL;?>conveniosaditivos/edit/<?=$list['cmpCodConv'];?>/<?=$list['cmpCodAdi'];?>" class="btn btn-sm btn-icon btn-outline-primary img-circle" title="Editar"><i class="ik ik-edit-2"></i></a>
                      <a title="Deletar" data-placement="top" data-toggle="modal"  href="" data-target="#delete<?=$list['cmpCodAdi'];?>" class="btn btn-sm btn-icon btn-outline-danger img-circle" title="Excluir"><i class="far fa-trash-alt"></i></a>
                    </center>
                  </td>
                </tr>

              <!-- Modal Excluir registro-->
                <div id="delete<?=$list['cmpCodAdi'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-sm">
                      <div class="modal-content p-0 b-0">
                          <div class="panel panel-color panel-danger">
                              <div class="panel-heading">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <!-- <h3 class="panel-title"><i class="fa fa-warning aviso"></i> Excluir</h3> -->
                              </div>
                              <div class="panel-body">
                                  <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpCodAdi'];?></strong> ?</p>

                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                      <a href="<?=BASE_URL;?>conveniosaditivos/excluir/<?=$id;?>/<?=$list['cmpCodAdi'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
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
                                <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpCodAdi'];?></strong> ?</p>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                    <a href="<?=BASE_URL;?>conveniosaditivos/excluir/<?=$id;?>/<?=$list['cmpCodAdi'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!--fim Modal Excluir registro-->
    <!-- /.content -->

