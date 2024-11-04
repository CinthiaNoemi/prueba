<?php
require("conexion.php");
$folio = $_POST['txtFolio'];
$empresa = $_POST['txtEmpresa'];
$estado = "CANCELADO";
$sql = "UPDATE $empresa SET estado='$estado' WHERE folio='$folio'";
    
  $consulta = mysqli_query($conexion, $sql);
    if($consulta){      
echo "<center><script language='javascript'>alert('DOCUMENTO CANCELADO');</script></center>";
      echo'<script>window.location="index.php"</script>';
    }
    else
    {
      echo "Error no se pudo modificar el registro <br/>";
      echo "MYSQL dice: " .mysqli_errno($conexion)." ".mysqli_error($conexion). "<br/>";
    }
    mysqli_close($conexion);
?>