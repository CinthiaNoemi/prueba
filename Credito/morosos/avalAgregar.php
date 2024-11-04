<?php
	require('conexion.php');
  $tipo=$_GET['tipo'];

echo "<center><h1>---------AGREGAR AVALES---------</h1></center></br></br></br>";
if($tipo=='NGU_ATRASADOS')
{
  $numero_credito=$_GET['numero_credito'];
  $query3="SELECT numero_credito, numero, replace(nombre,'?','Ñ') nombre, fecha_desembolso, monto
  FROM ngu_atrasados
  WHERE numero_credito='$numero_credito'";
  $resultado3=$mysqli->query($query3);

  echo "<form action='avalGuardar.php' method='post'>";
  echo "<center><h2>NGU-CREDITOS ATRASADOS</h2></center>";
  echo "<table border='1' class='table table-striped table-bordered table-condensed'>
      <thead>
        <tr>
          <td><b>Numero de Credito</b></td>
          <td><b>Numero de Socio</b></td>
          <td><b>Nombre</b></td>
          <td><b>Fecha Desembolso</b></td>
          <td><b>Monto</b></td>          
          <td><b>Aval 1</b></td>
          <td><b>Aval 2</b></td>
          <td><b>Aval 3</b></td>
        </tr>
        <tbody>";
          while($row=$resultado3->fetch_assoc()){            
            echo "<tr>
              <td>".$row['numero_credito']."</td>
              <td>".$row['numero']."</td>
              <td>".$row['nombre']."</td>
              <td>".$row['fecha_desembolso']."</td>
              <td>$".number_format($row['monto'], 2)."</td>
              <td><input type='text' name='aval1' placeholder='Nombre del Aval 1' style='width:200px; height:40px;'/></td>
              <td><input type='text' name='aval2' placeholder='Nombre del Aval 2' style='width:200px; height:40px;'/></td>
              <td><input type='text' name='aval3' placeholder='Nombre del Aval 3' style='width:200px; height:40px;'/></td>
            </tr>";
            echo "<input type='hidden' name='numero_credito' value='".$row['numero_credito']."'>            
            <input type='hidden' name='tipo' value='NGU_ATRASADOS'>";
          }
        echo "</tbody></table><center><table border='0'>
        <td><input type=image src='../imagenes/guardar.png'></br><b>GUARDAR</b></td>
        </table></center></form>";
}
elseif($tipo=='NGU_VENCIDOS')
{
  $numero_credito=$_GET['numero_credito'];
  $query3="SELECT numero_credito, numero, replace(nombre,'?','Ñ') nombre, fecha_desembolso, monto
  FROM ngu_vencidos
  WHERE numero_credito='$numero_credito'";
  $resultado3=$mysqli->query($query3);

  echo "<form action='avalGuardar.php' method='post'>";
  echo "<center><h2>NGU-CREDITOS VENCIDOS</h2></center>";
  echo "<table border='1' class='table table-striped table-bordered table-condensed'>
      <thead>
        <tr>
          <td><b>Numero de Credito</b></td>
          <td><b>Numero de Socio</b></td>
          <td><b>Nombre</b></td>
          <td><b>Fecha Desembolso</b></td>
          <td><b>Monto</b></td>          
          <td><b>Aval 1</b></td>
          <td><b>Aval 2</b></td>
          <td><b>Aval 3</b></td>
        </tr>
        <tbody>";
          while($row=$resultado3->fetch_assoc()){            
            echo "<tr>
              <td>".$row['numero_credito']."</td>
              <td>".$row['numero']."</td>
              <td>".$row['nombre']."</td>
              <td>".$row['fecha_desembolso']."</td>
              <td>$".number_format($row['monto'], 2)."</td>
              <td><input type='text' name='aval1' placeholder='Nombre del Aval 1' style='width:200px; height:40px;'/></td>
              <td><input type='text' name='aval2' placeholder='Nombre del Aval 2' style='width:200px; height:40px;'/></td>
              <td><input type='text' name='aval3' placeholder='Nombre del Aval 3' style='width:200px; height:40px;'/></td>
            </tr>";
            echo "<input type='hidden' name='numero_credito' value='".$row['numero_credito']."'>            
            <input type='hidden' name='tipo' value='NGU_VENCIDOS'>";
          }
        echo "</tbody></table><center><table border='0'>
        <td><input type=image src='../imagenes/guardar.png'></br><b>GUARDAR</b></td>
        </table></center></form>";
}
?>

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
<body background="Imagenes\fondo.jpg">
    <!-- BARRA DEL MENU -->
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
                        </ul>
                      </li>
                     </ul>
                </div>                
            </div>
        </div>
    </div>	
		<script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
		</body>
	</html>	