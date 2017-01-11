<?php 
mysqli_query($CONNECT, "UPDATE `users` SET `status` = 'offline' WHERE `id` = '".$_SESSION['id']."'");

session_unset();
$_SESSION['status'] = 'logout';
header("location: /");
?>