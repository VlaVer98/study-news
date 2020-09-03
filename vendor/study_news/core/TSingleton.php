<?php
namespace study_news;

trait TSingleton {
	private static $instance = null;
	
	public static function getInstance() {
		if(self::$instance === null){
			self::$instance = new self;
		}
		return self::$instance;
	}
}
?>