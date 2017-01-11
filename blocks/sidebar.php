        </div>
    </div>
<div class="sidebar" >


    <?php if ($module == 'passengers' and $page!= "post") { ?>
      <script type="text/javascript">
        function funcBefore () {
          $("#information").text ("Ожидание");
        }

        function funcSuccess (data) {
          $("#information").html (data);
        }

        $(document).ready (function () {
        $("#filtres").bind("click", function () {
            $.ajax ({
              url: "passengers/searching",
              type: "POST",
              data: {date: $("#date").val(),ot: $("#ot").val(),do: $("#do").val(),price_from: $("#price_from").val(),price_to: $("#price_to").val(),freeplaces: $("#freeplaces").val()},
              dataType: "html",
              beforeSend: funcBefore,
              success: funcSuccess
            });
          });
        });
      </script>
        <div class="sbblock">
        	<span align="center">Фильтры</span>
    		<form  action="../passengers" method="POST">
    		  <label>Дата<br></label><input type="date" id="date" style="width:90%" ><br>
    		  <label>Цена<br>
    			  <input type="number" min="0" id="price_from" style="width: 30%;" placeholder="От" >
    			  <input type="number" min="0" id="price_to" style="width: 30%;" placeholder="До"  >
    		  </label><br><br>
    		  <input type="number" id="freeplaces" min="0" placeholder="Свободных мест" /><br><br>
    		  <input type="button" id="filtres" value="Применить">
    		</form>
		</div><br>
	<?php }; ?>
	<?php if ($_SESSION['status'] != "login") { ?>
    	<div class="sbblock">
    		<form method="POST" action="query/login">
    			<br><input type="email" name="email" placeholder="E-Mail" style="width:90%" required><br>
    			<input type="password" name="password" placeholder="Пароль" style="width:90%" maxlength="15" pattern="[A-Za-z-0-9]{5,15}" title="Не менее 5 и неболее 15 латынских символов или цифр." required><br>
    			<br><input type="submit" name="enter" value="Войти">
    		</form>
    	</div>
    <?php } else if (intval($module)) { ?>
    <div class="sbblock">
        <?php if (!USER($module,'avatar')) { ?>
		<img src="http://dobroad.ru/resources/uavatar.gif" title="<?php echo USER($module,'name')." ".USER($module,'sername')?>" width="100%" ><br><br>
		<?php } else { ?>
		<img src="http://dobroad.ru/<?php echo USER($module,'avatar') ?>" title="<?php echo USER($module,'name')." ".USER($module,'sername')?>" width="100%" ><br><br>
    	<?php }  if ($module == $_SESSION['id']) { ?>
    	<form action="users/editing" method="POST">
        	<button type="submit">Редактировать профиль</button>
    	</form>
    	<form method="POST" action="http://dobroad.ru/query/logout">
    			<input type="submit" name="enter" value="Выйти">
    	</form>
    	<?php }; ?>

    	<?php  if ($module != US('id')) { ?>
    	<button>Написать сообщение</button><br><br>
      <a href="http://dobroad.ru/<?php echo $_SESSION['id'] ?>" style="text-decoration:none;">Мой профиль</a>
    	<?php }; ?>
    </div>


    <?php } else if ($module != US('id')) { ?>
        <div class="sbblock" >
          <a href="http://dobroad.ru/<?php echo $_SESSION['id'] ?>" style="text-decoration:none;">Мой профиль</a>
    	</div>
    <?php }; ?>
    <br>
    	<div class="sbblock">
    	    <span>Здесь рекламма</span>
    	    <img src="http://edgetime.ru/wp-content/uploads/2016/02/google-adwords-redwhite-1920-400x300.png" width="100%">
    	</div>
	 <div class="" style="text-align:right;">
    	    <span><a href="/" id="sbabout" >О Проекте</a></span>
    	</div>
</div>
</div>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzImoT0yUmcoZi5uWYc_OqI3dBIcI3luk&callback=initMap">
</script>
</body>
</html>
