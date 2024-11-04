<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
    <title>CRÉDITO</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
</head>
<body>

<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>


<?php
require("conexion.php");
$empresa=$_POST['txtEmpresa'];
if ($_POST['txtEmpresa']=='efectivo2') {    
    $titulo='MUTUALIDAD 12 DE AGOSTO';
}
else{    
    $titulo='NUEVA GENERACIÓN DE UMAN';
}
//ejecutamos la consulta
$sql = "SELECT folio, REPLACE(nombreSocio,'?','Ñ') nombreSocio, fecha, numeroSocio, importe, tipoCredito, ahorros, interesOrd, interesMora, fechaVencimiento, estado 
FROM $empresa 
WHERE fecha BETWEEN '".$_POST['txtFechaInicio']."' AND '".$_POST['txtFechaFin']."'";
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
echo"<center><h1>RESUMEN</h1><h2>$titulo</h2></center></br>";
echo"<center><table class='table table-striped table-bordered table-condensed'> \n";
echo "<tr>
<td><b>FOLIO</b></td>
<td><b>NUMERO SOCIO</b></td>
<td><b>NOMBRE SOCIO</b></td>
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
    <td> ".$row['folio']."</td>
    <td>".$row['numeroSocio']."</td>
    <td>".$row['nombreSocio']."</td>
    <td>".$row['fecha']."</td>
    <td> $"; echo number_format($row['importe'], 2); echo "</td>
    <td>".$row['tipoCredito']."</td>
    <td> $"; echo number_format($row['ahorros'], 2); echo "</td>
    <td>".$row['interesOrd']."</td>
    <td>".$row['interesMora']."</td>
    <td>".$row['fechaVencimiento']."</td>    
    <td>".$row['estado']."</td>
    </tr> \n";
    $cont++; 
    } while ($row = mysqli_fetch_array($result)); 
}

echo"</table></center> \n";
//formato fecha americana
$fecha1=".$_POST[txtFechaInicio].";
$fecha11=date('d-m-Y',strtotime($fecha1));
$fecha2=".$_POST[txtFechaFin].";
$fecha22=date('d-m-Y',strtotime($fecha2));
//El nuevo valor de la variable: $fecha2='20-10-2008' ";
echo "<center> 
<h3><i>$cont REGISTROS ENCONTRADOS</i></h3>
<h3><i>FECHA INICIO: $fecha11 FECHA FINAL: $fecha22 </i></h3>
</center>";   
}

?>
</body>
</html>
