<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">

    <title><?php echo $Title ?></title>
    <link rel='stylesheet' type='text/css' href='/blocks/style.css' />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <!--  <script type="text/javascript">
if(navigator.geolocation) {
navigator.geolocation.getCurrentPosition(function(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
			alert(latitude+' '+longitude);
});

} else {
    alert("Geolocation API не поддерживается в вашем браузере");
}
</script> -->
    </head>
<body>
<div class="header" >
    <a href="/" style="font-size:20px;font-family:balthazar;text-decoration:none;color:white;position:relative;top:10px;" title = "main">dobROAD </a>
    <div class="menu" align="center" >
      <a href="/drivers" style="text-decoration:none;"><div class="blockmenu" ><span style="position:relative;top:10px;">Для водителей</span></div></a>
      <a href="/passengers" style="text-decoration:none;"><div class="blockmenu" ><span style="position:relative;top:10px;">Для пассажиров</span></div></a>
      <?php if ($_SESSION['status'] != "login") { ?><a href="users/registration" style="text-decoration:none;"><div class="blockmenu" ><span style="position:relative;top:10px;">Регистрация</span></div></a><?php } ?>
    </div>
</div>
<div class="workpart" >
    <div class="pageplace" >
    <?php if ($_SESSION['message']) {MessageShow();}; ?>
        <div class="page" >
