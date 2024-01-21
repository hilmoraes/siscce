<?php
date_default_timezone_set('America/Sao_Paulo');
isset($_SESSION['login'])? $_SESSION['login']: header("Location: ".BASE_URL."login");
$user = explode(" ",$_SESSION['login']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISCCE</title>

<!-- Font Awesome -->
  <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>dist/css/bootstrap4-toggle.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= BASE_URL; ?>dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/icon-kit/dist/css/iconkit.min.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/ionicons/dist/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>dist/css/style.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- <link rel="stylesheet" href="<?= BASE_URL; ?>dist/css/icon/ionicons.min.css"> -->
  <!-- Notification css (Toastr) -->
  <link href="<?= BASE_URL; ?>plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="<?=BASE_URL;?>bower_components/select2/dist/css/select2.min.css">



  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
  <!-- Notification css (Toastr) -->
  <!-- <link href="<?=BASE_URL;?>plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css" /> -->
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?=BASE_URL;?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

</head>
<!-- <body class="hold-transition sidebar-mini layout-navbar-fixed"> -->
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light nav-abm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"  style="color: #fff;"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=BASE_URL;?>" class="nav-link" style="color: #fff;">Sistema de Controle de Convênios Estaduais</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle nav-link-senha" data-toggle="dropdown">
          <?php if ($_SESSION['sexo']=="F"):?>
            <img src="<?=BASE_URL;?>dist/img/avatar3.png" class="user-image img-circle elevation-2" alt="User Image">
          <?php else:?>
            <img src="<?=BASE_URL;?>dist/img/avatar5.png" class="img-circle img-sm" alt="User Image">
          <?php endif; ?>

          <span class="d-none d-md-inline"><b>&nbsp&nbsp<?=$_SESSION['nomensu'];?></b></span>
        </a>

        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header">
            <?php if ($_SESSION['sexo']=="F"):?>
              <img src="<?=BASE_URL;?>dist/img/avatar3.png" class="img-circle elevation-2" alt="User Image">
            <?php else:?>
              <img src="<?=BASE_URL;?>dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            <?php endif; ?>

            <p>
              <?=$_SESSION['nomensu'];?>
              <small><?=$_SESSION['funcaousu'];?></small>
            </p>
          </li>
          <!-- Menu Body -->
          <!-- Menu Footer-->
          <li class="user-footer">
            <a class="btn btn-outline-info float-flat" id="modAlpw"><i class="ik ik-lock"></i> Alterar senha</a>
            <a href="<?=BASE_URL;?>login/sair" class="btn btn-outline-danger float-right"><i class="ik ik-power"></i> Sair</a>
          </li>
        </ul>
      </li>
<!--       <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-light-success">
    <!-- Brand Logo -->
    <a href="<?=BASE_URL;?>" class="brand-link sidebar-abm">
      <img src="<?=BASE_URL;?>assets/imagem/logoM.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SISCCE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=BASE_URL;?>" class="nav-link active" style="background-color: #ad3333 !important">
              <i class="nav-icon ik ik-home"></i>
              <p>Home</p>
            </a>
          </li>
<!--           <?php if ($_SESSION['status']=="0" || $_SESSION['status']=="1"):?> -->
          <li class="nav-item"> <!--menu-open (class para menu aberto)-->
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-medical"></i>
              <p>Cadastros
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="<?=BASE_URL;?>empresas/lista" class="nav-link">
                  <i class="fas fa-landmark"></i>
                  <p>Empresa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=BASE_URL;?>prefeituras/lista" class="nav-link">
                  <i class="fas fa-child"></i>
                  <p>Prefeituras</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=BASE_URL;?>parceiros/lista" class="nav-link">
                  <i class="fas fa-truck"></i>
                  <p>Parceiros</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=BASE_URL;?>gestores/lista" class="nav-link">
                  <i class="fas fa-shopping-cart"></i>
                  <p>Gestores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=BASE_URL;?>fiscais/lista" class="nav-link">
                  <i class="fas fa-address-card"></i>
                  <p>Fiscais</p>
                </a>
              </li>
              
            </ul>
          </li>
<!--           <?php endif; ?> -->
<!--           <?php if ($_SESSION['status']=="0" || $_SESSION['status']=="1"):?> -->

          <li class="nav-item">
            <a href="<?=BASE_URL;?>convenios/lista" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Convênios</p>
            </a>
          </li>
<!--           <?php endif; ?> -->
          <li class="nav-item"> <!--menu-open (class para menu aberto)-->
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>Relatórios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-user-o fa fa-print"></i>
                  <p>
                    Cadastros
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
<!--                     <?php if ($_SESSION['status']=="0" || $_SESSION['status']=="3"  || $_SESSION['status']=="4"  || $_SESSION['status']=="9"):?>
                    <li class="nav-item">
                      <a href="<?=BASE_URL;?>colegios/relcolegios" class="nav-link link-abm">
                        <i class="nav-icon fa fa-user-o fa fa-user-o fa-print"></i>
                        <p>Colégios</p>
                      </a>
                    </li>
                  <?php endif; ?> -->
                  <li class="nav-item">
                    <a href="<?=BASE_URL;?>prefeituras/relprefeituras" class="nav-link link-abm">
                      <i class="nav-icon fa fa-user-o fa fa-user-o fa-print"></i>
                      <p>Prefeituras</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=BASE_URL;?>parceiros/relparceiros" class="nav-link link-abm">
                      <i class="nav-icon fa fa-user-o fa fa-user-o fa-print"></i>
                      <p>Parceiros</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=BASE_URL;?>gestores/relgestores" class="nav-link link-abm">
                      <i class="nav-icon fa fa-user-o fa fa-user-o fa-print"></i>
                      <p>Gestores</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=BASE_URL;?>fiscais/relfiscais" class="nav-link link-abm">
                      <i class="nav-icon fa fa-user-o fa fa-user-o fa-print"></i>
                      <p>Fiscais</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="<?=BASE_URL;?>convenios/relconvenios" class="nav-link link-abm">
                  <i class="nav-icon fa fa-user-o fa fa-user-o fa-print"></i>
                  <p>Convênios</p>
                </a>
              </li>
            </ul>
          </li>


          <?php if ($_SESSION['status']=="0" || $_SESSION['status']=="1"):?>
            <li class="nav-item"> <!--menu-open (class para menu aberto)-->
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>Configurações
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=BASE_URL;?>cadusuarios/lista" class="nav-link">
                    <i class="fa fa-user-o fa fa-user-o fas fa-child"></i>
                    <p>Usuários</p>
                  </a>
                </li>
              </ul>
            </li>
          <?php endif; ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content-header">
              <!--Modal Alteração de senha-->
        <div id="pw" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header nav-abm">
                <h5 class="modal-title text-light"><i class="fa fa-key"></i> Alterarção de senhas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
              <div class="panel-body">
                <!--Alterar senha-->
                <!-- <form method="POST" action="<?= BASE_URL; ?>ajax/alterarSenha"> -->
                <div class="row">
                  <input id="id_funcionario" type="hidden" name="id_funcionario" value="<?= $_SESSION['login']; ?>">
                  <div class="col-md-10 mt-4 pl-5">
                    <div class="form-group">
                      <input id="senhaAtual" type="password" class="form-control"  placeholder="Senha Atual" name="senhaAtual">
                    </div>
                    <div class="form-group">
                      <input id="novaSenha" type="password" class="form-control" placeholder="Nova senha" name="novaSenha">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-danger waves-effect" data-dismiss="modal">Fechar</button>
                  <button id="alterPassword" type="submit" class="btn btn-sm btn-success waves-effect waves-light">Alterar</button>
                </div>
                <!-- </form> -->
                <!--fim alterar senha-->
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
      </section>
      <!-- Corpo -->

    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Versão</b> 1.0
      </div>
      <strong>Copyright &copy; 2024 - <a href="#" style="color: #993300;">SISCCE - Sistema de Controle de Convênios Estaduais</a>.</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <!-- jQuery -->
  <script src="<?= BASE_URL; ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= BASE_URL; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= BASE_URL; ?>dist/js/adminlte.min.js"></script>
  <!-- <script src="<?= BASE_URL; ?>dist/js/bootstrap4-toggle.min.js"></script> -->
  <script src="<?= BASE_URL; ?>dist/js/script_atendimento.js"></script>
  <!-- Toastr js -->
  <script src="<?= BASE_URL; ?>plugins/toastr/toastr.min.js"></script>

  <!-- bs-custom-file-input -->
  <script src="<?= BASE_URL; ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script>
  $(function () {
    bsCustomFileInput.init();
  });
  </script>


  <!-- <script src="<?= BASE_URL; ?>dist/js/script.js"></script> -->
  <!-- <script src="<?= BASE_URL; ?>dist/js/ionicons.esm.js"></script> -->
  <script src="<?= BASE_URL; ?>dist/js/ionicons.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?= BASE_URL; ?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= BASE_URL; ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= BASE_URL; ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= BASE_URL; ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= BASE_URL; ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= BASE_URL; ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

  <script src="<?= BASE_URL; ?>plugins/jszip/jszip.min.js"></script>
  <script src="<?= BASE_URL; ?>plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= BASE_URL; ?>plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= BASE_URL; ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= BASE_URL; ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= BASE_URL; ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="<?= BASE_URL; ?>dist/js/menu.js"></script> 
  <script src="<?= BASE_URL; ?>plugins/select2/js/select2.full.min.js"></script>
  <script src="<?= BASE_URL; ?>dist/js/login.js"></script>
  <script src="<?= BASE_URL;?>assets/js/formatar_moeda.js"></script>
  <!-- <script src="<?= BASE_URL; ?>dist/js/home.js"></script>  -->
  <script>
    var BASE_URL = '<?php echo BASE_URL; ?>';
    $(function() {
      const side_bar_actived = localStorage.getItem("id-side_bar");

        if (side_bar_actived) {
            $('#${side_bar_actived}').addClass("active");
            $('#${side_bar_actived}').romoveClass("active");
        }

        $(".nav-item li").click(function() {
            localStorage.setItem("id-side_bar", this.id);
            $('.link-abm').removeClass('menu-open');

            // document.location.reload(true);
        });
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

  <!-- SweetAlert2 -->
<script src="<?=BASE_URL;?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?=BASE_URL;?>plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?=BASE_URL;?>dist/js/demo.js"></script> -->
<!-- Page specific script -->
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: '../../dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });
</script>
<!-- Select2 -->
<script src="<?=BASE_URL;?>bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>

<script type="text/javascript" src="<?=BASE_URL;?>assets/js/script.js" ></script>
<script type="text/javascript" src="<?=BASE_URL;?>assets/js/script-pro.js" ></script>
<script type="text/javascript" src="<?=BASE_URL;?>assets/js/script-pos.js" ></script>
<script type="text/javascript" src="<?=BASE_URL;?>assets/js/script-trans.js" ></script>
<script type="text/javascript" src="<?=BASE_URL;?>assets/js/script-inv.js" ></script>
<script type="text/javascript" src="<?=BASE_URL;?>assets/js/script-cli.js" ></script>
<script type="text/javascript" src="<?=BASE_URL;?>assets/js/script-for.js" ></script>
<script type="text/javascript" src="<?=BASE_URL;?>assets/js/script-rels.js" ></script>
<script type="text/javascript" src="<?=BASE_URL;?>assets/js/script-funcao.js" ></script>
<script type="text/javascript" src="<?=BASE_URL;?>assets/js/jquery.mask.min.js" ></script>
<script type="text/javascript" src="<?=BASE_URL;?>assets/js/script-inputs-moeda.js" ></script>
<script type="text/javascript" src="<?=BASE_URL;?>assets/js/script-cnpj-cpf.js" ></script>
<script type="text/javascript" src="<?=BASE_URL;?>assets/js/script-avaliacao.js" ></script>

<script type="text/javascript" src="<?=BASE_URL;?>assets/js/script-cnpj-cpf-diversos.js" ></script>
<script type="text/javascript" src="<?=BASE_URL;?>assets/js/script-datas.js" ></script>

<script type="text/javascript">var BASE_URL = '<?php echo BASE_URL; ?>';</script>

</body>

</html>
