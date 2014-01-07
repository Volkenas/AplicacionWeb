<?php
session_start();
include_once "conexion.php";

if(isset($_POST['ingresar']))
{
	$user = mysql_real_escape_string($_POST['user']);
	$pass = mysql_real_escape_string($_POST['pass']);
	$datauser = mysql_query("SELECT id_registro, id_persona, user, password FROM registro WHERE user ='".$user."' and password =".$pass)or die ("Error al Ingresar");

	if($row = mysql_fetch_assoc($datauser))
	{
		$_SESSION['id_registro'] = $row['id_registro'];
		$_SESSION['id_persona'] = $row['id_persona'];
		$_SESSION['user'] = $row['user'];
		$_SESSION['password'] = $row['password'];
		header("Location:../");
	}
	else
	{
		echo "<script>
		alert('La contraseña y/o el usuario son invalidos');
		window.location='../';
		</script>";
	}
}
else
{
	header("Location:../");
}

?>