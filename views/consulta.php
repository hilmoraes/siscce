
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Consulta</b></h4><hr/>
            <p class="text-muted font-13 m-b-30">
                <button type="button" class="btn btn-success btn-rounded w-md waves-effect waves-light" data-toggle="modal" data-target="#teste">Cadastrar</button>
            </p>

            <table id="datatable-buttons" class="table table-striped  table-colored table-info table-centered ">
                <thead>
                <tr>
                    <th style="width: 50px">Foto</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Ativo</th>
                    <th align="center">Ações</th>
                </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><img src="<?=BASE_URL;?>media/Professor/Abymael.jpeg" class="img-circle thumb-md"></td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>61</td>
                        <td>
                            <input type="checkbox" id="switch4" data-switch="success" checked/>
                            <label for="switch4" data-on-label="Sim"                          data-off-label="Não"></label>
                        </td>
                        <td>
                            <a title="" data-placement="top" data-toggle="tooltip" class="actionAluno" href="" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                        
                            <a title="" data-placement="top" data-toggle="tooltip" class="actionAluno" href="" data-original-title="Deletar"><i class="mdi mdi-delete "></i></a>
                        
                        </td>
                    </tr>
                    <tr>
                        <td><img src="<?=BASE_URL;?>media/Professor/pf1.jpg" class="img-circle thumb-md"></td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>61</td>
                        <td>
                            <input type="checkbox" id="switch4" data-switch="success" checked/>
                            <label for="switch4" data-on-label="Sim"                          data-off-label="Não"></label>
                        </td>
                       <td>
                            <a title="" data-placement="top" data-toggle="tooltip" class="actionAluno" href="" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                        
                            <a title="" data-placement="top" data-toggle="tooltip" class="actionAluno" href="" data-original-title="Deletar"><i class="mdi mdi-delete "></i></a>
                        
                        </td>
                    </tr>
                    <tr>
                        <td><img src="<?=BASE_URL;?>media/Professor/pf2.jpg" class="img-circle  thumb-md"></td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>61</td>
                        <td>
                            <input type="checkbox" id="switch4" data-switch="success" checked/>
                            <label for="switch4" data-on-label="Sim"                          data-off-label="Não"></label>
                        </td>
                        <td>
                            <a title="" data-placement="top" data-toggle="tooltip" class="actionAluno" href="" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                        
                            <a title="" data-placement="top" data-toggle="tooltip" class="actionAluno" href="" data-original-title="Deletar"><i class="mdi mdi-delete "></i></a>
                        
                        </td>
                    </tr>
                    <tr>
                        <td><img src="<?=BASE_URL;?>media/Professor/pf3.jpg" class="img-circle  thumb-md"></td>
                        <td>Senior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>22</td>
                        <td>61</td>
                        <td>
                            <input type="checkbox" id="switch1" data-switch="success" checked/>
                            <label for="switch1" data-on-label="Sim"                       data-off-label="Não"></label>
                        </td>
                        <td>
                            <a title="" data-placement="top" data-toggle="tooltip" class="actionAluno" href="" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                        
                            <a title="" data-placement="top" data-toggle="tooltip" class="actionAluno" href="" data-original-title="Deletar"><i class="mdi mdi-delete "></i></a>
                        
                        </td>
                    </tr>
                    <tr>
                        <td><img src="<?=BASE_URL;?>media/Professor/pf4.jpg" class="img-circle  thumb-md"></td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>61</td>
                        <td>33</td>
                        <td>
                            <input type="checkbox" id="switch2" data-switch="success" checked/>
                            <label for="switch2" data-on-label="Sim"                          data-off-label="Não"></label>
                        </td>
                        <td>
                            <a title="" data-placement="top" data-toggle="tooltip" class="actionAluno" href="" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                        
                            <a title="" data-placement="top" data-toggle="tooltip" class="actionAluno" href="" data-original-title="Deletar"><i class="mdi mdi-delete "></i></a>
                        
                        </td>
                    </tr>
                    <tr>
                        <td><img src="<?=BASE_URL;?>media/Professor/pf5.jpg" class="img-circle  thumb-md"></td>
                        <td>Integration Specialist</td>
                        <td>New York</td>
                        <td>61</td>
                        <td>61</td>
                        <td>
                            <input type="checkbox" id="switch3" data-switch="success" checked/>
                            <label for="switch3" data-on-label="Sim"                       data-off-label="Não"></label>
                        </td>
                        <td>
                            <a title="" data-placement="top" data-toggle="tooltip" class="actionAluno" href="" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                        
                            <a title="" data-placement="top" data-toggle="tooltip" class="actionAluno" href="" data-original-title="Deletar"><i class="mdi mdi-delete "></i></a>
                        
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal Cadastro de Alunos -->
<div id="panel-modal" class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-0 b-0">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="panel-title">Alunos</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="row">
                            <h5>Dados Pessoais</h5>
                            <div class="col-md-6">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon">
                                        <i class="ion ion-android-social-user"></i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon">
                                        <i class="ti ti-email"></i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="E-mail">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon">
                                        <i class="ion ion-android-call"></i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Telefone" data-mask="(99) 99999-9999">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon">
                                        <i class="fa fa-whatsapp"></i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Telefone" data-mask="(99) 99999-9999">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon">
                                        <i class="mdi mdi-cake-variant mdi-2x"></i>
                                    </span>
                                    <div class="form-line">
                                        <input id="datepicker-autoclose" type="text" class="form-control" placeholder="dd/mm/aaa" data-mask="99/99/9999">
                                    </div>
                                </div><br/>
                            </div>
                            <div class="col-md-7" style="padding-left: 42px;">
                                <div class="form-group">
                                    <label>Sexo *:</label>

                                    <div class="radio radio-info">
                                        <input type="radio" name="gender" id="genderM" value="Male" required="" data-parsley-multiple="gender">
                                        <label for="genderM">
                                            Masculino
                                        </label>
                                    </div>
                                    <div class="radio radio-pink">
                                        <input type="radio" name="gender" id="genderF" value="Female" data-parsley-multiple="gender">
                                        <label for="genderF">
                                            Feminino
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                           <h5>Endereço</h5>
                           <div class="col-md-4">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon">
                                        <i class="ti ti-location-pin"></i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Cidade">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon">
                                        <i class="ti ti-map-alt"></i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Bairro">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon">
                                        <i class="ti ti-direction-alt"></i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Rua">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon">
                                        <i class="ti ti-home"></i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Casa">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                         <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Sair</button>
                            <button type="button" class="btn btn-primary waves-effect waves-light">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Cadastro de Alunos -->
