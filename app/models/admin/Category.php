<?php
namespace app\models\admin;

class Category extends AppModel {
	protected $attribytes = [
		"title" => null,
		'parent_id' => null,
	];
	protected $rule = [
		'required' => [
			['title']
		]
	];
	protected $errors = [];

	public function create($table) {
		\R::ext('xdispense', function($table_name){
			return \R::getRedBean()->dispense($table_name);
		});

		$category = \R::xdispense("$table");
		//debug($category);
		$res = $this->save($category);

		if($res) return true;
		return false;
	}

	public function update($id, $table) {
		$category = \R::load("$table", $id);
		//$alias = $this->translit($this->attribytes['title']);
		\R::begin();
		try{
			//$id = $this->save($category);
			//$alias = $this->setAlias($alias, $id);
			//$cat = \R::load('category', $id);
			$category->title = $this->attribytes['title'];
			\R::store($category);

			\R::commit();
			return true;
		}catch (\Exception $e){
			\R::rollback();
			return false;
		}
	}

	public function delete($id, $table_cat, $table_file, $path) {
		$child = \R::findOne("$table_cat", "parent_id=?", [$id]);
		if(!($child)) {
			$files = \R::getAll("SELECT file_name FROM $table_file WHERE category_id=?", [$id]);
			$cat_table = \R::load("$table_cat", $id);
			\R::trash($cat_table);
			foreach ($files as $key => $value) {
				@unlink(WWW."{$path}/{$value['file_name']}");
			}
			return true;
		}
		return false;
	}

	/*private function setAlias($alias, $id) {
		$cat = \R::findOne("category", "alias = ?", [$alias]);
		if($cat) {
			$alias.="-{$id}";
			$alias = $this->setAlias($alias, $id);
		}
		return $alias;
	}*/
}

?>