<HTML>
    <HEAD>
      <title>CRÉDITO</title>
      <meta charset="UTF-8"/>
    </HEAD> 
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
    <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>

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

  </br></br></br>

<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>

<?php
require("conexion.php");
//checamos que empresa es
if ($_POST['txtEmpresa']=='MUTUALIDAD') {
    $empresa='efectivo2';
    $titulo='MUTUALIDAD 12 DE AGOSTO';
}
else{
    $empresa='efectivo';
    $titulo='NUEVA GENERACIÓN DE UMAN';
}
//ejecutamos la consulta
$sql = "SELECT folio, nombreSocio, DATE_FORMAT(fecha,'%d-%m-%Y') AS fecha, numeroSocio, importe, tipoCredito, ahorros, interesOrd, interesMora,fechaVencimiento, estado 
FROM $empresa 
ORDER BY folio
DESC LIMIT 500"; 
$result =mysqli_query($conexion, $sql);
echo "  <center><h1>$titulo</h1></center>;
  <center><h2><i>LISTADO DE DESEMBOLSOS EN EFECTIVO</i></h2></center>;";
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



echo"<center><table class='table table-striped table-bordered table-condensed'> \n";
echo "<tr>
<td><b>FOLIO</b></td>
<td><b>NOMBRE SOCIO</b></td>
<td><b>NUMERO SOCIO</b></td>
<td><b>IMPORTE</b></td>
<td><b>FECHA</b></td>
<td><b>TIPO DE CREDITO</b></td>
<td><b>AHORROS+P.S.</b></td>
<td><b>INTERES ORDINARIO</b></td>
<td><b>INTERES MORATORIO</b></td>
<td><b>FECHA DE VENCIMIENTO</b></td>
<td><b>ESTADO</b></td>
<td><b>IMPRIMIR</b></td>
</tr> \n";
do {

  echo "<form method='post' action='Credito-Imprimir.php'>";
    echo "<tr>
    <td>".$row['folio']."</td> 
    <td>".$row['nombreSocio']."</td>    
    <td>".$row['numeroSocio']."</td>
    <td> $"; echo number_format($row['importe'], 2); echo "</td>
    <td>".$row['fecha']."</td>
    <td>".$row['tipoCredito']."</td>
    <td> $"; echo number_format($row['ahorros'], 2); echo "</td>
    <td>".$row['interesOrd']."</td>
    <td>".$row['interesMora']."</td>
    <td>".$row['fechaVencimiento']."</td>
    <td>".$row['estado']."</td>
    <td><input type='hidden' name='txtFolio' value=".$row['folio'].">
    <input type='hidden' name='txtEmpresa' value=".$empresa.">
    <button class='btn btn-primary' type='submit'>Imprimir</button></td>
    </tr> \n";
    echo "</form>";
    $cont=$cont+1;
    } while ($row = mysqli_fetch_array($result)); 
}

echo"</table></center> \n";
echo "<center><h1>TOTAL DE DOCUMENTOS: $cont</h1></center></br></br>";

}

?>