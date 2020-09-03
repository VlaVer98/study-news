<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark pt-2">Категория</h1>
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
    	<div class="col-12">		
  			<div class="card card-primary">
          <div class="card-header">
            <div class="card-title">
              <?=$title?>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <?php if(!empty($images)): ?>
                <?php foreach ($images as $key => $value): ?>
                  <div class="col-sm-2">
                    <a href="img/gallery/<?=$value['file_name']?>" data-toggle="lightbox" data-title="<?=$value['title']?>" data-gallery="gallery">
                      <img src="img/gallery/<?=$value['file_name']?>" class="img-fluid mb-2" alt="white sample"/>
                    </a>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <h1>Изображений пока нет...</h1>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- Ekko Lightbox -->
<script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    //$('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>