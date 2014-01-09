<?php
session_start();
require_once "operaciones/conexion.php";

if (isset($_POST['search']) || isset($_GET['trayecto']))
{
    @import_request_variables("GCP");

    $nivel = "Estudiante";

    if(isset($_GET['trayecto']))
    {
        $trayecto = explode("-",$trayecto);
        list($trayecto,$cedula)=$trayecto;
    }
    else
    {
        $cedula = mysql_real_escape_string($_POST['cedula']);
    }

     $update =  mysql_query("SELECT * FROM persona WHERE cedula ='".$cedula."' and nivel = '".$nivel."'")or die("Error al consultar".mysql_error());

     if ($row = mysql_fetch_assoc($update)) {

        $issetnotas = mysql_num_rows(mysql_query("SELECT * FROM notas WHERE id_persona =".$row['id_persona']));

        if($issetnotas > 0)
        {
            $notas = mysql_query("SELECT * FROM notas WHERE id_persona =".$row['id_persona']);

            $nota = mysql_fetch_assoc($notas);
        }

        ?>



<!DOCTYPE html>
<!-- saved from url=(0053)http://getbootstrap.com/2.3.2/examples/carousel.html# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Carousel Template · Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Validation -->


    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <style>

    /* GLOBAL STYLES
    -------------------------------------------------- */
    /* Padding below the footer and lighter body text */

    body {
      padding-bottom: 40px;
      color: #5a5a5a;
    }



    /* CUSTOMIZE THE NAVBAR
    -------------------------------------------------- */

    /* Special class on .container surrounding .navbar, used for positioning it into place. */
    .navbar-wrapper {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      z-index: 10;
      margin-top: 20px;
      margin-bottom: -90px; /* Negative margin to pull up carousel. 90px is roughly margins and height of navbar. */
    }
    .navbar-wrapper .navbar {

    }

    /* Remove border and change up box shadow for more contrast */
    .navbar .navbar-inner {
      border: 0;
      -webkit-box-shadow: 0 2px 10px rgba(0,0,0,.25);
         -moz-box-shadow: 0 2px 10px rgba(0,0,0,.25);
              box-shadow: 0 2px 10px rgba(0,0,0,.25);
    }

    /* Downsize the brand/project name a bit */
    .navbar .brand {
      padding: 14px 20px 16px; /* Increase vertical padding to match navbar links */
      font-size: 16px;
      font-weight: bold;
      text-shadow: 0 -1px 0 rgba(0,0,0,.5);
    }

    /* Navbar links: increase padding for taller navbar */
    .navbar .nav > li > a {
      padding: 15px 20px;
    }

    /* Offset the responsive button for proper vertical alignment */
    .navbar .btn-navbar {
      margin-top: 10px;
    }



    /* CUSTOMIZE THE CAROUSEL
    -------------------------------------------------- */

    /* Carousel base class */
    .carousel {
      margin-bottom: 60px;
    }

    .carousel .container {
      position: relative;
      z-index: 9;
    }

    .carousel-control {
      height: 80px;
      margin-top: 0;
      font-size: 120px;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
      background-color: transparent;
      border: 0;
      z-index: 10;
    }

    .carousel .item {
      height: 500px;
    }
    .carousel img {
      position: absolute;
      top: 0;
      left: 0;
      min-width: 100%;
      height: 500px;
    }

    .carousel-caption {
      background-color: transparent;
      position: static;
      max-width: 550px;
      padding: 0 20px;
      margin-top: 200px;
    }
    .carousel-caption h1,
    .carousel-caption .lead {
      margin: 0;
      line-height: 1.25;
      color: #fff;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
    }
    .carousel-caption .btn {
      margin-top: 10px;
    }



    /* MARKETING CONTENT
    -------------------------------------------------- */

    /* Center align the text within the three columns below the carousel */
    .marketing .span4 {
      text-align: center;
    }
    .marketing h2 {
      font-weight: normal;
    }
    .marketing .span4 p {
      margin-left: 10px;
      margin-right: 10px;
    }
    
    
    /* Featurettes
    ------------------------- */

    .featurette-divider {
      margin: 80px 0; /* Space out the Bootstrap <hr> more */
    }
    .featurette {
      padding-top: 120px; /* Vertically center images part 1: add padding above and below text. */
      overflow: hidden; /* Vertically center images part 2: clear their floats. */
    }
    .featurette-image {
      margin-top: -120px; /* Vertically center images part 3: negative margin up the image the same amount of the padding to center it. */
    }

    /* Give some space on the sides of the floated elements so text doesn't run right into it. */
    .featurette-image.pull-left {
      margin-right: 40px;
    }
    .featurette-image.pull-right {
      margin-left: 40px;
    }

    /* Thin out the marketing headings */
    .featurette-heading {
      font-size: 50px;
      font-weight: 300;
      line-height: 1;
      letter-spacing: -1px;
    }



    /* RESPONSIVE CSS
    -------------------------------------------------- */

    @media (max-width: 979px) {

      .container.navbar-wrapper {
        margin-bottom: 0;
        width: auto;
      }
      .navbar-inner {
        border-radius: 0;
        margin: -20px 0;
      }

      .carousel .item {
        height: 500px;
      }
      .carousel img {
        width: auto;
        height: 500px;
      }

      .featurette {
        height: auto;
        padding: 0;
      }
      .featurette-image.pull-left,
      .featurette-image.pull-right {
        display: block;
        float: none;
        max-width: 40%;
        margin: 0 auto 20px;
      }
    }


    @media (max-width: 767px) {

      .navbar-inner {
        margin: -20px;
      }

      .carousel {
        margin-left: -20px;
        margin-right: -20px;
      }
      .carousel .container {

      }
      .carousel .item {
        height: 300px;
      }
      .carousel img {
        height: 300px;
      }
      .carousel-caption {
        width: 65%;
        padding: 0 70px;
        margin-top: 100px;
      }
      .carousel-caption h1 {
        font-size: 30px;
      }
      .carousel-caption .lead,
      .carousel-caption .btn {
        font-size: 18px;
      }

      .marketing .span4 + .span4 {
        margin-top: 40px;
      }

      .featurette-heading {
        font-size: 30px;
      }
      .featurette .lead {
        font-size: 18px;
        line-height: 1.5;
      }
      
      

  

      
      

    }
    </style><style type="text/css"></style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
   
  <style id="holderjs-style" type="text/css">.holderjs-fluid {font-size:16px;font-weight:bold;text-align:center;font-family:sans-serif;margin:0}</style></head>

  <body style="zoom: 1;">



    <!-- NAVBAR
    ================================================== -->

    <div class="navbar-wrapper">
      <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
      <div class="container">

        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="./main.htm">Registro de Notas</a>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li class="active"><a href="./Carousel Template · Bootstrap_files/Carousel Template · Bootstrap.htm">Inicio</a></li>
                <li><a href="">Acerca</a></li>
                <li><a href="">Contacto</a></li>
                <!-- Read about Bootstrap dropdowns at http://twbs.github.com/bootstrap/javascript.html#dropdowns -->
                <li class="dropdown">
                  <a href="./main.htm" class="dropdown-toggle" data-toggle="dropdown">Acceso Rapido<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="./main.htm">Registrar Estudiante</a></li>
                    <li><a href="./main.htm">Registrar Notas</a></li>
                    <li><a href="./main.htm">Consultar Notas</a></li>
                    <li class="divider"></li>
                    <li><a href="./main.htm">Control Estadistico</a></li>
                    </ul>
                </li>

              </ul>
              <!-- Inicio de Botones Inscripcion / Login -->
                <ul class="nav pull-right">
          <li><a href="registro.php">Registro</a></li>
          <li class="divider-vertical"></li>
          <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
            <?php
            if (isset($_SESSION['user'])) {
            echo "{$_SESSION['user']}";
            echo "<strong class=\"caret\"></strong></a>";
            echo "<div class=\"dropdown-menu\" style=\"padding: 15px; padding-bottom: 0px;\">";
            echo "<form action=\"operaciones/logout.php\" method=\"post\" accept-charset=\"UTF-8\">";
            echo "<input class=\"btn btn-primary\" style=\"clear: left; width: 100%; height: 32px; font-size: 13px;\" type=\"submit\" name=\"commit\" value=\"Salir\" />";
            echo "</form>";
          } 
          else
          {
            echo "Ingresar";
            echo "<strong class=\"caret\"></strong></a>";
            echo "<div class=\"dropdown-menu\" style=\"padding: 15px; padding-bottom: 0px;\">";
            echo "<form action=\"operaciones/checklogin.php\" method=\"post\" accept-charset=\"UTF-8\">";
            echo "<input id=\"user\" style=\"margin-bottom: 15px;\" type=\"text\" name=\"user\" size=\"30\" />";
            echo "<input id=\"pass\" style=\"margin-bottom: 15px;\" type=\"password\" name=\"pass\" size=\"30\" />";
            echo "<input id=\"user_remember_me\" style=\"float: left; margin-right: 10px;\" type=\"checkbox\" name=\"user[remember_me]\" value=\"1\" />";
            echo "<label class=\"string optional\" for=\"user_remember_me\"> Recordar</label>";
            echo "<input class=\"btn btn-primary\" style=\"clear: left; width: 100%; height: 32px; font-size: 13px;\" type=\"submit\" name=\"commit\" value=\"Entrar\" />";
            echo "</form>";

             }
            ?>   
                   
               

            </div>
          </li>
        </ul>
        <!-- Fin de Registro / Login -->
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->

      </div> <!-- /.container -->
    </div><!-- /.navbar-wrapper -->




    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
          <img src="./Carousel Template · Bootstrap_files/patria1.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Registro de Notas</h1>
              <p class="lead">Esta aplicacion web fue diseñada por estudiantes de la carrera Informatica del Instituto Universitario de Tecnologia de Maracaibo para facilitar el almacenamiento y control estadistico de las notas del departamento.</p>
              <a class="btn btn-large btn-primary" href="./main.htm">Aprende mas</a>
              </div>
          </div>
        </div>
        <div class="item">
          <img src="./Carousel Template · Bootstrap_files/patria2.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>¿Que es una Aplicacion Web?</h1>
              <p class="lead">Usando tecnologias de desarrollo web como HTML5, CSS, JavaScript, jQuery y MySQL, se ha creado una interfaz comoda y accesible para el usuario.</p>
              <a class="btn btn-large btn-primary" href="./main.htm">¡Aprende mas!</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="./Carousel Template · Bootstrap_files/patria3.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>¿Porque usar esta Aplicacion Web?</h1>
              <p class="lead">Usar una Aplicacion Web en vez de manejar archivos fisicos es mucho mas confiable.</p>
              <a class="btn btn-large btn-primary" href="./main.htm">Aprende mas</a>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="carousel.html#myCarousel" data-slide="prev">‹</a>
      <a class="right carousel-control" href="carousel.html#myCarousel" data-slide="next">›</a>
    </div><!-- /.carousel -->



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

     
     <div align="center">

    <section id="update">
        <table width="72%" align="center" border="0" align="center">
            <tr align="center">
                <td>
                    <fieldset>
                       <table width="60%" border="0">
                            <tr>
                                <td>
                                    <span style="font-family:sans-serif; font-size:18px;"><b>Cedula :</b> <?php echo $row['nacionalidad'].$row['cedula']; ?></span><br/>
                                    <span style="font-family:sans-serif; font-size:18px;"><b>Trayecto :</b> <?php echo $row['trayecto']; ?></span>
                                    <span style="font-family:sans-serif; font-size:18px; margin-left:5%"><b>Trimestre :</b> <?php echo $row['trimestre']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td><span style="font-family:sans-serif; font-size:18px;"><b>Nombre del Estudiante :</b> <?php echo $row['nombre']." ".$row['apellido']; ?></span></td>
                            </tr>
                            <tr>
                                <td><a href="actualizacion.php?trayecto=Inicial<?php echo "-".$cedula; ?>">Trayecto Inicial</a>&nbsp;-&nbsp;<a href="actualizacion.php?trayecto=I<?php echo "-".$cedula; ?>">Trayecto I</a>&nbsp;-&nbsp;<a href="actualizacion.php?trayecto=II<?php echo "-".$cedula; ?>">Trayecto II</a>&nbsp;-&nbsp;<a href="actualizacion.php?trayecto=III<?php echo "-".$cedula; ?>">Trayecto III</a>&nbsp;-&nbsp;<a href="actualizacion.php?trayecto=IV<?php echo "-".$cedula; ?>">Trayecto IV</a></td>
                            </tr>
                        </table>
                    </fieldset><br>
<?php

    if(isset($trayecto) && $trayecto == "Inicial")
        { ?>
            <fieldset>
                <legend><b>Trayecto Inicial</b></legend>
                    <table>
                        <form name="<?php echo $trayecto; ?>" method="POST" action="operaciones/update.php" >
                        <tr>
                            <td><label>Proyecto Nacional y Nueva Ciudadania:</label></td>
                            <td>
                            <input type="text" name="pnync" id="pnync" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['pnync']; } ?>" onkeypress="return validar(event, 'num');">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Taller de Introduccion</label>
                            </td>
                            <td>
                                <input type="text" name="talleri" id="talleri" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['talleri']; } ?>" onkeypress="return validar(event, 'num');">
                            </td>
                        </tr>
                        <tr>
                            <td><label>Matematica Inicial</label></td>
                            <td>
                                <input type="text" name="matini" id="matini" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['matini']; } ?>" onkeypress="return validar(event, 'num');">
                            </td>
                        </tr>
                        <tr>
                            <td><label>Construccion Civil y Sociedad</label></td>
                            <td>
                                <input type="text" name="ccys" id="ccys" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['ccys']; } ?>" onkeypress="return validar(event, 'num');">
                            </td>
                            <input type="hidden" name="trayecto" value="<?php echo $trayecto."-".$row['id_persona']; ?>" />
                        </tr>
                    </table>
            </fieldset>

