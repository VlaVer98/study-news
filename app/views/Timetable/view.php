<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark pt-2"><b><?=$group?></b> (с <?=date("d.m.Y", strtotime($date))?>)</h1>
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
    		<?php
    			$btn_active1 = "";
    			$btn_active2 = "";
    			if($date==$previous_date) $btn_active1 = 'active';
    			if($date==$last_date) $btn_active2 = 'active';
    		?>
    		<?php if($previous_date): ?>
    			<a href="timetable/view?id=<?=$id?>&group=<?=$group?>&date=<?=$previous_date?>" type="button" class="btn btn-outline-secondary <?=$btn_active1?> mb-2">с <?=date("d.m.Y", strtotime($previous_date))?></a>
    		<?php endif;?>
			<a href="timetable/view?id=<?=$id?>&group=<?=$group?>&date=<?=$last_date?>" type="button" class="btn btn-outline-secondary <?=$btn_active2?> mb-2">c <?=date("d.m.Y", strtotime($last_date))?></a>
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<?php foreach($days_week as $key => $value): ?>
				 <li class="nav-item">
				    <a class="nav-link" id="<?=$key?>-tab" data-toggle="tab" href="#<?=$key?>" role="tab" aria-controls="<?=$key?>" aria-selected="true"><?=$value?></a>
				  </li>
				<?php endforeach; ?>
			</ul>
			<div class="tab-content" id="myTabContent">
				
				<?php $i = 1; foreach($days_week as $key => $value): ?>
					<div class="tab-pane fade" id="<?=$key?>" role="tabpanel" aria-labelledby="<?=$key?>-tab">
						<?php if(isset($timetable[$i])): ?>
							<table class="table table-striped">
							  <thead>
							    <tr>
							      <th scope="col">№</th>
							      <th scope="col">Время</th>
							      <th scope="col">Дисциплина</th>
							      <th scope="col">Преподаватель</th>
							      <th scope="col">Кабинет</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php foreach ($timetable[$i] as $key=>$value): ?>
									<tr>
								      <th scope="row"><?=$key?></th>
								      <td><?=$time_occupation[$key]->start?>-<?=$time_occupation[$key]->end?></td>
								      <td><?=$value['subject']?></td>
								      <td><?=$value['teacher']?></td>
								      <td><?=$value['cabinet']?></td>
								    </tr>
								<?php endforeach; ?>
							  </tbody>
							</table>
						<?php else: ?>
							<h1>Занятий нет</h1>
						<?php endif; ?>
					</div>
				<?php $i++; endforeach; ?>
			</div>

    	</div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<script src = "js/timetable.js"></script>