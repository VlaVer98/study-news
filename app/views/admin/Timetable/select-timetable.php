<form action="/admin/timetable/change-view" method="post">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="id_group">Группа</label>
                        <select class="form-control" name="id_group" id="id_group">
                            <option value=""></option>
                            <?php foreach ($groups as $group): ?>
                                <option value="<?= $group['id'] ?>"><?= $group['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="load_time">Расписание с:</label>
                        <select class="form-control" name="load_time" id="load_time">
                            <option value=""></option>
                            <?php foreach ($weeks as $week): ?>
                                <option value="<?= $week ?>"><?= $week ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">выбрать</button>
        </div>
    </div>
</form>