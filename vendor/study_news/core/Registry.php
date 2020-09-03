<?php
namespace study_news;

class Registry {
	use TSingleton;
	
	private $propertys = [];

	private function __construct() {}

	public function setProperty($name, $value) {
		$this->propertys[$name] = $value;
	}

	public function getProperty($name) {
		if(isset($this->propertys[$name])) {
			return $this->propertys[$name];
		}
	}

	public function getProperties() {
		return $this->propertys;
	}
}
?>