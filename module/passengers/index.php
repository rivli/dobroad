<?php $Title = "Пассажирам";
      include_once("blocks/header.php");
      if ( $_SESSION['status'] == 'login') echo "<a style='text-decoration:none;' href='drivers/add' >Предложить поездку(как пассажир)</a>";
?>
<script type="text/javascript">
	function funcBefore () {
		$("#information").text ("Ожидание");
	}

	function funcSuccess (data) {
		$("#information").html (data);
	}

	$(document).ready (function () {
	$("#enter").bind("click", function () {
			$.ajax ({
				url: "passengers/searching",
				type: "POST",
				data: {ot: $("#ot").val(),do: $("#do").val()},
				dataType: "html",
				beforeSend: funcBefore,
				success: funcSuccess
			});
		});
	});
</script>


<form method="POST" action="../passengers"> <!-- Здесь ищем в таблице Водителей -->
<input type="text" id="ot" placeholder="От..." required>
<input type="text" id="do" placeholder="До..." required>
<input type="button" id="enter" value="Найти">
</form>
<div id="information"></div>

<?php
//if ($_SESSION['searching']['ot'] and $_SESSION['searching']['do']) {include_once "module/passengers/searching.php";};

 include_once("blocks/sidebar.php");?>
