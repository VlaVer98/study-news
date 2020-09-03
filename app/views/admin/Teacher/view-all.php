
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Преподаватели</h1>
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
        <?php if(!empty($teachers)): ?>
          <div class="table-responsive table-hover" id="teacherTable">
            <table class="table table-striped">
            <thead>
              <tr>
                <th>Фото</th>
                <th>ФИО</th>
                <th>Действия</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($teachers as $teacher): ?>
                <tr>
                  <td><img src="/img/photo/<?=$teacher['img']?>" height = "50"></td>
                  <td><?="{$teacher['surname']} {$teacher['name']} {$teacher['patronymic']}"?></td>
                  <td>
                    <a href="/admin/teacher/view?id=<?=$teacher['id']?>" ><i class="fas fa-edit text-green pull-left pr-3"></i></a>
                    <a href="/admin/teacher/delete?id=<?=$teacher['id']?>" class = "delete"><i class="fas fa-times text-red pull-right"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>  
          </div>
        </div>
      <div class="row">
    <div class="col-md-3 offset-md-5">
      <ul class='pagination pagination-md'>
        <?=$pagination->getView();?>
      </ul>
    </div>
  </div>
      <?php else: ?>
        <h2>Группы пока не добавленны</h2>
      <?php endif; ?>
      <!-- /.row (main row) -->

    </div><!-- /.container-fluid -->
  </section>

  <!-- /.content -->

