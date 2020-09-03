<?php
namespace app\controllers\admin;
use app\models\admin\Group;
use study_news\libs\pagination\Pagination;

class GroupController extends AppController {
	public function viewAllAction() {
		$group_model = new Group();
		//pagination
		$display_by = 15;
		$page = isset($_GET['page']) ? $_GET['page']:1;
		$count = $group_model->getCount();
		$viewWith = $display_by*$page-$display_by;

		$groups = $group_model->getPart($viewWith, $display_by);
		$pagination = new Pagination($page, $count, $display_by);

		
		//$groups = $group_model->getAll();
		$this->set(compact('groups', 'pagination'));
	}


	public function viewAction() {
		$id = isset($_GET['id']) ? $_GET['id'] : null;
		if(!$id) {
			throw new \Exception(404, "Страница не найденна");
		}
		$group_model = new Group();
		$group = $group_model->get($id);
		$this->set(compact('group'));
	}

	public function viewCreateAction() {

	}

	public function editAction() {
		if(empty($_POST)) {
			$_SESSION["error"][] = "Произошла ошибка!";
		}
		$group_model = new Group();
		$id_group = isset($_POST['id']) ? $_POST['id'] : false;
		if($id_group && $group_model->validation($_POST)) {
			$table = $group_model->load($id_group);
			if($table && $group_model->save($table)) {
				$_SESSION["success"][] = "Данные успешно изменены!";
			} else {
				$_SESSION["error"][] = "Ошибка, перезагрузите страницу и попробуйте еще!";
			}
		} else {
			$_SESSION["error"] = $group_model->getErrors();
		}			
		redirect();
	}

	public function createAction() {
		if(empty($_POST)) {
			$_SESSION["error"][] = "Произошла ошибка!";
		}
		$group_model = new Group();
		if($group_model->validation($_POST)) {
			$table = $group_model->dispense();
			if($table && $group_model->save($table)) {
				$_SESSION["success"][] = "Группа созданна!";
			} else {
				$_SESSION["error"][] = "Ошибка, перезагрузите страницу и попробуйте еще!";
			}
		} else {
			$_SESSION["error"] = $group_model->getErrors();
		}			
		redirect();
	}

	public function deleteAction() {
		$id = isset($_GET['id']) ? $_GET['id'] : null;
		if(!$id) {
			throw new \Exception(404, "Страница не найденна");
		}
		$group_model = new Group();
		$trash = $group_model->delete($id);
		if($trash) {
			$_SESSION["success"][] = "Группа удалена!";
		} else {
			$_SESSION["error"][] = "Произошла ошибка!";
		}
		redirect();
	}
}