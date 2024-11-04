<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <title>CREDITO</title>
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
            <a class="brand">DEPTO CREDITO</a>

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
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">DESEMBOLSO DE CREDITO<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="Credito-Nuevo.php">DESEMBOLSO EFECTIVO</a></li>
                            <li><a href="Credito-Registros.php">TODOS LOS REGISTROS</a></li>
                            <li><a href="Credito-Buscar.php">BUSCAR DOCUMENTO POR FOLIO</a></li>                            
                            <li><a href="Credito-Resumen.php">RESUMEN DE DESEMBOLSOS</a></li>                            
                            <li><a href="Credito-Cancelacion.php">CANCELACION DOCUMENTO</a></li>
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
    
<?php
require("conexion.php");
//ejecutamos la consulta
$empresa=$_POST['txtEmpresa'];
$sql = "SELECT numero, nombre FROM socios WHERE numero='".$_POST['txtNumeroSocio']."'";
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

    echo "<form action='Credito-Guardar.php' method='post' ><table border='1' class='table table-striped table-bordered table-condensed'>
    
    <tr>
    <th><b>NUMERO SOCIO</b></th>
    <th><b>NOMBRE</b></th>
    <th><b>TIPO DE CREDITO</b></th>
    <th><b>INTERES ORDINARIO</b></td>
    </tr>

    <tr>
    <td><label for='numero'>".$renglon['numero']."</label></td>
    <td><label for='nombre'>".$renglon['nombre']."</label></td>    
    <td><div class='controls'>
              <select name='txtTipoCredito'>
                <option>PRESTAMO I</option>                
                <option>CREDITO IMPULSO</option>
                <option>CREDITO VACACIONAL</option>
                <option>CREDITO VACACIONAL II</option>
                <option>CREDITO ESCOLAR I</option>
                <option>CREDITO ESCOLAR II</option>
		        <option>CREDITO EMERGENTE</option>
                <option>BUEN FIN</option>
		        <option>GANO POR CUMPLIR</option>
                <option>SEGUIR CONSTRUYENDO</option>
              </select>
            </div>
            </td>
    <td>
    <div class='controls'>        
        <label class='radio'><input type='radio' name='txtInteresOrd' value='1.30%'>1.30%</label>
        <label class='radio'><input type='radio' name='txtInteresOrd' value='1.10%' checked>1.10%</label>
        <label class='radio'><input type='radio' name='txtInteresOrd' value='1%'>1%</label>
        <label class='radio'><input type='radio' name='txtInteresOrd' value='0.90%'>0.90%</label>
	<label class='radio'><input type='radio' name='txtInteresOrd' value='0.70%'>0.70%</label>
        <label class='radio'><input type='radio' name='txtInteresOrd' value='0.60%'>0.60%</label>
	<label class='radio'><input type='radio' name='txtInteresOrd' value='0.50%'>0.50%</label>
    </div>
    </td>
    </tr>
    
    <tr>
    <th><b>IMPORTE</b></th>
    <th><b>AHORROS+P.S.</b></th>    
    <th><b>FECHA DE VENCIMIENTO</b></th>
    <th></th>
    </tr>

    <tr>
    <td><input type='text' name='txtImporte'/></td>
    <td><input type='text' name='txtAhorros'/></td>
    <td><input value='".$_POST['vencimiento']."' type='text' name='txtFechaVencimiento'/></td>
    <td></td>
    </tr>
    </table></br>
    <input type='hidden' name='txtNumeroSocio' value='".$renglon['numero']."'>
    <input type='hidden' name='txtNombreSocio' value='".$renglon['nombre']."'>
    <input type='hidden' name='txtEmpresa' value='".$empresa."'>
<button class='btn btn-primary' type='submit'>Guardar</button>
<button class='btn' type='reset'>Limpiar Campos</button>
 </div>
 </form>";

}
}
?>
</form></center>
    <!-- scripts -->
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <!-- scripts -->
</body>
</html>