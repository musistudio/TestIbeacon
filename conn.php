<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/24
 * Time: 14:03
 */


$con = mysql_connect("localhost","root","1314520wh");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("home", $con);

// some code

?>