<?php
namespace study_news\base;
use study_news\Db;

abstract class Model {
	protected $attribytes = [];
	protected $errors = [];
	protected $rule = [];

	public function __construct() {
		Db::getInstance();
	}

	public function setAttribytes($data = []) {
		foreach ($data as $key => $value) {
			if(array_key_exists($key, $this->attribytes)) {
				$this->attribytes[$key] = $value;
			}
		}
	} 

	private function setErrors($errors) {
		foreach ($errors as $key => $value) {
			$this->errors[$key] = $value;
		}
	}

	public function getErrors() {
		$errors = [];
		foreach ($this->errors as $key => $value) {
			foreach ($value as $err) {
				$errors[] = $err;
			}
		}
		return $errors;
	}

	public function save($table) {
		//debug($this->attribytes);
		foreach ($this->attribytes as $key => $value) {
			$table[$key] = $this->attribytes[$key];
		}
		return \R::store($table);
	}

	public function validation($data) {
		$v = new \Valitron\Validator($data);
		$v->rules($this->rule);
		if($v->validate()) {
			$this->setAttribytes($data);
		    return true;
		} else {
    		// Errors
		    $this->setErrors($v->errors());
		    return false;
		}
	}
}
?>