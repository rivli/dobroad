<html>
 <head>
  <meta charset="utf-8">
  <title>Сайт находиться в разработке</title>
  <style type="text/css">
  body {
  	background: #e6e6e6;
  }
  .entering {
  	position: relative;
  	top:30%;
  	left:30%;
    background: #f2f2f2;
    border: 1px solid #cccccc;
  	height: 40%;
  	width: 40%;
  }
   h1 { 
    font-size: 120%; 
    font-family: Verdana, Arial, Helvetica, sans-serif; 
    color: #333366;
   }
  </style>
  </head> 
 <body>

   <div class="entering">
   <?php MessageShow();?>
   <div style="margin-top: 10%;"> 
   <center>
   	<h1>Сайт находиться в разработке</h1>
   	<p>Для того чтобы войти введите пароль:</p>
   	<form action="/query/enteringa" method="post">
      <input type="password" name="enteringpassword" placeholder="Пароль"><br>
      <br><input type="submit" name="enter" value="Войти"> 
   	</form>
   </center>
   </div>
  </div>
 </body>
</html>
