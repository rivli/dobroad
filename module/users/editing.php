<?php $Title = "Редактирование профиля"; include_once("blocks/header.php") ?>
<h1 align="center">Редактирование профиля</h1>
<center>
<form method="POST" action="query/editing" enctype="multipart/form-data">
<br><input type="text" name="name" placeholder="Имя" maxlength="10" pattern="[A-Za-z-0-9-А-Яа-яЁё]{4,10}" title="Не менее 4 и неболее 10 латынских символов или цифр." ><br>
<br><input type="text" name="sername" placeholder="Фамилия" maxlength="20" pattern="[A-Za-z-0-9-А-Яа-яЁё]{3,20}" title="Не менее 3 и неболее 20 латынских символов или цифр." ><br>
<br><label>Дата рождения : <input type="date" name="birthday" ></label><br>
<br><label>Аватар : <input type="file" value="" name="avatar"></label><br>
<br><input type="text" name="auto" placeholder="Ваш Авто" ><br>
<br><textarea type="text" name="about" placeholder="О себе..." cols="60" rows="10"></textarea><br>
<br><input type="submit" name="enter" value="Сохранить"> 
</form>
</center>
<?php include_once("blocks/sidebar.php") ?>