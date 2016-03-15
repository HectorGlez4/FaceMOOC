<?php

session_start();

define('WEBROOT', str_replace('index.php','',$_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
require(ROOT.'php/controller/controller.php');
$params = explode('/', $_GET['p']);
$controller = $params[0];

$action = isset($params[1]) ? $params[1] : 'index';

if ($controller == 'php') {
    $controller = $params[2];
    $action = $params[3];
}

if ($controller == '') {
    header('Location: '.WEBROOT.'index');
}

if (!isset($_SESSION['id']) && $controller == 'index') {
    $controller = 'User';
}

if (isset($_SESSION['id']) && $controller == 'index') {
    $controller = 'Home';
}

require(ROOT.'php/controller/'.$controller.'.php');
$controller = new $controller();
if(method_exists($controller,$action)){
    unset($params[0]); unset($params[1]);
    call_user_func_array(array($controller,$action),$params);
}
else{
    echo 'erreur 404';
}

?>