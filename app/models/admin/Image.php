<?php
namespace app\models\admin;

class Image {
	public $err = [];

	public function get($id_category) {
		return \R::getAll("SELECT * FROM gallery WHERE category_id=?", [$id_category]);
	}

	public function delete($id_file) {
		$image = \R::load('gallery', $id_file);
		if($image) {
			$image_name = \R::getCell("SELECT file_name FROM gallery WHERE id=?", [$id_file]);
			\R::trash($image);
			unlink(WWW."/img/gallery/{$image_name}");
			return true;
		}
		return false;
	}

	protected function check_unique($id_category) {
		$names = [];
		foreach ($_SESSION['files'] as $key => $value) {
			$names = $value['title'];
		}

		$file_db = \R::getAll("SELECT title FROM gallery WHERE category_id=? AND title IN (". \R::genSlots($names) .")", \R::flat(array($id_category, $names)));

		if($file_db) {
			foreach ($file_db as $key => $value) {
				$this->err[] = "Изображение с именем {$value['title']} уже существует в данной категории";
			}
			return false;
		} else {
			return true;
		}
	}

	public function save($id_category) {
		if(!$this->check_unique($id_category)) {
			return false;
		}

		$count = count($_SESSION['files']);
		if($count == 1) {
			$bean = \R::dispense('gallery', $count);

			$bean->title = $_SESSION['files'][0]['title'];
			$bean->file_name = $_SESSION['files'][0]['name_file'];
			$bean->category_id = $id_category;

			\R::begin();
		    try{
		        \R::store($bean);
		        \R::commit();
		        return true;
		    }
		    catch(\Exception $e) {
		        \R::rollback();
		        return false;
		    }
		} else {
			$beans = \R::dispense('gallery', $count);

			foreach ($_SESSION['files'] as $key => $value) {
				$beans[$key]->title = $value['title'];
				$beans[$key]->file_name = $value['name_file'];
				$beans[$key]->category_id = $id_category;
			}

		    \R::begin();
		    try{
		        \R::storeAll($beans);
		        \R::commit();
		        return true;
		    }
		    catch(\Exception $e) {
		        \R::rollback();
		        return false;
		    }
		}
	}
}
?>