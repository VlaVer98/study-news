  <div class="container-fluid">
    <div class="row mb-2">
    	<div class="col-1">
        <a href="<?=$_SERVER['HTTP_REFERER']?>">
          <i class="fas fa-arrow-left fa-3x"></i>
        </a>
    	</div>
      <div class="col-sm-11">
        <h1 class="m-0 text-dark pt-2"><?=$file->title?></h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
    	<div class="col-12">
    		<div class="mx-auto" style = "width: 1500px;">
    			<embed style = "height: 1600px; width: 100%;" src="docs/<?=$file->file_name?>#toolbar=0&navpanes=0"/>
    		</div>
    	</div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->