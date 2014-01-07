<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="widget"; // Mysql password 
$db_name="rdn"; // Database name 
$tbl_name="registro"; // Table name 
// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$user=$_POST['user']; 
$pass=$_POST['pass']; 

$user = mysql_real_escape_string($_POST['user']);
$pass = mysql_real_escape_string($_POST['pass']);
$datauser = mysql_query("SELECT id_registro, id_persona, user, password FROM registro WHERE user ='".$user."' and password =".$pass)or die ("Error al Ingresar");

if($row = mysql_fetch_assoc($datauser))
	{
		$_SESSION['id_registro'] = $row['id_registro'];
		$_SESSION['id_persona'] = $row['id_persona'];
		$_SESSION['user'] = $row['user'];
		$_SESSION['password'] = $row['password'];
		header("Location:http://localhost/aplicacionweb/main.php");
	}

?>