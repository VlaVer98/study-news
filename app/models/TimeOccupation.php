<?php
namespace app\models;

class TimeOccupation {
	public function get() {
		$time_occupation = \R::findAll('time_occupation');
		return $time_occupation;
	}
    static public function static_getAll() {
        $time_occupation = \R::findAll('time_occupation');
        return $time_occupation;
    }
}

?>