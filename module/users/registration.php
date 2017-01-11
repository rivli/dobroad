<?php $Title = "Регистрация"; include_once("blocks/header.php") ?>
<h1 align="center">Регистрация</h1>
<center>
<form method="POST" action="query/registration" enctype="multipart/form-data">
<br><input type="text" name="name" placeholder="Имя" maxlength="10" pattern="[A-Za-z-0-9-А-Яа-яЁё]{4,10}" title="Не менее 4 и неболее 10 латынских символов или цифр." required><br>
<br><input type="text" name="sername" placeholder="Фамилия" maxlength="20" pattern="[A-Za-z-0-9-А-Яа-яЁё]{3,20}" title="Не менее 3 и неболее 20 латынских символов или цифр." required><br>
<br><label>Дата рождения : <input type="date" name="birthday" ></label><br>
<br><input type="email" name="email" placeholder="E-Mail" required><br>
<br><input type="password" name="password" placeholder="Пароль" maxlength="15" pattern="[A-Za-z-0-9]{5,15}" title="Не менее 5 и неболее 15 латынских символов или цифр." required><br>
<br><label>Аватар : <input type="file" value="" name="avatar"></label><br>
<br><input type="text" name="phone" placeholder="Ваш телефон" maxlength="11" pattern="[0-9]{11,11}" title="Введите сотовый телефон формата 89..."  required><br>
<br><input type="text" name="auto" placeholder="Ваш Авто" required><br>
<br><textarea type="text" name="about" placeholder="О себе..." cols="60" rows="10"></textarea><br>
<br><input type="submit" name="enter" value="Регистрация"> <input type="reset" value="Очистить">
</form>
</center>
<?php include_once("blocks/sidebar.php");?>