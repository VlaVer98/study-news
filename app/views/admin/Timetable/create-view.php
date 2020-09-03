<form action="/admin/timetable/create" method="post">
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
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <?php foreach ($days_week as $key => $value): ?>
                            <li class="nav-item">
                                <a class="nav-link" id="<?= $key ?>-tab" data-toggle="tab" href="#<?= $key ?>"
                                   role="tab" aria-controls="<?= $key ?>" aria-selected="true"><?= $value ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <?php $i = 1;
                        foreach ($days_week as $key => $value): ?>
                            <div class="tab-pane fade" id="<?= $key ?>" role="tabpanel"
                                 aria-labelledby="<?= $key ?>-tab">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">№</th>
                                        <th scope="col">Время</th>
                                        <th scope="col">Дисциплина</th>
                                        <th scope="col">Преподаватель</th>
                                        <th scope="col">Кабинет</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php for ($j = 1; $j <= 7; $j++): ?>
                                        <tr>
                                            <th scope="row"><?= $j ?></th>
                                            <td><?= $time_occupation[$j]['start'] ?>
                                                -<?= $time_occupation[$j]['end'] ?></td>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control"
                                                            name="arr[<?= $i ?>][<?= $j ?>][subject]" id="subject">
                                                        <option value=""></option>
                                                        <?php foreach ($subjects as $subject): ?>
                                                            <option value="<?= $subject['name'] ?>"><?= $subject['name'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control"
                                                            name="arr[<?= $i ?>][<?= $j ?>][teacher]" id="teacher">
                                                        <option value=""></option>
                                                        <?php foreach ($teachers as $teacher): ?>
                                                            <option value="<?= "{$teacher['surname']} {$teacher['name']} {$teacher['patronymic']}" ?>"><?= "{$teacher['surname']} {$teacher['name']} {$teacher['patronymic']}" ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control"
                                                            name="arr[<?= $i ?>][<?= $j ?>][cabinet]" id="cabinet">
                                                        <option value=""></option>
                                                        <?php foreach ($cabinets as $cabinet): ?>
                                                            <option value="<?= $cabinet['number'] ?>"><?= $cabinet['number'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php $i++; endforeach; ?>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
    </section>

</form>
<!-- /.content -->
<script src="js/timetable.js"></script>