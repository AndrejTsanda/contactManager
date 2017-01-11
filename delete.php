<?php

require_once 'connection.php'; // подключаем скрипт

if(isset($_GET['id'])) {

    $link = mysqli_connect($host, $user, $password, $database) 
            or die("Ошибка " . mysqli_error($link)); 

    $id = mysqli_real_escape_string($link, $_GET['id']);
     
    $query ="DELETE FROM $table WHERE id = '$id'";
 
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    mysqli_close($link);
}

	header('Location: test.php');
?>