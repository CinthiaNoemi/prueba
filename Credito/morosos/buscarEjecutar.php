<HTML>
    <HEAD>
        <TITLE>SOCIOS MOROSOS</TITLE>
        <meta charset="UTF-8">
    </HEAD>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.css">
    <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>

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

                     </ul>
                </div>                
            </div>
        </div>
    </div>

    <!-- CONTENEDOR -->
    <div id="content">
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#prestamistas" data-toggle="tab">PRESTAMISTAS</a></li>
        <li><a href="#avales" data-toggle="tab">AVALES</a></li>
    </ul>

    <script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#tabs').tab();
    });
    </script>  
    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    </body>
  </html> 
  
<?php
	require('conexion.php');
  //recibimos y convertimos a mayuscula
  $nombreRecibido= strtoupper($_POST['nombre']);
  //convertimos la ñ minuscula a Ñ
  $nombre = str_replace("ñ", "Ñ", $nombreRecibido);
  echo "<div id='my-tab-content' class='tab-content'>";
  if($nombre<>'')
  {
    //PRESTAMOS
    $query="SELECT *
    FROM mutu_vencidos
    WHERE nombre LIKE replace('%$nombre%','Ñ','?')"; 
    $resultado=$mysqli->query($query);
    $valida=$resultado->fetch_assoc();

    $query2="SELECT *
    FROM ngu_atrasados
    WHERE nombre LIKE replace('%$nombre%','Ñ','?')"; 
    $resultado2=$mysqli->query($query2);
    $valida2=$resultado2->fetch_assoc();

    $query3="SELECT *
    FROM ngu_vencidos
    WHERE nombre LIKE replace('%$nombre%','Ñ','?')"; 
    $resultado3=$mysqli->query($query3);
    $valida3=$resultado3->fetch_assoc();
    
    //AVALES
    $query1="SELECT *
    FROM mutu_vencidos
    WHERE aval1 LIKE replace('%$nombre%','Ñ','?') OR aval2 LIKE replace('%$nombre%','Ñ','?') OR aval3 LIKE replace('%$nombre%','Ñ','?')"; 
    $resultado1=$mysqli->query($query1);
    $valida1=$resultado1->fetch_assoc();

    $query22="SELECT *
    FROM ngu_atrasados
    WHERE aval1 LIKE replace('%$nombre%','Ñ','?') OR aval2 LIKE replace('%$nombre%','Ñ','?') OR aval3 LIKE replace('%$nombre%','Ñ','?')"; 
    $resultado22=$mysqli->query($query22);
    $valida22=$resultado22->fetch_assoc();

    $query33="SELECT *
    FROM ngu_vencidos
    WHERE aval1 LIKE replace('%$nombre%','Ñ','?') OR aval2 LIKE replace('%$nombre%','Ñ','?') OR aval3 LIKE replace('%$nombre%','Ñ','?')"; 
    $resultado33=$mysqli->query($query33);
    $valida33=$resultado33->fetch_assoc();
    
    //---------------------------------------------------MOROSOS-----------------------------------------
    echo "<div class='tab-pane active' id='prestamistas'>";
    echo "<center><h1>-----------------------LISTA DE MOROSOS--------------------</h1></center></br></br>";    
    
    if($valida>0 OR $valida2>0 OR $valida3>0)
    {
    if($valida>0)
    {           
        $query="SELECT numero_credito, numero, REPLACE(nombre,'?','Ñ') nombre, fecha_desembolso, monto, REPLACE(aval1,'?','Ñ') aval1, REPLACE(aval2,'?','Ñ') aval2, REPLACE(aval3,'?','Ñ') aval3
    FROM mutu_vencidos
    WHERE nombre LIKE replace('%$nombre%','Ñ','?')"; 
    $resultado=$mysqli->query($query);   
    $contFilas=1;  
    
    echo "<center><font color='red'><h1>MUTUALIDAD-CREDITOS VENCIDOS</h1></font></center></br> 

    <table border='1' class='table table-striped table-bordered table-condensed'>
      <thead>
        <tr>
          <td><b>#</b></td>
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
              <td><b>$contFilas</b></td>
              <td>".$row['numero_credito']."</td>
              <td>".$row['numero']."</td>
              <td>".$row['nombre']."</td>
              <td>".$row['fecha_desembolso']."</td>
              <td>$".number_format($row['monto'], 2)."</td>              
              <td>".$row['aval1']."</td>
              <td>".$row['aval2']."</td>     
              <td>".$row['aval3']."</td>                       
            </tr>";
            $contFilas++;
          }
        echo "</tbody></table></br>";
      }

        //CREDITOS-NGU ATRASADOS
          if($valida2>0)
    {
          $query2="SELECT numero_credito, numero, REPLACE(nombre,'?','Ñ') nombre, fecha_desembolso, monto, REPLACE(aval1,'?','Ñ') aval1, REPLACE(aval2,'?','Ñ') aval2, REPLACE(aval3,'?','Ñ') aval3
    FROM ngu_atrasados
    WHERE nombre LIKE replace('%$nombre%','Ñ','?')"; 
    $resultado2=$mysqli->query($query2);    
    $contFilas=1;
      echo "<center><font color='red'><h1>NGU-CREDITOS ATRASADOS</h1></font></center></br> 
    <table border='1' class='table table-striped table-bordered table-condensed'>
      <thead>
        <tr>
          <td><b>#</b></td>
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
          while($row=$resultado2->fetch_assoc())
          {
          echo"<tr>
              <td><b>$contFilas</b></td>
              <td>".$row['numero_credito']."</td>
              <td>".$row['numero']."</td>
              <td>".$row['nombre']."</td>
              <td>".$row['fecha_desembolso']."</td>  
              <td>$".number_format($row['monto'], 2)."</td>
              <td>".$row['aval1']."</td>
              <td>".$row['aval2']."</td>     
              <td>".$row['aval3']."</td>                       
            </tr>";
            $contFilas++;
          }
        echo "</tbody></table></br>";
    }
    
        //CREDITOS-NGU VENCIDOS
        if($valida3>0)
    {
          $query3="SELECT numero_credito, numero, REPLACE(nombre,'?','Ñ') nombre, fecha_desembolso, monto, REPLACE(aval1,'?','Ñ') aval1, REPLACE(aval2,'?','Ñ') aval2, REPLACE(aval3,'?','Ñ') aval3
    FROM ngu_vencidos
    WHERE nombre LIKE replace('%$nombre%','Ñ','?')"; 
    $resultado3=$mysqli->query($query3); 
    $contFilas=1;   
    echo "<center><font color='red'><h1>NGU-CREDITOS VENCIDOS</h1></font></center></br> 
    <table border='1' class='table table-striped table-bordered table-condensed'>
      <thead>
        <tr>
          <td><b>#</b></td>
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
          while($row=$resultado3->fetch_assoc())
          {
          echo"<tr>
              <td><b>$contFilas</b></td>
              <td>".$row['numero_credito']."</td>
              <td>".$row['numero']."</td>
              <td>".$row['nombre']."</td>
              <td>".$row['fecha_desembolso']."</td>              
              <td>$".number_format($row['monto'], 2)."</td>
              <td>".$row['aval1']."</td>
              <td>".$row['aval2']."</td>     
              <td>".$row['aval3']."</td>                       
            </tr>";
            $contFilas++;
          }
        echo "</tbody></table></br>";        
    }
  }
  else
  {
    echo "</br></br><center><img src='../Imagenes/vacio.png'></br><h1>SIN RESULTADOS</h1></center>";
  }
    echo "</div>";
  
  //------------------------------------------------------AVALES----------------------------------------------
  echo "<div class='tab-pane' id='avales'>";
  echo "<center><h1>-----------------------LISTA DE AVALES--------------------</h1></center></br></br>";
