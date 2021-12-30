<?php


// Parametros para la conexion a la BD Local
$con = new mysqli(
	'localhost','root','','empleados'
);


if(!$con){
	die(mysqli_error($con));
}
?>