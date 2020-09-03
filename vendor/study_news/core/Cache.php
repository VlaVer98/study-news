<?php
namespace study_news;

class Cache {
	public static function set($key, $data, $dateEnd = 3600) {
		if($dateEnd) {
			$cache['data'] = $data;
			$cache['dateEnd'] = time() + $dateEnd;
			if(file_put_contents(CACHE . "/" . md5($key) . ".txt", serialize($cache))) {
				$cache_bd = \R::dispense('cache');
				$cache_bd->name = $key;
				$cache_bd->date_end = date('Y-m-d H:i:s', $cache['dateEnd']);
				$cache_bd->date_start = date('Y-m-d H:i:s');
				\R::store($cache_bd);
				return true;
			} 
		}
		return false;
	}

	public static function get($key) {
		$fileCache = CACHE . "/" . md5($key) . ".txt";
		if(file_exists($fileCache)) {
			$cache = unserialize(file_get_contents($fileCache));
			if(time() <= $cache['dateEnd']) {
				return $cache['data'];
			} 
			unlink($fileCache);
		}
		return false;
	}

	public static function delete($key) {
		$fileCache = CACHE . "/" . md5($key) . ".txt";
		//debug($key);
		if(file_exists($fileCache)) {
			unlink($fileCache);
			$cache = \R::exec("DELETE FROM cache WHERE name=?", [$key]);
			return true;
		}
		return false;
	}
}
?>