<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><a href="/admin/archive/view-category" class = "pr-3"><i class="fas fa-long-arrow-alt-left"></i></a>Редактирование категории</h1>
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
      <div class="col-md-6">
        <form action = "/admin/archive/edit-category" role="form" id="quickForm" method="post">
          <input hidden name = "id" value = "<?=$category->id?>">
          <div class="card-body">
            <div class="form-group">
              <label for="title">Наименование категории</label>
              <input type="text" name="title" id="title" class="form-control" value = "<?=$category->title?>">
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Сохранить</button>
          </div>
        </form>
      </div>
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-12">
        <h1 class="m-0 text-dark">Редактирование файлов по категории</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <!-- Main row -->
        <?php if(!empty($files)): ?>
          <div class="table-responsive table-hover" id="orderTable">
            <table class="table table-striped">
            <thead>
              <tr>
                <th>Наименование</th>
                <th>Действия</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($files as $file): ?>
                <tr>
                  <th><?=$file['title']?></th>
                  <td>
                    <a href="/admin/archive/delete-file?id=<?=$file['id']?>" class = "delete file"><i class="fas fa-times text-red pull-right"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>  
          </div>
        </div>
      <?php else: ?>
        <h5>Файлов по данной категории пока нет</h5>
      <?php endif; ?>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>

<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  $('#quickForm').validate({
    rules: {
      title: {
        required: true
      }
    },
    messages: {
      title: {
        required: "Данное поле не должно быть пустым"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>