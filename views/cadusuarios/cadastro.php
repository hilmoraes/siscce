<?php if(!empty($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}?>

<?php include("funcoes/funcoes.php"); ?>

<div class="container-fluid">
  <div class="row mb-2"></div>
</div>

<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="col-md-6">
        <h3 class="card-title" style="color: black;"><b>Cadastrar Usuário</b></h3>
      </div>
    </div>
    <div class="card-body">
      <form method="post" action='<?=BASE_URL;?>cadusuarios/add'>
        <div class="tab-content">
          <div class="row">

            <div class="col-md-2">
              <div class="form-group">
                <label col="usuario">Usuário: <strong style="color: red;"> *</strong></label>
                <input type="text" id="usuario" class="form-control input-sm" name="usuario" required="">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="senha">Senha: <strong style="color: red;"> *</strong></label>
                <input type="password" id="senha" class="form-control input-sm" name="senha" value="123" required="">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="NomeUsu">Apelido: <strong style="color: red;"> *</strong></label>
                <input type="text" id="NomeUsu" class="form-control input-sm" name="NomeUsu" required="">
              </div>
            </div>

            <div class="col-md-1">
              <div class="form-group">
                <label for="Sexo">Sexo: <strong style="color: red;"> *</strong></label>
                <select name="Sexo" id="Sexo" class="form-control input-sm" required="">
                  <option></option>
                  <option value="F">F</option>
                  <option value="M">M</option>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label col="id_status">Status: <strong style="color: red;"> *</strong></label>
                <select name="id_status" id="id_status" class="form-control select2bs4" style="width: 100%;"  required="">
                  <option value="">Escolha Status</option>
                  <?php foreach($status as $list):?>
                    <option value="<?=$list['id_status'];?>"><?=$list['nm_status'];?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label col="FuncaoUsu">Função:</label>
                <input type="text" id="FuncaoUsu" class="form-control input-sm" name="FuncaoUsu">
              </div>
            </div>

          </div>
        </div>
        <!-- <hr/> -->
        <div class="col-md-12">
          <input type="submit" value="Salvar" class="btn btn-primary"/>
          <a href="<?=BASE_URL;?>cadusuarios/lista"><input type="button" value="Cancelar" class="btn btn-warning" /></a>
        </div>
      </form>
    </div>
  </div>
</div>
