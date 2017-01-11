<?php
function MessageSend($p1, $p2, $p3) {
if ($p1 == 1) { $p1 = 'Ошибка'; $c = 'red';}
else if ($p1 == 2) { $p1 = 'Подсказка'; $c = 'green';}
else if ($p1 == 3) { $p1 = 'Информация'; $c = 'blue';}
$_SESSION['message'] = '<div style="widht:100;padding:10px;color:white;background:'.$c.'" ><b>'.$p1.'</b>: '.$p2.'</div>';
if ($p3) exit(header('Location: '.$p3));
}

function MessageShow() {
if ($_SESSION['message']) {$Message = $_SESSION['message'];
echo $Message;}
$_SESSION['message'] = array();
}

function UClass($p1) {
if ($p1 == "admin" and $_SESSION['uclass'] != "admin" and $_SESSION['status'] == "login") {MessageSend(1,"Страница доступна только для администратора", "/");}
else if ($p1 == "user" and $_SESSION['status'] == "logout") {MessageSend(1,"Страница доступна только для пользователей", "/");};
}

function FormChars ($p1) {
return nl2br(htmlspecialchars(trim($p1), ENT_QUOTES), false);
}

//Функция GenPass шифрует пароль,поэтому скрыта

function Title($p1) {
echo "$p1";
}

function USER($p1,$p2) {
	$p4 = mysqli_fetch_array(mysqli_query(mysqli_connect(HOST, USER, PASS, DB), "SELECT * FROM `users` WHERE (`id` = '".$p1."')"));
	return $p4[$p2];
};
	function US($p1) {
	$p4 = mysqli_fetch_array(mysqli_query(mysqli_connect(HOST, USER, PASS, DB), "SELECT * FROM `users` WHERE `id` = '".$_SESSION['id']."'"));
	return $p4[$p1];
}
 ?>
