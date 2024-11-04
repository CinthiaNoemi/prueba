
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
    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    </BODY>
</HTML>

<?php
//LEEMOS EL NOMBRE DEL ARCHIVO
$nombre=basename($_FILES['fichero_usuario']['name']);
//GESTIONAMOS AL PROCESO EN BASE AL NOMBRE DEL ARCHIVO
if($nombre=='MUTU-VENCIDOS.csv' OR $nombre=='NGU-ATRASADOS.csv' OR $nombre=='NGU-VENCIDOS.csv'){
    //PARAMETROS DE RAIZ
    $dir_subida = 'C:/ArchivosMorosos/';
    $fichero_subido = $dir_subida . basename($_FILES['fichero_usuario']['name']);
    //PARAMETROS DE CONEXION
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $database = 'credito';

    if($nombre=='MUTU-VENCIDOS.csv'){
      $table = 'mutu_vencidos2';
      mutualidad($fichero_subido, $db_host, $db_user, $db_pass, $database, $table);
    }
    elseif($nombre=='NGU-ATRASADOS.csv'){
      $table = 'ngu_atrasados2';
      atrasados($fichero_subido, $db_host, $db_user, $db_pass, $database, $table);
    }
    elseif($nombre=='NGU-VENCIDOS.csv'){
      $table = 'ngu_vencidos22';
      vencidos($fichero_subido, $db_host, $db_user, $db_pass, $database, $table);          
    }
    else{
      echo "<center><script language='javascript'>alert('NOMBRE DE ARCHIVO INCORRECTO');</script></center>";
      echo'<script>window.location="formulario.php"</script>';
    }
}
?>
<?php
function mutualidad($fichero_subido, $db_host, $db_user, $db_pass, $database, $table){//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<MUTUALIDAD>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)){ //CARGA DE ARCHIVO CARGADO
        //POSIBLES SITUACIONES
        $conex = mysqli_connect($db_host, $db_user, $db_pass);
        if (!$conex) die("Can't connect to database");
        if (!mysqli_select_db($conex, $database)) die("Database doesn't exist");

        $handle = fopen("C:\ArchivosMorosos\MUTU-VENCIDOS.csv", "r");

        if( $handle ){//CARGA DE ARCHIVO EN CARPETA RAIZ
            //VACIAMOS LA TABLA ANTES DE HACER LA INSERCION DE DATOS
            require('conexion.php');  
            $vaciar="TRUNCATE $table";
            $resultado_vaciar=$mysqli->query($vaciar);
            //VALIDAMOS SI SE VACIO CORRECTAMENTE LA TABLA
            if($resultado_vaciar>0){//SI SE VACIO SE CONTINUAMOS
            //AHORA SI INSERTAMOS LOS DATOS
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE){
                    $import = "INSERT INTO $table (numero_credito, numero, nombre, fecha_desembolso, monto) VALUES ('$data[0]', '$data[1]'-100000000, '$data[2]', '$data[3]', '$data[4]')";
                    mysqli_query($conex, $import) or die(mysqli_error($conex));
                  }
                          //------------------------------------------------INICIA PROCESO DE FILTRADO---------------------------------------
        require('conexion.php');
        //RESPALDAMOS LA INFORMACION PROXIMA A ELIMINAR EN LA BD
        $respaldo="INSERT INTO respaldo_morosos (numero_credito, numero, nombre, fecha_desembolso, monto, aval1, aval2, aval3, fecha, tipo)
        SELECT mv.`numero_credito`, mv.`numero`, mv.`nombre`, mv.`fecha_desembolso`, mv.`monto`, mv.`aval1`, mv.`aval2`, mv.`aval3`, now(), 'MUTU-VENCIDOS'
        FROM `mutu_vencidos` mv LEFT JOIN `mutu_vencidos2` mv2
        ON mv.`numero_credito`=mv2.`numero_credito`
        WHERE mv2.`numero_credito` IS NULL";
        $resultado_respaldo=$mysqli->query($respaldo);
        //LIMPIAMOS LA TABLA DE POSIBLE BASURA AGREGADA
        $limpiar_tablas="DELETE FROM mutu_vencidos2 WHERE numero<0";
        $resultado_limpiar=$mysqli->query($limpiar_tablas);
        //ELIMINAMOS A LOS SOCIOS QUE NO APARECEN EN LA NUEVA LISTA
        $depurar_socios="DELETE mv
        FROM `mutu_vencidos` mv LEFT JOIN `mutu_vencidos2` mv2
        ON mv.`numero_credito`=mv2.`numero_credito`
        WHERE mv2.`numero_credito` IS NULL";
        $resultado_depurar=$mysqli->query($depurar_socios);
        //VALIDAMOS QUE LOS PROCESOS CONCLUYERAN SATISFACTORIAMENTE
        if($resultado_respaldo<1){
        echo "<center><script language='javascript'>alert('ERROR AL RESPALDAR MUTU-VENCIDOS');</script></center>";
        }
        if($resultado_limpiar<1){
        echo "<center><script language='javascript'>alert('NO SE PUDO LIMPIAR LAS TABLAS VENCIDAS MUTUALIDAD');</script></center>";
        }
        if($resultado_depurar<1){
        echo "<center><script language='javascript'>alert('NO SE PUDO DEPURAR LOS SOCIOS VENCIDOS MUTUALIDAD');</script></center>";
        }
        fclose($handle); 
        }//FIN VACIADO DE TABLAS
        else{
        echo "<center><script language='javascript'>alert('NO SE PUDO VACIAR LA TABLA DE CREDITOS VENCIDOS MUTUALIDAD');</script></center>";
        }

      }//FIN CARGA ARCHIVO CARPETA RAIZ
        //IMPRIMIR MENSAJE DE CARGA EXITOSA
        echo "<center><h2>ARCHIVO CARGADO EXITOSAMENTE!!</h2><img src='../Imagenes/correcto.png'></center>\n";
        echo "</br></br></br><center><a href='../index.php'><img src='../Imagenes/retorno.png'><h3>Regresar</h3></a></center>";
    }//FIN CARGA DE ARCHIVO

    else {//MENSAJE DE ERROR
    echo "<center><h2>HUBO UN ERROR EN LA CARGA DEL ARCHIVO</h2><img src='../Imagenes/incorrecto.png'></center>\n";
    echo "</br></br></br><center><a href='../index.php'><img src='../Imagenes/retorno.png'><h3>Regresar</h3></a></center>";
    }
}//FIN FUNCION MUTUALIDAD

