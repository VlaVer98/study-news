<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Добавить группу</h1>
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
      <div class="col-md-12">
        <form action = "/admin/group/create" role="form" id="quickForm" method="post">
          <div class="card-body col-6">
            <div class="form-group">
              <label for="name">Наименование группы</label>
              <input type="text" name="name" id="name" class="form-control" value = "" placeholder="Наименование группы">
            </div>
            <div class="form-group">
              <label>Статус</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="1" checked="">
                <label class="form-check-label">Активная</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status"  value="0">
                <label class="form-check-label">Не активная</label>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Создать</button>
          </div>
        </form>
      </div>
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  $('#quickForm').validate({
    rules: {
      name: {
        required: true
      },
      satatus: {
        required: true
      }
    },
    messages: {
      name: {
        required: "Введите название группы"
      },
      status: {
        required: "Выберите статус группы"
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