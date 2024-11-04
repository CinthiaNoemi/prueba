<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>CRÉDITO</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
</head>
<body>
</body>
</html>
<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<?php

require("letras.php");
//recibimos el nombre de la tabla
$empresa=$_POST['txtEmpresa'];

//ejecutamos la consulta
$sql = "SELECT folio, REPLACE(nombreSocio,'Ã?' OR 'Ã‘' ,'Ñ') nombreSocio, fecha, numeroSocio, importe, tipoCredito, ahorros, interesOrd, interesMora, fechaVencimiento, estado
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
while ($renglon=mysqli_fetch_array($result)) //metodo para recorrer el arreglo de inicio a fin
{
  if ($renglon['estado']=="CANCELADO") {
    echo "<body background='Imagenes\CANCELADO.jpg'></body>";
  }
  if ($renglon['importe']>=$renglon['ahorros']) {
    echo "<body background='Imagenes\IMPORTE.jpg'></body>";
  }  
  setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
  $d = $renglon['fecha'];
  $fecha = strftime("%d de %B de %Y", strtotime($d));

//imprimimos
  if ($empresa=='efectivo2') {//es mutualidad
    

    echo "<img src='Imagenes/mutualidad.jpg' style='float:left;'/>";
echo "<center><h2><center>MUTUALIDAD 12 DE AGOSTO S.C. DE R.L. DE C.V.</h2></center>";
echo "<center><h3>CALLE 23 No. 100-B ENTRE 18 Y 20, UMAN, YUCATAN </h3></center>";
echo "<center><h3>DESEMBOLSO DE CRÉDITO EFECTIVO EN CAJA</h3></center>";
echo "<h3 align=right><b>FOLIO:</b>".$renglon['folio']."</h3>";
echo "<h3 align=right><b>$</b>"; echo number_format($renglon['importe'], 2); echo "</h3>";
echo "<h3 align=left><b>FECHA:</b> <u>Umán, Yucatán a $fecha</u></h3>";

echo"<center><table border='1' class='table table-striped table-bordered table-condensed'>";
echo "<tr>
<th><b>IMPORTE EN LETRAS:</b></th>
<td>"; echo num2letras($renglon['importe']); echo "</td>
</tr></table></center>";

echo"<table border='1' class='table table-striped table-bordered table-condensed'>";

echo "
<tr><td style='text-align:left;'><b>NUMERO DE SOCIO</b></td><td style='text-align:left;'>".$renglon['numeroSocio']."</td></tr>
<tr><td style='text-align:left;'><b>NOMBRE</b></td><td style='text-align:left;'>".$renglon['nombreSocio']."</td></tr>
<tr><td style='text-align:left;'><b>TIPO DE CREDITO</b></td><td style='text-align:left;'>".$renglon['tipoCredito']."</td></tr>
<tr><td style='text-align:left;'><b>AHORROS + P.S.</b></td><td style='text-align:left;'> $"; echo number_format($renglon['ahorros'], 2); echo "</td></tr>
<tr><td style='text-align:left;'><b>INTERÉS ORDINARIO</b></td><td style='text-align:left;'>".$renglon['interesOrd']."</td></tr>
<tr><td style='text-align:left;'><b>INTERÉS MORATORIO</b></td><td style='text-align:left;'>".$renglon['interesMora']."</td></tr>
<tr><td style='text-align:left;'><b>FECHA DE VENCIMIENTO</b></td><td style='text-align:left;'>".$renglon['fechaVencimiento']."</td></tr>

</table>";

echo "<h4 align=left>Recibí de Mutualidad 12 de Agosto S.C. de R.L. de C.V. la cantidad de: $"; echo number_format($renglon['importe'], 2); 
echo " ("; echo num2letras($renglon['importe']); echo ") por concepto de préstamo a tasa de ".$renglon['interesOrd']." mensual sobre saldo insoluto valor 
que he recibido en efectivo a mi entera satisfacción. Asi mismo manifiesto conocer y apegarme al cumplimiento del acuerdo 2 de la Asamblea
General efectuada el 22 de julio de 2011, el cual menciona que todo Socio que realice un crédito por sus ahorros o menos y que en seis 
meses consecutivos no realice abono alguno a su crédito, sera dado de baja con el fin de evitar el incremento de su deuda y la cartera vencida.</h4></br></br></br></br>";

echo"<center><table>
<tr>
<td style='text-align:center;'>____________________________________________________________</td>
</tr>
<tr>
<td style='text-align:center;'><b>".$renglon['nombreSocio']."</b></td>
</tr>
</table></center></br>";

echo "<h4 align=left>Intervienen en el proceso : </h4>"; 

echo "<center><table border='1' class='table table-striped table-bordered table-condensed'>
<tr>
  <td style='text-align:center;'><strong>REVISADO</strong></br><i>Sello y Firma</i></td>  
  <td style='text-align:center;'><strong>ELABORADO Y AUTORIZADO</strong></br><i>Sello y Firma</i></td>
</tr>

<tr>
<td style='text-align:center;'></br>______________________________________</td>
<td style='text-align:center;'></br>______________________________________</td>
<tr>

<tr>
<td style='text-align:center;'><b>CONTABILIDAD</b></td>
<td style='text-align:center;'><b>CRÉDITO</b></td>
</tr></table></center></br>";


echo"<center><table border='1' class='table table-striped table-bordered table-condensed'>";
echo "<tr>
<th style='text-align:center;'><b>REVISÓ</b></br><i>CONSEJO DE VIGILANCIA</i></th>
<th style='text-align:center;'><b>AUTORIZÓ</b></br><i>PDTE. DEL CONSEJO DE ADMON.</i></th>
<th style='text-align:center;'><b>PROCESÓ</b></br><i>CAJERA</i></th>
</tr>

<tr>
<td style='text-align:center;'></br>___________________________________</td>
<td style='text-align:center;'></br>___________________________________</td>
<td style='text-align:center;'></br>___________________________________</td>
</tr>
</table></center>";

echo "<h5><b><u>Aviso de privacidad para las operaciones con espacios reducidos (todos deben de incluirlos)</u></b></h5>
<h6>Mutualidad 12 de agosto s.c. de r.l. de c.v., con domicilio en calle veintitrés número cien letra “B” de la ciudad de Umán, 
Estado de Yucatán; utilizará sus datos personales aquí recabados para la obtención del crédito solicitado. Para mayor
 información acerca del tratamiento y de los derechos que puede hacer valer, usted puede acceder al aviso de privacidad 
 completo a través de la publicación y exhibición permanente que se realiza en la entrada o recepción del domicilio antes
  citado de esta Asociación.</h6>";
  }
  else{//es nueva generacion


    echo "<img src='Imagenes/ngu.jpg' style='float:left;'/>";
echo "<center><h2><center>NUEVA GENERACIÓN DE UMÁN, A.C.</h2></center>";
echo "<center><h3>CALLE 23 No. 100-B ENTRE 18 Y 20, UMAN, YUCATAN </h3></center>";
echo "<center><h3>DESEMBOLSO DE CRÉDITO EFECTIVO EN CAJA</h3></center>";
echo "<h3 align=right><b>FOLIO:</b>".$renglon['folio']."</h3>";
echo "<h3 align=right><b>$</b>"; echo number_format($renglon['importe'], 2); echo "</h3>";
echo "<h3 align=left><b>FECHA:</b> <u>Umán, Yucatán a $fecha</u></h3>";

echo"<center><table border='1' class='table table-striped table-bordered table-condensed'>";
echo "<tr>
<th><b>IMPORTE EN LETRAS:</b></th>
<td>"; echo num2letras($renglon['importe']); echo "</td>
</tr></table></center>";

echo"<table border='1' class='table table-striped table-bordered table-condensed'>";

echo "
<tr><td style='text-align:left;'><b>NUMERO DE SOCIO</b></td><td style='text-align:left;'>".$renglon['numeroSocio']."</td></tr>
<tr><td style='text-align:left;'><b>NOMBRE</b></td><td style='text-align:left;'>".$renglon['nombreSocio']."</td></tr>
<tr><td style='text-align:left;'><b>TIPO DE CREDITO</b></td><td style='text-align:left;'>".$renglon['tipoCredito']."</td></tr>
<tr><td style='text-align:left;'><b>AHORROS + P.S.</b></td><td style='text-align:left;'> $"; echo number_format($renglon['ahorros'], 2); echo "</td></tr>
<tr><td style='text-align:left;'><b>INTERÉS ORDINARIO</b></td><td style='text-align:left;'>".$renglon['interesOrd']."</td></tr>
<tr><td style='text-align:left;'><b>INTERÉS MORATORIO</b></td><td style='text-align:left;'>".$renglon['interesMora']."</td></tr>
<tr><td style='text-align:left;'><b>FECHA DE VENCIMIENTO</b></td><td style='text-align:left;'>".$renglon['fechaVencimiento']."</td></tr>

</table>";

echo "<h4 align=left>Recibí de Nueva Generación de Umán, A.C. la cantidad de: $"; echo number_format($renglon['importe'], 2); 
echo " ("; echo num2letras($renglon['importe']); echo ") por concepto de préstamo a tasa del ".$renglon['interesOrd']." mensual sobre saldo insoluto valor 
que he recibido en efectivo a mi entera satisfacción. Asi mismo manifiesto conocer y apegarme al cumplimiento del acuerdo 2 de la Asamblea
General efectuada el 22 de julio de 2011, el cual menciona que todo Socio que realice un crédito por sus ahorros o menos y que en seis 
meses consecutivos no realice abono alguno a su crédito, sera dado de baja con el fin de evitar el incremento de su deuda y la cartera vencida.</h4></br></br></br></br>";

echo"<center><table>
<tr>
<td style='text-align:center;'>____________________________________________________________</td>
</tr>
<tr>
<td style='text-align:center;'><b>".$renglon['nombreSocio']."</b></td>
</tr>
</table></center></br>";

echo "<h4 align=left>Intervienen en el proceso : </h4>"; 

echo "<center><table border='1' class='table table-striped table-bordered table-condensed'>
<tr>
  <td style='text-align:center;'><strong>REVISADO</strong></br><i>Sello y Firma</i></td>  
  <td style='text-align:center;'><strong>ELABORADO Y AUTORIZADO</strong></br><i>Sello y Firma</i></td>
</tr>

<tr>
<td style='text-align:center;'></br>______________________________________</td>
<td style='text-align:center;'></br>______________________________________</td>
<tr>

<tr>
<td style='text-align:center;'><b>CONTABILIDAD</b></td>
<td style='text-align:center;'><b>CRÉDITO</b></td>
</tr></table></center></br>";


echo"<center><table border='1' class='table table-striped table-bordered table-condensed'>";
echo "<tr>
<th style='text-align:center;'><b>REVISÓ</b></br><i>CONSEJO DE VIGILANCIA</i></th>
<th style='text-align:center;'><b>AUTORIZÓ</b></br><i>PDTE. DEL CONSEJO DE ADMON.</i></th>
<th style='text-align:center;'><b>PROCESÓ</b></br><i>CAJERA</i></th>
</tr>

<tr>
<td style='text-align:center;'></br>___________________________________</td>
<td style='text-align:center;'></br>___________________________________</td>
<td style='text-align:center;'></br>___________________________________</td>
</tr>
</table></center>";

echo "<h5><b><u>Aviso de privacidad para las operaciones con espacios reducidos (todos deben de incluirlos)</u></b></h5>
<h6>Nueva Generación de Umán Asociación Civil, con domicilio en calle veintitrés número cien letra “B” de la ciudad de Umán, 
Estado de Yucatán; utilizará sus datos personales aquí recabados para la obtención del crédito solicitado. Para mayor
 información acerca del tratamiento y de los derechos que puede hacer valer, usted puede acceder al aviso de privacidad 
 completo a través de la publicación y exhibición permanente que se realiza en la entrada o recepción del domicilio antes
  citado de esta Asociación.</h6>";
  }

}
 }   
?>