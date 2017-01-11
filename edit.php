<?php

	require_once 'connection.php'; // подключаем скрипт

	if(isset($_GET['id'])) {

    $link = mysqli_connect($host, $user, $password, $database) 
            or die("Ошибка " . mysqli_error($link)); 

    $id = mysqli_real_escape_string($link, $_GET['id']);

    $query ="SELECT * FROM $table WHERE id = '$id'";

    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

     if($result && mysqli_num_rows($result)>0) {

        $row = mysqli_fetch_row($result); // получаем первую строку
        $name = $row[1];
        $family = $row[2];
         
        echo "<div class='parent'><div class='Box2'><h2>Изменить данные</h2>
            <form method='POST'>
            <input type='hidden' name='id' value='$id' />
            <p>Фамилия:<br> 
            <input type='text' name='family' value='$family' /></p>
            <p>Имя: <br> 
            <input type='text' name='name' value='$name' /></p>
            <input type='submit' value='Сохранить'>
            </form></div></div>";
         
        mysqli_free_result($result);
    }

 }

if(isset($_POST['name']) && isset($_POST['family']) && isset($_POST['id'])){
 
    $id = htmlentities(mysqli_real_escape_string($link, $_POST['id']));
    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
    $family = htmlentities(mysqli_real_escape_string($link, $_POST['family']));
     
    $query ="UPDATE $table SET FIRST_NAME='$name', LAST_NAME='$family' WHERE id='$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
 
    if($result)
        echo "<span style='color:blue;'>Данные обновлены</span>";
    	header('Location: test.php');
}

 mysqli_close($link);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet">
</head>
<body>
</body>
</html>