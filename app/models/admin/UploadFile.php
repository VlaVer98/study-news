<?php
namespace app\models\admin;

class UploadFile {
	protected $file;
	protected $max_size;
	public $name_file;
	protected $success = [];
	public $err = [];

	public function check_type($name_file, $src, $type) {
		preg_match("#\w{3,}$#", $type, $matches);

		switch($matches[0]){
			case 'pdf': return true;
			default : $this->err[]="{$name_file} имеет не поддеживаемый формат(разрешен: .pdf)"; return false;
		}
	}

	public function max_size($name_file, $size) {
		if($this->max_size == null) return true;
		//В Байты
		$max_size_in_bait = (1024*1024) * $this->max_size;

		if($size < $max_size_in_bait) {
			return true;
		}
		$this->err[] = "Файл {$name_file} должен быть не больше {$this->max_size} Мбайт";
	}

	public function generated_name() {
		$name = uniqid("", true);
		
		if(\R::findOne('file', "file_name=?", [$name])) {
			$name = $this->generated_name();
		}
		return $name;
	}

	public function getType($type) {
		preg_match("#\w{3,}$#", $type, $matches);
		return $matches[0];
	}

	public function defolt_error($name_file, $err) {
		switch ($err) {
			case UPLOAD_ERR_INI_SIZE:
				$this->err[]="Размер файла {$name_file} превысил допустимое значение на сервере";
				return false;
	        case UPLOAD_ERR_FORM_SIZE:
	        	$this->err[] = "Размер файла {$name_file} превысил значение в HTML-форме.";
	        	return false;
	        case UPLOAD_ERR_PARTIAL: "Загружаемый файл {$name_file} был получен только частично.";
	        	return false;
	        case UPLOAD_ERR_NO_FILE: 
	        	$this->err[] = "Файл {$name_file} не был загружен.";
	        	return false;
	        case UPLOAD_ERR_NO_TMP_DIR: 
	        	return false;
	        case UPLOAD_ERR_CANT_WRITE: 
	        	return false;
	        case UPLOAD_ERR_EXTENSION: 
	        	return false;
	        default: return true;
    	}
	}
	/*
	* Принимает одномерный и или двумерный, если несколько файлов массив $_FILES;
	*/
	public function save($file, $max_size=null) {
		$this->file = $file;
		$this->max_size = $max_size;

		if(empty($this->file)){
			$this->err[] = "Ошибка! Файлы не были загружены";
			return false;
		}
		foreach ($this->file as $key => $value) {
			$this->name_file["title"] = $value['name'];
			$this->defolt_error($value['name'], $value['error']);
			$this->check_type($value['name'],$value['tmp_name'], $value['type']);
			$this->max_size($value['name'], $value['size']);
		}

		if(!empty($this->err)) {
			return false;
		}

		$dst = "docs/";

		$name_file = $this->generated_name();
		$type_file = $this->getType($value['type']);

		$res = move_uploaded_file($value['tmp_name'], $dst.$name_file.".".$type_file);

		$this->name_file["name_file"] = "{$name_file}.{$type_file}";

		if($res) {
			return true;
		} else {
			return false;
		}
	}
}

?>