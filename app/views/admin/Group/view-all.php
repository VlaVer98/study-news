
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Группы</h1>
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
        <?php if(!empty($groups)): ?>
          <div class="table-responsive table-hover" id="orderTable">
            <table class="table table-striped">
            <thead>
              <tr>
                <th>Название</th>
                <th>Статус</th>
                <th>Действия</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($groups as $group): ?>
                <tr>
                  <th><?=$group['name']?></th>
                  <td>
                    <?php if($group['status']): ?>
                      <span class="btn btn-block btn-success btn-xs">Активная</span>
                    <?php else: ?>
                      <span class="btn btn-block btn-danger btn-xs">Не активная</span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <a href="/admin/group/view?id=<?=$group['id']?>" ><i class="fas fa-edit text-green pull-left pr-3"></i></a>
                    <a href="/admin/group/delete?id=<?=$group['id']?>" class = "delete"><i class="fas fa-times text-red pull-right"></i></a>
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

