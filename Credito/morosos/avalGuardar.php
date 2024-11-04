<?php	
	require('conexion.php');
	
	$tipo=$_POST['tipo'];
	$aval1=$_POST['aval1'];
	$aval2=$_POST['aval2'];
	$aval3=$_POST['aval3'];

if($aval1=='' AND $aval2=='' AND $aval3=='')
{
	echo "<center><img src='../Imagenes/error.jpg'></center>";
	echo "<a href='../index.php'><img src='../Imagenes/retorno.png'>REGRESAR</a>";
}
else
{
	if($tipo=='NGU_ATRASADOS')
{
    $numero_credito=$_POST['numero_credito'];

    $query2="UPDATE ngu_atrasados
    SET aval1= replace('$aval1','Ñ','?'),
    aval2= replace('$aval2','Ñ','?'),
    aval3= replace('$aval3','Ñ','?')
    WHERE numero_credito='$numero_credito'";
	$resultado2=$mysqli->query($query2);

		if($resultado2>0)
		{				
		echo "<center><img src='../Imagenes/atrasados.jpg'></center>";
		echo "<center><table border='0'>
		<tr>
		<td><a href='aval.php'><img src='../Imagenes/escribir.png'></br><b>CONTINUAR</b></a></td>
		<td><a href='../index.php'><img src='../Imagenes/retorno.png'></br><b>REGRESAR</b></a></td>
		</tr>
		</table></center>";	
		}
		else
		{				
		echo "<center><img src='../Imagenes/error.jpg'></center>";
		echo "<a href='../index.php'><img src='../Imagenes/retorno.png'>REGRESAR</a>";
		}

}
elseif($tipo=='NGU_VENCIDOS')
{
    $numero_credito=$_POST['numero_credito'];
    $query3="UPDATE ngu_vencidos
    SET aval1= replace('$aval1','Ñ','?'),
    aval2= replace('$aval2','Ñ','?'),
    aval3= replace('$aval3','Ñ','?')
    WHERE numero_credito='$numero_credito'";
	$resultado3=$mysqli->query($query3);

		if($resultado3>0)
		{				
		echo "<center><img src='../Imagenes/vencidos.jpg'></center>";
		echo "<center><table border='0'>
		<tr>
		<td><a href='aval.php'><img src='../Imagenes/escribir.png'></br><b>CONTINUAR</b></a></td>
		<td><a href='../index.php'><img src='../Imagenes/retorno.png'></br><b>REGRESAR</b></a></td>
		</tr>
		</table></center>";	
		}
		else
		{				
		echo "<center><img src='../Imagenes/error.jpg'></center>";
		echo "<a href='../index.php'><img src='../Imagenes/retorno.png'>REGRESAR</a>";
		}
  
}
}

?>
	<html>
	<head>
		<title>Guardar Avales</title>
	</head>	
	<body>
		
	</body>
</html>		
				