<?php
namespace app\controllers;
use app\models\Timetable;
use app\models\TimeOccupation;

class TimetableController extends AppController {
	public function viewAction() {
		$timetable_model = new Timetable();

		$id = isset($_GET['id']) ? $_GET['id'] : null;
		$group = isset($_GET['group']) ? $_GET['group'] : null;
		$date = isset($_GET['date']) ? $_GET['date'] : $timetable_model->get_last_date($id);

		$previous_date = $timetable_model->get_previous_date($id);
		$last_date = $timetable_model->get_last_date($id);
		//debug($previous_date);
		$timetable = $timetable_model->get($id, $date);

		$time_occupation_model = new TimeOccupation();
		$time_occupation = $time_occupation_model->get();

		$days_week = ['monday'=>"ПН", 'tuesday'=>"ВТ", 'wednesday'=>"СР", 'thursday'=>"ЧТ", 'friday'=>"ПТ"];

		//debug($time_occupation);
		$this->set(compact('timetable', 'days_week', 'group', 'time_occupation', 'date', 'previous_date', 'id', 'last_date'));
	}
}

?>