<?php


namespace app\controllers\admin;


use app\models\admin\Cabinet;
use study_news\libs\pagination\Pagination;

class CabinetController extends AppController {
    public function viewAllAction() {
        $cabinet_model = new Cabinet();
        //pagination
        $display_by = 15;
        $page = isset($_GET['page']) ? $_GET['page']:1;
        $count = $cabinet_model->getCount();
        $viewWith = $display_by*$page-$display_by;

        $cabinets = $cabinet_model->getPart($viewWith, $display_by);
        $pagination = new Pagination($page, $count, $display_by);

        $this->set(compact('cabinets', 'pagination'));
    }

    public function viewAction() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if(!$id) {
            throw new \Exception(404, "Страница не найденна");
        }
        $cabinet_model = new Cabinet();
        $cabinet = $cabinet_model->get($id);
        $this->set(compact('cabinet'));
    }

    public function viewCreateAction() {

    }

    public function editAction() {
        if(empty($_POST)) {
            $_SESSION["error"][] = "Произошла ошибка!";
        }
        $cabinet_model = new Cabinet();
        $id_cabinet = isset($_POST['id']) ? $_POST['id'] : false;
        if($id_cabinet && $cabinet_model->validation($_POST)) {
            $table = $cabinet_model->load($id_cabinet);
            if($table && $cabinet_model->save($table)) {
                $_SESSION["success"][] = "Данные успешно изменены!";
            } else {
                $_SESSION["error"][] = "Ошибка, перезагрузите страницу и попробуйте еще!";
            }
        } else {
            $_SESSION["error"] = $cabinet_model->getErrors();
        }
        redirect();
    }

    public function createAction() {
        if(empty($_POST)) {
            $_SESSION["error"][] = "Произошла ошибка!";
        }
        $cabinet_model = new Cabinet();
        if($cabinet_model->validation($_POST)) {
            $table = $cabinet_model->dispense();
            if($table && $cabinet_model->save($table)) {
                $_SESSION["success"][] = "Номер кабинета добавлен!";
            } else {
                $_SESSION["error"][] = "Ошибка, перезагрузите страницу и попробуйте еще!";
            }
        } else {
            $_SESSION["error"] = $cabinet_model->getErrors();
        }
        redirect();
    }

    public function deleteAction() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if(!$id) {
            throw new \Exception(404, "Страница не найденна");
        }
        $cabinet_model = new Cabinet();
        $trash = $cabinet_model->delete($id);
        if($trash) {
            $_SESSION["success"][] = "Номер кабинета удалена!";
        } else {
            $_SESSION["error"][] = "Произошла ошибка!";
        }
        redirect();
    }
}