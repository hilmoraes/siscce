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
        <h3 class="card-title" style="color: black;"><b>Cadastrar Prefeitura</b></h3>
      </div>
    </div>

    <div class="card-header p-2">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab"><b>Pessoais</b></a></li>
        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab"><b>Endereço</b></a></li>
      </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
      <form method="post" action='<?=BASE_URL;?>prefeituras/add'>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <div class="row">

              <div class="col-md-5">
                <div class="form-group">
                  <label col="NomPre">Nome: <strong style="color: red;"> *</strong></label>
                  <input type="text" id="NomPre" class="form-control input-sm" name="NomPre" required="">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label col="DtCadPre">Data Cadastro:</label>
                  <input type="date" id="DtCadPre" class="form-control input-sm" name="DtCadPre" value='<?php echo date('Y-m-d'); ?>' required="">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="Fone1Pre">Telefone 1:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <!-- <input type="text" id="Fone1Pre" class="form-control input-sm" name="Fone1Pre" data-inputmask="&quot;mask&quot;: &quot;(99)9999-9999&quot;" data-mask=""> -->
                    <input type="text" id="Fone1Pre" class="form-control input-sm" name="Fone1Pre">
                  </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="Fone2Pre">Telefone 2:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <!-- <input type="text" id="Fone2Pre" class="form-control input-sm" name="Fone2Pre" data-inputmask="&quot;mask&quot;: &quot;(99)99999-9999&quot;" data-mask=""> -->
                    <input type="text" id="Fone2Pre" class="form-control input-sm" name="Fone2Pre">
                  </div>
                </div>
              </div>

              <div class="col-md-5">
                <div class="form-group">
                  <label col="EmailPre">E-Mail:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" id="EmailPre" class="form-control input-sm" name="EmailPre">
                  </div>
                </div>
              </div>

              <div class="col-md-5">
                <div class="form-group">
                  <label col="SitePre">Site:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="text" id="SitePre" class="form-control input-sm" name="SitePre">
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label col="Obs">Obs:</label>
                  <textarea name="Obs" rows="2" cols="5" id="Obs" class="form-control input-sm"></textarea>
                </div>
              </div>

            </div>
          </div>

          <div class="tab-pane" id="tab_2">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label col="EndPre">Endereço:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                    </div>
                    <input type="text" id="EndPre" class="form-control input-sm" name="EndPre">
                  </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="NumEndPre">Número:</label>
                  <input type="text" id="NumEndPre" class="form-control input-sm" name="NumEndPre">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label col="BaiPre">Bairro:</label>
                  <input type="text" id="BaiPre" class="form-control input-sm" name="BaiPre">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="CepPre">Cep:</label>
                  <input type="text" id="CepPre" class="form-control input-sm" name="CepPre">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label col="cidade">Cidade:</label>
                  <select name="cidade" id="cidade" class="form-control select2bs4" style="width: 100%;"  >
                    <option value="">Escolha Cidade</option>
                    <?php foreach($cidades as $list):?>
                      <option value="<?=$list['id_cidade'];?>"><?=$list['nm_cidade'];?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- <hr/> -->
        <div class="col-md-12">
          <input type="submit" value="Salvar" class="btn btn-primary"/>
          <a href="<?=BASE_URL;?>prefeituras/lista"><input type="button" value="Cancelar" class="btn btn-warning" /></a>
        </div>
      </form>
    </div>
  </div>
</div>
