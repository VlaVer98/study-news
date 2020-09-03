<?php
namespace app\widgets\menu;
use study_news\Cache;
use study_news\App;

class Menu {
	private $category;
	private $tpl;
	private $class_ul = "";
	private $tab;
	private $attr = [];
	private $name_table;
	private $name_cache;

	public function __construct($options = []) {
		$this->tpl = __DIR__ . "/menu_tpl/menu.php";
		$this->setOption($options);
		$this->run();
	}

	private function setOption($options) {
		if(!empty($options)) {
			foreach ($options as $key => $value) {
				if(property_exists($this, $key)) {
					if($key == 'tpl') {
						$this->$key = __DIR__ . "/menu_tpl/{$value}.php";
					} else {
						$this->$key = $value;
					}
				}
			}
		}
	}

	private function run() {
		$menuHtml = Cache::get('menuHtml');
		if(!$menuHtml) {
			$this->category = App::$app->getProperty($this->name_cache);
			if($this->category) {
				$this->category = Cache::get($this->name_cache);
				if(!$this->category) {
					$table = $this->$name_table;
					$this->category = \R::getAssoc("SELECT * FROM $table");
					Cache::set($this->name_cache, $this->category, 3600*24*30);
				}
			}
			$tree = $this->getTree();
			$menuHtml = $this->getMenuHtml($tree);
			$this->output($menuHtml);
		}
		//return $menuHtml;
	}

	private function getTree() {
		$tree = [];
		$category = $this->category;
		foreach ($category as $k => &$value) {
			if($value['parent_id'] == 0) {
				$tree[$k] = &$value;
			} else {
				$category[$value['parent_id']]['childs'][$k] = &$value;
			}
		}
		return $tree;
	}

	private function getMenuHtml($tree) {
		$menuHtml = "";
		foreach ($tree as $key => $value) {
			$menuHtml .= $this->getTemplate($value, $key);
		}
		return $menuHtml;
	}

	private function getTemplate($category, $id) {
		ob_start();
		require $this->tpl;
		return ob_get_clean();
	}

	private function output($menuHtml) {
		echo "<ul class='{$this->class_ul}'>";
		echo $menuHtml;
		echo "</ul>";
	}
}
?>