<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Руководство ОАО РЖД</h1>
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
    	<?php foreach($men as $key => $value): ?>
	      	<div class="card mb-12">
			  <div class="row no-gutters">
			    <div class="col-md-2">
			      <img style="max-width: 150px;" src="img/photo/<?=$value['img']?>" class="card-img" alt="...">
			    </div>
			    <div class="col-md-8">
			    	<div class="card-header"><?=$value['surname']?> <?=$value['name']?> <?=$value['patronymic']?></div>
			      <div class="card-body">
			        <h5 class="card-title">Должность:</h5>
			        <p class="card-text"><?=$value['position']?></p>
			        <?php if($value['contact']): ?>
			        	<h5 class="card-title">Контакты:</h5>
			       		<p class="card-text"><?=$value['contact']?></p>
			    	<?php endif; ?>
			      </div>
			    </div>
			  </div>
			</div>
		<?php endforeach; ?>
    	</div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->