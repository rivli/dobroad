<?php 

$_POST['email'] = FormChars($_POST['email']);
$_POST['password'] = GenPass(FormChars($_POST['password']), $_POST['email']);

$query = "SELECT * FROM `users` WHERE `email` = '".$_POST['email']."'";
$result = mysqli_query($CONNECT, $query);
$user = mysqli_fetch_array($result);


if (!$user[0]) {MessageSend(1,"Пользователя с email ".$_POST['email']." не существует.Пожалуйста повторите попытку.", "/");} 
else if ($_POST['password'] != $user['password']) { 
MessageSend(1, $user['name']." ".$user['sername']." вы ввели неверно пароль.Пожалуйста повторите попытку.", "/");
} else {


$_SESSION['id'] = $user['id'];
$_SESSION['name'] = $user['name'];
$_SESSION['sername'] = $user['sername'];
$_SESSION['uclass'] = $user['uclass'];
$_SESSION['status'] = "login";

mysqli_query($CONNECT, "UPDATE `users` SET `status` = 'online' WHERE (`email` = '".$_POST['email']."') and (`password` = '".$_POST['password']."')");
MessageSend(3, "Добро пожаловать", "/".$_SESSION['id']);
};
?>