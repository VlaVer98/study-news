<?php
namespace app\models\admin;

class Group extends AppModel {
	protected $attribytes = [
		"name" => null,
		'status' => null
	];
	protected $rule = [
		'required' => [
			['name'],
			['status']
		]
	];

	public function getAll() {
		return \R::getAll("SELECT * FROM group_student ORDER BY status ASC");
	}

    static public function getAllActive() {
        return \R::getAll("SELECT * FROM group_student WHERE status = 1");
    }

	public function getPart($viewWith, $display_by) {
		return \R::getAll("SELECT * FROM group_student ORDER BY status ASC LIMIT $viewWith, $display_by");
	}

	public function get($id_group) {
		return \R::getRow("SELECT * FROM group_student WHERE id=? LIMIT 1", [$id_group]);
	}

	public function getCount() {
		return \R::count('group_student');
	}

	public function delete($id_group) {
		$group = \R::load('group_student', $id_group);
		$trash = \R::trash($group);

		return $trash ? true : false;
	}

	public function load($id_group) {
		$table = \R::load('group_student', $id_group);

		return $table ? $table : false;
	}

	public function dispense() {
		\R::ext('xdispense', function($table_name){
			return \R::getRedBean()->dispense($table_name);
		});

		$table = \R::xdispense("group_student");

		return $table ? $table : false;
	}
}

?>