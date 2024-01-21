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
          <h3 class="card-title" style="color: black;"><b>Lista de Parceiros</b></h3>
          <div class="card-tools">
            <a href="<?=BASE_URL;?>parceiros" type="button" class="btn btn-tool" title="Cadastrar Novo" data-widget="" value="Cadastrar"><input type="button" value="Cadastrar" class="btn btn-block btn-primary btn-sm"/></a>
            <a href="<?=BASE_URL;?>" type="button" class="btn btn-tool" title="Fechar" data-card-widget=""><input type="button" value="Voltar" class="btn btn-block btn-success btn-sm"/></a>
          </div>  
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <!--Tabela-->
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Nome</th>
              <th width="12%">CPF/CNPJ</th>
              <th width="10%">Fone1</th>
              <th width="10%">Fone2</th>
              <th width="20%">Email</th>
              <th width="8%">Ult.Usuário</th>
              <th width="14%">Ações</th>
            </tr>
            </thead>
            <tbody>
              <?php foreach($parceiros as $list):?>
              <tr <?=$list['inativo']==1?'style="color: #f39c12;"':'';?>>
                <td><?php echo $list['cmpNomePar'];?></td>
                <td><?php echo $list['cmpCpfCnpjPar'];?></td>
                <td><?php echo $list['cmpFone1Par'];?></td>
                <td><?php echo $list['cmpFone2Par'];?></td>
                <td><?php echo $list['cmpEmailPar'];?></td>
                <td><?php echo $list['usuario'];?></td>
                <td>
                  <a href="<?=BASE_URL;?>parceirossub/lista/<?=$list['cmpCodPar'];?>" class="btn btn-sm btn-icon btn-outline-success img-circle" title="Contatos do Parceiro"><i class="fa fa-user"></i></a>

                  <a href="<?=BASE_URL;?>parceiroscontas/lista/<?=$list['cmpCodPar'];?>" class="btn btn-sm btn-icon btn-outline-warning img-circle" title="Contas Bancária"><i class="fas fa-file-alt"></i></a>
                  
                  <a href="<?=BASE_URL;?>parceiros/edit/<?=$list['cmpCodPar'];?>" class="btn btn-sm btn-icon btn-outline-primary img-circle" title="Editar"><i class="ik ik-edit-2"></i></a>

                  <a title="Deletar" data-placement="top" data-toggle="modal"  href="" data-target="#delete<?=$list['cmpCodPar'];?>" class="btn btn-sm btn-icon btn-outline-danger img-circle" title="Excluir"><i class="far fa-trash-alt"></i></a>

                </td>
              </tr>

            <!-- Modal Excluir registro-->
              <div id="delete<?=$list['cmpCodPar'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-sm">
                    <div class="modal-content p-0 b-0">
                        <div class="panel panel-color panel-danger">
                            <div class="panel-heading">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <!-- <h3 class="panel-title"><i class="fa fa-warning aviso"></i> Excluir</h3> -->
                            </div>
                            <div class="panel-body">
                                <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpNomePar'];?></strong> ?</p>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                    <a href="<?=BASE_URL;?>parceiros/excluir/<?=$list['cmpCodPar'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
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
                                <p style="margin-left: 10px; margin-top: 10px;">Deseja realmente excluir o registro de <strong><?php echo $list['cmpNomePar'];?></strong> ?</p>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Não</button>
                                    <a href="<?=BASE_URL;?>parceiros/excluir/<?=$list['cmpCodPar'];?>" class="btn btn-danger waves-effect waves-light">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!--fim Modal Excluir registro-->
    <!-- /.content -->



<!-- Modal editar registro-->
<div class="modal fade" id="edit">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=BASE_URL;?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=BASE_URL;?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header box-header with-border painel-sistem">
          <h4 class="modal-title title-edit"><b>Contatos</b></h4>
      </div>
      <div class="modal-body"  style="color: #2943a8">
          <div id="btnAdd" style="margin-bottom: 10px;" align="right">
             <input  type="button" id="contato" onClick="contEditPar(this.value);" class="btn btn-info" value="Adicionar">
              <!-- <br/> -->
          </div>
          <!-- form start -->
          <div class="collapse" id="cadContatoPar">
            <!-- <form role="form" id="frmCont"> -->
              <div class="box-body">
                <input type="hidden" class="form-control" nome="idParCon" id="idParCon" value="">
                <input type="hidden" id="user" name="user" value="<?=$_SESSION['login'];?>">
                <input type="hidden" class="form-control" nome="idCon" id="idCon" value="">
                <h3 class="loader">Carregando Dados...</h1>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="NomeRes">Nome</label>
                      <input type="text" class="form-control" id="NomeRes" value="">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="FoneRes">Fone</label>
                      <input type="text" class="form-control" id="FoneRes" value="">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="CelularRes">Celular</label>
                      <input type="text" class="form-control" id="CelularRes" value="">
                    </div>
                  </div>
                  
                  <div class="col-md-2">
                     <div class="form-group">
                      <label for="CpfRes">CPF</label>
                      <input type="text" class="form-control" id="CpfRes" value="">
                    </div>
                  </div>
                  <div class="col-md-2" >
                    <div class="form-group">
                      <label for="RgRes">RG</label>
                      <input type="text" class="form-control" id="RgRes" value="">
                    </div>
                  </div>


                  <div class="col-md-4" >
                    <div class="form-group">
                      <label for="EndRes">Endereço</label>
                      <input type="text" class="form-control" id="EndRes" value="">
                    </div>
                  </div>
                  <div class="col-md-1" >
                    <div class="form-group">
                      <label for="NumEndRes">Nº</label>
                      <input type="text" class="form-control" id="NumEndRes" value="">
                    </div>
                  </div>
                  <div class="col-md-2" >
                    <div class="form-group">
                      <label for="BaiRes">Bairro</label>
                      <input type="text" class="form-control" id="BaiRes" value="">
                    </div>
                  </div>
                  <div class="col-md-2" >
                    <div class="form-group">
                      <label for="CepRes">CEP</label>
                      <input type="text" class="form-control" id="CepRes" value="">
                    </div>
                  </div>
                  <div class="col-md-3" >
                    <div class="form-group">
                      <label for="CodCidRes">Cidade/Uf</label>
                      <input type="text" class="form-control" id="CodCidRes" value="">
                    </div>
                  </div>
                  <div class="col-md-5" align="" style="margin-bottom: 10px;">
                      <button type="" id="addContPar" onclick="addContaPar()" class="btn btn-primary">Cadastrar</button>
                  </div>
                  <div class="col-md-1 " align="" id="editContatoPar" style="margin-bottom: 10px;">
                      <button type="" id="addContPar" onclick="editContaPar()" class="btn btn-warning">Editar</button>
                  </div>
                  
                  <div class="col-md-2 " style="margin-bottom: 10px; margin-left: 5px;">
                      <button id="editCancelPar" onclick="cancelarPar()" class="btn btn-success">Cancelar</button>
                  </div>
                </div>
              </div>
            <!-- </form> -->
          </div>
          <table class="tableCont table table-hover table-responsive table-sm">
            <thead>
              <tr style="background-color: #7dbc3e; color: #fff;">
                <th width="32%">Nome</th>
                <th width="15%">Telefone 1</th>
                <th width="15%">Telefone 2</th>
                <th width="15%">CNPJ</th>
                <th width="15%">IE</th>
                <th width="4%">Ações</th>
                <th width="4%"> </th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
        <!-- <button type="button" class="btn btn-primary">Alterar</button> -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
<script src="<?=BASE_URL;?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</div>
<!-- /.modal -->
