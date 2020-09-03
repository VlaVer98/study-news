<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Создать новую категорию</h1>
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
        <form action = "/admin/gallery/add-category" role="form" id="quickForm" method="post">
          <div class="card-body col-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Наименование категории</label>
              <input type="text" name="title" class="form-control" value = "" placeholder="Наименование категории">
            </div>
            <div class="form-group">
              <label>Родительская категория</label>
              <select name="parent_id" class="form-control select2" style="width: 100%;">
                <?php if($category->parent_id == 0): ?>
                  <option selected='selected' value = "0">Самостоятельная категория</option>
                <?php else: ?>
                  <option value="0">Самостоятельная категория</option>
                <?php endif; ?>
                <?php foreach ($allCategory as $id => $value):?>
                  <?php 
                    $selected = "";
                    if($category->parent_id == $id) 
                       $selected = "selected='selected'";
                  ?>
                  <option <?=$selected?> value = "<?=$id?>"><?=$value['title']?></option>
                <?php endforeach; ?>
              </select>
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