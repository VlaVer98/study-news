<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Изменить данные</h1>
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
        <form action = "/admin/direction/edit" role="form" id="quickForm" method="post">
          <input type="text" name="id" value="<?=$man['id']?>" hidden="">
          <div class="card-body col-6">
            <div class="form-group">
              <label for="surname">Фамилия</label>
              <input type="text" name="surname" id="surname" class="form-control" value = "<?=$man['surname']?>" placeholder="Фамилия">
            </div>
             <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" name="name" id="name" class="form-control" value = "<?=$man['name']?>" placeholder="Имя">
             </div>
              <div class="form-group">
                  <label for="patronymic">Отчество</label>
                  <input type="text" name="patronymic" id="patronymic" class="form-control" value = "<?=$man['patronymic']?>" placeholder="Отчество">
              </div>
              <div class="form-group">
                  <label for="position">Должность</label>
                  <input type="text" name="position" id="position" class="form-control" value = "<?=$man['position']?>" placeholder="Должность">
              </div>
              <div class="form-group">
                  <label for="contact">Контакты</label>
                  <input type="text" name="contact" id="contact" class="form-control" value = "<?=$man['contact']?>" placeholder="Контакты">
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="card-body">
                          <div class="card card-warning" id="dropzone2">
                              <div class="card-header">
                                  <h3 class="card-title">Загрузить фотографию</h3>
                              </div>
                              <div class="card-body dropzone">

                              </div>
                              <!-- /.card-body -->
                              <!-- Loading (remove the following to stop the loading)-->
                              <!-- end loading -->
                          </div>
                          <div class="server_img" id="server_img" hidden><?= $man['img'] ?></div>
                      </div>
                      <!-- /.card -->
                  </div>
              </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Изменить</button>
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
<script src="js/dropzone.js"></script>
<script>
    Dropzone.autoDiscover = false;


    var myDropzone = new Dropzone("#dropzone2 .card-body", {
        url: "/admin/uploader/photo",
        maxFiles: 1,
        maxfilesreached: 1,
        addRemoveLinks: true,
        acceptedFiles: "image/*",
        dictMaxFilesExceeded: "Можно загрузить только 1 изображение!",
        removedfile: function(file) {
            //console.log(file);
            var name_file = file.upload.filename;
            console.log(name_file);
            $.ajax({
                url: "/admin/uploader/delete-photo",
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

    var img_name = $('#server_img').text();
    var mockFile = { name: 'Текущее изображение', size: 12345, upload: {filename: img_name}, resizeWidth: 10};
    myDropzone.displayExistingFile(mockFile, '/img/photo/'+img_name);

</script>