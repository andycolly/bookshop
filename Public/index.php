<?php 

require_once("../vendor/autoload.php");

// $url_arr = explode('/',$_SERVER["PHP_SELF"]);
// if (empty($url_arr[2])) {unset($url_arr[2]);}

// $controller_name = strtolower(isset($url_arr[2])?$url_arr[2]:'index');
// $action_name     = strtolower(isset($url_arr[3])?$url_arr[3]:'index');
// var_dump($_SERVER["PHP_SELF"]);
$url_array = explode('.php',$_SERVER["PHP_SELF"]);
// echo "</br>";
// var_dump($url_array);

$url_arr =explode('/',$url_array[1]);
// echo "</br>";
// var_dump($url_arr);

if (empty($url_arr[1])) {unset($url_arr[1]);}
if (empty($url_arr[2])) {unset($url_arr[2]);}

$controller_name = strtolower(isset($url_arr[1])?$url_arr[1]:'index');
$action_name     = strtolower(isset($url_arr[2])?$url_arr[2]:'index');

// echo $controller_name."</br>".$action_name;

$final_controller_name ="App\\Controllers\\".$controller_name."Controller";

$controller =  new $final_controller_name();

$controller->$action_name();