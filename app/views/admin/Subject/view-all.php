
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Дисциплины</h1>
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
        <?php if(!empty($subjects)): ?>
          <div class="table-responsive table-hover" id="subjectTable">
            <table class="table table-striped">
            <thead>
              <tr>
                <th>Название</th>
                <th>Действия</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($subjects as $subject): ?>
                <tr>
                  <th><?=$subject['name']?></th>
                  <td>
                    <a href="/admin/subject/view?id=<?=$subject['id']?>" ><i class="fas fa-edit text-green pull-left pr-3"></i></a>
                    <a href="/admin/subject/delete?id=<?=$subject['id']?>" class = "delete"><i class="fas fa-times text-red pull-right"></i></a>
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
        <h2>Дисциплины пока не добавленны</h2>
      <?php endif; ?>
      <!-- /.row (main row) -->

    </div><!-- /.container-fluid -->
  </section>

  <!-- /.content -->

