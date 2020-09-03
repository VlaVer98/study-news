<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-10">
        <h1 class="m-0 text-dark"></a>Добавить новое изображение</h1>
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
            <form action = "/admin/gallery/upload-image" role="form" id="quickForm" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label>Выбрать категорию</label>
                  <select name="category" class="form-control select2" style="width: 100%;">
                    <?php foreach ($allCategory as $id => $value):?>
                      <option value = "<?=$id?>"><?=$value['title']?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card-body">
                <label>Загрузить pdf файлы</label>
                <div class="card card-warning" id="dropzone2">
                  <div class="card-header">
                    <h3 class="card-title">Файлы(не больше 10 шт. за раз)</h3>
                  </div>
                  <div class="card-body dropzone">
                    
                  </div>
                  <!-- /.card-body -->
                  <!-- Loading (remove the following to stop the loading)-->
                  <!-- end loading -->
                </div>
              </div>
                <!-- /.card -->
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
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  $('#quickForm').validate({
    rules: {
      category_id: {
        required: true
      }
    },
    messages: {
      category_id: {
        required: "Поле Категория не должно быть пустым!"
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
<script src="js/dropzone.js"></script>
<script>
  Dropzone.autoDiscover = false;

  $("#dropzone2 .card-body").dropzone({ 
    url: "/admin/uploader/image",
    maxFiles: 10,
    addRemoveLinks: true,
    acceptedFiles: "image/*",
    dictMaxFilesExceeded: "Можно загрузить только 10 изображений!",
    removedfile: function(file) {
      var name_file = file.upload.filename;
      $.ajax({
        url: "/admin/uploader/delete-image",
        method: "GET",
        data: {name: name_file}
      });
      //console.log(file)
      $(file.previewElement).remove();
    },
    success: function(file, name) {
      var name = JSON.parse(name);
      file.upload.filename = name;
    },
    error: function(file, message) {
      file.previewElement.classList.add("dz-error");
      try {
        var message = JSON.parse(message);
      } catch (e) {}
      var err = "";
      if(Array.isArray(message)) {
        $.each(message, function(index, value){
          err += value + "<br>";
        });
      } else {
        err = message;
      }
      $(file.previewElement).find(".dz-error-message").find('span').html(err);
    } 
  });

</script>
