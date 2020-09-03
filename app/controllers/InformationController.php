<?php
namespace app\controllers;
use app\models\Teacher;

class InformationController extends AppController {
	public function aboutSchoolAction() {
		
	}

	public function aboutTeacherAction() {
		$teacher_model = new Teacher();
		$teachers = $teacher_model->get_full_inform();
		$this->set(compact('teachers'));
	}

	public function aboutCityAction() {

	} 

	public function touristRouteAction() {

	}

	public function drivingDirectionsAction() {

	}

	public function eatingPlacesAction() {

	}

	public function metroSchemeAction() {

	}

	public function trainScheduleAction() {

	}
}

?>