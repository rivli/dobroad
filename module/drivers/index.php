<?php $Title = "Водителям";include_once("blocks/header.php") ; ?>

<?php if ( $_SESSION['status'] == 'login') echo "<a style='text-decoration:none;' href='drivers/add' >Предложить поездку<a>"  ?>
<hr>
<b>Поиск попутчиков</b>
<form method="POST" action="../drivers/search"> <!-- Здесь ищем в таблице Пассажиров -->
<br><input type="text" name="ot" placeholder="От..." ><br>
<br><input type="text" name="do" placeholder="До..." ><br>
<br><input type="submit" name="enter" value="Поиск"> <input type="reset" value="Очистить">
</form>

<?php include_once("blocks/sidebar.php"); include_once("blocks/footer.php");?>