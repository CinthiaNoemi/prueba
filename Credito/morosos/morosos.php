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
          <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    </body>
  </html> 
  
<?php
	require('conexion.php');
	$tipo=$_POST['tipo'];

  echo "<center><h1>--------------------LISTA DE MOROSOS--------------------</h1>
          <font color='red'><h2><i>$tipo</i></h2></font></center></br>";

  if($tipo=='MUTUALIDAD VENCIDOS')
  {
    $query="SELECT numero_credito, numero, REPLACE(nombre,'?','Ñ') nombre, fecha_desembolso, monto,  REPLACE(aval1,'?','Ñ') aval1, REPLACE(aval2,'?','Ñ') aval2, REPLACE(aval3,'?','Ñ') aval3 FROM mutu_vencidos";      
    $resultado=$mysqli->query($query);

    $sql="SELECT count(*) as contador, SUM(monto) as monto FROM mutu_vencidos";
    $result=$mysqli->query($sql);
              while($row1=$result->fetch_assoc())
          {
            $numero=$row1['contador'];
            $suma='$'.number_format($row1['monto'], 2);
          }
    echo "<font color='blue'>
    <h3>TOTAL DE REGISTROS: $numero</h3>
    </font>
    <font color='orange'>
    <h3>MONTO TOTAL: $suma</h3>
    </font>
    <table border='1' class='table table-striped table-bordered table-condensed'>
      <thead>
        <tr>
          <td><b>Numero de Credito</b></td>
          <td><b>Numero Socio</b></td>
          <td><b>Nombre</b></td>
          <td><b>Fecha de Desembolso</b></td>
          <td><b>Monto</b></td>          
          <td><b>Aval 1</b></td>
          <td><b>Aval 2</b></td>
          <td><b>Aval 3</b></td>          
        </tr>
        <tbody>";
          while($row=$resultado->fetch_assoc())
          {
          echo"<tr>
              <td>".$row['numero_credito']."</td>
              <td>".$row['numero']."</td>
              <td>".$row['nombre']."</td>
              <td>".$row['fecha_desembolso']."</td>
              <td>$".number_format($row['monto'], 2)."</td>              
              <td>".$row['aval1']."</td>
              <td>".$row['aval2']."</td>     
              <td>".$row['aval3']."</td>                       
            </tr>";
          }
        echo "</tbody></table>";
  }
elseif($tipo=='NGU ATRASADOS')
{
      $query="SELECT numero_credito, numero, REPLACE(nombre,'?','Ñ') nombre, fecha_desembolso, monto, REPLACE(aval1,'?','Ñ') aval1, REPLACE(aval2,'?','Ñ') aval2, REPLACE(aval3,'?','Ñ') aval3 FROM ngu_atrasados"; 
    $resultado=$mysqli->query($query);

    $sql="SELECT count(*) as contador, SUM(monto) as monto FROM ngu_atrasados";
    $result=$mysqli->query($sql);
              while($row1=$result->fetch_assoc())
          {
            $numero=$row1['contador'];   
            $suma='$'.number_format($row1['monto'], 2);         
          }
    echo "<font color='blue'>
    <h3>TOTAL DE REGISTROS: $numero</h3>
    </font>
    <font color='orange'>
    <h3>MONTO TOTAL: $suma</h3>
    </font>
    <table border='1' class='table table-striped table-bordered table-condensed'>
      <thead>
        <tr>
          <td><b>Numero de Credito</b></td>
          <td><b>Numero de Socio</b></td>
          <td><b>Nombre</b></td>
          <td><b>Fecha de Desembolso</b></td>
          <td><b>Monto</b></td>          
          <td><b>Aval 1</b></td>
          <td><b>Aval 2</b></td>
          <td><b>Aval 3</b></td>          
        </tr>
        <tbody>";
          while($row=$resultado->fetch_assoc())
          {
          echo"<tr>
              <td>".$row['numero_credito']."</td>
              <td>".$row['numero']."</td>
              <td>".$row['nombre']."</td>
              <td>".$row['fecha_desembolso']."</td>   
              <td>$".number_format($row['monto'], 2)."</td>
              <td>".$row['aval1']."</td>
              <td>".$row['aval2']."</td>     
              <td>".$row['aval3']."</td>
            </tr>";
          }
        echo "</tbody></table>";
}
elseif($tipo=='NGU VENCIDOS')
{
        $query="SELECT numero_credito, numero, REPLACE(nombre,'?','Ñ') nombre, fecha_desembolso, monto, REPLACE(aval1,'?','Ñ') aval1, REPLACE(aval2,'?','Ñ') aval2, REPLACE(aval3,'?','Ñ') aval3 FROM ngu_vencidos"; 
    $resultado=$mysqli->query($query);
    
    $sql="SELECT count(*) as contador, SUM(monto) as monto FROM ngu_vencidos";
    $result=$mysqli->query($sql);
              while($row1=$result->fetch_assoc())
          {
            $numero=$row1['contador'];  
            $suma='$'.number_format($row1['monto'], 2);          
          }
    echo "<font color='blue'>
    <h3>TOTAL DE REGISTROS: $numero</h3>
    </font>
    <font color='orange'>
    <h3>MONTO TOTAL: $suma</h3>
    </font>
    <table border='1' class='table table-striped table-bordered table-condensed'>
      <thead>
        <tr>
          <td><b>Numero de Credito</b></td>
          <td><b>Numero de Socio</b></td>
          <td><b>Nombre</b></td>
          <td><b>Fecha de Desembolso</b></td>
          <td><b>Monto</b></td>          
          <td><b>Aval 1</b></td>
          <td><b>Aval 2</b></td>
          <td><b>Aval 3</b></td>          
        </tr>
        <tbody>";
          while($row=$resultado->fetch_assoc())
          {
          echo"<tr>
              <td>".$row['numero_credito']."</td>
              <td>".$row['numero']."</td>
              <td>".$row['nombre']."</td>
              <td>".$row['fecha_desembolso']."</td>  
              <td>$".number_format($row['monto'], 2)."</td>
              <td>".$row['aval1']."</td>
              <td>".$row['aval2']."</td>     
              <td>".$row['aval3']."</td>                       
            </tr>";
          }
        echo "</tbody></table>";
}	
?>