<?php
//recibir el formulario
if(isset($_POST["txtNumeroSocio"])){//si tiene "algo" pasamos los valores  
  $empresa = $_POST["txtEmpresa"];
  $numeroSocio = $_POST["txtNumeroSocio"];
  $nombreSocio = utf8_encode ($_POST["txtNombreSocio"]);
  $importe = $_POST["txtImporte"];
  $tipoCredito = $_POST["txtTipoCredito"];
  $ahorros = $_POST["txtAhorros"];
  $interesOrd = $_POST["txtInteresOrd"];
  $fechaVencimiento = $_POST["txtFechaVencimiento"];
  $interesMora="2%";
  $estado="ACTIVO";

  insertar($empresa, $numeroSocio, $nombreSocio, $importe, $tipoCredito, $ahorros, $interesOrd, $fechaVencimiento, $interesMora, $estado);
}

?>

<?php
 function insertar($empresa, $numeroSocio, $nombreSocio, $importe, $tipoCredito, $ahorros, $interesOrd, $fechaVencimiento, $interesMora, $estado){

//1) Conexion
require("conexion.php");

if ($_POST['txtEmpresa'] == 'MUTUALIDAD') {
    $empresa='efectivo2';
}
else{
    $empresa='efectivo';
}

// 2) Escribir la cadena de consulta

$sql = "INSERT INTO `credito`.`$empresa` (`numeroSocio`, `nombreSocio`, `fecha`, `importe`, `tipoCredito`, `ahorros`, `interesOrd`, `interesMora`, `fechaVencimiento`, `estado`) 
VALUES (
  '$numeroSocio',
  '$nombreSocio',
   CURDATE(),
  '$importe',
  '$tipoCredito',
  '$ahorros',
  '$interesOrd',
  '$interesMora',
  '$fechaVencimiento',
  '$estado');";
    
  // 3) Realizar la consulta (INSERT SOLO DEVUELVE false o true)
  $consulta = mysqli_query($conexion, $sql); //or die ("No se puede hacer consulta");
  // 4) Explorar la respuesta (Evaluar si se pudo o no se pudo)
    if($consulta){      
echo "<center><script language='javascript'>alert('REGISTRO GUARDADO');</script></center>";
      echo'<script>window.location="Credito-Registros.php"</script>';
    }
    else
    {
      echo "Error no se pudo insertar registro <br/>";
      echo "MYSQL dice: " .mysqli_errno($conexion)." ".mysqli_error($conexion). "<br/>";
    }
    mysqli_close($conexion);
 }

?>