<?php

require_once "conexion.php";

if(isset($_POST['registro']))
{
	@import_request_variables("GCP");

	if($nivel == "Estudiante")
		{

			$datastudent = mysql_query("INSERT INTO persona (nivel, nacionalidad, cedula, nombre, apellido, sexo, trayecto, trimestre) VALUES ('$nivel','$nacionalidad','$cedula','$nombres','$apellidos', '$sexo','$trayecto','$trimestre')")or die ("Error al Insertar Datos en la Tabla Registro"." ".mysql_error());
		}

	if($nivel == "Administrador")
		{
			$datap = mysql_query("INSERT INTO persona (nivel, nacionalidad, cedula, nombre, apellido, sexo) VALUES ('$nivel','$nacionalidad','$cedula','$nombres','$apellidos', '$sexo')")or die ("Error al Insertar Datos en la Tabla Registro"." ".mysql_error());

			$id = mysql_insert_id($conex);

			$datadmin = mysql_query("INSERT INTO registro (id_persona, user, password) VALUES ('$id','$usuario','$pass')");
		}

	echo "<script type='text/javascript'>";
	echo "alert('El ".$nivel." ha sido Registrado satisfactoriamente');";
	echo "window.location='../main.php'";
	echo "</script>";

}
else
{
	header("Location: index.php");
}




?>