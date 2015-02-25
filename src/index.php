<?php

session_start();

error_reporting(-1);
ini_set('display_errors', 1);
ini_set('html_errors', 1);

// Simple router
$controller = ucfirst($_GET['c']);
$action = $_GET['a'];

if($controller == NULL)
    header('Location: /src/?c=index&a=index');

if($action == NULL)
    $action = 'index';

$controller_path = 'controllers/'.$controller.'Controller.php';
$controller_class = $controller.'Controller';
include $controller_path;

$controller_cls = new $controller_class();
$controller_cls->{$action}();