function atrasados($fichero_subido, $db_host, $db_user, $db_pass, $database, $table){//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<NGU-ATRASADOS>>>>>>>>>>>>>>>>>>>>>>>>>
          
          if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido))
          {
            $conex = mysqli_connect($db_host, $db_user, $db_pass);
            if (!$conex) die("Can't connect to database");
            if (!mysqli_select_db($conex, $database)) die("Database doesn't exist");
            $handle = fopen("C:\ArchivosMorosos\NGU-ATRASADOS.csv", "r");

            if( $handle ){
                //VACIAMOS LA TABLA ANTES DE HACER LA INSERCION DE DATOS
                require('conexion.php');  
                $vaciar="TRUNCATE $table";
                $resultado_vaciar=$mysqli->query($vaciar);
                //VALIDAMOS SI SE VACIO CORRECTAMENTE LA TABLA
                if($resultado_vaciar>0){//INSERTAMOS LOS DATOS
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE){
                      $import = "INSERT INTO $table (numero_credito, numero, nombre, fecha_desembolso, monto) VALUES ('$data[0]', '$data[1]'-100000000, '$data[2]', '$data[3]', '$data[4]')";
                      mysqli_query($conex, $import) or die(mysqli_error($conex));
                    }
                       //------------------------------------------------INICIA PROCESO DE FILTRADO---------------------------------------
                      require('conexion.php');
                      //RESPALDAMOS LA INFORMACION PROXIMA A ELIMINAR EN LA BD
                      $respaldo="INSERT INTO respaldo_morosos (numero_credito, numero, nombre, fecha_desembolso, monto, aval1, aval2, aval3, fecha, tipo)
                      SELECT a.`numero_credito`, a.`numero`, a.`nombre`, a.`fecha_desembolso`, a.`monto`, a.`aval1`, a.`aval2`, a.`aval3`, now(), 'NGU-ATRASADOS'
                      FROM `ngu_atrasados` a LEFT JOIN `ngu_atrasados2` a2
                      ON a.`numero_credito`=a2.`numero_credito`
                      WHERE a2.`numero_credito` IS NULL";
                      $resultado_respaldo=$mysqli->query($respaldo);
                      //ELIMINAMOS A LOS SOCIOS QUE NO APARECEN EN LA NUEVA LISTA
                      $depurar_socios="DELETE a
                      FROM `ngu_atrasados` a LEFT JOIN `ngu_atrasados2` a2
                      ON a.`numero_credito`=a2.`numero_credito`
                      WHERE a2.`numero_credito` IS NULL";
                      $resultado_depurar=$mysqli->query($depurar_socios);
                      //AGREGAMOS A LOS NUEVOS MOROSOS
                      $agregarNuevosSocios="INSERT INTO ngu_atrasados (numero_credito, numero, nombre, fecha_desembolso, monto, fecha)
                      SELECT a2.numero_credito, a2.numero, a2.nombre, a2.fecha_desembolso, a2.monto, now()
                      FROM `ngu_atrasados2` a2 LEFT JOIN `ngu_atrasados` a
                      ON a2.`numero_credito`=a.`numero_credito`
                      WHERE a.`numero_credito` IS NULL";
                      $resultado_agregar=$mysqli->query($agregarNuevosSocios);
                      //LIMPIAMOS LA TABLA DE POSIBLE BASURA AGREGADA
                      $limpiar_tablas="DELETE FROM ngu_atrasados WHERE numero<0";
                      $resultado_limpiar=$mysqli->query($limpiar_tablas);
                      //REMPLAZAMOS LOS CARACTERES INVALIDOS
                      $formato="UPDATE `ngu_atrasados` SET
                      nombre=replace(nombre,'Ñ','?')";
                      $resultado_formato=$mysqli->query($formato);

                      //VALIDAMOS QUE LOS PROCESOS CONCLUYERAN SATISFACTORIAMENTE
                      if($resultado_limpiar<1)
                        {
                          echo "<center><script language='javascript'>alert('NO SE PUDO LIMPIAR LAS TABLAS ATRASADAS');</script></center>";
                        }
                      if($resultado_depurar<1)
                        {
                          echo "<center><script language='javascript'>alert('NO SE PUDO DEPURAR LOS SOCIOS ATRASADOS');</script></center>";
                        }
                      if($resultado_agregar<1)
                        {
                          echo "<center><script language='javascript'>alert('NO SE PUDO AGREGAR A LOS NUEVOS ATRASADOS');</script></center>";
                        }
                      if($resultado_respaldo<1)
                        {
                          echo "<center><script language='javascript'>alert('ERROR AL RESPALDAR NGU-ATRASADOS');</script></center>";
                        }
                      if($resultado_formato<1)
                        {
                          echo "<center><script language='javascript'>alert('ERROR AL AGREGAR FORMATO NGU-ATRASADOS');</script></center>";
                        }
                  }//FIN INSERCION DE DATOS
                else{
                      echo "<center><script language='javascript'>alert('NO SE PUDO VACIAR LA TABLA DE CREDITOS VENCIDOS');</script></center>";
                    }
                fclose($handle);
              }//FIN DE FILTRADOS
              //IMPRIMIR MENSAJE DE CARGA EXITOSA
              echo "<center><h2>ARCHIVO CARGADO EXITOSAMENTE!!</h2><img src='../Imagenes/correcto.png'></center>\n";
              echo "</br></br></br><center><a href='../index.php'><img src='../Imagenes/retorno.png'><h3>Regresar</h3></a></center>";
          }//FIN DE CARGA
          else{
                echo "<center><h2>HUBO UN ERROR EN LA CARGA DEL ARCHIVO</h2><img src='../Imagenes/incorrecto.png'></center>\n";
                echo "</br></br></br><center><a href='../index.php'><img src='../Imagenes/retorno.png'><h3>Regresar</h3></a></center>";
              }
}// FIN FUNCION ATRASADOS
function vencidos($fichero_subido, $db_host, $db_user, $db_pass, $database, $table){//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<NGU-VENCIDOS>>>>>>>>>>>>>>>>>>>>>>>
  
  
  if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)){
        echo "<center><h2>ARCHIVO CARGADO EXITOSAMENTE!!</h2><img src='../Imagenes/correcto.png'></center>\n";
        echo "</br></br></br><center><a href='../index.php'><img src='../Imagenes/retorno.png'><h3>Regresar</h3></a></center>";

        $conex= mysqli_connect($db_host, $db_user, $db_pass);
        if (!$conex) die("Can't connect to database");
        if (!mysqli_select_db($conex, $database)) die("Database doesn't exist");

        $handle = fopen("C:\ArchivosMorosos\NGU-VENCIDOS.csv", "r");
        if( $handle ){
            //VACIAMOS LA TABLA ANTES DE HACER LA INSERCION DE DATOS
            require('conexion.php');  
            $vaciar="TRUNCATE $table";
            $resultado_vaciar=$mysqli->query($vaciar);
            //VALIDAMOS SI SE VACIO CORRECTAMENTE LA TABLA
            if($resultado_vaciar>0){ //AHORA SI INSERTAMOS LOS DATOS
                  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE){
                        $import = "INSERT INTO $table (numero_credito, numero, nombre, fecha_desembolso, monto) VALUES ('$data[0]', '$data[1]'-100000000, '$data[2]', '$data[3]', '$data[4]')";
                        mysqli_query($conex, $import) or die(mysqli_error($conex));      
                      }
              //------------------------------------------------INICIA PROCESO DE FILTRADO---------------------------------------
              require('conexion.php');
              //RESPALDAMOS LA INFORMACION PROXIMA A ELIMINAR EN LA BD
              $respaldo="INSERT INTO respaldo_morosos (numero_credito, numero, nombre, fecha_desembolso, monto, aval1, aval2, aval3, fecha, tipo)
              SELECT v.numero_credito, v.numero, v.nombre, v.fecha_desembolso, v.monto, v.aval1, v.aval2, v.aval3, now(), 'NGU-VENCIDOS'
              FROM `ngu_vencidos` v LEFT JOIN `ngu_vencidos22` v2
              ON v.`numero_credito`=v2.`numero_credito`
              WHERE v2.`numero_credito` IS NULL";
              $resultado_respaldo=$mysqli->query($respaldo);
              //ELIMINAMOS A LOS SOCIOS QUE NO APARECEN EN LA NUEVA LISTA
              $depurar_socios="DELETE v
              FROM `ngu_vencidos` v LEFT JOIN `ngu_vencidos22` v2
              ON v.`numero_credito`=v2.`numero_credito`
              WHERE v2.`numero_credito` IS NULL";
              $resultado_depurar=$mysqli->query($depurar_socios);
              //AGREGAMOS A LOS NUEVOS MOROSOS
              $agregarNuevosSocios="INSERT INTO ngu_vencidos (numero_credito, numero, nombre, fecha_desembolso, monto, fecha)
              SELECT a2.numero_credito, a2.numero, a2.nombre, a2.fecha_desembolso, a2.monto, now()
              FROM `ngu_vencidos22` a2 LEFT JOIN `ngu_vencidos` a
              ON a2.`numero_credito`=a.`numero_credito`
              WHERE a.`numero_credito` IS NULL";
              $resultado_agregar=$mysqli->query($agregarNuevosSocios);
              //LIMPIAMOS LA TABLA DE POSIBLE BASURA AGREGADA
              $limpiar_tablas="DELETE FROM ngu_vencidos WHERE numero<0";
              $resultado_limpiar=$mysqli->query($limpiar_tablas);
              //REMPLAZAMOS LOS CARACTERES INVALIDOS
              $formato="UPDATE `ngu_vencidos` SET
              nombre=replace(nombre,'Ñ','?')";
              $resultado_formato=$mysqli->query($formato);
              $migracionAvales="UPDATE `ngu_vencidos` v INNER JOIN `ngu_atrasados` a
                                ON  v.numero_credito = a.numero_credito
                                SET v.aval1 = a.aval1,
                                    v.aval2 = a.aval2,
                                    v.aval3 = a.aval3
                                WHERE v.numero_credito = a.numero_credito";
              $resultadoMigracionAvales=$mysqli->query($migracionAvales);

              //VALIDAMOS QUE LOS PROCESOS CONCLUYERAN SATISFACTORIAMENTE
              if($resultado_limpiar<1){
                    echo "<center><script language='javascript'>alert('NO SE PUDO LIMPIAR LAS TABLAS');</script></center>";
                  }
              if($resultado_depurar<1){
                    echo "<center><script language='javascript'>alert('NO SE PUDO DEPURAR LOS SOCIOS VENCIDOS');</script></center>";
                  }
              if($resultado_agregar<1){
                    echo "<center><script language='javascript'>alert('NO SE PUDO AGREGAR A LOS NUEVOS MOROSOS');</script></center>";
                  }
              if($resultado_respaldo<1){
                     echo "<center><script language='javascript'>alert('ERROR AL RESPALDAR NGU-VENCIDOS');</script></center>";
                  }
              if($resultado_formato<1){
                    echo "<center><script language='javascript'>alert('ERROR AL AGREGAR FORMATO NGU-VENCIDOS');</script></center>";
                  }
              if($resultadoMigracionAvales<1){
                  echo "<center><script language='javascript'>alert('ERROR MIGRAR AVALES NGU-ATRASADOS A NGU-VENCIDOS');</script></center>";
                  }
          }//FIN INSERCION DE DATOS
          else{
                 echo "<center><script language='javascript'>alert('NO SE PUDO VACIAR LA TABLA DE CREDITOS VENCIDOS');</script></center>";
              }
        fclose($handle);
      }//FIN FILTROS
              //IMPRIMIR MENSAJE DE CARGA EXITOSA
              echo "<center><h2>ARCHIVO CARGADO EXITOSAMENTE!!</h2><img src='../Imagenes/correcto.png'></center>\n";
              echo "</br></br></br><center><a href='../index.php'><img src='../Imagenes/retorno.png'><h3>Regresar</h3></a></center>";
        }//FIN CARGA
        else{
              echo "<center><h2>HUBO UN ERROR EN LA CARGA DEL ARCHIVO</h2><img src='../Imagenes/incorrecto.png'></center>\n";
              echo "</br></br></br><center><a href='../index.php'><img src='../Imagenes/retorno.png'><h3>Regresar</h3></a></center>";
            }
      }//FIN FUNCION VENCIDOS
?>