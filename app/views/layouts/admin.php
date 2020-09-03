<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
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
  <link rel="stylesheet" href="css/dropzone.css">
  <link rel="stylesheet" href="css/my_admin.css">
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
          <li class="nav-header">Упрвление текстовой <br>информацией</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Действия
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
				<li class="nav-item">
		            <a href="admin/archive/view-category" class="nav-link">
		              <i class="nav-icon far fa-eye"></i>
		              <p>
		                Категории
		              </p>
		            </a>
		        </li>
		        <li class="nav-item">
		            <a href="/admin/archive/add-category" class="nav-link">
		              <i class="nav-icon fas fa-plus"></i>
		              <p>
		                Добавить категорию
		              </p>
		            </a>
		          </li>
		        <li class="nav-item">
		            <a href="/admin/archive/upload-file" class="nav-link">
		              <i class="nav-icon fas fa-upload"></i>
		              <p>
		                Загрузить pdf файл
		              </p>
		            </a>
		        </li>
            </ul>
          </li>
          <li class="nav-header">Управление галереей</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Действия
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
				<li class="nav-item">
		            <a href="/admin/gallery/view-category" class="nav-link">
		              <i class="nav-icon far fa-eye"></i>
		              <p>
		                Категории
		              </p>
		            </a>
		        </li>
		        <li class="nav-item">
		            <a href="/admin/gallery/add-category" class="nav-link">
		              <i class="nav-icon fas fa-plus"></i>
		              <p>
		                Добавить категорию
		              </p>
		            </a>
		        </li>
		        <li class="nav-item">
		            <a href="/admin/gallery/upload-image" class="nav-link">
		              <i class="nav-icon fas fa-upload"></i>
		              <p>
		                Загрузить изображение
		              </p>
		            </a>
		        </li>
            </ul>
          </li>
			
          <li class="nav-header">Управление группами</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Действия
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
				<li class="nav-item">
		            <a href="/admin/group/view-all" class="nav-link">
		              <i class="nav-icon far fa-eye"></i>
		              <p>
		                Группы
		              </p>
		            </a>
		        </li>
		       	<li class="nav-item">
		            <a href="/admin/group/view-create" class="nav-link">
		              <i class="nav-icon fas fa-plus"></i>
		              <p>
		                Добавить группу
		              </p>
		            </a>
		        </li>
		    </ul>
		  </li>    
          <li class="nav-header">Управление преподавателями</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Действия
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
				<li class="nav-item">
		            <a href="/admin/teacher/view-all" class="nav-link">
		              <i class="nav-icon far fa-eye"></i>
		              <p>
		                Преподаватели
		              </p>
		            </a>
		        </li>
		       	<li class="nav-item">
		            <a href="/admin/teacher/view-create" class="nav-link">
		              <i class="nav-icon fas fa-plus"></i>
		              <p>
		                Добавить преподавателя
		              </p>
		            </a>
		        </li>
		    </ul>
		  </li>
            <li class="nav-header">Управление дисциплинами</li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book-reader"></i>
                    <p>
                        Действия
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right"></span>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/subject/view-all" class="nav-link">
                            <i class="nav-icon far fa-eye"></i>
                            <p>
                                Дисциплины
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/subject/view-create" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Добавить дисциплину
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header">Управление кабинетами</li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-door-open"></i>
                    <p>
                        Действия
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right"></span>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/cabinet/view-all" class="nav-link">
                            <i class="nav-icon far fa-eye"></i>
                            <p>
                                Кабинеты
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/cabinet/view-create" class="nav-link">
                            <i class="nav-icon fas fa-plus"></i>
                            <p>
                                Добавить кабинет
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header">Управление расписанием</li>
          <li class="nav-item has-treeview">
	            <a href="#" class="nav-link">
	              <i class="nav-icon fas fa-chalkboard"></i>
	              <p>
	                Действия
	                <i class="fas fa-angle-left right"></i>
	                <span class="badge badge-info right"></span>
	              </p>
	            </a>
	            <ul class="nav nav-treeview">
				  <li class="nav-item">
			            <a href="/admin/timetable/create-view" class="nav-link">
			              <i class="nav-icon far fa-newspaper"></i>
			              <p>
			                Добавить рсписание
			              </p>
			            </a>
			        </li>
			       	<li class="nav-item">
			            <a href="/admin/timetable/select-timetable" class="nav-link">
			              <i class="nav-icon fas fa-edit"></i>
			              <p>
			                Изменить расписание
			              </p>
			            </a>
			        </li>
			    </ul>
		    </li>
            <li class="nav-header">Управление руководством</li>
            <li class="nav-item has-treeview">
	            <a href="#" class="nav-link">
	              <i class="nav-icon fas fa-user"></i>
	              <p>
	                Действия
	                <i class="fas fa-angle-left right"></i>
	                <span class="badge badge-info right"></span>
	              </p>
	            </a>
	            <ul class="nav nav-treeview">
					<li class="nav-item">
			            <a href="admin/direction/view-all" class="nav-link">
			              <i class="nav-icon far fa-eye"></i>
			              <p>
			                Руководство
			              </p>
			            </a>
			        </li>
			       	<li class="nav-item">
			            <a href="admin/direction/view-create" class="nav-link">
			              <i class="nav-icon fas fa-plus"></i>
			              <p>
			                Добавить
			              </p>
			            </a>
			        </li>
			    </ul>
			</li>
	       <li class="nav-item">
	              <p>
	                ------------
	              </p>
	        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<?php if(isset($_SESSION['error'])): ?>
      <div class="alert alert-danger" role="alert">
        <?php foreach($_SESSION['error'] as $key=>$value): ?>
          <p class="mb-0" ><?=$value?></p>
        <?php endforeach; ?>
      </div>
    <?php unset($_SESSION['error']);endif; ?>
    <?php if(isset($_SESSION['success'])): ?>
      <div class="alert alert-success" role="alert">
        <?php foreach($_SESSION['success'] as $key=>$value): ?>
          <p class="mb-0" ><?=$value?></p>
        <?php endforeach; ?>
      </div>
    <?php unset($_SESSION['success']);endif; ?>
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
<!-- <script src="dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
<?php foreach ($this->scripts as $value): ?>
  <?=$value . PHP_EOL?>
<?php endforeach;?>
</body>
</html>
