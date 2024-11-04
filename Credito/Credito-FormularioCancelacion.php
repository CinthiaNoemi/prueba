<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
    <title>CRÉDITO</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
</head>
<body background="Imagenes\fondo.jpg">
      <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                </a>
            <a class="brand">DEPTO CRÉDITO</a>

                <div class="nav-collapse collapse">
                    <ul class="nav">
                      <li><a href="index.php">Inicio</a></li>
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
</body>
</html>
<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>


<?php
$empresa=$_POST['txtEmpresa'];
if ($_POST['txtEmpresa']=='efectivo2') {    
    $titulo='MUTUALIDAD 12 DE AGOSTO';
}
else{    
    $titulo='NUEVA GENERACIÓN DE UMAN';
}
require("conexion.php");
//ejecutamos la consulta
$sql = "SELECT folio, nombreSocio, fecha, numeroSocio, importe, tipoCredito, ahorros, interesOrd, interesMora, fechaVencimiento, estado 
FROM $empresa 
WHERE folio='".$_POST['txtFolio']."'";

$result =mysqli_query($conexion, $sql);

// verificamos que no haya error 
if (! $result)
{
   echo "La consulta SQL contiene errores.".mysqli_error($conexion);
   exit();
}

else
{
$cont=0;
while ($row=mysqli_fetch_array($result)) //metodo para recorrer el arreglo de inicio a fin
{

  echo "</br></br></br><center><h1>$titulo</h1><h2>CANCELACION DE DOCUMENTO</h2></center></br>";
echo"<table class='table table-striped table-bordered table-condensed'> \n";
echo "<tr>
<td><b>FOLIO</b></td>
<td><b>NOMBRE SOCIO</b></td>
<td><b>NUMERO SOCIO</b></td>
<td><b>FECHA</b></td>
<td><b>IMPORTE</b></td>
<td><b>TIPO DE CRÉDITO</b></td>
<td><b>AHORROS + P.S.</b></td>
<td><b>INTERÉS ORDINARIO</b></td>
<td><b>INTERÉS MORATORIO</b></td>
<td><b>FECHA DE VENCIMIENTO</b></td>
<td><b>ESTADO</b></td>
</tr> \n";
do {
    echo "<tr>
    <td>".$row['folio']."</td>
    <td>".$row['nombreSocio']."</td>    
    <td>".$row['numeroSocio']."</td>
    <td>".$row['fecha']."</td>
    <td> $"; echo number_format($row['importe'], 2); echo "</td>
    <td>".$row['tipoCredito']."</td>
    <td> $"; echo number_format($row['ahorros'], 2); echo "</td>
    <td>".$row['interesOrd']."</td>
    <td>".$row['interesMora']."</td>
    <td>".$row['fechaVencimiento']."</td>
    <td>".$row['estado']."</td>
    </tr> \n";
    } while ($row = mysqli_fetch_array($result));    
} 
}
echo"</table> \n";
 echo "<div class='container'><center>
  <form method='post' action='Credito-Cancelar.php'>

  <input type='text' value='".$_POST['txtFolio']."' readonly='readonly' name='txtFolio'/>
  <input type='hidden' name='txtEmpresa' value=".$empresa."></br>

  <button class='btn btn-danger' type='submit'>CANCELAR DOCUMENTO</button>
  </form></center></div>";
?>