<?php

function my_mb_ucfirst($str) {
    $fc = mb_strtoupper(mb_substr($str, 0, 1));
    return $fc.mb_substr($str, 1);
}


if ($_POST['ot']) {$_SESSION['searching']['ot'] = $_POST['ot'];} else {$_POST['ot'] = $_SESSION['searching']['ot'];};
if ($_POST['do']) {$_SESSION['searching']['do'] = $_POST['do'];} else {$_POST['do'] = $_SESSION['searching']['do'];};
if (USER($_SESSION['id'],'uclass')=="admin") {
echo "<br>";var_dump($_POST);echo "<br> searching сессии - ";
var_dump($_SESSION['searching']);echo "<br>";};
/*
if (!$_POST['ot']) {$_POST['ot'] = $_SESSION['ot'];} else {$_SESSION['ot'] = $_POST['ot'];};
if (!$_POST['do']) {$_POST['do'] = $_SESSION['do'];} else {$_SESSION['do'] = $_POST['do'];};
if (!$_POST['date']) {$_POST['date'] = $_SESSION['date'];} else {$_SESSION['date'] = $_POST['date'];};
if (!$_POST['price_from']) {$_POST['price_from'] = $_SESSION['price_from'];} else {
    if ($_POST['price_from'] == 0) {$_SESSION['price_from'] = "0";} else {$_SESSION['price_from'] = $_POST['price_from'];};
};
if (!$_POST['price_to']) {$_POST['price_to'] = $_SESSION['price_to'];} else {
    if ($_POST['price_to'] == 0) {$_SESSION['price_from'] = "0";} else {$_SESSION['price_to'] = $_POST['price_to'];};
};
if (!$_POST['freeplaces']) {$_POST['freeplaces'] = $_SESSION['freeplaces'];} else {
    if ($_POST['freeplaces'] == 0) {$_SESSION['price_from'] = "0";} else {$_SESSION['freeplaces'] = $_POST['freeplaces'];};
};
*/

$_POST['ot'] = FormChars($_POST['ot']);
$_POST['do'] = FormChars($_POST['do']);

$filtres = "SELECT COUNT(*) FROM `drivers` WHERE (`ot` = '".$_POST['ot']."') && (`do` = '".$_POST['do']."')";
if ($_POST['date']) {$filtres = $filtres." && (`date` = '".$_POST['date']."')";};
if ($_POST['price_from']) {$filtres = $filtres." && (`price` >= '".$_POST['price_from']."')";};
if ($_POST['price_to']) {$filtres = $filtres." && (`price` <= '".$_POST['price_to']."')";};
if ($_POST['freeplaces']) {$filtres = $filtres." && (`free_mest` >= '".$_POST['freeplaces']."')";};



$postsnumber = mysqli_fetch_array(mysqli_query($CONNECT , $filtres));


$per_page=10;
$pagesnumber = ceil($postsnumber[0]/$per_page);
if ($ident1 == 0) {$n=1;} else $n = $ident1;
$start = $per_page*($n-1);

if (!$postsnumber[0]) {echo "<br>Поездок <span style='color:green'>".my_mb_ucfirst($_POST['ot'])." - ".my_mb_ucfirst($_POST['do'])."</span> ".$_POST['date']." числа не найдено";}
else {
    echo "<span style='color:green' align='center'>".my_mb_ucfirst($_POST['ot'])." - ".my_mb_ucfirst($_POST['do'])."</span><br>Найдено ".$postsnumber[0]." поездок<hr>";



    $query="SELECT * FROM `drivers` WHERE (`ot` = '".$_POST['ot']."') && (`do` = '".$_POST['do']."')";
    if ($_POST['date']) {$query = $query." && (`date` = '".$_POST['date']."')";};
    if ($_POST['price_from']) {$query = $query." && (`price` >= '".$_POST['price_from']."')";};
    if ($_POST['price_to']) {$query = $query." && (`price` <= '".$_POST['price_to']."')";};
    if ($_POST['freeplaces']) {$query = $query." && (`free_mest` >= '".$_POST['freeplaces']."')";};
    $query = $query." ORDER BY id ASC, date DESC LIMIT $start,$postsnumber[0]";

    $result = mysqli_query($CONNECT, $query);

while($row = mysqli_fetch_array($result)) {
    if (!$row[9]) {$row[9]="Бесплатно";};
    echo '<div class="postview" >
    <div class="postinfo" style="display:inline-block;width:79%;height:100%;padding:1%" >
        <div class="postrout" style="" ><a href="passengers/post/'.$row[0].'"><div class="post_item" style="display:inline-block;" >'.my_mb_ucfirst($row[1]).' - '.my_mb_ucfirst($row[2]).'</div></a></div>
        <div class="post_information" style="" >Время: '.$row[3].' '.$row[4].' <br> Водитель : <a href="/'.$row[6].'" style="text-decoration:none;">'.USER($row[6],'name').'</a><br>Количество мест : '.$row[7].'</div>
    </div>
    <div class="postcost" style="display:inline-block;width:19%;height:100%;background:#ffff4d;float:right;" ><span style="position:relative;left:45%;top:45%;" >'.$row[9].'</span></div><br>
    </div><br>';};};

?>
