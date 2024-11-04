<html>
  <head>
    <meta charset="UTF-8">
    <title>PROMOCIONES MUTUALIDAD</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.css">
    <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
    <style type="text/css">
         body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
  </head>
  <body background="../Imagenes\fondo.jpg">
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
        <!-- CONTENEDOR -->
    <div id="content">
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#ngu-atrasados" data-toggle="tab">NGU-ATRASADOS</a></li>
        <li class=""><a href="#ngu-vencidos" data-toggle="tab">NGU-VENCIDOS</a></li>
    </ul>
        <script type="text/javascript">
    jQuery(document).ready(function ($) {
       // $("#tabs").tab();
    });
    </script> 
    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>

<?php
	require('conexion2.php');
  echo "<div id='my-tab-content' class='tab-content'>";
  echo "<center><h1>---------AGREGAR AVALES---------</h1></center></br></br>";

  $sql="SELECT `numero_credito`, `numero`, replace(nombre,'?','Ñ') nombre, `fecha_desembolso`, `monto`
  FROM `ngu_atrasados`  
  WHERE `aval1` IS NULL AND `aval2` IS NULL AND `aval3` IS NULL";
  //WHERE aval1 = 'NO TIENE' AND aval2 = '' AND aval3 = '' ";
 $result =mysqli_query($conexion, $sql);
   // verificamos que no haya error 
  if (!$result)
  {
  echo "La consulta SQL contiene errores.".mysqli_error($conexion);
  exit();
  }
  else{
    if (mysqli_num_rows($result)>0){
    echo "<div class='tab-pane active' id='ngu-atrasados'>";
    echo "<center><font color='orange'><h1>NGU-CREDITOS ATRASADOS</h1></font></center>";
    echo "<table border='1' class='table table-striped table-bordered table-condensed'>
          <tr>
            <th><b>#</b></th>
            <th><b>Numero de Credito</b></th>
            <th><b>Numero de Socio</b></th>
            <th><b>Nombre</b></th>
            <th><b>Fecha Desembolso</b></th>
            <th><b>Monto</b></th>          
            <th><b>Agregar Avales</b></th>
          </tr>";
          $contador1=1;
            while ($row2=mysqli_fetch_array($result)){
                  echo "<tr>
                <td><b><i>$contador1</i></b></td>
                <td>".$row2['numero_credito']."</td>
                <td>".$row2['numero']."</td>
                <td>".$row2['nombre']."</td>
                <td>".$row2['fecha_desembolso']."</td>
                <td>$";echo number_format($row2['monto'], 2);echo "</td>
                <td><a href='avalAgregar.php?numero_credito=".$row2['numero_credito']."&tipo=NGU_ATRASADOS'><img src='../Imagenes/agregar.png'></a></td>
              </tr>";
              $contador1++;
            }//fin while
          echo "</table>";
          echo "<h3> FILAS MOSTRADAS: "."<spam>".($contador1-1)."</spam> </h3></div>";
    }//fin if de numero de filas encontradas
      else{
        echo "<center><h2>(VACIO!!)</h2></center>";
      }//el fin de filas nulas
  }//fin else error
  
  
  
  $sql="SELECT `numero_credito`, `numero`, replace(nombre,'?','Ñ') nombre, `fecha_desembolso`, `monto`
  FROM `ngu_vencidos`  
  WHERE `aval1` IS NULL AND `aval2` IS NULL AND `aval3` IS NULL";
  //WHERE aval1 = 'NO TIENE' AND aval2 = '' AND aval3 = '' ";
 $result =mysqli_query($conexion, $sql);
   // verificamos que no haya error 
  if (!$result)
  {
  echo "La consulta SQL contiene errores.".mysqli_error($conexion);
  exit();
  }
  else{
    if (mysqli_num_rows($result)>0){
    echo "<div class='tab-pane ' id='ngu-vencidos'>";
    echo "<center><font color='orange'><h1>NGU-CREDITOS VENCIDOS</h1></font></center>";
    echo "<table border='1' class='table table-striped table-bordered table-condensed'>
          <tr>
            <th><b>#</b></th>
            <th><b>Numero de Credito</b></th>
            <th><b>Numero de Socio</b></th>
            <th><b>Nombre</b></th>
            <th><b>Fecha Desembolso</b></th>
            <th><b>Monto</b></th>          
            <th><b>Agregar Avales</b></th>
          </tr>";
          $contador1=1;
            while ($row2=mysqli_fetch_array($result)){
                  echo "<tr>
                <td><b><i>$contador1</i></b></td>
                <td>".$row2['numero_credito']."</td>
                <td>".$row2['numero']."</td>
                <td>".$row2['nombre']."</td>
                <td>".$row2['fecha_desembolso']."</td>
                <td>$";echo number_format($row2['monto'], 2);echo "</td>
                <td><a href='avalAgregar.php?numero_credito=".$row2['numero_credito']."&tipo=NGU_VENCIDOS'><img src='../Imagenes/agregar.png'></a></td>
              </tr>";
              $contador1++;
            }//fin while
          echo "</table>";
          echo "<h3> FILAS MOSTRADAS: "."<spam>".($contador1-1)."</spam> </h3></div>";
    }//fin if de numero de filas encontradas
      else{
        echo "<center><h2>(VACIO!!)</h2></center>";
      }//el fin de filas nulas
  }
  
  
  
  
  echo "</div></body></html>";
?>