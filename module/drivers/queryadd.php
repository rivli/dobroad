<?php

$_POST['ot'] = FormChars($_POST['ot']);
$_POST['do'] = FormChars($_POST['do']);
$_POST['description'] = FormChars($_POST['description']);
$_POST['kol_mest'] = FormChars($_POST['kol_mest']);
$_POST['price'] = FormChars($_POST['price']);


mysqli_query($CONNECT , "INSERT INTO `drivers`  VALUES ('', '".$_POST['ot']."', '".$_POST['do']."', '".$_POST['date']."', '".$_POST['time']."', '".$_POST['description']."', '".$_SESSION['id']."','".$_POST['kol_mest']."','0', '".$_POST['price']."','')");
MessageSend(3, 'Запись успешно добавлена.','/passengers');

?>
