<?php
namespace app\controllers\admin;
use app\models\User;
//use app\models\admin\User as UserAdmin;
//use shop\libs\pagination\Pagination;

class UserController extends AppController {
	public function loginAction() {
		$this->layout = "login";
		if(!empty($_POST)) {
			$email = isset($_POST['login']) ? trim($_POST['login']) : null;
			$password = isset($_POST['password']) ? trim($_POST['password']) : null;
			$user = new User();
			if($user->login($email, $password, true)) {
				redirect("/".ADMIN);
			} else {
				$_SESSION["error"][] = "Логин/пароль неверный";
				redirect();
			}
		}
	}
	/*public function indexAction() {
		$userModel = new UserAdmin();

		//pagination
		$display_by = 3;
		$page = isset($_GET['page']) ? $_GET['page']:1;
		$count = $userModel->count();
		$viewWith = $display_by*$page-$display_by;

		$users = $userModel->getPart($viewWith, $display_by);
		$pagination = new Pagination($page, $count, $display_by);

		$this->set(compact("users", "pagination"));
	}

	public function editAction() {
		$userModel = new UserAdmin();

		if(!empty($_POST)) {
			$_POST['password'] = $userModel->setPassword($_POST['password'],$_POST['id']);
			if($userModel->validation($_POST) && $userModel->checkedUnique($_POST['id'])) {
				$_SESSION['success'][] = "Данные успешно обновленны!";
			} else {
				$_SESSION['error'] = $userModel->getErrors();
			}
			redirect();
		}

		$id = $_GET['id']?:null;
		$user = $userModel->getOne($id);
		if($user) {
			$this->set(compact('user'));
		}else {
			throw new \Exception(404, "Страница не найденна!");
		}
	}
	public function createAction() {
		$userModel = new UserAdmin();

		if(!empty($_POST)) {
			$_POST['password'] = $userModel->setPassword($_POST['password']);
			if($userModel->validation($_POST) && $userModel->checkedUnique($_POST['id'])) {
				$_SESSION['success'][] = "Пользователь добавлен!";
			} else {
				$_SESSION['error'] = $userModel->getErrors();
			}
			redirect();
		}
	}*/
}

?>