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
          <h3 class="card-title" style="color: black;"><b>Lista de Empresas</b></h3>
          <div class="card-tools">
<!--             <a href="<?=BASE_URL;?>empresas" type="button" class="btn btn-tool" title="Cadastrar Novo" data-widget="" value="Cadastrar"><input type="button" value="Cadastrar" class="btn btn-block btn-primary btn-sm"/></a> -->
            <a href="<?=BASE_URL;?>" type="button" class="btn btn-tool" title="Fechar" data-card-widget=""><input type="button" value="Voltar" class="btn btn-block btn-sm btn-success"/></a>
          </div>  
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <!--Tabela-->
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Empresa</th>
              <th>CNPJ</th>
              <th>Fone1</th>
              <th>Fone2</th>
              <th width="8%">Ações</th>
            </tr>
            </thead>
            <tbody>
              <?php foreach($empresas as $list):?>
                <tr <?=$list['inativo']==1?'style="color: #f39c12;"':'';?>>
                  <td><?php echo $list['cmpNomeEmp'];?></td>
                  <td><?php echo $list['cmpCnpjEmp'];?></td>
                  <td><?php echo $list['cmpFone1Emp'];?></td>
                  <td><?php echo $list['cmpFone2Emp'];?></td>
                  <td>
                    <a href="<?=BASE_URL;?>empresas/edit/<?=$list['cmpCodEmp'];?>" class="btn btn-sm btn-icon btn-outline-primary img-circle" title="Editar"><i class="ik ik-edit-2"></i></a>
                  </td>
                </tr>
              <?php endforeach;?> 
            </tbody>
          </table>
        </div>
    <!-- /.row -->

      </div>
  </div>
  <!-- /.container-fluid -->
</section>

