<?php
session_start();
include_once "operaciones/conexion.php";

$ndad = mysql_num_rows(mysql_query("SELECT * FROM registro"));

if(isset($_SESSION['user']) || $ndad =! 0)
{
?>
<!DOCTYPE>
<html lang="es">
    <head>

        <meta charset="utf-8" />
        <title>- Registro -</title>
        <meta name="description" content="Construccion Civil,registro,notas,iutm" />
        <link rel="shortcut icon" href="images/icon.ico" type="image/x-icon" />
        <link rel="stylesheet" rel="stylesheet" href="css/bootstrap.css" />
        <script type="text/javascript" src=""></script>
    </head>
<body>
    <div class="bp"></div>
        <header>

            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="acerca.php">Acerca</a></li>
                    <li><a href="contactanos.php">Contactanos</a></li>
                    <li><a href="registro.php">Registro</a></li>
                </ul>
            </nav>

            <h2> Registro para <?php if(isset($_SESSION['user'])){ echo "un Nuevo "; }else { ?> el <?php } ?>Administrador del Sistema</h2>

        </header>

    <div id="contenedor">

        <section id="newstudent">
            <table width="40%" align="center" border="0">
                <tr>
                    <form method="POST" action="operaciones/newregistro.php" name="newestudent" onsubmit="return longitudreg();">
                        <td>
                            <label>Nombre:</label>
                                <input type="text" name="nombres" id="nombres" maxlength="25" size="25" value="" onkeypress="return validar(event, 'car_esp');" required /><br><br>

                            <label>Apellido:</label>
                                <input type="text" name="apellidos" id="apellidos" maxlength="25" size="25" value="" onkeypress="return validar(event, 'car_esp');" required /><br><br>

                            <label>Cedula:</label>
                                <select name="nacionalidad">
                                    <option value="V-">V-</option>
                                    <option value="E-">E-</option>
                                </select>
                                <input type="text" name="cedula" id="cedula" maxlength="8" value="" onkeypress="return validar(event, 'num');" required /><br><br><br>

                        </td>
                        <td style="vertical-align:top;">
                            <label>Nombre de Usuario :</label>
                                <input type="text" name="usuario" id="usuario" maxlength="25" size="25" value="" onkeypress="return validar(event, 'car');" required /><br><br>

                             <label>Contrase&ntilde;a:</label>
                                <input type="password" name="pass" id="pass" maxlength="15" value="" onkeypress="return validar(event, 'num');" required /><br/><br/>

                            <label>Sexo:</label>

                                <input type="radio" name="sexo" id="sexo_m" value="Hombre" checked />Masculino
                                <input type="radio" name="sexo" id="sexo_f" value="Mujer" />Femenino<br><br><br>
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="2">
                            <input type="hidden" name="nivel" value="Administrador">
                            <input type="submit" name="registro" value="Registrar">
                            <input type="reset" name="cancelar" value="Cancelar">
                        </td>
                    </form>
                    </tr>
            </table>
        </section>
    </div>
</body>
</html>
<?php }  else {
    header("Location:index.php");
}
?>