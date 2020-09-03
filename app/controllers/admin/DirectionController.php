<?php


namespace app\controllers\admin;


use app\models\Direction;
use RedUNIT\Base\Dispense;
use study_news\libs\pagination\Pagination;

class DirectionController extends AppController {
    public function viewAllAction() {
        $direction_model = new Direction();
        //pagination
        $display_by = 15;
        $page = isset($_GET['page']) ? $_GET['page']:1;
        $count = $direction_model->getCount();
        $viewWith = $display_by*$page-$display_by;

        $directions = $direction_model->getPart($viewWith, $display_by);
        $pagination = new Pagination($page, $count, $display_by);

        $this->set(compact('directions', 'pagination'));
    }

    public function viewCreateAction() {}

    public function viewAction() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if(!$id) {
            throw new \Exception(404, "Страница не найденна");
        }
        $direction_model = new Direction();
        $man = $direction_model->get($id);
        $this->set(compact('man'));
    }


    public function editAction() {
        if(empty($_POST)) {
            $_SESSION["error"][] = "Произошла ошибка!";
        }
        $direction_model = new Direction();
        $id_direction = isset($_POST['id']) ? $_POST['id'] : false;
        $avatar = isset($_SESSION['files'])&&!empty($_SESSION['files']) ? $_SESSION['files'][0]['name_file'] : null;
        //debug($avatar);
        if($id_direction && $direction_model->validation($_POST)) {
            $table = $direction_model->load($id_direction);
            if($table) {
                $direction_model->saveAvatar($avatar);
                unset($_SESSION['files']);
            }
            if($table && $direction_model->save($table)) {
                $_SESSION["success"][] = "Данные успешно изменены!";
            } else {
                $_SESSION["error"][] = "Ошибка, перезагрузите страницу и попробуйте еще!";
            }
        } else {
            $_SESSION["error"] = $direction_model->getErrors();
        }
        redirect();
    }

    public function createAction() {
        if(empty($_POST)) {
            $_SESSION["error"][] = "Произошла ошибка!";
        }
        $avatar = isset($_SESSION['files'])&&!empty($_SESSION['files']) ? $_SESSION['files'][0]['name_file'] : null;
        $direction_model = new Direction();
        if($direction_model->validation($_POST)) {
            $table = $direction_model->dispense();
            if($table) {
                $direction_model->saveAvatar($avatar);
                unset($_SESSION['files']);
            }
            if($table && $direction_model->save($table)) {
                $_SESSION["success"][] = "Руководитель добавлен!";
            } else {
                $_SESSION["error"][] = "Ошибка, перезагрузите страницу и попробуйте еще!";
            }
        } else {
            $_SESSION["error"] = $direction_model->getErrors();
        }
        redirect();
    }

    public function deleteAction() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if(!$id) {
            throw new \Exception(404, "Страница не найденна");
        }
        $direction_model = new Direction();
        $trash = $direction_model->delete($id);
        if($trash) {
            $_SESSION["success"][] = "Руководитель удален!";
        } else {
            $_SESSION["error"][] = "Произошла ошибка!";
        }
        redirect();
    }
}