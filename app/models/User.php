<?php
namespace app\models;
use study_news\base\Model;

class User extends Model {
	protected $attribytes = [
		"login" => null,
		'password' => null
	];
	protected $rule = [
		'required' => [
			['login'],
			['password']
		]
	];
	protected $errors = [];

	/*public function isRegistered($post) {
			$email = \R::findOne('user',"email=?",[$post['email']]);
			$login = \R::find('user',"login=?",[$post['login']]);
			if($email || $login) {
				if($email) $this->errors['email'][] = "email already exists";
				if($login) $this->errors['login'][] = "login already exists";
				return true;
			}	
		return false;
	}*/ 

	protected function addUserInSession($user) {
		foreach ($user as $key => $value) {
			if($key!='password'){
				$_SESSION['user'][$key]=$value;
			}
		}
	}

	public function login($login, $pass, $isAdmin = false) {
		$user = \R::findOne('user', 'name=?',[$login])?:null;
		$validPassword = false;
		if(!empty($user)) {
			$validPassword = password_verify($pass, $user->password);
		}
		if($validPassword) {
			if($isAdmin) {
				if($user->role == "admin") {
					$this->addUserInSession($user);
					return true;
				}
			} else {
				$this->addUserInSession($user);
				return true;
			}

		}
		return false;
		
	}

	/*public function toRegister($isAdmin = false) {
		$table = \R::dispense('user');
		if($isAdmin) {
			$this->attribytes['role'] = 'admin';
		}

		return $this->save($table);
	}*/
}