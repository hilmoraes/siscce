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
        <h3 class="card-title" style="color: black;"><b>Editar Prefeitura</b></h3>
      </div>
    </div>

    <div class="card-header p-2">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab"><b>Pessoais</b></a></li>
        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab"><b>Endereço</b></a></li>
      </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
      <form method="post" action="<?=BASE_URL;?>prefeituras/update">
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <div class="row">
              <div><input type="hidden" value="<?=$prefeitura['cmpCodPre'];?>" name="id"></div>
              <div class="col-md-5">
                <div class="form-group">
                  <label col="NomPre">Nome: <strong style="color: red;"> *</strong></label>
                  <input type="text" id="NomPre" class="form-control input-sm" name="NomPre" value="<?php echo $prefeitura['cmpNomPre'];?>" required="">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label col="DtCadPre">Data Cadastro:</label>
                  <input type="date" id="DtCadPre" class="form-control input-sm" name="DtCadPre" value='<?php echo $prefeitura['cmpDtCadPre'];?>' required="">
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
                    <input type="text" id="Fone1Pre" class="form-control input-sm" name="Fone1Pre" value="<?php echo $prefeitura['cmpFone1Pre'];?>">
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
                    <input type="text" id="Fone2Pre" class="form-control input-sm" name="Fone2Pre" value="<?php echo $prefeitura['cmpFone2Pre'];?>">
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
                    <input type="email" id="EmailPre" class="form-control input-sm" name="EmailPre" value="<?php echo $prefeitura['cmpEmailPre'];?>">
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
                    <input type="text" id="SitePre" class="form-control input-sm" name="SitePre" value="<?php echo $prefeitura['cmpSitePre'];?>">
                  </div>
                </div>
              </div>

              <div class="col-md-1">
                <div class="form-group">
                  <label col="inativo">Inativo:</label>
                    <?php if ($prefeitura['inativo'] == 1) {  ?>
                      <center><input type="checkbox" id="inativo" class="" name="inativo" checked></center>
                    <?php
                    } else { ?>
                      <center><input type="checkbox" id="inativo" class="" name="inativo"></center>
                    <?php
                    }
                    ?>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label col="Obs">Obs:</label>
                  <textarea name="Obs" rows="2" cols="5" id="Obs" class="form-control input-sm"><?php echo $prefeitura['cmpObs'];?></textarea>
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
                    <input type="text" id="EndPre" class="form-control input-sm" name="EndPre" value="<?php echo $prefeitura['cmpEndPre'];?>">
                  </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="NumEndPre">Número:</label>
                  <input type="text" id="NumEndPre" class="form-control input-sm" name="NumEndPre" value="<?php echo $prefeitura['cmpNumEndPre'];?>">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label col="BaiPre">Bairro:</label>
                  <input type="text" id="BaiPre" class="form-control input-sm" name="BaiPre" value="<?php echo $prefeitura['cmpBaiPre'];?>">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="CepPre">Cep:</label>
                  <input type="text" id="CepPre" class="form-control input-sm" name="CepPre" value="<?php echo $prefeitura['cmpCepPre'];?>">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label col="cidade">Cidade:</label>
                  <select name="cidade" id="cidade" class="form-control select2bs4" style="width: 100%;">
                    <option value="<?php echo $prefeitura['cmpCodCid'];?>"><?php echo $prefeitura['nm_cidade'];?></option>
                    <option value="">Escolha Cidade</option>
                    <?php foreach($cidades as $cida):?>
                       <option value="<?=$cida['id_cidade'];?>"><?=$cida['nm_cidade'];?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- <hr/> -->
        <div class="col-md-12">
          <input type="submit" value="Alterar" class="btn btn-primary"/>
          <a href="<?=BASE_URL;?>prefeituras/lista"><input type="button" value="Cancelar" class="btn btn-warning" /></a>
        </div>
      </form>
    </div>
  </div>
</div>
