<?php
$_POST['name'] = FormChars($_POST['name']);
$_POST['sername'] = FormChars($_POST['sername']);
$_POST['auto'] = FormChars($_POST['auto']);
$_POST['about'] = FormChars($_POST['about']);

if ($_POST['name']) {
	mysqli_query($CONNECT , "UPDATE `users` SET `name` = '".$_POST['name']."' WHERE `id` = '".$_SESSION['id']."'");
};

if ($_POST['sername']) {
	mysqli_query($CONNECT , "UPDATE `users` SET `sername` = '".$_POST['sername']."' WHERE `id` = '".$_SESSION['id']."'");
};

if ($_POST['auto']) {
	mysqli_query($CONNECT , "UPDATE `users` SET `car` = '".$_POST['auto']."' WHERE `id` = '".$_SESSION['id']."'");
};

if ($_POST['about']) {
	mysqli_query($CONNECT , "UPDATE `users` SET `about` = '".$_POST['about']."' WHERE `id` = '".$_SESSION['id']."'");
};

if ($_POST['birthday']) {
	mysqli_query($CONNECT , "UPDATE `users` SET `birthday` = '".$_POST['birthday']."' WHERE `id` = '".$_SESSION['id']."'");
};



    $errorSubmit = false; // контейнер для ошибок
        if(isset($_FILES['avatar']) && $_FILES['avatar'] !=""){ // передали ли нам вообще файл или нет
            $whitelist = array(".gif", ".jpeg", ".png", ".jpg", ".bmp"); // список расширений, доступных для нашей аватарки
            // проверяем расширение файла 
            //===>>>
            $error = true; //флаг, отвечающий за ошибку в расширении файла
            foreach  ($whitelist as  $item) {
                if(preg_match("/$item\$/i",$_FILES['avatar']['name'])) $error = false;
            }
            //<<<===
            if($error){
                // если формат не корректный, заполняем контейнер для ошибок
                $errorSubmit = 'Не верный формат картинки!';
            }else{
                // если формат корректный, то сохраняем файл
                // и все остальную информацию о пользователе
                // Файл сохранится в папку /files/
                move_uploaded_file($_FILES["avatar"]["tmp_name"], "resources/avatars/".$_FILES["avatar"]["name"]);
                $path_file = "resources/avatars/".$_FILES["avatar"]["name"];
                mysqli_query($CONNECT ,"UPDATE `users` SET `avatar` = '".$path_file."' WHERE `id` = '".$_SESSION['id']."'") or die(mysqli_error());
            }
        }

MessageSend(3, 'обновлена', "../../".$_SESSION['id']);

?>