<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>CRÉDITO</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">

    <style type="text/css">
         body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
</head>
<body background="Imagenes\fondo.jpg">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                </a>
            <a class="brand"  href="index.php">DEPTO CRÉDITO</a>

                <div class="nav-collapse collapse">
                    <ul class="nav">

                      <li class="active"><a href="index.php">Inicio</a></li>
                        <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">MOROSOS<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="morosos/formulario.php">SUBIR ARCHIVO</a></li>
                            <li><a href="morosos/consultar.php">CONSULTAR MOROSOS</a></li>
                            <li><a href="morosos/buscar.php">BUSCAR</a></li>
                            <li><a href="morosos/aval.php">AGREGAR AVALES</a></li>
                        </ul>
                      </li>

                      <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">DESEMBOLSO DE CRÉDITO<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="Credito-Nuevo.php">DESEMBOLSO EFECTIVO</a></li>
                            <li><a href="Credito-Registros.php">TODOS LOS REGISTROS</a></li>
                            <li><a href="Credito-Buscar.php">BUSCAR DOCUMENTO POR FOLIO</a></li>                            
                            <li><a href="Credito-Resumen.php">RESUMEN DE DESEMBOLSOS</a></li>                            
                            <li><a href="Credito-Cancelacion.php">CANCELACIÓN DOCUMENTO</a></li>
                            <li><a href="presupuesto.php">PRESUPUESTO</a></li>
                        </ul>
                      </li>
                      
                      <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">CHECKLIST<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="checkList/agregarCredito.php">AGREGAR</a></li>
                            <li><a href="#">LISTADO</a></li>
                            <li><a href="#">PENDIENTES</a></li>                            
                        </ul>
                      </li>

                     </ul>
                </div>
                
            </div>
        </div>
    </div>

    <div class="container">
        <div class="hero-unit">
            <h1>NUEVA GENERACIÓN DE UMÁN, A.C.</h1>
            <p>ELIJA LA OPCION DESEADA</p>
                
        </div>
    </div>

    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>

