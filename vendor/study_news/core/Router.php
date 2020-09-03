<?php
namespace study_news;

class Router {
	private static $routes = [];
	private static $route = [];

	public static function addRoute($regexp, $route = []) {
		self::$routes[$regexp] = $route;
	}

	private static function matchRoute($url) {
		//echo "<pre>" . print_r(self::$routes, true) . "</pre>";
		foreach (self::$routes as $pattern => $route) {
			if(preg_match("#{$pattern}#", $url, $match)) {
				foreach ($match as $key => $value) {
					if(is_string($key)) {
						$route[$key] = $value;
					}
				}
				if(empty($route['action'])) {
					$route['action'] = "index";
				}
				if(!isset($route['prefix'])) {
					$route['prefix'] = "";
				} else {
					$route['prefix'] = "admin\\";
				}
				self::$route = $route;
				//echo "<pre>" . print_r(self::$route, true) . "</pre>"; 
				return true;
			}
			
		}
		return false;
	}

	public static function dispatch($url) {
		$url = self::exciseGetParam($url);
		//echo $url;
		if(self::matchRoute($url)) {
			$controller = "app\controllers\\" . self::$route["prefix"] . self::upperCamelCase(self::$route["controller"]) . "Controller";
			if(class_exists($controller)) {
				$controller = new $controller(self::$route);
				$action = self::lowerCamelCase(self::$route["action"]) . "Action";
				if(method_exists($controller, $action)) {
					$controller->$action();
					//debug($controller);
					$controller->getView();
				} else {
					throw new \Exception("Не найден метод " . get_class($controller) . "::$action", 404);
				}
			} else {
				throw new \Exception("Не найден класс $controller", 404);
			}
		} else {
			throw new \Exception("Страница не найденна", 404);
		}
	}

	private static function upperCamelCase($str) {
		return str_replace(' ', '', ucwords(str_replace('-', ' ', $str)));
	}

	private static function lowerCamelCase($str) {
		return lcfirst (self::upperCamelCase($str));
	}

	public static function getRouts() {
		return self::$routes;
	}

	public static function getRoute() {
		return self::$route;
	}

	private static function exciseGetParam($url) {
        if(!empty($url)) {
            $param = explode("&", $url, 2);
            if(strpos($param[0], '=') === false) {
                $url = trim($param[0], '/');
            } else {
                $url ="";
            }
            return $url;
        }
    }
}
?>