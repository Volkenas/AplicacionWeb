<?php

$database = "rdn";
$host = "localhost";
$user = "root";
$pass = "widget";

$conex = mysql_connect($host,$user,$pass)or die ("No ha sido posible la Conexion al Servidor"." ".$host.mysql_error());

$sdb = mysql_select_db($database,$conex)or die ("No se Encontro la Base de Datos"." ".$database.mysql_error());

?>