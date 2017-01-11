<?php

$_POST['text'] = FormChars($_POST['text']);

mysqli_query($CONNECT, "INSERT INTO `ideas`  VALUES ('', '".$_SESSION['id']."', '".$_POST['text']."')");
MessageSend(3, 'Запись добавлена.',"/");


?>