<div id="teste" class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-0 b-0">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="panel-title">Alunos</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">

                        <ul class="nav nav-tabs tabs-bordered">
                            <li class="active">
                                <a href="#home-b1" data-toggle="tab" aria-expanded="true">
                                    <span class="visible-xs"><i class="fa fa-home"></i></span>
                                    <span class="hidden-xs">Dados pessoais</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#profile-b1" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-user"></i></span>
                                    <span class="hidden-xs">Endereço</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#messages-b1" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                                    <span class="hidden-xs">Ficha</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home-b1">
                                <div class="col-md-6">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">
                                            <i class="ion ion-android-social-user"></i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Username">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">
                                            <i class="ti ti-email"></i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="E-mail">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">
                                            <i class="ion ion-android-call"></i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Telefone" data-mask="(99) 99999-9999">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">
                                            <i class="mdi mdi-whatsapp"></i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Telefone" data-mask="(99) 99999-9999">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">
                                            <i class="mdi mdi-cake-variant mdi-2x"></i>
                                        </span>
                                        <div class="form-line">
                                            <input id="datepicker-autoclose" type="text" class="form-control" placeholder="dd/mm/aaa" data-mask="99/99/9999">
                                        </div>
                                    </div><br/>
                                </div>
                                <div class="col-md-7" style="padding-left: 42px;">
                                    <label>Sexo *:</label>
                                    <div class="form-group">
                                        
                                        <div class="col-sm-3">
                                            <div class="radio radio-info">
                                                <input type="radio" name="gender" id="genderM" value="Male" required="" data-parsley-multiple="gender">
                                                <label for="genderM">
                                                    Masculino
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="radio radio-pink">
                                                <input type="radio" name="gender" id="genderF" value="Female" data-parsley-multiple="gender">
                                                <label for="genderF">
                                                    Feminino
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile-b1">
                                <div class="col-md-4">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">
                                            <i class="ti ti-location-pin"></i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Cidade">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">
                                            <i class="ti ti-map-alt"></i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Bairro">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">
                                            <i class="ti ti-direction-alt"></i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Rua">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">
                                            <i class="ti ti-home"></i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Casa">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="messages-b1">
                               <div class="col-md-4">
                                    <div class="input-group input-group">
                                        <span class="input-group-addon">
                                            <i class="mdi mdi-human-greeting"></i>
                                        </span>
                                        <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                            <option value="">Crossfit</option>
                                            <option value="">Malhação</option>
                                            <option value="">Natação</option>
                                            <option value="">Dança</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                                <i class="fa fa-calendar-check-o"></i>
                                        </span>
                                        <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                            <option>Dia/Pagamento</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                            <option value="">6</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12" align="center" style="margin-top: 5%;">
                                    <div class="ficha">
                                        
                                        <div class="corpo col-md-4">
                                            <img src="<?=BASE_URL;?>/media/tema/human.png">
                                        </div>
                                        <div class="col-sm-1 peso">
                                            <input type="text" class="form-control" maxlength="25" name="defaultconfig" id="" placeholder="Altura" style="text-align:center"><br/>
                                             <img src="<?=BASE_URL;?>/media/tema/weight.png">
                                            <input type="text" class="form-control" maxlength="25" name="peso" id="peso" maxlength="8" placeholder="Peso" style="text-align:center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" align="center">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Sair</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- jQuery  -->

