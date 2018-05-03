<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/24
 * Time: 15:47
 */

include_once "conn.php";
$tem = $_GET["tem"];
$hum = $_GET["hum"];
$command = $_GET["command"];
$food = $_GET["food"];
$sports = $_GET["sports"];

if($command == "upload"){
    $result = mysql_query("UPDATE home SET temp = $tem, hum = $hum");
    $result1 = mysql_query("UPDATE home SET fd = $food");
    $result2 = mysql_query("UPDATE home SET sports = $sports");
}elseif ($command == "chaxun"){
    $result = mysql_query("SELECT * FROM home");
    $row = mysql_fetch_array($result);
    echo "{\"food\":"."\"".$row['food']."\"".",\"music\":"."\"".$row['music']."\",\"video\":"."\"".$row['video']."\",\"shit\":"."\"".$row['shit']."\",\"cold\":"."\"".$row['cold']."\",\"hot\":"."\"".$row['hot']."\",\"pin\":"."\"".$row['pin']."\",\"water\":"."\"".$row['water']."\"}";
}elseif ($command == "music"){
    $result = mysql_query("UPDATE home SET music = 'false'");
}elseif ($command == "video"){
    $result = mysql_query("UPDATE home SET video = 'false'");
}

?>