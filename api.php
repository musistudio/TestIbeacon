<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/24
 * Time: 14:02
 */

include_once "conn.php";
$command = $_GET["command"];
if ($command=="chaxun"){
    $result = mysql_query("SELECT temp,hum,fd,sports FROM home");
    $row = mysql_fetch_array($result);
    echo "{\"tem\":"."\"".$row['temp']."\"".",\"hum\":"."\"".$row['hum']."\",\"foodyu\":"."\"".$row['fd']."\",\"sports\":"."\"".$row['sports']."\"}";
}elseif ($command=="giveFoodON"){
    $result = mysql_query("UPDATE home SET food = 'true'");
    $result1 = mysql_query("SELECT food FROM home");
    $row = mysql_fetch_array($result1);
    echo "{\"food\":"."\"".$row['food']."\"}";
}elseif ($command=="giveFoodOFF"){
    $result = mysql_query("UPDATE home SET food = 'false'");
    $result1 = mysql_query("SELECT food FROM home");
    $row = mysql_fetch_array($result1);
    echo "{\"food\":"."\"".$row['food']."\"}";
}elseif ($command=="music"){
    $result = mysql_query("UPDATE home SET music = 'true'");
    $result1 = mysql_query("SELECT music FROM home");
    $row = mysql_fetch_array($result1);
    echo "{\"music\":"."\"".$row['music']."\"}";
}elseif ($command=="video"){
    $result = mysql_query("UPDATE home SET video = 'true'");
    $result1 = mysql_query("SELECT video FROM home");
    $row = mysql_fetch_array($result1);
    echo "{\"video\":"."\"".$row['video']."\"}";
}elseif ($command=="dealShitON"){
    $result = mysql_query("UPDATE home SET shit = 'true'");
    $result1 = mysql_query("SELECT shit FROM home");
    $row = mysql_fetch_array($result1);
    echo "{\"shit\":"."\"".$row['shit']."\"}";
}elseif ($command=="dealShitOFF"){
    $result = mysql_query("UPDATE home SET shit = 'false'");
    $result1 = mysql_query("SELECT shit FROM home");
    $row = mysql_fetch_array($result1);
    echo "{\"shit\":"."\"".$row['shit']."\"}";
}elseif ($command=="giveWaterON"){
    $result = mysql_query("UPDATE home SET water = 'true'");
    $result1 = mysql_query("SELECT water FROM home");
    $row = mysql_fetch_array($result1);
    echo "{\"water\":"."\"".$row['water']."\"}";
}elseif ($command=="giveWaterOFF"){
    $result = mysql_query("UPDATE home SET water = 'false'");
    $result1 = mysql_query("SELECT water FROM home");
    $row = mysql_fetch_array($result1);
    echo "{\"water\":"."\"".$row['water']."\"}";
}elseif ($command=="givePinON"){
    $result = mysql_query("UPDATE home SET pin = 'true'");
    $result1 = mysql_query("SELECT pin FROM home");
    $row = mysql_fetch_array($result1);
    echo "{\"pin\":"."\"".$row['pin']."\"}";
}elseif ($command=="givePinOFF"){
    $result = mysql_query("UPDATE home SET pin = 'false'");
    $result1 = mysql_query("SELECT pin FROM home");
    $row = mysql_fetch_array($result1);
    echo "{\"pin\":"."\"".$row['pin']."\"}";
}elseif ($command=="giveColdON"){
    $result = mysql_query("UPDATE home SET cold = 'true'");
    $result1 = mysql_query("SELECT cold FROM home");
    $row = mysql_fetch_array($result1);
    echo "{\"cold\":"."\"".$row['cold']."\"}";
}elseif ($command=="giveColdOFF"){
    $result = mysql_query("UPDATE home SET cold = 'false'");
    $result1 = mysql_query("SELECT cold FROM home");
    $row = mysql_fetch_array($result1);
    echo "{\"cold\":"."\"".$row['cold']."\"}";
}elseif ($command=="giveHotON"){
    $result = mysql_query("UPDATE home SET hot = 'true'");
    $result1 = mysql_query("SELECT hot FROM home");
    $row = mysql_fetch_array($result1);
    echo "{\"hot\":"."\"".$row['hot']."\"}";
}elseif ($command=="giveHotOFF"){
    $result = mysql_query("UPDATE home SET hot = 'false'");
    $result1 = mysql_query("SELECT hot FROM home");
    $row = mysql_fetch_array($result1);
    echo "{\"hot\":"."\"".$row['hot']."\"}";

}



























?>