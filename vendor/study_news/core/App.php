<?php
namespace study_news;

class App {
	public static $app;

	public function __construct() {
		$query = trim($_SERVER['QUERY_STRING'], "/");
		session_start();
		self::$app = Registry::getInstance();
		$this->getParams();
		new ErrorHandler;
		Router::dispatch($query);
	}
	private function getParams() {
		$params = require_once(CONFIG . "/params.php");
		if(!empty($params)) {
			foreach($params as $k=>$v) {
				self::$app->setProperty($k, $v);
			}
		}
	}
}
?>