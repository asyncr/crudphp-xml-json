<?php
include 'connect.php';

$Data=Array();
$sql = "SELECT * FROM crud";
$result= mysqli_query($con,$sql);

if($result-> num_rows > 0){
	if(isset($_POST['displaySend'])){
		$xml = new DOMDocument("1.0"); 
		$xml->formatOutput=true;
		$fitness=$xml->createElement("empleados");
		$xml->appendChild($fitness);
		
		while($row=mysqli_fetch_array($result)){
			$empleado=$xml->createElement("empleado");
			$fitness->appendChild($empleado);

			$uid=$xml->createElement("id", $row['id']);
			$empleado->appendChild($uid);

			$uname=$xml->createElement("nombre", $row['nombre']);
			$empleado->appendChild($uname);

			$email=$xml->createElement("email", $row['email']);
			$empleado->appendChild($email);

			$mobile=$xml->createElement("mobile", $row['mobile']);	
			$empleado->appendChild($mobile);

			$place=$xml->createElement("place", $row['place']);
			$empleado->appendChild($place);

		}
		echo "<xmp>".$xml->saveXML()."</xmp>";
		// $xml->save("report.xml");
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