<?php }
        elseif (isset($trayecto) && $trayecto == "I")
                {  ?>

                <fieldset>
                    <legend><strong>Trayecto I</strong></legend>
                    <fieldset>
                      <table>
                            <form name="<?php echo $trayecto; ?>" method="POST" action="operaciones/update.php" >
                            <tr>
                                <td><h3>Trimestre I</h3></td>
                            </tr>
                            <tr>
                                <td><label>Tutorial de Proyecto I:</label></td>
                                <td>
                                    <input type="text" name="tutopro1" id="tutopro1" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['tutopro1']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Construccion de Documento</label></td>
                                <td>
                                    <input type="text" name="costdocu" id="constdocu" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['costdocu']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Matematica</label></td>
                                <td>
                                    <input type="text" name="matematica" id="matematica" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['matematica']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                    
                            <tr>
                                <td><label>Fisica Aplicada</label></td>
                                <td>
                                    <input type="text" name="fisicaapli" id="fisicaapli" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['fisicaapli']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                                                        <tr>
                                <td><br><h3>Trimestre II</h3></td>
                            </tr>
                            <tr>
                                <td><label>Topografia</label></td>
                                <td>
                                    <input type="text" name="topografia" id="topografia" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['topografia']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Expresion Grafica y Dibujo de Proyecto</label></td>
                                <td>
                                    <input type="text" name="egdp" id="egdp" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['egdp']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Estructura Organizativa del Estado</label></td>
                                <td>
                                    <input type="text" name="eode" id="eode"maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['eode']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><br><h3>Trimestre III</h3></td>
                            </tr>
                            <tr>
                                <td><label>Mecanica</label></td>
                                <td>
                                    <input type="text" name="mecanica" id="mecanica" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['mecanica']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Geografia y Habitad</label></td>
                                <td>
                                    <input type="text" name="geohabitad" id="geohabitad" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['geohabitad']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Quimica General</label></td>
                                <td>
                                    <input type="text" name="quimicagene" id="quimicagene" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['quimicagene']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                                <input type="hidden" name="trayecto" value="<?php echo $trayecto."-".$row['id_persona']; ?>" />
                            </tr>
                        </table>
                </fieldset>
<?php }
        elseif(isset($trayecto) && $trayecto == "II")
               { ?>

                <fieldset>
                    <legend><strong>Trayecto II</strong></legend>
                    <fieldset>
                        <table>
                            <form name="<?php echo $trayecto; ?>" method="POST" action="operaciones/update.php" >
                             <tr>
                                <td><h3>Trimestre I</h3></td>
                            </tr>
                            <tr>
                                <td><label>Tutorial de Proyecto II:</label></td>
                                <td>
                                    <input type="text" name="tutop2" id="tutop2" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['tutop2']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Higiene y Seguridad Industrial</label></td>
                                <td>
                                    <input type="text" name="hsi" id="hsi" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['hsi']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Gestion de Obras Sostenibles</label></td>
                                <td>
                                    <input type="text" name="gos" id="gos" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['gos']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Materiales de Construccion</label></td>
                                <td>
                                    <input type="text" name="matecons" id="matecons" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['matecons']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Mecanica de Suelos</label></td>
                                <td>
                                    <input type="text" name="mecasuel" id="mecasuel" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['mecasuel']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                             <tr>
                                <td><br><h3>Trimestre II</h3></td>
                            </tr>
                            <tr>
                                <td><label>Mecanica de Fluidos</label></td>
                                <td>
                                    <input type="text" name="mecaflu" id="mecaflu" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['mecaflu']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Impacto Ambiental en la Construccion</label></td>
                                <td>
                                    <input type="text" name="iac" id="iac" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['iac']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Administracion de Obras</label></td>
                                <td>
                                    <input type="text" name="admiobras" id="admiobras" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['admiobras']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Tecnologia de la Construccion</label></td>
                                <td>
                                    <input type="text" name="tecnoconst" id="tecnoconst" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['tecnoconst']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Obras Viales</label></td>
                                <td>
                                    <input type="text" name="obrasviales" id="obrasviales" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['obrasviales']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                             <tr>
                                <td><br><h3>Trimestre III</h3></td>
                            </tr>
                            <tr>
                                <td><label>Instalaciones Sanitarias y de Gas</label></td>
                                <td>
                                    <input type="text" name="instsangas" id="instsangas" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['instsangas']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Desarrollo Profesional y Etica</label></td>
                                <td>
                                    <input type="text" name="desaproeti" id="desproeti" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['desaproeti']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Resistencia de Materiales</label></td>
                                <td>
                                    <input type="text" name="resismate" id="resismate" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['resismate']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Electricidad y Mecanica</label></td>
                                <td>
                                    <input type="text" name="electmeca" id="electmeca" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['electmeca']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Sistemas Hidrosanitarios</label></td>
                                <td>
                                    <input type="text" name="sistehidro" id="sistehidro" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['sistehidro']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                                <input type="hidden" name="trayecto" value="<?php echo $trayecto."-".$row['id_persona']; ?>" />
                            </tr>
                        </table>
                        </fieldset>
                </fieldset>
<?php }
        elseif (isset($trayecto) && $trayecto == "III")
                { ?>
                    <fieldset>
                        <legend><strong>Trayecto III</strong></legend>
                        <fieldset>
                        <table>
                            <form name="<?php echo $trayecto; ?>" method="POST" action="operaciones/update.php" >
                             <tr>
                                <td><h3>Trimestre I</h3></td>
                            </tr>
                            <tr>
                                <td><label>Tutorial de Proyecto III:</label></td>
                                <td>
                                    <input type="text" name="tutop3" id="tutop3" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['tutop3']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Desarrollo Endogeno en la Construccion</label></td>
                                <td>
                                    <input type="text" name="desaendoconst" id="desaendoconst" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['desaendoconst']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Algebra Lineal</label></td>
                                <td>
                                    <input type="text" name="algebralineal" id="algebralineal" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['algebralineal']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Resistencia de Materiales para Ingenieros</label></td>
                                <td>
                                    <input type="text" name="restmatering" id="restmatering" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['restmatering']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Geologia Aplicada</label></td>
                                <td>
                                    <input type="text" name="geologiaapli" id="geologiaapli" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['geologiaapli']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                             <tr>
                                <td><br><h3>Trimestre II</h3></td>
                            </tr>
                            <tr>
                                <td><label>Mecanica de Fluidos para Ingenieros</label></td>
                                <td>
                                    <input type="text" name="mecafluing" id="mecafluing" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['mecafluing']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Organismo y Convenios Internacionales</label></td>
                                <td>
                                    <input type="text" name="orgconveing" id="orgconveing" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['orgconveing']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Matematica para Ingenieros</label></td>
                                <td>
                                    <input type="text" name="mateing" id="mateing" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['mateing']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Analisis Estructural</label></td>
                                <td>
                                    <input type="text" name="analiestruc" id="analiestruc" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['analiestruc']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Dise&ntilde;o Vial</label></td>
                                <td>
                                    <input type="text" name="disenovial" id="disenovial" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['disenovial']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                             <tr>
                                <td><br><h3>Trimestre III</h3></td>
                            </tr>
                            <tr>
                                <td><label>Hidrologia</label></td>
                                <td>
                                    <input type="text" name="hidrologia" id="hidrologia" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['hidrologia']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Politica de Habitat y Vivienda</label></td>
                                <td>
                                    <input type="text" name="polihabiviv" id="polihabiviv" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['polihabiviv']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Economia y Gerencia de Proyecto</label></td>
                                <td>
                                    <input type="text" name="ecogerpro" id="ecogerpro" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['ecogerpro']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Concreto Armado</label></td>
                                <td>
                                    <input type="text" name="concretarmad" id="concretarmad" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['concretarmad']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Acueductos, Cloacas y Drenajes</label></td>
                                <td>
                                    <input type="text" name="acueclodre" id="acueclodre" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['acueclodre']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Unidad Acreditable III</label></td>
                                <td>
                                    <input type="text" name="unidadacre3" id="unidadacre3" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['unidadacre3']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                                <input type="hidden" name="trayecto" value="<?php echo $trayecto."-".$row['id_persona']; ?>" />
                            </tr>
                        </table>
                        </fieldset>
                    </fieldset>
<?php }
        elseif(isset($trayecto) && $trayecto == "IV")
                { ?>
                    <fieldset>
                        <legend><strong>Trayecto IV</strong></legend>
                        <fieldset>
                        <table>
                            <form name="<?php echo $trayecto; ?>" method="POST" action="operaciones/update.php" >
                             <tr>
                                <td><h3>Trimestre I</h3></td>
                            </tr>
                            <tr>
                                <td><label>Tutorial de Proyecto IV:</label></td>
                                <td>
                                    <input type="text" name="tutop4" id="tutop4" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['tutop4']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Ingenieria y Patrimonio</label></td>
                                <td>
                                    <input type="text" name="ingpatri" id="ingpatri" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['ingpatri']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Urbanismo y Edificaciones</label></td>
                                <td>
                                    <input type="text" name="urbedi" id="urbedi" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['urbedi']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Acero y Madera</label></td>
                                <td>
                                    <input type="text" name="aceromadera" id="aceromadera" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['aceromadera']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Ingenieria de Transito</label></td>
                                <td>
                                    <input type="text" name="ingtransit" id="ingtransit" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['ingtransit']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                             <tr>
                                <td><br><h3>Trimestre II</h3></td>
                            </tr>
                            <tr>
                                <td><label>Saneamiento y Conservacion Ambiental</label></td>
                                <td>
                                    <input type="text" name="saneaconsambi" id="saneaconsambi" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['saneaconsambi']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Gerencia Social</label></td>
                                <td>
                                    <input type="text" name="geresoci" id="geresoci" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['geresoci']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Mantenimiento de Obras Civiles</label></td>
                                <td>
                                    <input type="text" name="manteobrascivi" id="manteobrascivi" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['manteobrascivi']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Dise&ntilde;o Estructural</label></td>
                                <td>
                                    <input type="text" name="disenoestruct" id="disenoestruct" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['disenoestruct']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Pavimentos</label></td>
                                <td>
                                    <input type="text" name="pavimentos" id="pavimentos" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['pavimentos']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                             <tr>
                                <td><br><h3>Trimestre III</h3></td>
                            </tr>
                            <tr>
                                <td><label>Obras Hidraulicas</label></td>
                                <td>
                                    <input type="text" name="obrashidrau" id="obrashidrau" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['obrashidrau']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Fundaciones y Muros</label></td>
                                <td>
                                    <input type="text" name="fundamuros" id="fundamuros" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['fundamuros']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Obras de Sistemas de Transporte</label></td>
                                <td>
                                    <input type="text" name="obrasistrans" id="obrasistrans" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['obrasistrans']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Unidad Acreditable IV</label></td>
                                <td>
                                    <input type="text" name="unidaacre4" id="unidaacre4" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['unidaacre4']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Evaluacion Ambiental</label></td>
                                <td>
                                    <input type="text" name="evalambi" id="evalambi" maxlength="2" size="10" value="<?php if($issetnotas > 0){ echo $nota['evalambi']; } ?>" onkeypress="return validar(event, 'num');">
                                </td>
                                <input type="hidden" name="trayecto" value="<?php echo $trayecto."-".$row['id_persona']; ?>" />
                            </tr>
                        </table>
                    </fieldset></fieldset>
    <?php } if(isset($trayecto))
                { ?>
                    <input type="submit" name="update" value="Actualizar">
                    <input type="reset" value="Cancelar">
                </form>
            <?php } ?>
                </td>
            </tr>
        </table>
    </section>
