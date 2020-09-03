<?php


namespace app\models\admin;


class Cabinet extends AppModel {
    protected $attribytes = [
        "number" => null
    ];
    protected $rule = [
        'required' => [
            ['number']
        ]
    ];

    static public function static_getAll() {
        return \R::getALL("SELECT * FROM cabinet");
    }

    public function getCount() {
        return \R::count('cabinet');
    }

    public function getPart($viewWith, $display_by) {
        return \R::getAll("SELECT * FROM cabinet LIMIT $viewWith, $display_by");
    }

    public function get($id_cabinet) {
        return \R::getRow("SELECT * FROM cabinet WHERE id=? LIMIT 1", [$id_cabinet]);
    }

    public function load($id_cabinet) {
        $table = \R::load('cabinet', $id_cabinet);

        return $table ? $table : false;
    }

    public function dispense() {
        \R::ext('xdispense', function($table_name){
            return \R::getRedBean()->dispense($table_name);
        });

        $table = \R::xdispense("cabinet");

        return $table ? $table : false;
    }

    public function delete($id_cabinet) {
        $cabinet = \R::load('cabinet', $id_cabinet);
        $trash = \R::trash($cabinet);

        return $trash ? true : false;
    }
}