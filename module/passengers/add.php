<?php $Title = "Добавить запись"; include_once("blocks/header.php") ?>

<h1 align="center">Предложить поездку</h1>
<center>

<form method="POST" action="queryadd">
<br><input type="text" name="ot" placeholder="От"><br>
<br><input type="text" name="do" placeholder="До"><br>
<br><input type="text" name="description" placeholder="Описание"><br>
<br><input type="number" name="kol_mest" placeholder="Количесвто мест"><br>
<br>Цена : <input type="text" name="price" placeholder="Бесплатно"><br>
<br><input type="date" name="date" value="<?php echo date("j, n, Y"); ?>" >  <input type="time" name="time"><br>
<br><input type="submit" name="enter" value="Добавить"> <input type="reset" value="Очистить">
</form>

</center>

<?php include_once("blocks/sidebar.php")?>
