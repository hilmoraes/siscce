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
        <h3 class="card-title" style="color: black;"><b>Cadastrar Parceiros</b></h3>
      </div>
    </div>

    <div class="card-body">
      <form method="post" action='<?=BASE_URL;?>parceiros/add'>
        <div class="tab-content">
            <div class="row">

              <div><input type="hidden" id="CodEmp" value="1" name="CodEmp"></div>

              <div class="col-md-4">
                <div class="form-group">
                  <label col="NomePar">Parceiro: <strong style="color: red;"> *</strong></label>
                  <input type="text" id="NomePar" class="form-control input-sm" name="NomePar" required="">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="DtCadPar">Data Cadastro:</label>
                  <input type="date" id="DtCadPar" class="form-control input-sm" name="DtCadPar">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label col="Fone1Par">Telefone 1:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" id="Fone1Par" class="form-control input-sm" name="Fone1Par">
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
                    <input type="text" id="Fone2Par" class="form-control input-sm" name="Fone2Par">
                  </div>
                </div>
              </div>

<!--               <div class="col-md-2">
                <div class="form-group">
                  <label for="FJPar">Fisica ou Juridica?</label>
                  <select name="FJPar" id="FJPar" class="form-control input-sm">
                    <option></option>
                    <option value="FISICA">FISICA</option>
                    <option value="JURIDICA">JURIDICA</option>
                  </select>
                </div>
              </div> -->

              <div class="col-md-2">
                <div class="form-group">
                  <label for="FJPar">Fisica ou Juridica?</label>
                  <select name="FJPar" id="FJPar" class="form-control input-sm">
                    <option></option>
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
                  <label col="inscricao">CNPJ: <strong style="color: red;"> *</strong></label>
                  <input type="text" id="inscricao" class="form-control input-sm" name="inscricao" onchange="validarCNPJ_CPF(this.value)" required="">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label col="EmailPar">E-Mail:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" id="EmailPar" class="form-control input-sm" name="EmailPar">
                  </div>
                </div>
              </div>

              <div class="col-md-7">
                <div class="form-group">
                  <label col="Obs">Obs:</label>
                  <textarea name="Obs" rows="2" cols="5" id="Obs" class="form-control input-sm"></textarea>
                </div>
              </div>

            </div>

        </div>
        <!-- <hr/> -->
        <div class="col-md-12">
          <input type="submit" value="Salvar" class="btn btn-primary"/>
          <a href="<?=BASE_URL;?>parceiros/lista"><input type="button" value="Cancelar" class="btn btn-warning" /></a>
        </div>
      </form>
    </div>
  </div>
</div>
