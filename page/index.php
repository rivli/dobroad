<?php $Title = "Dobroad"; include_once("blocks/header.php");$_SESSION['ucity']='ufa';?>
<div id="map" style="height: 500px;"></div>
  <script type="text/javascript">

var map;
function initMap() {
map = new google.maps.Map(document.getElementById('map'), {
  center: {lat: -34.397, lng: 150.644},
  zoom: 8
});
}

  </script>
<?php
if ($_SESSION['status'] != "login") {
?>
<h1>Добро пожаловать на dobroad.ru</h1>
<p>Для начала работы авторизуйтесь или <a style="text-decoration:underline;" href="/users/registration">зарегистрируйтесь</a></p>
<?php } else
if (!$_SESSION['ucity']) {
  echo "Подтвердите город";
}

else { ?>
<button type="button" name="passengers">Ищу пассажиров</button>
<button type="button" name="drivers">Ищу водителя</button>
<? }
include_once("blocks/sidebar.php");?>
