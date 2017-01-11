<?php

$_POST['ot'] = FormChars($_POST['ot']);
$_POST['do'] = FormChars($_POST['do']);
$_POST['description'] = FormChars($_POST['description']);

mysqli_query($CONNECT , "INSERT INTO `passengers`  VALUES ('', '".$_POST['ot']."', '".$_POST['do']."', '".$_POST['date']."', '".$_POST['time']."', '".$_POST['description']."', '".$_SESSION['name']."')");
MessageSend(3, 'Запись успешно добавлена.',"/");

header("location: /")
?>
