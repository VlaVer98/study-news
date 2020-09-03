<?php
namespace study_news\base;

abstract class Controller {
	protected $route;
	protected $layout;
	private $controller;
	protected $action;
	private $prefix;
	private $view;
	private $data = [];
	private $meta = ["title" => "", "desc" => "", "keywords" => ""];

	public function __construct($route) {
		//echo "<pre>" . print_r($route, true) . "</pre>";
		$this->route = $route;
		$this->controller = $route['controller'];
		$this->action = $route['action'];
		$this->prefix = $route['prefix'];
		$this->view = $route['action'];
		$this->layout = LAYOUT;
		//echo "1-{$this->layout}";
	}

	public function getView() {
		//echo "$this->layout";
		$view = new View($this->route, $this->layout, $this->view, $this->meta, $this->data);
		$view->render();
	}

	protected function set($data) {
		$this->data = $data;
	}

	protected function setMeta($title = "", $desc = "", $keywords = "") {
		$this->meta['title'] = $title;
		$this->meta['desc'] = $desc;
		$this->meta['keywords'] = $keywords;
	}

	protected function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

    protected function loadView($view, $vars = []){
        extract($vars);
        require APP . "/views/{$this->prefix}{$this->controller}/{$view}.php";
        die;
    }
}
?>