<?php

require_once 'connection.php'; // подключаем скрипт

$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link)); 

$query ="SELECT * FROM $table";
    $result = mysqli_query($link, $query) or die("  Ошибка " . mysqli_error($link)); 
    if($result) {

    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<table><tr><th>Id</th><th>Имя</th><th>Фамилия</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
            for ($k = 0 ; $k < 1 ; ++$k) echo "<td><a href = 'edit.php?id=$row[$k]'> Изменить </a></td>";
            for ($k = 0 ; $k < 1 ; ++$k) echo "<td><a href = 'delete.php?id=$row[$k]'> Удалить </a></td>";

        echo "</tr>";
    }
    echo "</table>";
     
    // очищаем результат
    mysqli_free_result($result);
}
mysqli_close($link);
?>