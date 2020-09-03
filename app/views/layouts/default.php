<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <base href="/">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="plugins/ekko-lightbox/ekko-lightbox.css">
  <link rel="stylesheet" href="css/my.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link"><?=study_news\App::$app->getProperty("name_school")?></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown pr-3">
        <div id="clock"></div>
      </li>
      <li class="nav-item dropdown">
        <div id="date"></div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link logo">
      <img src="img/icon/logo5.jpg">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Информационный раздел</li>
                    <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Открыть разделы
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <?php new app\widgets\menu\Menu(["class_ul"=>"nav nav-treeview", "name_table"=>'category_file', "name_cache"=>'category_file'])?>
            
              
          </li>
          <li class="nav-header">Расписание занятий</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Выбрать группу
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php new app\widgets\group\Group('tpl_groups'); ?>
            </ul>
          </li>
          <li class="nav-header">Галерея</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Открыть разделы
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
            <?php new app\widgets\menu\Menu(["class_ul"=>"nav nav-treeview", "name_table"=>'category_gallery', "name_cache"=>'category_gallery', "tpl"=> 'tpl_gallery']);?>

          </li>
          <li class="nav-header">Интерактив</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                3D планировка этажей
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Этаж 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Этаж 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Этаж 3</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Этаж 4</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-map"></i>
              <p>
                Иллюстрированная схема <br>железных дорог
              </p>
            </a>
          </li>
          <li class="nav-header">Справочная информация</li>
          <li class="nav-item">
            <a href="information/about-school" class="nav-link">
              <i class="nav-icon fas fa-school"></i>
              <p>
                О учебном заведение
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="information/about-teacher" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                О преподавателях
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="information/about-city" class="nav-link">
              <i class="nav-icon fas fa-city"></i>
              <p>
                О населенном пункте
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="information/tourist-route" class="nav-link">
              <i class="nav-icon fas fa-walking"></i>
              <p>
               Экскурсионные пешие <br> маршруты
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="information/driving-directions" class="nav-link">
              <i class="nav-icon fas fa-route"></i>
              <p>
               Схема проезда
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="information/eating-places" class="nav-link">
              <i class="nav-icon fas fa-utensils"></i>
              <p>
               Ближайшим местам <br>общественного питания
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="information/metro-scheme" class="nav-link">
              <i class="nav-icon fas fa-map-marked-alt"></i>
              <p>
               Схема метро
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="information/train-schedule" class="nav-link">
              <i class="nav-icon fas fa-subway"></i>
              <p>
               Расписание <br>электропоездов
              </p>
            </a>
          </li>
          <li class="nav-header">Информация о руководстве</li>
          <li class="nav-item">
            <a href="direction/main" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Руководство
              </p>
            </a>
          </li>
            <li class="nav-header"></li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <?=$content;?>

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <img src="img/icon/footer.png" alt="">
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="js/clock.js"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
<?php foreach ($this->scripts as $value): ?>
  <?=$value . PHP_EOL?>
<?php endforeach;?>
</body>
</html>