if($valida1>0 OR $valida22>0 OR $valida33>0)
{
  if($valida1>0)
    {
          $query1="SELECT numero_credito, numero, REPLACE(nombre,'?','Ñ') nombre, fecha_desembolso, monto, REPLACE(aval1,'?','Ñ') aval1, REPLACE(aval2,'?','Ñ') aval2, REPLACE(aval3,'?','Ñ') aval3
    FROM mutu_vencidos
    WHERE aval1 LIKE replace('%$nombre%','Ñ','?') OR aval2 LIKE replace('%$nombre%','Ñ','?') OR aval3 LIKE replace('%$nombre%','Ñ','?')"; 
    $resultado1=$mysqli->query($query1);  
    $contFilas=1;  
      echo "<center><font color='yellow'><h1>MUTUALIDAD-CREDITOS VENCIDOS</h1></font></center></br> 

    <table border='1' class='table table-striped table-bordered table-condensed'>
      <thead>
        <tr>
          <td><b>#</b></td>
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
          while($row=$resultado1->fetch_assoc())
          {
          echo"<tr>
              <td><b>$contFilas</b></td>
              <td>".$row['numero_credito']."</td>
              <td>".$row['numero']."</td>
              <td>".$row['nombre']."</td>
              <td>".$row['fecha_desembolso']."</td>
              <td>$".number_format($row['monto'], 2)."</td>              
              <td>".$row['aval1']."</td>
              <td>".$row['aval2']."</td>     
              <td>".$row['aval3']."</td>                       
            </tr>";
            $contFilas++;
          }
        echo "</tbody></table></br>";
    }
    
        //CREDITOS-NGU ATRASADOS
        if($valida22>0)
    {
          $query22="SELECT numero_credito, numero, REPLACE(nombre,'?','Ñ') nombre, fecha_desembolso, monto, REPLACE(aval1,'?','Ñ') aval1, REPLACE(aval2,'?','Ñ') aval2, REPLACE(aval3,'?','Ñ') aval3
    FROM ngu_atrasados
    WHERE aval1 LIKE replace('%$nombre%','Ñ','?') OR aval2 LIKE replace('%$nombre%','Ñ','?') OR aval3 LIKE replace('%$nombre%','Ñ','?')"; 
    $resultado22=$mysqli->query($query22);    
    $contFilas=1;
      echo "<center><font color='orange'><h1>NGU-CREDITOS ATRASADOS</h1></font></center></br> 
    <table border='1' class='table table-striped table-bordered table-condensed'>
      <thead>
        <tr>
          <td><b>#</b></td>
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
          while($row=$resultado22->fetch_assoc())
          {
          echo"<tr>
              <td><b>$contFilas</b></td>
              <td>".$row['numero_credito']."</td>
              <td>".$row['numero']."</td>
              <td>".$row['nombre']."</td>
              <td>".$row['fecha_desembolso']."</td>  
              <td>$".number_format($row['monto'], 2)."</td>
              <td>".$row['aval1']."</td>
              <td>".$row['aval2']."</td>     
              <td>".$row['aval3']."</td>                       
            </tr>";
            $contFilas++;
          }
        echo "</tbody></table></br>";
    }
    
        //CREDITOS-NGU VENCIDOS
        if($valida33>0)
    {
          $query33="SELECT numero_credito, numero, REPLACE(nombre,'?','Ñ') nombre, fecha_desembolso, monto, REPLACE(aval1,'?','Ñ') aval1, REPLACE(aval2,'?','Ñ') aval2, REPLACE(aval3,'?','Ñ') aval3
    FROM ngu_vencidos
    WHERE aval1 LIKE replace('%$nombre%','Ñ','?') OR aval2 LIKE replace('%$nombre%','Ñ','?') OR aval3 LIKE replace('%$nombre%','Ñ','?')"; 
    $resultado33=$mysqli->query($query33);   
    $contFilas=1; 
    echo "<center><font color='orange'><h1>NGU-CREDITOS VENCIDOS</h1></font></center></br> 
    <table border='1' class='table table-striped table-bordered table-condensed'>
      <thead>
        <tr>
          <td><b>#</b></td>
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
          while($row=$resultado33->fetch_assoc())
          {
          echo"<tr>
              <td><b>$contFilas</b></td>
              <td>".$row['numero_credito']."</td>
              <td>".$row['numero']."</td>
              <td>".$row['nombre']."</td>
              <td>".$row['fecha_desembolso']."</td>              
              <td>$".number_format($row['monto'], 2)."</td>
              <td>".$row['aval1']."</td>
              <td>".$row['aval2']."</td>     
              <td>".$row['aval3']."</td>                       
            </tr>";
            $contFilas++;
          }
        echo "</tbody></table></br>";
    }
  }
  else
  {  
  echo "</br></br><center><img src='../Imagenes/vacio.png'></br><h1>SIN RESULTADOS</h1></center>";
  }
  echo "</div>";
}
else
{
  echo "<center><script language='javascript'>alert('TIENES QUE INTRODUCIR UN NOMBRE');</script></center>";
      echo'<script>window.location="buscar.php"</script>';
}
echo "</div></div>";
?>