
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Руководство</h1>
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
        <?php if(!empty($directions)): ?>
          <div class="table-responsive table-hover" id="directionTable">
            <table class="table table-striped">
            <thead>
              <tr>
                <th>Фото</th>
                <th>ФИО</th>
                  <th>Должность</th>
                  <th>Контакты</th>
                <th>Действия</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($directions as $man): ?>
                <tr>
                  <td><img src="/img/photo/<?=$man['img']?>" height = "50"></td>
                  <td><?="{$man['surname']} {$man['name']} {$man['patronymic']}"?></td>
                    <td><?=$man['position']?></td>
                    <td><?=$man['contact']?></td>
                  <td>
                    <a href="/admin/direction/view?id=<?=$man['id']?>" ><i class="fas fa-edit text-green pull-left pr-3"></i></a>
                    <a href="/admin/direction/delete?id=<?=$man['id']?>" class = "delete"><i class="fas fa-times text-red pull-right"></i></a>
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
        <h2>Руководство пока не добавленно</h2>
      <?php endif; ?>
      <!-- /.row (main row) -->

    </div><!-- /.container-fluid -->
  </section>

  <!-- /.content -->