<script src="assets/js/jquery.min.js"></script>
<script src="<?=BASE_URL;?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=BASE_URL;?>plugins/datatables/dataTables.bootstrap.js"></script>

<script src="<?=BASE_URL;?>plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?=BASE_URL;?>plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="<?=BASE_URL;?>plugins/datatables/jszip.min.js"></script>
<script src="<?=BASE_URL;?>plugins/datatables/pdfmake.min.js"></script>
<script src="<?=BASE_URL;?>plugins/datatables/buttons.html5.min.js"></script>
<script src="<?=BASE_URL;?>plugins/datatables/buttons.print.min.js"></script>-->
<!--<script src="<?=BASE_URL;?>plugins/datatables/responsive.bootstrap.min.js"></script>-->

<script src="<?=BASE_URL;?>plugins/select2/js/select2.min.js"></script>


<script src="<?=BASE_URL;?>plugins/datatables/vfs_fonts.js"></script>
<script src="<?=BASE_URL;?>plugins/datatables/dataTables.responsive.min.js"></script>
<!--<script src="<?=BASE_URL;?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>-->
<!-- init -->
<script src="<?=BASE_URL;?>assets/pages/jquery.datatables.init.js"></script>

<!-- teste-->
  
<!-- fim teste-->

<script>
    $(document).ready(function () {
        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({keys: true});
        $('#datatable-responsive').DataTable();
        $('#datatable-colvid').DataTable({
            "dom": 'C<"clear">lfrtip',
            "colVis": {
                "buttonText": "Change columns"
            }
        });
        $('#datatable-scroller').DataTable({
            ajax: "plugins/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });
        var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
        var table = $('#datatable-fixed-col').DataTable({
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            fixedColumns: {
                leftColumns: 1,
                rightColumns: 1
            }
        });
    });
    TableManageButtons.init();

</script>
<!--
<script>

  jQuery(function($) {
      $('.autonumber').autoNumeric('init');
  });
</script>-->
