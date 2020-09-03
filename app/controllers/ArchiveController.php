<?php
namespace app\controllers;

class ArchiveController extends AppController {
	public function viewCategoryAction() {
		$id = isset($_GET['id']) ? $_GET['id'] : null;
		$title = isset($_GET['title']) ? $_GET['title'] : null;
		$files = \R::findAll("file", "category_id=?", [$id]);
		$this->set(compact('files', 'title'));
	}

	public function viewFileAction() {
		//debug($_SERVER);
		$id = isset($_GET['id']) ? $_GET['id'] : null;
		$file = \R::findOne("file", "id=?", [$id]);
		$this->set(compact('file'));
	}
}
?>