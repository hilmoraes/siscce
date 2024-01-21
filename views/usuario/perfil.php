<?php 
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    // echo strftime('%B', strtotime('today')) ;
?>
<form method="POST" action=""  enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="text-center card-box">
                            <div class="member-card">

                                <img id="foto" src="<?=BASE_URL;?>assets/images/users/hevila.jpg" class="img-circle  viewFoto" alt="profile-image">

                                <div class="btnPerfil">
                                <label for="upload"><i class="fa fa-folder-open-o mdi-2x"></i></label>
                                <input type="file" name="foto" id="upload">
                                </div>

                                <div class="">
                                    <h4 class="m-b-5"><?=$perfil['nome'];?></h4>
                                </div>

                                <hr/>

                                <div class="text-left">
                                    <p class="text-muted font-13"><strong>Função :</strong> <span class="m-l-15"><?=$perfil['funcao'];?></span></p>

                                    <p class="text-muted font-13"><strong>Aniversário :</strong> <span class="m-l-15"><?php echo  strftime('%B', strtotime($perfil['data_nascimento']));?></span></p>

                                    <p class="text-muted font-13"><strong>Telefone :</strong><span class="m-l-15"><?=$perfil['telefone'];?></span></p>

                                    <p class="text-muted font-13"><strong>E-mail :</strong> <span class="m-l-15"><?=$perfil['email'];?></span></p>

                                    <!-- <p class="text-muted font-13"><strong>Data de admissão :</strong> <span class="m-l-15">10/05/2017</span></p> -->

                                </div>

                            </div>

                        </div> <!-- end card-box -->

                    </div> <!-- end col -->

                    <div class="col-md-8 col-lg-9">
                        <h4>Perfil</h4>
                        <ul class="nav nav-tabs tabs-bordered">
                            <li class="active">
                                <a href="#home-b1" data-toggle="tab" aria-expanded="true">
                                    <span class="visible-xs"><i class="fa fa-home"></i></span>
                                    <span class="hidden-xs">Dados pessoais</span>
                                </a>
                            </li>
                            <!-- <li class="">
                                <a href="#profile-b1" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-user"></i></span>
                                    <span class="hidden-xs">Endereço</span>
                                </a>
                            </li> -->
                            <li class="">
                                <a href="#acessos" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                                    <span class="hidden-xs">Acessos</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home-b1">
                                <div class="col-md-4">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">
                                            <i class="ion ion-android-social-user"></i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?=$perfil['nome'];?>" placeholder="Nome" name="nome">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">
                                            <i class="ti ti-email"></i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?=$perfil['email'];?>" placeholder="E-mail" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">
                                            <i class="ion ion-android-call"></i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?=$perfil['telefone'];?>" placeholder="Telefone" data-mask="(99) 99999-9999" name="telefone">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">
                                            <i class="mdi mdi-whatsapp mdi-2x"></i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?=$perfil['celular'];?>" placeholder="Celular" data-mask="(99) 99999-9999" name="celular">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">
                                            <i class="ti ti-gift"></i>
                                        </span>
                                        <div class="form-line">
                                            <input id="datepicker-autoclose" type="text" value="<?=date('d/m/Y', strtotime($perfil['data_nascimento']));?>" class="form-control" placeholder="dd/mm/aaa" data-mask="99/99/9999" name="dataNasc">
                                        </div>
                                    </div><br/>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile-b1">
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
                            
                                <div class="row" >
                                    <br/>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="mdi mdi-account-key mdi-2x"></i>
                                            </span>
                                            <select id="perfil" class="form-control select2 select2-hidden-accessible" style="display: none;" tabindex="-1" aria-hidden="true" name="perfil">
                                                <option>Selecione perfil</option>
                                                <option value="<">Administrador</option>
                                                <option value="">Recepcionista</option>
                                                <option value="">Instrutor</option>
                                            </select>
                                            <div class="form-line" id="mudePer">
                                                <input type="text" class="form-control" value="Instrutor" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-1">
                                        <button id="mudarperfil" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="Mudar perfil"><i class="mdi mdi-account-convert mdi-2x" ></i></button>
                                    </div> -->
                                        
                                </div>
                                <div class="row">
                                    <br/>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon">
                                                <i class="mdi mdi-key-variant"></i>
                                            </span>
                                            <div class="form-line">
                                                <input type="password" class="form-control" placeholder="Senha atual" name="senhaAtual">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <br/>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon">
                                                <i class="mdi mdi-key-variant"></i>
                                            </span>
                                            <div class="form-line">
                                                <input type="password" class="form-control" placeholder="Nova senha" name="senha">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                        <!-- end col -->
                        <div class="col-md-12" align="right">
                            <br/>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Alterar</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</form>