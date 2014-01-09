<?php 
session_start();
include_once "operaciones/conexion.php";
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

     
     <h2 align="center"> Buscar Estudiante </h2></br>

         <table width="40%" align="center" border="0">
                <tr>
                    <td align="center">
                        <form name="search" method="POST" action="actualizacion.php">
                            <label>Cedula:</label>
                            <input type="text" name="cedula" id="cedula" maxlength="9" value=""><br/><br/>
                            <input type="submit" name="search" value="Buscar">
                            <button onclick="window.location='main.php'">Cancelar</button>
                        </form>
                    </td>
                </tr>
            </table>



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






















