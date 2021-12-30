<?php
include 'connect.php';

$sql = "SELECT * FROM crud";
$result=mysqli_query($con,$sql);
$Data=Array();

if($result-> num_rows > 0){
	if(isset($_POST['displaySend'])){
		while($row = mysqli_fetch_assoc($result)){
			array_push($Data,$row);
		}	
		echo json_encode($Data);
	}
}else{
	echo '
	<div class="jumbotron">
	  <h1 class="display-4">No hay nada que mostrar!</h1>
  	  <p class="lead">Agrega datos por favor</p>
    </div>
	';
}
?>