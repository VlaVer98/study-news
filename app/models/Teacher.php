<?php
namespace app\models;

class Teacher extends AppModel {
    protected $attribytes = [
        "surname" => null,
        'name' => null,
        'patronymic' => null,
        'img' => null
    ];

    protected $rule = [
        'required' => [
            ['surname'],
            ['name'],
            ['patronymic']
        ]
    ];

	public function get_teacher() {
		return \R::getALL("SELECT * FROM teacher");
	}

    static public function static_getAll() {
        return \R::getALL("SELECT * FROM teacher");
    }

	public function get_subject() {
		$subject = \R::getALL("SELECT teacher_subject.id_teacher, subject.name AS name FROM teacher_subject JOIN subject ON teacher_subject.id_subject = subject.id");
		$arr = [];
		foreach ($subject as $key => $value) {
			$arr[$value['id_teacher']][] = $value['name'];
		}
		return $arr;
	}

	public function get_group() {
		$group = \R::getALL("SELECT teacher_group.id_teacher, group_student.name AS name FROM teacher_group JOIN group_student ON teacher_group.id_group = group_student.id");
		$arr = [];
		foreach ($group as $key => $value) {
			$arr[$value['id_teacher']][] = $value['name'];
		}
		return $arr;
	}

	public function get_full_inform() {
		$teachers = $this->get_teacher();
		$subjects = $this->get_subject();
		$groups = $this->get_group();

		//$full = [];
		foreach ($teachers as $key => $value) {
			$subject = isset($subjects[$value['id']]) ? $subjects[$value['id']] : null;
			$group = isset($groups[$value['id']]) ? $groups[$value['id']] : null;
			$teachers[$key]['subjects'] = $subject;
			$teachers[$key]['groups'] = $group;
		}

		return $teachers;
	}

    public function getCount() {
        return \R::count('teacher');
    }

    public function getPart($viewWith, $display_by) {
        return \R::getAll("SELECT * FROM teacher LIMIT $viewWith, $display_by");
    }

    public function get($id_teacher) {
        return \R::getRow("SELECT * FROM teacher WHERE id=? LIMIT 1", [$id_teacher]);
    }

    public function load($id_teacher) {
        $table = \R::load('teacher', $id_teacher);

        return $table ? $table : false;
    }

    public function saveAvatar($avatar) {
	    if(empty($avatar))
	        $this->attribytes['img'] = 'default_avatar.png';
	    else
            $this->attribytes['img'] = $avatar;
    }

    public function delete($id_teacher) {
        $teacher = \R::load('teacher', $id_teacher);
        if($teacher['img'] !== 'default_avatar.png')
            @unlink(WWW."/img/photo/{$teacher['img']}");
        $trash = \R::trash($teacher);

        return $trash ? true : false;
    }

    public function dispense() {
        \R::ext('xdispense', function($table_name){
            return \R::getRedBean()->dispense($table_name);
        });

        $table = \R::xdispense("teacher");

        return $table ? $table : false;
    }
}
?>