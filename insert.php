<?php
 
require_once 'connection.php'; // подключаем скрипт

if(isset($_POST['name']) && isset($_POST['family'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
    $family = htmlentities(mysqli_real_escape_string($link, $_POST['family']));
     
    // создание строки запроса
    $query ="INSERT INTO $table VALUES(NULL, '$name','$family')";
     
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        echo "<span style='color:blue;'>Данные добавлены</span>";
        header('Location: test.php');
    }
    // закрываем подключение
    mysqli_close($link);
}
?>