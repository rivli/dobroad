<?php
$query = "SELECT * FROM `users` WHERE (`id` = '".$module."')";
$result = mysqli_query($CONNECT, $query);
$user = mysqli_fetch_array($result);
$Title = "Профиль пользователя ".$user['name']." ".$user['sername']; include_once("blocks/header.php"); 

if ($user != 0) {
if ($user['verification'] == 0 and $user['id'] == $_SESSION['id']) MessageSend(1,"Подтвердите ваш аккаунт по почте ".$user['email']);
?>
<div>
	<span style="font-size: 25px;float: right;"><?php echo $user['name']." ".$user['sername'] ?></span>
	<br>E-mail: <?php echo $user['email'] ?>
	<br>Мобильный: <?php echo $user['phone'] ?>
	<?php if ($user['birthday'] != "0000-00-00") { ?><br>Дата рождения: <?php echo $user['birthday']; }; ?>
	<br>Дата регистрации: <?php echo $user['regdate'] ?>
	<?php if ($user['car']) { ?><br>Автомобиль: <?php echo $user['car']; }; ?>
	<?php if ($user['about']) { ?><br>О себе: <?php echo $user['about']; }; ?>
</div>


<br><br>

<p>
<center><b>Отзывы о водителе</b></center>
<?php
$i=1;
$recallsNumber = mysqli_fetch_array(mysqli_query($CONNECT , "SELECT COUNT(*) FROM `urecalls` WHERE `user` = '".$module."'"));



$result = mysqli_query($CONNECT,"SELECT * FROM `urecalls` WHERE (`user`='".$module."') ORDER BY id ASC, date DESC LIMIT 0,$recallsNumber[0]");
    
while ($recall = mysqli_fetch_array($result)) {
    echo '
    <div style="width=100%;">'.$i.'.<a href ="/'.USER($recall['autor'],'id').'">'.USER($recall['autor'],'name').' '.USER($recall['autor'],'sername').'</a><br>'.$recall['text'].'<hr></div> ';$i++;
    
};
if ($_SESSION['status']=="login") { ?>
<form method="POST" action="/users/query/addrecall">
<textarea cols="60" rows="10" name="text" placeholder="Комментарий" required></textarea><br>
<input type="hidden" name="user" value="<?php echo $module ?>" />
<input type="submit" value="Готово" id="enter" name="enter">
</form>
<?php } ?>
</p>

<center>
<a href="/users/userslist">Все пользователи</a><br>
</center>

<?php ;} else {echo "Пользователь с id = ".$module." не найден";} ?>
<?php include_once("blocks/sidebar.php") ?>
