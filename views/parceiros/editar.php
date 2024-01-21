<?php if(!empty($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}?>

<?php 
  include("funcoes/funcoes.php"); 
  $tipopessoa = tipoPessoa::getTipoPessoaArray();
?>

<div class="container-fluid">
  <div class="row mb-2"></div>
</div>

<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="col-md-6">
        <h3 class="card-title" style="color: black;"><b>Editar Parceiro</b></h3>
      </div>
    </div>

    <div class="card-body">
      <form method="post" action="<?=BASE_URL;?>parceiros/update">
        <div class="tab-content">
          <div class="row">
            <div><input type="hidden" value="<?=$parceiro['cmpCodPar'];?>" name="id"></div>
            <div><input type="hidden" value="<?=$parceiro['cmpCodEmp'];?>" name="CodEmp"></div>
            <div class="col-md-4">
              <div class="form-group">
                <label col="NomePar">Parceiro: <strong style="color: red;"> *</strong></label>
                <input type="text" id="NomePar" class="form-control input-sm" name="NomePar" value="<?php echo $parceiro['cmpNomePar'];?>" required="">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="DtCadPar">Data Cadastro:</label>
                <input type="date" id="DtCadPar" class="form-control input-sm" name="DtCadPar" value="<?php echo $parceiro['cmpDtCadPar'];?>">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="Fone1Par">Telefone 1:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" id="Fone1Par" class="form-control input-sm" name="Fone1Par" value="<?php echo $parceiro['cmpFone1Par'];?>">
                </div>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="Fone2Par">Telefone 2:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" id="Fone2Par" class="form-control input-sm" name="Fone2Par" value="<?php echo $parceiro['cmpFone2Par'];?>">
                </div>
              </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                  <label for="FJPar">Fisica ou Juridica?</label>
                  <select name="FJPar" id="FJPar" class="form-control input-sm">
                    <option value="<?php echo $parceiro['cmpFJPar'];?>"><?php echo $parceiro['cmpFJPar'];?></option>
                    <?php
                    foreach ($tipopessoa as $day) {
                        echo "<option value=\"$day\">$day</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>

            <div class="col-md-2">
              <div class="form-group">
                <label col="inscricao">CPF/CNPJ: <strong style="color: red;"> *</strong></label>
                <input type="text" id="inscricao" class="form-control input-sm" name="inscricao" value="<?php echo $parceiro['cmpCpfCnpjPar'];?>" onchange="validarCNPJ_CPF(this.value)" required="">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label col="EmailPar">E-Mail:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" id="EmailPar" class="form-control input-sm" name="EmailPar" value="<?php echo $parceiro['cmpEmailPar'];?>">
                </div>
              </div>
            </div>

            <div class="col-md-1">
              <div class="form-group">
                <label col="inativo">Inativo:</label>
                  <?php if ($parceiro['inativo'] == 1) {  ?>
                    <center><input type="checkbox" id="inativo" class="" name="inativo" checked></center>
                  <?php
                  } else { ?>
                    <center><input type="checkbox" id="inativo" class="" name="inativo"></center>
                  <?php
                  }
                  ?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label col="Obs">Obs:</label>
                <textarea name="Obs" rows="2" cols="5" id="Obs" class="form-control input-sm"><?php echo $parceiro['cmpObs'];?></textarea>
              </div>
            </div>

          </div>
        </div>
        <!-- <hr/> -->
        <div class="col-md-12">
          <input type="submit" value="Alterar" class="btn btn-primary"/>
          <a href="<?=BASE_URL;?>parceiros/lista"><input type="button" value="Cancelar" class="btn btn-warning" /></a>
        </div>
      </form>
    </div>
  </div>
</div>



<script>
  var DataNascFor = document.getElementById('DataNascFor').value;
  if (DataNascFor == "0001-01-01") {
      document.getElementById('DataNascFor').value = null;
  }
</script>