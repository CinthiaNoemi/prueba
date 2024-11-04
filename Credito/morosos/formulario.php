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
<body background="../Imagenes\fondo.jpg">

    <!-- BARRA DEL MENU -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                </a>
            <a class="brand"  href="../index.php">DEPTO CRÉDITO</a>
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


        <!-- El tipo de codificación de datos, enctype, DEBE especificarse como sigue -->
<center><form enctype="multipart/form-data" action="subir.php" method="POST">
    <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
    <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
    <h1>------SUBIR ARCHIVO DE EXCEL------</h1></br></br>
    <input name="fichero_usuario" type="file"/>
    </br><input type="submit" value="Enviar fichero" class="btn btn-primary btn-large"/>
</form></center></br></br>


<center><h2>DESCARGAR EJEMPLOS DE ARCHIVOS A SUBIR</h2></center></br>
<table class="table table-striped table-bordered table-condensed">
<tr>
    <td><strong>(1)MUTU-VENCIDOS</strong></td>
    <td><strong>(2)NGU-VENCIDOS</strong></td>
    <td><strong>(3)NGU-ATRASADOS</strong></td>
    
</tr>

<tr>
<td>
<a href="archivos/MUTU-VENCIDOS.csv"><img src="../Imagenes/descargarExcel.png"></a>
</td>
<td>
<a href="archivos/NGU-VENCIDOS.csv"><img src="../Imagenes/descargarExcel.png"></a>
</td>
<td>
<a href="archivos/NGU-ATRASADOS.csv"><img src="../Imagenes/descargarExcel.png"></a>
</td>
</tr>
</table>
</form></center></div>

    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    </BODY>
</HTML>