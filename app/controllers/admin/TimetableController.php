<?php


namespace app\controllers\admin;


use app\models\admin\Cabinet;
use app\models\admin\Group;
use app\models\admin\Subject;
use app\models\Teacher;
use app\models\TimeOccupation;
use app\models\Timetable;

class TimetableController extends AppController {
    public function createAction() {
        foreach ($_POST['arr'] as $day_week => $lessons) {
            foreach ($lessons as $num_lesson => $info) {
                $timetable_model = new Timetable();
                $data = [];
                $data['id_group'] = $_POST['id_group'];
                $data['load_time'] = $_POST['load_time'];
                $data['day_week'] = $day_week;
                $data['serial_number'] = $num_lesson;
                $data += $info;

                if($timetable_model->validation($data)) {
                    $table = $timetable_model->dispense();
                    if($table) {
                        $timetable_model->save($table);
                    }
                }
            }
        }
        $_SESSION["success"][] = "Расписание добавленно!";
        redirect();
    }

    public function createViewAction() {
        $groups = Group::getAllActive();
        $day = date('w');
        for ($i = 0; $i<=5; $i++)
            $weeks[$i] = date('Y-m-d', strtotime('-'.($day-1).' days'."+ $i week"));
        $time_occupation  = TimeOccupation::static_getAll();
        $days_week = ['monday'=>"ПН", 'tuesday'=>"ВТ", 'wednesday'=>"СР", 'thursday'=>"ЧТ", 'friday'=>"ПТ"];
        $teachers = Teacher::static_getAll();
        $cabinets = Cabinet::static_getAll();
        $subjects = Subject::static_getAll();

        //debug($time_occupation);
        $this->set(compact(
            'weeks',
            'cabinets',
            'subjects',
            'teachers',
            'days_week',
            'groups',
            'time_occupation'));
    }

    public function selectTimetableAction() {
        $groups = Group::getAllActive();
        $day = date('w');
        for ($i = 0; $i<=5; $i++)
            $weeks[$i] = date('Y-m-d', strtotime('-'.($day-1).' days'."+ $i week"));
        $this->set(compact('groups', 'weeks'));
    }

    public function changeViewAction() {
        $id_group = isset($_POST['id_group']) ? $_POST['id_group'] : null;
        $load_time =  isset($_POST['load_time']) ? $_POST['load_time'] : null;
        $currentTimetable = Timetable::static_getAll($id_group, $load_time);
        $time_occupation  = TimeOccupation::static_getAll();
        $days_week = ['monday'=>"ПН", 'tuesday'=>"ВТ", 'wednesday'=>"СР", 'thursday'=>"ЧТ", 'friday'=>"ПТ"];
        $teachers = Teacher::static_getAll();
        $cabinets = Cabinet::static_getAll();
        $subjects = Subject::static_getAll();

        //debug($currentTimetable);
        $this->set(compact(
            'cabinets',
            'id_group',
            'load_time',
            'currentTimetable',
            'subjects',
            'teachers',
            'days_week',
            'time_occupation'));
    }

    public function changeAction() {
        $ids = Timetable::static_getIds($_POST['id_group'], $_POST['load_time']);
        foreach ($ids as $key => $value) {
            Timetable::delete($value['id']);
        }
        foreach ($_POST['arr'] as $day_week => $lessons) {
            foreach ($lessons as $num_lesson => $info) {
                $timetable_model = new Timetable();
                $data = [];
                $data['id_group'] = $_POST['id_group'];
                $data['load_time'] = $_POST['load_time'];
                $data['day_week'] = $day_week;
                $data['serial_number'] = $num_lesson;
                $data += $info;

                if ($timetable_model->validation($data)) {
                    $table = $timetable_model->dispense();
                    if ($table) {
                        $timetable_model->save($table);
                    }
                }
            }
        }
        $_SESSION["success"][] = "Расписание изменено!";
        redirect('/admin/timetable/select-timetable');
    }
}