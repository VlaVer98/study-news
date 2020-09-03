<?php
namespace app\controllers\admin;
use app\models\admin\Image;
use app\models\admin\Category;
use study_news\Cache;

class GalleryController extends AppController {
	public function viewCategoryAction() {
		//выводит виджет
	}

	public function addCategoryAction() {
		if(!empty($_POST)) {
			$categoryModel = new Category();
			if($categoryModel->validation($_POST)){
				if($categoryModel->create("category_gallery")) {
					$_SESSION["success"][] = "Категория успешно добавленна";
					Cache::delete('category_gallery');
				} else {
					$_SESSION["error"][] = "Произошла ошибка!";
				}
			}else {
				$_SESSION["error"][] = "Произошла ошибка! Данные не прошли валидацию";
			}
			redirect();
		}
		$allCategory = \study_news\APP::$app->getProperty('category_gallery');
		$this->set(compact("allCategory"));
	}

	public function editCategoryAction() {
		//debug(\shop\APP::$app->getProperty('category'));
		if(!empty($_POST)) {
			//debug($_POST);
			$categoryModel = new Category();
			if($categoryModel->validation($_POST)){
				if($categoryModel->update($_POST['id'], "category_gallery")) {
					$_SESSION["success"][] = "Категория успешно изменена";
					Cache::delete('category_gallery');
				} else {
					$_SESSION["error"][] = "Произошла ошибка!";
				}
			}else {
				$_SESSION["error"][] = "Произошла ошибка! Данные не прошли валидацию";
			}
			redirect();
		}
		$image_model = new Image();

		$id = $_GET['id'];
		$category = \R::findOne('category_gallery', "id=?", [$id]);
		$images = $image_model->get($id);
		if(!$category) {
			throw new \Exception("Страница не найденна", 404);
		}
		$this->set(compact('category', 'images'));
	}

	public function deleteCategoryAction() {
		$id = $_GET['id'];
		$categoryModel = new Category();
		if($categoryModel->delete($id, 'category_gallery', 'gallery', "/img/gallery")) {
			$_SESSION["success"][] = "Категория успешно удаленна!";
			Cache::delete('category_gallery');
		}else {
			$_SESSION["error"][] = "Невозможно удалить категорию!";
		}
		redirect();
	}

	public function deleteImageAction() {
		$id = $_GET['id'];
		$image_model = new Image();
		if($image_model->delete($id)) {
			$_SESSION["success"][] = "Изображение успешно удалено!";	
		}else {
			$_SESSION["error"][] = "Ошибка удаления!";
		}
		redirect();
	}

	public function uploadImageAction() {
		if(!empty($_POST['category'])) {
			$file_model = new Image();
			$id = $_POST['category'];
			if(\R::findOne('category_gallery', 'id=?', [$id])) {
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
		$allCategory = \study_news\APP::$app->getProperty('category_gallery');
		$this->set(compact("allCategory"));
	}
}
?>