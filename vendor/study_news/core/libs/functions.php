<?php
//функция для отладки
function debug($val) {
	echo "<pre>" . print_r($val, true) . "</pre>";
	die;
}
function redirect($http = false){
    if($http){
        $redirect = $http;
    }else{
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    exit;
}
?>