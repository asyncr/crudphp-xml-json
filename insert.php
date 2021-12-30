<?php
	include 'connect.php';


	extract($_POST);

	// Insercion de datos en la base de datos
	if(isset($_POST['nameSend']) && isset($_POST['emailSend']) && isset($_POST['mobileSend']) && isset($_POST['placeSend'])){
		$sql = "INSERT INTO crud (nombre , email , mobile ,place ) VALUES (
			'$nameSend','$emailSend','$mobileSend','$placeSend'
		)";
		$result=mysqli_query($con,$sql);
	}else{
		
	}

?>