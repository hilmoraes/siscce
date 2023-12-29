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
          <h3 class="card-title" style="color: black;"><b>Licitações do convênio Nº  <?=$id;?></b></h3>
          <div class="card-tools">
            <a href="<?=BASE_URL;?>convenios/lista/" type="button" class="btn btn-tool" title="Voltar" data-card-widget=""><input type="button" value="Voltar" class="btn btn-block btn-success btn-sm"/></a>
          </div> 
        </div>

        <div class="cadCor">
          <form method="post" action='<?=BASE_URL;?>convenioslicitacoes/add'>
            <div class="tab-content">
              <div class="row">

                <div><input type="hidden" value="<?=$id;?>" name="id"></div>
                <div><input type="hidden" id="CodEmp" value="1" name="CodEmp"></div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label col="DtHomologacaoLic">Data Homologação:</label>
                    <input type="date" id="DtHomologacaoLic" class="form-control input-sm" name="DtHomologacaoLic">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="ModalidadeLic">Modalidade:</label>
                    <input type="text" id="ModalidadeLic" class="form-control input-sm" name="ModalidadeLic">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="NumLic">Número:</label>
                    <input type="text" id="NumLic" class="form-control input-sm" name="NumLic">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label col="VrPropostaLic">Vr. Proposta:</label>
                      <input type="text" id="VrPropostaLic" name="VrPropostaLic" value="0" class="VrPropostaLic form-control" style="display:inline-block">
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
              <th width="10%">Dt.Homologação</th>
              <th width="10%">Modalidade</th>
              <th width="10%">Nº</th>
              <th width="10%">Vr.Proposta</th>
              <th>Empresa</th>
              <th width="10%">CNPJ</th>
              <th width="10%">Ações</th>
            </tr>
            </thead>
            <tbody>
              <?php foreach($convenioslicitacoes as $list):?>
                <tr style="font-size: 13px;">
                  <td><?php if ($list['DtHomologacaoLic'] != '0') { echo gmdate('d/m/Y', strtotime($list['cmpDtHomologacaoLic']." UTC"));}?></td>
                  <td><?php echo $list['cmpModalidadeLic'];?></td>
                  <td><?php echo $list['cmpNumLic'];?></td>
                  <td><?php echo number_format($list['cmpVrPropostaLic'],2,",",".");?></td>
                  <td><?php echo $list['cmpNomePar'];?></td>
                  <td><?php echo $list['cmpCpfCnpjPar'];?></td>
                  <td>
                    <center>
                      <a href="<?=BASE_URL;?>convenioslicitacoes/edit/<?=$list['cmpCodConv'];?>/<?=$list['cmpCodLic'];?>" class="btn btn-sm btn-icon btn-outline-primary img-circle" title="Editar"><i class="ik ik-edit-2"></i></a>
                      <a title="Deletar" data-placement="top" data-toggle="modal"  href="" data-target="#delete<?=$list['cmpCodLic'];?>" class="btn btn-sm btn-icon btn-outline-danger img-circle" title="Excluir"><i class="far fa-trash-alt"></i></a>
                    </center>
                  </td>
                </tr>

              <!-- Modal Excluir registro-->
                <div id="delete<?=$list['cmpCodLic'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-sm">
                      <div class="modal-content p-0 b-0">
                          <div class="panel panel-color panel-danger">
                              <div class="panel-heading">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <!-- <h3 class="panel-title"><i class="fa fa-warning aviso"></i> Excluir</h3> -->
                              </div>
                              <div class="panel-body">
                                  <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpCodLic'];?></strong> ?</p>

                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                      <a href="<?=BASE_URL;?>convenioslicitacoes/excluir/<?=$id;?>/<?=$list['cmpCodLic'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
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
                                <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpCodLic'];?></strong> ?</p>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                    <a href="<?=BASE_URL;?>convenioslicitacoes/excluir/<?=$id;?>/<?=$list['cmpCodLic'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!--fim Modal Excluir registro-->
    <!-- /.content -->

