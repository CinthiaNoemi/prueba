<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
    <title>CRÉDITO</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.css">

    <style type="text/css">
         body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
</head>
<body background="..\Imagenes\fondo.jpg">
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
                            <li><a href="../morosos/formulario.php">SUBIR ARCHIVO</a></li>
                            <li><a href="../morosos/consultar.php">CONSULTAR MOROSOS</a></li>
                            <li><a href="../morosos/buscar.php">BUSCAR</a></li>
                            <li><a href="../morosos/aval.php">AGREGAR AVALES</a></li>
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

<?php
// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
date_default_timezone_set('UTC');
//se asigna numero de mes a variable
$dia=date("d");
$mes=date("m");
$num = (int)$mes;
$anio=date("Y")+1;

if($num<=6)
{
  $num=$num+6;
  if($num<10)
  {
    $mes='0'.$num;
  }
  else
  {
    $mes=$num;
  }
}
elseif($num==7)
{
  $mes='01';
  $anio=date("Y")+2;
}
elseif($num==8)
{
  $mes='02';
  $anio=date("Y")+2;
}
elseif($num==9)
{
  $mes='03';
  $anio=date("Y")+2;
}
elseif($num==10)
{
  $mes='04';
  $anio=date("Y")+2;
}
elseif($num==11)
{
  $mes='05';
  $anio=date("Y")+2;
}
elseif($num==12)
{
  $mes='06';
  $anio=date("Y")+2;
}
$vencimiento=$anio.'-'.$mes.'-'.$dia;

echo "<div class='container'><center>
<form action='agregar.php' method='post' >
  <h1>----------NUEVA GENERACIÓN DE UMÁN, ASOCIACIÓN CIVIL----------</h1>
  <h2><i>NUEVA SOLICITUD DE CRÉDITO CON RIESGO</i></h2></br></br>
  <!-- Formulario -->
</br><h3><input type='text' name='txtNumeroSocio' placeholder='Numero Socio'/></h3></br>
  <div class='controls'>
              <select name='txtEmpresa'>              
              <option>NGU</option>      
	      <option>MUTUALIDAD</option>                      
              </select>              
            </div></br>
<input type='hidden' name='vencimiento' value='$vencimiento'>
<button class='btn btn-primary' type='submit'>Iniciar</button>
</form></center></div>";
?>
    <!-- scripts -->
     <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <!-- scripts -->

</body>
</html>