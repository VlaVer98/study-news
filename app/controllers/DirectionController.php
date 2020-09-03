<?php
namespace app\controllers;

class DirectionController extends AppController {
	public function mainAction() {
        $men = \R::getAll('SELECT * FROM direction');
        $this->set(compact('men'));
	}
}

?>