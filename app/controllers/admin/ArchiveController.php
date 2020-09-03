<?php
namespace app\controllers\admin;
use app\models\admin\Category;
use app\models\admin\File;
use study_news\Cache;

class ArchiveController extends AppController {
	public function viewCategoryAction() {
		//выводит виджет
	}

	public function addCategoryAction() {
		if(!empty($_POST)) {
			$categoryModel = new Category();
			if($categoryModel->validation($_POST)){
				if($categoryModel->create("category_file")) {
					$_SESSION["success"][] = "Категория успешно добавленна";
					Cache::delete('category_file');
				} else {
					$_SESSION["error"][] = "Произошла ошибка!";
				}
			}else {
				$_SESSION["error"][] = "Произошла ошибка! Данные не прошли валидацию";
			}
			redirect();
		}
		$allCategory = \study_news\APP::$app->getProperty('category_file');
		$this->set(compact("allCategory"));
	}

	public function editCategoryAction() {
		//debug(\shop\APP::$app->getProperty('category'));
		if(!empty($_POST)) {
			//debug($_POST);
			$categoryModel = new Category();
			if($categoryModel->validation($_POST)){
				if($categoryModel->update($_POST['id'], "category_file")) {
					$_SESSION["success"][] = "Категория успешно изменена";
					Cache::delete('category_file');
				} else {
					$_SESSION["error"][] = "Произошла ошибка!";
				}
			}else {
				$_SESSION["error"][] = "Произошла ошибка! Данные не прошли валидацию";
			}
			redirect();
		}
		$file_model = new File();

		$id = $_GET['id'];
		$category = \R::findOne('category_file', "id=?", [$id]);
		$files = $file_model->get($id);
		if(!$category) {
			throw new \Exception("Страница не найденна", 404);
		}
		$this->set(compact('category', 'files'));
	}

	public function deleteCategoryAction() {
		$id = $_GET['id'];
		$categoryModel = new Category();
		if($categoryModel->delete($id, 'category_file', 'file', '/docs')) {
			$_SESSION["success"][] = "Категория успешно удаленна!";
			Cache::delete('category_file');
		}else {
			$_SESSION["error"][] = "Невозможно удалить категорию!";
		}
		redirect();
	}

	public function deleteFileAction() {
		$id = $_GET['id'];
		$file_model = new File();
		if($file_model->delete($id)) {
			$_SESSION["success"][] = "Категория успешно удаленна!";	
		}else {
			$_SESSION["error"][] = "Невозможно удалить категорию!";
		}
		redirect();
	}

	public function uploadFileAction() {
		if(!empty($_POST['category'])) {
			$file_model = new File();
			$id = $_POST['category'];
			if(\R::findOne('category_file', 'id=?', [$id])) {
				if(isset($_SESSION['files'])&&!empty($_SESSION['files'])) {
					if($file_model->save($id)) {
						$_SESSION["success"][] = "Файлы для данной категории успешно загруженны!";
					} else {
						$_SESSION["error"] = $file_model->err;
						$_SESSION["error"][] = "Файлы не были загруженны!";
					}
				} else {
					$_SESSION["error"][] = "Необходимо загрузить хотябы 1 файл!";
				}
			} else {
				$_SESSION["error"][] = "Данной категории не обнаруженно!";
			}
		}
		if(isset($_SESSION["files"])) unset($_SESSION["files"]);
		$allCategory = \study_news\APP::$app->getProperty('category_file');
		$this->set(compact("allCategory"));
	}
}

?>