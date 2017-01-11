<?php
session_unset();
include_once "setting.php";
include_once "functions.php";
session_start();



//Данные подключения были скрыты ради безопасности.Переменная $CONNECT выполняет подключение к бд.
//mysqli_query($CONNECT, "DELETE FROM `drivers` WHERE `date` < NOW() + INTERVAL 1 DAY");
//mysqli_query($CONNECT, "DELETE FROM `passengers` WHERE `date` < NOW() + INTERVAL 1 DAY");

if ($_SESSION['uclass'] == 'admin') {
error_reporting(E_ALL);
ini_set('display_errors', 1);
};

$params = array();
// Массив параметров из URI запроса.

$query_string = str_replace("q=","",trim($_SERVER['REQUEST_URI']));//получили строку

$query_string = urldecode($query_string);//получили строку

$query_params = explode("/",$query_string);// разбиваем на массив

foreach ($query_params as $query_param) // и проверяем
 if ($query_param != "")                // а вдруг в конец слеш не дописали
    $params[] =  $query_param;

$module = array_shift($params);
$page = array_shift($params);
$ident1 = array_shift($params);
$ident2 = array_shift($params);

if ($module == false ) {include "page/index.php";}
else if ($page == false and intval($module) ) {include "module/users/profile.php" ;}
else if ($page == false and file_exists("page/$module.php")) {include "page/$module.php" ;}
else if (file_exists("module/$module") and ($page == false) ) { include "module/$module/index.php" ;}
else if ($page == "query") { include "module/$module/$page/$ident1.php" ;}
else if (file_exists("module/$module/$page.php")) { include "module/$module/$page.php" ;}
else {header('HTTP/1.0 404 Not Found');exit(include("page/404.php"));};


?>
