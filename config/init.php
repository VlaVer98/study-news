<?php
//определяем путь к директориям
define("ROOT", dirname(__DIR__));
define("DEBUG", 1);
define("APP", ROOT . "/app");
define("WWW", ROOT . "/public");
define("CONFIG", ROOT . "/config");
define("CACHE", ROOT . "/tmp/cache");
define("TMP", ROOT . "/tmp");
define("CORE", ROOT . "/vendor/study_news/core");
define("VENDOR", ROOT . "/vendor");
define("LAYOUT", "default");
define("ADMIN_LAYOUT", "admin");
define("ADMIN", "admin");
define("PATH", $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"]);

//подключаем файл автозагрузчик autoload.php
require_once(VENDOR . "/autoload.php");

?>