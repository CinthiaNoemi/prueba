<HTML>
    <HEAD>
        <TITLE>SOCIOS MOROSOS</TITLE>
        <meta charset="UTF-8">
    </HEAD>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.css">

    <style type="text/css">
         body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <BODY>
<body background="Imagenes\fondo.jpg">

    <!-- BARRA DEL MENU -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                </a>
            <a class="brand">DEPTO CRÉDITO</a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                      <li><a href="../index.php">Inicio</a></li>
                        <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">MOROSOS<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="formulario.php">SUBIR ARCHIVO</a></li>
                            <li><a href="consultar.php">CONSULTAR MOROSOS</a></li>
                            <li><a href="buscar.php">BUSCAR</a></li>
                            <li><a href="aval.php">AGREGAR AVALES</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">DESEMBOLSO DE CRÉDITO<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="../Credito-Nuevo.php">DESEMBOLSO EFECTIVO</a></li>
                            <li><a href="../Credito-Registros.php">TODOS LOS REGISTROS</a></li>
                            <li><a href="../Credito-Buscar.php">BUSCAR DOCUMENTO POR FOLIO</a></li>                            
                            <li><a href="../Credito-Resumen.php">RESUMEN DE DESEMBOLSOS</a></li>                            
                            <li><a href="../Credito-Cancelacion.php">CANCELACIÓN DOCUMENTO</a></li>
                            <li><a href="../presupuesto.php">PRESUPUESTO</a></li>
                        </ul>
                      </li>

                      <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">CHECKLIST<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">AGREGAR</a></li>
                            <li><a href="#">LISTADO</a></li>
                            <li><a href="#">PENDIENTES</a></li>                            
                        </ul>
                      </li>

                     </ul>
                </div>                
            </div>
        </div>
    </div>

<div class="container"><center>
<form action="morosos.php" method="post" >
  <h1>-------SELECCIONE LA CARTERA-------</h1></br></br>
  <!-- Formulario -->
  <div class="controls">
              <select name="tipo">
              <option>MUTUALIDAD VENCIDOS</option>
              <option>NGU ATRASADOS</option>              
              <option>NGU VENCIDOS</option>                                                    
              </select>              
            </div></br>
<button class="btn btn-primary btn-large" type="submit">Mostrar</button>

</form></center></div>

    <!-- scripts -->
     <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <!-- scripts -->
</body>
</html>