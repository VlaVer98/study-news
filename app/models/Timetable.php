<?php
namespace app\models;

class Timetable extends AppModel {
    protected $attribytes = [
        "id_group" => null,
        'day_week' => null,
        'serial_number' => null,
        'subject' => null,
        'teacher' => null,
        'cabinet' => null,
        'load_time' => null
    ];

    protected $rule = [
        'required' => [
            ['id_group'],
            ['day_week'],
            ['serial_number'],
            ['subject'],
            ['teacher'],
            ['cabinet'],
            ['load_time']
        ]
    ];

	public function get($id_group, $last_date) {
		$arr = [];
		$timetable = \R::getAll("SELECT * FROM timetable WHERE id_group=? AND load_time=?", [$id_group, $last_date]);
		foreach ($timetable as $value) {
			$arr[$value['day_week']][$value['serial_number']]['subject'] = $value['subject'];
			$arr[$value['day_week']][$value['serial_number']]['teacher'] = $value['teacher'];
			$arr[$value['day_week']][$value['serial_number']]['cabinet'] = $value['cabinet'];
		}
		return $arr;
	}

    static public function static_getIds($id_group, $last_date) {
        $timetable = \R::getAll("SELECT id FROM timetable WHERE id_group=? AND load_time=?", [$id_group, $last_date]);
        return $timetable;
	}

    static public function static_getAll($id_group, $last_date) {
        $arr = [];
        $timetable = \R::getAll("SELECT * FROM timetable WHERE id_group=? AND load_time=?", [$id_group, $last_date]);
        foreach ($timetable as $value) {
            $arr[$value['day_week']][$value['serial_number']]['subject'] = $value['subject'];
            $arr[$value['day_week']][$value['serial_number']]['teacher'] = $value['teacher'];
            $arr[$value['day_week']][$value['serial_number']]['cabinet'] = $value['cabinet'];
        }
        return $arr;
    }

	public function get_last_date($id) {
		return \R::getCell("SELECT MAX(load_time) FROM timetable", [$id]);
	}

	public function get_previous_date($id) {
		$date = $this->get_last_date($id);
		if(empty($date)) return false;
		$date.="-1 week";
		$date = date("Y-m-d", strtotime($date));
		$date = \R::getCell("SELECT load_time FROM timetable WHERE load_time=?", [$date]);
		if(empty($date)) 
			return false;
		else
			return $date;
	}
    public function dispense() {
        \R::ext('xdispense', function($table_name){
            return \R::getRedBean()->dispense($table_name);
        });

        $table = \R::xdispense("timetable");

        return $table ? $table : false;
    }

    static public function delete($id) {
        $val = \R::load('timetable', $id);
        $trash = \R::trash($val);

        return $trash ? true : false;
    }
}
?>