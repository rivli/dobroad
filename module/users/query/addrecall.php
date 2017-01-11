<?php

$_POST['text'] = FormChars($_POST['text']);

mysqli_query($CONNECT, "INSERT INTO `urecalls`  VALUES ('', '".$_SESSION['id']."','".$_POST['user']."','',NOW(),'".$_POST['text']."')");
MessageSend(3, 'Комментарий добавлен.',"/".$_POST['user']);


?>