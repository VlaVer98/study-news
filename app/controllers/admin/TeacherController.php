<?php


namespace app\controllers\admin;


use app\models\admin\Image;
use app\models\Teacher;
use study_news\base\Controller;
use study_news\libs\pagination\Pagination;

class TeacherController extends AppController {
    public function viewAllAction() {
        $teacher_model = new Teacher();
        //pagination
        $display_by = 15;
        $page = isset($_GET['page']) ? $_GET['page']:1;
        $count = $teacher_model->getCount();
        $viewWith = $display_by*$page-$display_by;

        $teachers = $teacher_model->getPart($viewWith, $display_by);
        $pagination = new Pagination($page, $count, $display_by);


        $this->set(compact('teachers', 'pagination'));
    }

    public function viewCreateAction() {}

    public function viewAction() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if(!$id) {
            throw new \Exception(404, "Страница не найденна");
        }
        $teacher_model = new Teacher();
        $teacher = $teacher_model->get($id);
        $this->set(compact('teacher'));
    }


    public function editAction() {
        if(empty($_POST)) {
            $_SESSION["error"][] = "Произошла ошибка!";
        }
        $teacher_model = new Teacher();
        $id_teacher = isset($_POST['id']) ? $_POST['id'] : false;
        $avatar = isset($_SESSION['files'])&&!empty($_SESSION['files']) ? $_SESSION['files'][0]['name_file'] : null;
        //debug($avatar);
        if($id_teacher && $teacher_model->validation($_POST)) {
            $table = $teacher_model->load($id_teacher);
            if($table) {
                $teacher_model->saveAvatar($avatar);
                unset($_SESSION['files']);
            }
            if($table && $teacher_model->save($table)) {
                $_SESSION["success"][] = "Данные успешно изменены!";
            } else {
                $_SESSION["error"][] = "Ошибка, перезагрузите страницу и попробуйте еще!";
            }
        } else {
            $_SESSION["error"] = $teacher_model->getErrors();
        }
        redirect();
    }

    public function createAction() {
        if(empty($_POST)) {
            $_SESSION["error"][] = "Произошла ошибка!";
        }
        $avatar = isset($_SESSION['files'])&&!empty($_SESSION['files']) ? $_SESSION['files'][0]['name_file'] : null;
        $teacher_model = new Teacher();
        if($teacher_model->validation($_POST)) {
            $table = $teacher_model->dispense();
            if($table) {
                $teacher_model->saveAvatar($avatar);
                unset($_SESSION['files']);
            }
            if($table && $teacher_model->save($table)) {
                $_SESSION["success"][] = "Преподаватель добавлен!";
            } else {
                $_SESSION["error"][] = "Ошибка, перезагрузите страницу и попробуйте еще!";
            }
        } else {
            $_SESSION["error"] = $teacher_model->getErrors();
        }
        redirect();
    }

    public function deleteAction() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if(!$id) {
            throw new \Exception(404, "Страница не найденна");
        }
        $teacher_model = new Teacher();
        $trash = $teacher_model->delete($id);
        if($trash) {
            $_SESSION["success"][] = "Преподаватель удален!";
        } else {
            $_SESSION["error"][] = "Произошла ошибка!";
        }
        redirect();
    }
}