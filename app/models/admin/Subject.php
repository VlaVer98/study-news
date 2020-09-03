<?php


namespace app\models\admin;


class Subject extends AppModel {
    protected $attribytes = [
        "name" => null
    ];
    protected $rule = [
        'required' => [
            ['name']
        ]
    ];

    public function get($id_group) {
        return \R::getRow("SELECT * FROM subject WHERE id=? LIMIT 1", [$id_group]);
    }

    static public function static_getAll() {
        return \R::getALL("SELECT * FROM subject");
    }

    public function getCount() {
        return \R::count('subject');
    }

    public function getPart($viewWith, $display_by) {
        return \R::getAll("SELECT * FROM subject LIMIT $viewWith, $display_by");
    }

    public function load($id_subject) {
        $table = \R::load('subject', $id_subject);

        return $table ? $table : false;
    }

    public function dispense() {
        \R::ext('xdispense', function($table_name){
            return \R::getRedBean()->dispense($table_name);
        });

        $table = \R::xdispense("subject");

        return $table ? $table : false;
    }

    public function delete($id_subject) {
        $subject = \R::load('subject', $id_subject);
        $trash = \R::trash($subject);

        return $trash ? true : false;
    }
}