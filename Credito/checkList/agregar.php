<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>CHECKLIST</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.css">

    <style type="text/css">
      @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }

      .hero-unit{
        padding: 0;
        height: 30rem;
        border: 1px solid #ccc;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        gap: 10px;
      }

      .form-row {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
     }

      .form-row label {
        font-family: "Roboto", sans-serif;
        font-weight: 700;
        font-style: normal;
        margin: 10px;
        display: flex;
        align-items: center;
        text-transform: uppercase;
      }

      .form-row input[type="date"],
      .form-row input[type="text"],
      .form-row input[type="number"],
      .form-row input[type="tel"],
      .form-row select {
        margin-right: 10px;
        text-transform: uppercase;
      }

      .form-row input[type="checkbox"] {
        margin-left: 5px;
        margin-right: 5px;
      }

      .form-row label.checkbox-label {
        display: flex;
        align-items: center;
        margin-right: 10px;
      }

      .form-footer {
        display: flex;
        justify-content: flex-start;
        width: 200px;
      }

      .form-footer button {
        margin-left: 10px;
        background-color: blue;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
        border-radius: 5%;
      }

      .form-footer button:hover {
        background-color: darkblue;
      }

      #fecha-solicitud{
        margin-top: 10px;
      }

      #aval-opcion{
        width: 260px;
      }

      .aval-block{
        border: none;
        background-color: blue;
        height: 120px;
        width: 500px;
        display: flex;
      }
      

    </style>
</head>
<body background="../Imagenes/fondo.jpg">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                </a>
            <a class="brand"  href="../index.php">DEPTO CRÉDITO</a>

                <div class="nav-collapse collapse">
                    <ul class="nav">

                      <li class="active"><a href="../index.php">Inicio</a></li>
                        <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">MOROSOS<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="../morosos/formulario.php">SUBIR ARCHIVO</a></li>
                            <li><a href="../morosos/consultar.php">CONSULTAR MOROSOS</a></li>
                            <li><a href="../morosos/buscar.php">BUSCAR</a></li>
                            <li><a href="../morosos/aval.php">AGREGAR AVALES</a></li>
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

<?php
require("conexion.php");
//ejecutamos la consulta
$empresa=$_POST['txtEmpresa'];
$sql = "SELECT Numero, Nombre, Ahorro FROM socios WHERE numero='".$_POST['txtNumeroSocio']."'";
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

    echo "<div class='container'>
        <form class='hero-unit' method='post' action='#'>
        <div class='form-row'>
            <label for='fecha-solicitud'>Fecha de Solicitud:</label>
            <input type='date' id='fecha-solicitud' name='fecha-solicitud' required>
            <label class='checkbox-label'>
                <input type='checkbox' id='firma'>
                Firma
            </label>
            <label class='checkbox-label'>
                <input type='checkbox' id='huella'>
                Huella
            </label>
        </div>
        <div class='form-row'>
            <label for='nombre'>Nombre:</label>
            <input type='text' id='nombre' name='nombre' value='".$renglon['Nombre']."' required>
            <label for='numero-socio'>Número de Socio:</label>
            <input type='number' id='numero-socio' name='numero-socio' value='".$renglon['Numero']."' required>
            <label for='telefono'>Teléfono:</label>
            <input type='tel' id='telefono' name='telefono' required>
        </div>
        <div class='form-row'>
            <label for='ahorro'>Ahorro:</label>
            <input type='number' id='ahorro' name='ahorro' value='".$renglon['Ahorro']."' required>
            <label class='checkbox-label'>
                <input type='checkbox' id='ps1'>
                PS1
            </label>
            <label class='checkbox-label'>
                <input type='checkbox' id='ps2'>
                PS2
            </label>
            <label for='monto-total'>Monto Total:</label>
            <input type='number' id='monto-total' name='monto-total' required>
        </div>
        <div class='form-row'>
            <label class='checkbox-label'>
                <input type='checkbox' id='solicitud-elaborada'>
                Solicitud Elaborada
            </label>
            <label for='monto-solicitado'>Monto Solicitado:</label>
            <input type='number' id='monto-solicitado' name='monto-solicitado' required>
        </div>
        <div class='form-row'>
            <label class='checkbox-label'>
                <input type='checkbox' id='sin-credito'>
                Sin Crédito Promocional Vigente
            </label>
            <label class='checkbox-label'>
                <input type='checkbox' id='al-dia'>
                Está al Día
            </label>
            <label for='saldos'>Saldos:</label>
            <input type='number' id='saldos' name='saldos' required>
        </div>
        <div class='form-row'>
            <label for='gradualidad'>Gradualidad:</label>
            <input type='text' id='gradualidad' name='gradualidad' required>
            <label for='riesgo'>Riesgo:</label>
            <select id='riesgo' name='riesgo'>
                <option value='1'>Bajo</option>
                <option value='2'>Medio</option>
                <option value='3'>Alto</option>
            </select>
        </div>
        <div class='form-row'>
            <label for='aval-opcion'>Aval:</label>
            <select id='aval-opcion' name='otra-opcion'>
                <option value='Con Aval ≤ $5,000.00'>Con Aval ≤ $5,000.00</option>
                <option value='Con Aval > $5,000.00 o ≤ $10,000.00'>Con Aval > $5,000.00 o ≤ $10,000.00</option>
                <option value='Propiedad > $10,000.00'>Propiedad > $10,000.00</option>
            </select>

            
            <div class='aval-block'>
                <div class='mini-container'>
                  <label>Documentos</label>
                  <input type='checkbox' id='ine' name='documento'>
                  <label for='ine'>INE</label><br>
                  <input type='checkbox' id='cdom' name='documento'>
                  <label for='cdom'>C.DOM.</label>
                </div>
        
                <div class='mini-container'>
                  <label>AVAL O AVALES</label>
                  <input type='checkbox' id='socio' name='avales'>
                  <label for='socio'>Socio</label>
                  <input type='number' class='input-number' placeholder='#'>
                  <br>
                  <input type='checkbox' id='ine-avales' name='avales'>
                  <label for='ine-avales'>INE</label><br>
                  <input type='checkbox' id='cd-avales' name='avales'>
                  <label for='cd-avales'>C.DOM</label><br>
                  <input type='checkbox' id='cing-avales' name='avales'>
                  <label for='cing-avales'>C.ING.</label>
                </div>
            </div>
        </div>
        

        <div class='form-footer'>
            <button type='submit'>Agregar Solicitud</button>
        </div>     
       </form>
    </div>";
}
}
?>
    <script src="comboAgregar.js"></script>
    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>

