<?php 
//Здесь добавляем в базу данных занимаемые места
if ($_POST['enter']) {
$UPDATEMEST = mysqli_fetch_array(mysqli_query($CONNECT,"SELECT * FROM `drivers` WHERE (`id` = '".$ident1."')"));   
$updatemest=$UPDATEMEST[8]-$_POST['uzanmest'];
mysqli_query($CONNECT,"UPDATE `drivers` SET `free_mest` = '".$updatemest."' WHERE `id` = '".$ident1."'");  
$j=1; 
while($j != $_POST['uzanmest']+1) {
mysqli_query($CONNECT,"UPDATE `drivers` SET `passengers`=CONCAT(`passengers`,'".$_SESSION['id'].",') WHERE `id` = '".$ident1."'"); 
$j++;  
};  
MessageSend(3,"Вы заняли место","../post/".$ident1);
};


$row = mysqli_fetch_array(mysqli_query($CONNECT,"SELECT * FROM `drivers` WHERE (`id` = '".$ident1."')"));   
$driver = mysqli_fetch_array(mysqli_query($CONNECT, "SELECT * FROM `users` WHERE (`id` = '".$row[6]."')"));
$Title = 'От '.$row[1].' - До '.$row[2].''; include_once("blocks/header.php");


$query="SELECT * FROM `drivers` WHERE (`id` = '".$ident1."')";
$result = mysqli_query($CONNECT, $query);
$row = mysqli_fetch_array($result);
if (!$row[9]) {$row[9]="Бесплатно";};

echo '
Водитель: <a href="/'.$row[6].'" style="text-decoration:none;">'.$driver['name'].'</a><br>
Цена: '.$row[9].'<br>
Количество свободных мест :'.$row[8].'<br>
Описание: '.$row[5].'<br>
Маршрут: От '.$row[1].' - До '.$row[2].'<br>
Дата: '.$row[3].' '.$row[4].'<br>';
$passengers = explode(",", $row[10]);
$pnumb=count($passengers);
if ($row[10]) { echo"Пассажиры: ";
for($i=0;$i<=$pnumb-2;$i++) {
$passengername = mysqli_fetch_array(mysqli_query($CONNECT, "SELECT * FROM `users` WHERE (`id` = '".$passengers[$i]."')"));
echo '<a href="/'.$passengers[$i].'">'.$passengername['name'].'</a>';
if ($i!=$pnumb-2) echo ",";
};};
if ($row[8] != 0) {
if (!in_array(US('id'), $passengers) and US('id') != $row[6]) {
?>

<div id="placetaking">
<hr>
<b>Занять место</b>
<form method="POST" action="../post/<?php echo $ident1 ?>"> 
<br><input type="number" min="1" max="<?php echo $row[8] ?>" style="width:150px" name="uzanmest" placeholder="Количество" required><br>
<br><input type="submit" name="enter" value="Занять" id="enter">
</form>
<hr>
</div>

<?php };}; ?>
<br>
<center><div id="gmap" class="spanbutton" >Карта</div><div id="recalls" class="spanbutton" >Отзывы о <?php echo $driver['name'] ?></div>
<br>
<img src="../../resources/gmap.jpg" width="70%">
</center>
<br><br>
<?php include_once("blocks/sidebar.php")?>