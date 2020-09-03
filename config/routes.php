<?php
use study_news\Router;

Router::addRoute("^admin$", ["controller" => "main", "action" => "index", "prefix" => "admin"]);
Router::addRoute("^admin/?(?<controller>[a-z-]+)/?(?<action>[a-z-]+)?$", ["prefix"=>"admin"]);

Router::addRoute("^$", ["controller" => "main", "action" => "index"]);
Router::addRoute("^(?<controller>[a-z0-9-]+?)/?(?<action>[a-z0-9-]+?)?$");
?>