<?php $Title = "Dobroad"; include_once("blocks/header.php");$_SESSION['ucity']='ufa';
if ($_POST['latitude'] && $_POST['longitude']) {
  $_SESSION['latitude'] = $_POST['latitude'];
    $_SESSION['longitude'] = $_POST['longitude'];
}

if ($_SESSION['status'] != "login") {
?>
<h1>Добро пожаловать на dobroad.ru</h1>
<p>Для начала работы авторизуйтесь или <a style="text-decoration:underline;" href="/users/registration">зарегистрируйтесь</a></p>
<?php } else
if (!$_SESSION['latitude'] && !$_SESSION['longitude']) { ?>

  <script type="text/javascript">

  if(navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(function(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

  	function funcBefore () {
  		$("#information").text ("Ожидание");
  	}

  	function funcSuccess (data) {
      location.reload();
  	}

  	$(document).ready (function () {
  	$("#enter").bind("click", function () {
  			$.ajax ({
  				url: "/index",
  				type: "POST",
  				data: {latitude: latitude,longitude: longitude},
  				dataType: "html",
  				beforeSend: funcBefore,
  				success: funcSuccess
  			});
  		});
  	});

  });
  } else {
    alert("Geolocation API не поддерживается в вашем браузере");
  }
  </script>
  <form method="POST" action="/">
  <input type="button" id="enter" value="Проверить местоположение">
</form>
<div id="information"></div>
<?php } else { ?>
    <div id="map" style="height: 500px;"></div>
    <script>

    var map;
    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: <?php echo $_SESSION['latitude'] ?>, lng: <?php echo $_SESSION['latitude']?>},
        zoom: 8
      });
    }

        </script>
  <?php ;
};

 include_once("blocks/sidebar.php");?>
