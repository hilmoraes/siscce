<form method="POST" action=""  enctype="multipart/form-data" id="frmCadAluno">
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>Cadastro de usuários</b></h4><hr/>
                <!--
                <p class="text-muted font-13 m-b-30">
                    <button type="button" class="btn btn-success btn-sm w-md waves-effect waves-light" data-toggle="modal" data-target="#import">Importar</button>
                </p>-->
                    
                <ul class="nav nav-tabs tabs-bordered">
                    <li class="active">
                        <a href="#dPessoais" data-toggle="tab" aria-expanded="true">
                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                            <span class="hidden-xs">Dados pessoais</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#endereco" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-user"></i></span>
                            <span class="hidden-xs">Endereço</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#acessos" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-user"></i></span>
                            <span class="hidden-xs">Acesso</span>
                        </a>
                    </li>
                    
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="dPessoais">
                        <div class="col-lg-3 col-md-4">
                            <div class="card-box fotoabm">
                                <div id="profile">
                                    <div class="dashes"></div>
                                </div>
                                <div class="editable">
                                <input type="file" id="mediaFile" name="foto" />
                                </div>
                            </div> 
                        </div>
                        <div class="col-md-5">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="ion ion-android-social-user"></i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Nome" name="nome">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="ti ti-email"></i>
                                </span>
                                <div class="form-line">
                                    <input type="email" class="form-control" placeholder="E-mail" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="ion ion-android-call"></i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Telefone" data-mask="(99) 99999-9999" name="telefone">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="mdi mdi-whatsapp mdi-2x"></i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Telefone" data-mask="(99) 99999-9999" name="celular">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="ti ti-gift"></i>
                                </span>
                                <div class="form-line">
                                    <input id="datepicker-autoclose" type="text" class="form-control" placeholder="dd/mm/aaa" data-mask="99/99/9999" name="dataNasc">
                                </div>
                            </div><br/>
                        </div>
                        <div class="col-md-7" style="padding-left: 42px;">
                            <label>Sexo *:</label>
                            <div class="form-group">
                                
                                <div class="col-sm-3">
                                    <div class="radio radio-info">
                                        <input type="radio" name="gender" id="genderM" value="Male" required="" data-parsley-multiple="gender" name="r_m">
                                        <label for="genderM">
                                            Masculino
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="radio radio-pink">
                                        <input type="radio" name="gender" id="genderF" value="Female" data-parsley-multiple="gender" name="r_f">
                                        <label for="genderF">
                                            Feminino
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="endereco">
                        <div class="col-md-4">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="ti ti-location-pin"></i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Cidade" name="cidade">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="ti ti-map-alt"></i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Bairro" name="bairro">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="ti ti-direction-alt"></i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Rua" name="rua">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="ti ti-home"></i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Casa" name="casa">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="tab-pane" id="acessos">
                        <div class="col-md-12" >
                            <div class="col-md-3" >
                                <div class="input-group">
                                    <span class="input-group-addon">
                                            <i class="mdi mdi-account-key mdi-2x"></i>
                                    </span>
                                    <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="perfil">
                                        <option>Selecione perfil</option>
                                        <option value="">Administrador</option>
                                        <option value="">Recepcionista</option>
                                        <option value="">Instrutor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2" id="ativar">
                                <div class="checkbox checkbox-success">
                                    <input id="status" type="checkbox" name="status">
                                    <label for="status">
                                        Ativar?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12" style="margin-top: 5%;">
                            <div class="col-md-12" align="right">
                                <br/>
                                <hr/>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


       
 

        

          
                        

      



