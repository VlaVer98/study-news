<?php
namespace app\controllers\admin;
use app\models\admin\UploadFile;
use app\models\admin\UploadImage;

class UploaderController extends AppController {
	
	public function fileAction() {
		$uploadModel = new UploadFile();
		//максимальный размер файла в мб
		$max_size = 200;
		//unset($_SESSION["files"]);
		//die;
		//debug($_GET);
		if($uploadModel->save($_FILES, $max_size)) {
			if(isset($_SESSION['files']) && array_search($uploadModel->name_file['title'], array_column($_SESSION['files'], 'title')) !==false ) {
				http_response_code(400);
				echo "Элемент с таким именем существует";
				@unlink(WWW."/docs/{$uploadModel->name_file['name_file']}");
				die;
			}
			$_SESSION['files'][] = $uploadModel->name_file;
			echo json_encode($uploadModel->name_file['name_file']);
			//debug($_SESSION);
		} else {
			http_response_code(400);
			echo json_encode($uploadModel->err);
		}
		die;
	}

	public function imageAction() {
		$uploadModel = new UploadImage();
		//максимальный размер файла в мб
		$max_size = 200;
		//unset($_SESSION["files"]);
		//die;
		//debug($_GET);
		if($uploadModel->save($_FILES, $max_size)) {
			if(isset($_SESSION['files']) && array_search($uploadModel->name_file['title'], array_column($_SESSION['files'], 'title')) !==false ) {
				http_response_code(400);
				echo "Элемент с таким именем существует";
				@unlink(WWW."/img/gallery/{$uploadModel->name_file['name_file']}");
				die;
			}
			$_SESSION['files'][] = $uploadModel->name_file;
			echo json_encode($uploadModel->name_file['name_file']);
			//debug($_SESSION);
		} else {
			http_response_code(400);
			echo json_encode($uploadModel->err);
		}
		die;
	}

    public function PhotoAction() {
        $uploadModel = new UploadImage();
        //максимальный размер файла в мб
        $max_size = 200;
        //unset($_SESSION["files"]);
        //die;
        //debug($_GET);
        if($uploadModel->save($_FILES, $max_size, "img/photo/")) {
            if(isset($_SESSION['files']) && array_search($uploadModel->name_file['title'], array_column($_SESSION['files'], 'title')) !==false ) {
                http_response_code(400);
                echo "Элемент с таким именем существует";
                @unlink(WWW."img/photo/{$uploadModel->name_file['name_file']}");
                die;
            }
            $_SESSION['files'][] = $uploadModel->name_file;
            echo json_encode($uploadModel->name_file['name_file']);
            //debug($_SESSION);
        } else {
            http_response_code(400);
            echo json_encode($uploadModel->err);
        }
        die;
    }

	public function deleteFileAction() {
		$name_file = isset($_GET['name']) ? $_GET['name'] : null;
		foreach ($_SESSION['files'] as $key => $value) {
			if($value['name_file']==$name_file) {
				unset($_SESSION['files'][$key]);
				@unlink(WWW."/docs/{$name_file}");
				die;
			}
		}
		die;
	}

	public function deleteImageAction() {
		$name_file = isset($_GET['name']) ? $_GET['name'] : null;
		foreach ($_SESSION['files'] as $key => $value) {
			if($value['name_file']==$name_file) {
				unset($_SESSION['files'][$key]);
				@unlink(WWW."/img/gallery/{$name_file}");
				die;
			}
		}
		die;
	}

    public function deletePhotoAction() {
        $name_file = isset($_GET['name']) ? $_GET['name'] : null;
        if($name_file == 'default_avatar.png') die;
        foreach ($_SESSION['files'] as $key => $value) {
            if($value['name_file']==$name_file) {
                unset($_SESSION['files'][$key]);
                @unlink(WWW."/img/photo/{$name_file}");
                die;
            }
        }
        @unlink(WWW."/img/photo/{$name_file}");
        die;
    }
}

?>