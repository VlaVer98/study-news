<?php
namespace app\controllers;

class GalleryController extends AppController {
	public function viewAction() {
		$id = isset($_GET['id']) ? $_GET['id'] : null;
		$title = isset($_GET['title']) ? $_GET['title'] : null;
		$images = \R::findAll("gallery", "category_id=?", [$id]);
		$this->set(compact('images', 'title'));
	}
}
?>