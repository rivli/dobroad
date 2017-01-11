<?php

$_POST['email'] = FormChars($_POST['email']);
$_POST['password'] = GenPass(FormChars($_POST['password']), $_POST['email']);
$_POST['name'] = FormChars($_POST['name']);
$_POST['sername'] = FormChars($_POST['sername']);
$_POST['auto'] = FormChars($_POST['auto']);
$_POST['about'] = FormChars($_POST['about']);


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
            }
        }
        
        

$Row = mysqli_fetch_array(mysqli_query($CONNECT, "SELECT `email` FROM `users` WHERE `email` = '".$_POST['email']."'"));
if ($Row['email']) exit('E-Mail <b>'.$_POST['email'].'</b> уже используеться.');
mysqli_query($CONNECT , "INSERT INTO `users`  VALUES ('','user', '".$_POST['name']."', '".$_POST['sername']."', '".$_POST['email']."', '".$_POST['password']."','','online','0',NOW(),'".$_POST['birthday']."','".$_POST['phone']."','".$_POST['auto']."','".$_POST['about']."','".$path_file."')");


$query = "SELECT * FROM `users` WHERE (`email` = '".$_POST['email']."') and (`password` = '".$_POST['password']."')";
$result = mysqli_query($CONNECT, $query);
$user = mysqli_fetch_array($result);


$_SESSION['id'] = $user['id'];
$_SESSION['name'] = $user['name'];
$_SESSION['sername'] = $user['sername'];
$_SESSION['uclass'] = $user['uclass'];
$_SESSION['status'] = "login";



$Code = base64_encode($_POST['email']);
mail($_POST['email'], 'Регистрация на dobROAD', 'Ссылка для активации: http://dobroad.ru/query/verification/'.substr($Code, -5).substr($Code, 0, -5), 'From: admin@dobroad.ru');
MessageSend(3, 'Регистрация акаунта успешно завершена. На указанный E-mail адрес <b>'.$_POST['email'].'</b> отправленно письмо о подтверждении регистрации.', "/".$_SESSION['id']);


?>