</div>



<?php
     }
     else
     {
        echo "<script type='text/javascript'>";
        echo "alert('La Cedula Ingresada no Existe en el Sistema.');";
        echo "window.location='preactualizacion.php'";
        echo "</script>";
     }
}
else
{
    header("Location: index.php");
}

?>



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="js/livevalidation_standalone.js"></script>
    <script src="./Carousel Template · Bootstrap_files/jquery.js"></script>
    <script src="./Carousel Template · Bootstrap_files/bootstrap-transition.js"></script>
    <script src="./Carousel Template · Bootstrap_files/bootstrap-alert.js"></script>
    <script src="./Carousel Template · Bootstrap_files/bootstrap-modal.js"></script>
    <script src="./Carousel Template · Bootstrap_files/bootstrap-dropdown.js"></script>
    <script src="./Carousel Template · Bootstrap_files/bootstrap-scrollspy.js"></script>
    <script src="./Carousel Template · Bootstrap_files/bootstrap-tab.js"></script>
    <script src="./Carousel Template · Bootstrap_files/bootstrap-tooltip.js"></script>
    <script src="./Carousel Template · Bootstrap_files/bootstrap-popover.js"></script>
    <script src="./Carousel Template · Bootstrap_files/bootstrap-button.js"></script>
    <script src="./Carousel Template · Bootstrap_files/bootstrap-collapse.js"></script>
    <script src="./Carousel Template · Bootstrap_files/bootstrap-carousel.js"></script>
    <script src="./Carousel Template · Bootstrap_files/bootstrap-typeahead.js"></script>
    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>
    <script src="./Carousel Template · Bootstrap_files/holder.js"></script>
    <!-- Validaciones JS-->
    <script>
    var ValidarCedula = new LiveValidation('cedula');
    ValidarCedula.add(Validate.Presence);
    ValidarCedula.add(Validate.Numericality, { minimum: 0, maximum: 35000000, onlyInteger: true });

    </script>

    



</body></html>
























<!-- Comienza html -->



