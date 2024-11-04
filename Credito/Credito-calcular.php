<?php
require("conexion.php");
require_once 'Credito-estilo.php';
if (isset($_POST['txtSocio'])) {
$sql = "SELECT numero, nombre FROM socios WHERE numero='".$_POST['txtSocio']."'";
$result =mysqli_query($conexion, $sql); //por la version. 

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

    echo "<center><h1>PRESUPUESTO DE CREDITO</h1><br>";
    echo "<form action='presupuestoCalnuevo.php' method='post' ><table border='1' class='table table-striped table-bordered table-condensed'>
    <tr>
    <th><b>NUMERO SOCIO</b></th>
    <th><b>NOMBRE</b></th>
    </tr>
    <tr>
    <td><label for='numero'>".$renglon['numero']."</label></td>
    <td><label for='nombre'>".$renglon['nombre']."</label></td>   
    </tr>
    <tr>
    <td>AHORRO: </td>
    <td> <input name='ahorro' type='number' class='span3' placeholder='Ahorro' step='any' required></td>
    </tr>
    <tr>
    <td>
    PARTE SOCIAL:
    </td>
    <td>
    <input type='radio' name='ps1' value='1000'>PS1<br>
    <input type='radio' name='ps2' value='1000'>PS2<br>
    </td>
    </tr>
    </table> 
<button class='btn btn-primary' type='submit'>Calcular</button>
<button class='btn' type='reset'>Limpiar Campos</button>
 </div>
 </form></center>";
}

}

} else {
    echo "Ingrese los datos";
}