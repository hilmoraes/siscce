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
        <h3 class="card-title" style="color: black;"><b>Editar Empresa</b></h3>
      </div>
    </div>

    <div class="card-header p-2">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab"><b>Pessoais</b></a></li>
        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab"><b>Endereço</b></a></li>
      </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
      <form method="post" action="<?=BASE_URL;?>empresas/update">
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <div class="row">
              <div><input type="hidden" value="<?=$empresa['cmpCodEmp'];?>" name="id"></div>
              <!-- <input id="inativo" name="inativo" value="<?=$empresa['inativo'];?>" type="hidden"> -->
              <div class="col-md-6">
                <div class="form-group">
                  <label col="NomeEmp">Nome: <strong style="color: red;"> *</strong></label>
                  <input type="text" id="NomeEmp" class="form-control input-sm" name="NomeEmp" value="<?php echo $empresa['cmpNomeEmp'];?>" required="">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label col="Fone1Emp">Telefone 1:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <!-- <input type="text" id="Fone1Emp" class="form-control input-sm" name="Fone1Emp" data-inputmask="&quot;mask&quot;: &quot;(99)9999-9999&quot;" data-mask=""> -->
                    <input type="text" id="Fone1Emp" class="form-control input-sm" name="Fone1Emp" value="<?php echo $empresa['cmpFone1Emp'];?>">
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label col="Fone2Emp">Telefone 2:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <!-- <input type="text" id="Fone2Emp" class="form-control input-sm" name="Fone2Emp" data-inputmask="&quot;mask&quot;: &quot;(99)99999-9999&quot;" data-mask=""> -->
                    <input type="text" id="Fone2Emp" class="form-control input-sm" name="Fone2Emp" value="<?php echo $empresa['cmpFone2Emp'];?>">
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label col="CnpjEmp">CNPJ: <strong style="color: red;"> *</strong></label>
                  <input type="text" id="CnpjEmp" class="form-control input-sm" name="CnpjEmp" value="<?php echo $empresa['cmpCnpjEmp'];?>" required="">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label col="CgfEmp">I. E.:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="Cgf" id="CgfEmp" class="form-control input-sm" name="CgfEmp" value="<?php echo $empresa['cmpCgfEmp'];?>">
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label col="BancoEmp">Banco:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="text" id="BancoEmp" class="form-control input-sm" name="BancoEmp" value="<?php echo $empresa['cmpBancoEmp'];?>">
                  </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="AgEmp">Ag:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="text" id="AgEmp" class="form-control input-sm" name="AgEmp" value="<?php echo $empresa['cmpAgEmp'];?>">
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label col="CCEmp">Conta:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="text" id="CCEmp" class="form-control input-sm" name="CCEmp" value="<?php echo $empresa['cmpCCEmp'];?>">
                  </div>
                </div>
              </div>

              <div class="col-md-1">
                <div class="form-group">
                  <label col="inativo">Inativo:</label>
                    <?php if ($empresa['inativo'] == 1) {  ?>
                      <center><input type="checkbox" id="inativo" class="" name="inativo" checked></center>
                    <?php
                    } else { ?>
                      <center><input type="checkbox" id="inativo" class="" name="inativo"></center>
                    <?php
                    }
                    ?>
                </div>
              </div>

            </div>
          </div>

          <div class="tab-pane" id="tab_2">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label col="EndEmp">Endereço:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                    </div>
                    <input type="text" id="EndEmp" class="form-control input-sm" name="EndEmp" value="<?php echo $empresa['cmpEndEmp'];?>">
                  </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="NumEndEmp">Número:</label>
                  <input type="text" id="NumEndEmp" class="form-control input-sm" name="NumEndEmp" value="<?php echo $empresa['cmpNumEndEmp'];?>">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="ComplEmp">Complemento:</label>
                  <input type="text" id="ComplEmp" class="form-control input-sm" name="ComplEmp" value="<?php echo $empresa['cmpComplEmp'];?>">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="BairroEmp">Bairro:</label>
                  <input type="text" id="BairroEmp" class="form-control input-sm" name="BairroEmp" value="<?php echo $empresa['cmpBairroEmp'];?>">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="CepEmp">Cep:</label>
                  <input type="text" id="CepEmp" class="form-control input-sm" name="CepEmp" value="<?php echo $empresa['cmpCepEmp'];?>">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label col="cidade">Cidade:</label>
                  <select name="cidade" id="cidade" class="form-control select2bs4" style="width: 100%;">
                    <option value="<?php echo $empresa['cmpCodCid'];?>"><?php echo $empresa['nm_cidade'];?></option>
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
          <a href="<?=BASE_URL;?>empresas/lista"><input type="button" value="Cancelar" class="btn btn-warning" /></a>
        </div>
      </form>
    </div>
  </div>
</div>
