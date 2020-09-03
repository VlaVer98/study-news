<?php if (!empty($currentTimetable)): ?>
    <form action="/admin/timetable/change" method="post">
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
                                                                <?php if(isset($currentTimetable[$i][$j]['subject']) && $currentTimetable[$i][$j]['subject'] === $subject['name']): ?>
                                                                    <option value="<?= $subject['name'] ?>" selected=""><?= $subject['name'] ?></option>
                                                                <?php else: ?>
                                                                    <option value="<?= $subject['name'] ?>"><?= $subject['name'] ?></option>
                                                                <?php endif; ?>
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
                                                                <?php if(isset($currentTimetable[$i][$j]['teacher']) && $currentTimetable[$i][$j]['teacher'] === "{$teacher['surname']} {$teacher['name']} {$teacher['patronymic']}"): ?>
                                                                    <option value="<?= "{$teacher['surname']} {$teacher['name']} {$teacher['patronymic']}" ?>" selected=""><?= "{$teacher['surname']} {$teacher['name']} {$teacher['patronymic']}" ?></option>
                                                                <?php else: ?>
                                                                    <option value="<?= "{$teacher['surname']} {$teacher['name']} {$teacher['patronymic']}" ?>"><?= "{$teacher['surname']} {$teacher['name']} {$teacher['patronymic']}" ?></option>
                                                                <?php endif; ?>
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
                                                                <?php if(isset($currentTimetable[$i][$j]['cabinet']) && $currentTimetable[$i][$j]['cabinet'] === $cabinet['number']): ?>
                                                                    <option value="<?= $cabinet['number'] ?>" selected=""><?= $cabinet['number'] ?></option>
                                                                <?php else: ?>
                                                                    <option value="<?= $cabinet['number'] ?>"><?= $cabinet['number'] ?></option>
                                                                <?php endif; ?>
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
                <input name="id_group" value="<?=$id_group?>" hidden>
                <input name="load_time" value="<?=$load_time?>" hidden>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
        </section>
    </form>
<?php else: ?>
<section class="content">
    <div class="container">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <h1>Расписание для этой группы и недели еще не создано</h1>
        </div>
    </div>
</section>
<?php endif; ?>
