<?php

  
  require_once 'insert.php'; // подключаем скрипт

?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <meta charset="utf-8">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="parent">
<div class="Box">
<h2> Контакты </h2>
<?php
  require_once 'select.php'; // подключаем скрипт
?>
</div>
<div class="Box1">
<h2>Добавить нового пользователя</h2>
<form method="POST" action="test.php">
<p>Фамилия:<br> 
<input type="text" name="family" /></p>
<p>Имя: <br> 
<input type="text" name="name" /></p>
<input type="submit" value="Добавить">
</form>
</div>
</div>
</body>
 </html>