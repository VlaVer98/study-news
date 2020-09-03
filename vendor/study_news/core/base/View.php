<?php
namespace study_news\base;

class View {
	private $route;
	private $controller;
	private $action;
	private $prefix;
	private $view;
	private $layout;
	private $data = [];
	private $meta;
	private $scripts;

	public function __construct($route, $layout, $view, $meta, $data) {
		//echo "$layout";
		$this->route = $route;
		$this->controller = $route['controller'];
		$this->action = $route['action'];
		$this->prefix = $route['prefix'];
		$this->view = $view;
		$this->layout = $layout;
		$this->data = $data;
		$this->meta = $meta;
	}

	public function render() {
		//echo "4-{$this->layout}";;
		//echo $this->action;
		if(is_array($this->data)) extract($this->data);
		$viewContent = APP . "/views/{$this->prefix}{$this->controller}/{$this->action}.php";
		//echo $viewContent;
		if(is_file($viewContent)) {
			ob_start();
			require $viewContent;
			$content = ob_get_clean();

		} else {
			throw new \Exception("Не найден вид {$viewContent}", 500);
		}
		if($this->layout !== false) {
			$layout = APP . "/views/layouts/{$this->layout}.php";
			if(is_file($layout)) {
				$content = $this->getScripts($content);
				require $layout;
			} else {
				throw new \Exception("Не найден шаблон {$layout}", 500);
			}
		} 
	}

	public function viewMeta() {
		$meta = "<title>{$this->meta['title']}</title>" . PHP_EOL;
		$meta .= "<meta name = 'description' content = '{$this->meta['desc']}'>" . PHP_EOL;
		return $meta .= "<meta name = 'keywords' content = '{$this->meta['keywords']}'>";
	}

	private function getScripts($content) {
		$pattern = '#<script.*?>.*?</script>#si';
		preg_match_all($pattern, $content, $matches);
		$this->scripts = $matches[0];
		if(!empty($this->scripts)) {
			$content = preg_replace($pattern, "", $content);
		}
		return $content;
	}
}
?>