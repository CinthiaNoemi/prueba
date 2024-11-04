<?php
/******** CONECTAR CON BASE DE DATOS **************** */ 
   $conexion = mysqli_connect("localhost","root","");
   if (!$conexion){die('ERROR DE CONEXION CON MYSQL: ' . mysqli_error($conexion));}
/* ********************************************** */

/********* CONECTA CON LA BASE DE DATOS  **************** */
   $database = mysqli_select_db($conexion, "credito");
   if (!$database){die('ERROR CONEXION CON BD: '.mysqli_error($conexion));}
?>