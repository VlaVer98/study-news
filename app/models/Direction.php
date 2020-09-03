<?php


namespace app\models;


class Direction extends AppModel {
    protected $attribytes = [
        "surname" => null,
        'name' => null,
        'patronymic' => null,
        'position' => null,
        'contact' => null,
        'img' => null
    ];

    protected $rule = [
        'required' => [
            ['surname'],
            ['name'],
            ['patronymic'],
            ['position']
        ]
    ];

    public function getCount() {
        return \R::count('direction');
    }

    public function getPart($viewWith, $display_by) {
        return \R::getAll("SELECT * FROM direction LIMIT $viewWith, $display_by");
    }

    public function get($id_man) {
        return \R::getRow("SELECT * FROM direction WHERE id=? LIMIT 1", [$id_man]);
    }

    public function saveAvatar($avatar) {
        if(empty($avatar))
            $this->attribytes['img'] = 'default_avatar.png';
        else
            $this->attribytes['img'] = $avatar;
    }

    public function dispense() {
        \R::ext('xdispense', function($table_name){
            return \R::getRedBean()->dispense($table_name);
        });

        $table = \R::xdispense("direction");

        return $table ? $table : false;
    }

    public function delete($id_man) {
        $man = \R::load('direction', $id_man);
        if($man['img'] !== 'default_avatar.png')
            @unlink(WWW."/img/photo/{$man['img']}");
        $trash = \R::trash($man);

        return $trash ? true : false;
    }

    public function load($id_man) {
        $table = \R::load('direction', $id_man);

        return $table ? $table : false;
    }
}