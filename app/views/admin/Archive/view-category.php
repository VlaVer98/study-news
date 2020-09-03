<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Категории для файлов</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active"><a href="/admin"><i class="fas fa-sync color-swatch gray-darker"></i></a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Main row -->
    <div class="row">
      <div class="col-md-12">
        <style>
          ul.my_ul {
              margin: 0;
              padding-left: 20px;
              padding-top: 5px;
              padding-bottom: 5px;
              list-style: none;
          }
          a.my_a {
              font-weight: 500;
              display: inline-block;
              border-bottom: 1px solid grey;
              font-size: 18px;
              color: black;
              width: 98%;
              font-weight: bold;
          }
          a.my_a:hover {
              color: black;
              background: white;
          }
          a.delete {
            float: right;
          }
        </style>
        <div class="container-fluid">
          <?php new app\widgets\menu\Menu(["class_ul"=>"my_ul", "name_table"=>'category_file', "name_cache"=>'category_file', 'tpl'=>'tpl_admin_file'])?>
      </div>
      </div>
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

