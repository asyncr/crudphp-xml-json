<?php
	include 'connect.php';

	if(isset($_POST['deletesend'])){
		$unique= $_POST['deletesend'];

		$sql = "DELETE FROM crud WHERE id=$unique";
		$result = mysqli_query($con,$sql);
		
	}
?>