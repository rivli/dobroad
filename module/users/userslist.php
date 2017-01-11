<?php $Title = "Users"; include_once("blocks/header.php") ;
$unumber = mysqli_fetch_array(mysqli_query($CONNECT , "SELECT COUNT(*) FROM `users`"));
$i = 1;
while ($i <= $unumber[0]) {
$user = mysqli_fetch_array(mysqli_query($CONNECT, "SELECT `name`,`sername`,`status` FROM `users` WHERE `id` = '".$i."'"));
echo 'Имя = <a href="/'.$i.'" >'.$user[0].'</a><br>';
echo "Фамилия = ".$user[1]."<br>";
echo "Статус = ".$user[2]."<hr>";
$i++;
};
include_once("blocks/sidebar.php");?>