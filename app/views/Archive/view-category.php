<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark pt-2"><i class="far fa-folder-open pr-1"></i><?=$title?></h1>
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
    	   
        <?php if(!empty($files)): ?>
          <?php foreach ($files as $key => $value): ?>
            <div class="col-6">
              <ul class="list-unstyled">
                <a href="archive/view-file?id=<?=$key?>" style="color: black;">
                  <li class="media">
                    <img src="img/icon/icon_pdf.png" class="mr-3" style="width: 48px;" alt="...">
                    <div class="media-body">
                      <h5 class="mt-0 mb-1 mt-3"><?=$value['title']?></h5>
                    </div>
                  </li>
                  <hr>
                </a>   
              </ul>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12">
            <h1>В данной категории пока нет файлов ...</h1>
          </div>
        <?php endif; ?>

    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->