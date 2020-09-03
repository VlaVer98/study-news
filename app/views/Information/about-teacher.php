<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">О Преподавателях</h1>
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
    		<?php foreach ($teachers as $key => $value): ?>
		      	<div class="card mb-12">
				  <div class="row no-gutters">
				    <div class="col-md-2">
				      <img style="max-width: 150px;" src="img/photo/<?=$value['img']?>" class="card-img pt-1 pl-1" alt="...">
				    </div>
				    <div class="col-md-8">
				    	<div class="card-header"><?=$value['surname']?> <?=$value['name']?> <?=$value['patronymic']?></div>
				      <div class="card-body">
				      	<?php if($value['subjects']): ?>
							<h5 class="card-title">Преподваемые дисциплины:</h5>
				        	<p class="card-text">
								<?php foreach($value['subjects'] as $sub): ?>
									<span class='pl-3'><?=$sub?></span> <br>
								<?php endforeach; ?>
				        	</p>
				      	<?php endif; ?>
				      	<?php if($value['groups']): ?>
							<h5 class="card-title">Курирует группы:</h5>
				        	<p class="card-text">
								<?php foreach($value['groups'] as $group): ?>
									<span class='pl-3'><?=$group?></span><br>
								<?php endforeach; ?>
				        	</p>
				      	<?php endif ?>
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