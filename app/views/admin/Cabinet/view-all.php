
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Кабинеты</h1>
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
        <?php if(!empty($cabinets)): ?>
          <div class="table-responsive table-hover" id="cabinetTable">
            <table class="table table-striped">
            <thead>
              <tr>
                <th>Название</th>
                <th>Действия</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($cabinets as $cabinet): ?>
                <tr>
                  <th><?=$cabinet['number']?></th>
                  <td>
                    <a href="/admin/cabinet/view?id=<?=$cabinet['id']?>" ><i class="fas fa-edit text-green pull-left pr-3"></i></a>
                    <a href="/admin/cabinet/delete?id=<?=$cabinet['id']?>" class = "delete"><i class="fas fa-times text-red pull-right"></i></a>
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
        <h2>Кабинеты пока не добавленны</h2>
      <?php endif; ?>
      <!-- /.row (main row) -->

    </div><!-- /.container-fluid -->
  </section>

  <!-- /.content -->

