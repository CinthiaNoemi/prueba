﻿<?php
	
	
	$mysqli=new mysqli("localhost","root","","credito"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_error()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>