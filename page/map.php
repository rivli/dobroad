<?php $Title = "Dobroad"; include_once("blocks/header.php");?>

  <div id="map" style="height: 500px;"></div>
    <script type="text/javascript">

var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: position.coords.latitude, lng: position.coords.longitude},
    zoom: 8
  });
}

    </script>

    <?php include_once("blocks/sidebar.php");?>
