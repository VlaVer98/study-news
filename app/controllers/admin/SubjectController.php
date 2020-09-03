<?php


namespace app\controllers\admin;


use app\models\admin\Subject;
use study_news\libs\pagination\Pagination;

class SubjectController extends AppController {
    public function viewAllAction() {
        $subject_model = new Subject();
        //pagination
        $display_by = 15;
        $page = isset($_GET['page']) ? $_GET['page']:1;
        $count = $subject_model->getCount();
        $viewWith = $display_by*$page-$display_by;

        $subjects = $subject_model->getPart($viewWith, $display_by);
        $pagination = new Pagination($page, $count, $display_by);

        $this->set(compact('subjects', 'pagination'));
    }

    public function viewAction() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if(!$id) {
            throw new \Exception(404, "Страница не найденна");
        }
        $subject_model = new Subject();
        $subject = $subject_model->get($id);
        $this->set(compact('subject'));
    }

    public function viewCreateAction() {

    }

    public function editAction() {
        if(empty($_POST)) {
            $_SESSION["error"][] = "Произошла ошибка!";
        }
        $subject_model = new Subject();
        $id_subject = isset($_POST['id']) ? $_POST['id'] : false;
        if($id_subject && $subject_model->validation($_POST)) {
            $table = $subject_model->load($id_subject);
            if($table && $subject_model->save($table)) {
                $_SESSION["success"][] = "Данные успешно изменены!";
            } else {
                $_SESSION["error"][] = "Ошибка, перезагрузите страницу и попробуйте еще!";
            }
        } else {
            $_SESSION["error"] = $subject_model->getErrors();
        }
        redirect();
    }

    public function createAction() {
        if(empty($_POST)) {
            $_SESSION["error"][] = "Произошла ошибка!";
        }
        $subject_model = new Subject();
        if($subject_model->validation($_POST)) {
            $table = $subject_model->dispense();
            if($table && $subject_model->save($table)) {
                $_SESSION["success"][] = "Дисциплина созданна!";
            } else {
                $_SESSION["error"][] = "Ошибка, перезагрузите страницу и попробуйте еще!";
            }
        } else {
            $_SESSION["error"] = $subject_model->getErrors();
        }
        redirect();
    }

    public function deleteAction() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if(!$id) {
            throw new \Exception(404, "Страница не найденна");
        }
        $subject_model = new Subject();
        $trash = $subject_model->delete($id);
        if($trash) {
            $_SESSION["success"][] = "Дисциплина удалена!";
        } else {
            $_SESSION["error"][] = "Произошла ошибка!";
        }
        redirect();
    }

}