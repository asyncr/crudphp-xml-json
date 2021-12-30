<?php
	include 'connect.php';
	$sql = "SELECT * FROM crud";
	$result=mysqli_query($con,$sql);
	if($result-> num_rows > 0){
		if(isset($_POST['displaySend'])){
			$table = '<table class="table">
			<thead class="thead-dark">
			<tr>
				<th scope="col">id</th>
				<th scope="col">Nombre</th>
				<th scope="col">Email</th>
				<th scope="col">Telefono</th>
				<th scope="col">Puesto</th>
				<th scope="col">Operaciones</th>
			</tr>
			</thead>
			';
			// Contador diferente de la tabla de base de datos
			$number = 1;		

			while( $row = mysqli_fetch_assoc($result) ){
				// Obtener los datos de las columnas
				$id     = $row['id'];
				$nombre = $row['nombre'];
				$email  = $row['email'];
				$mobile = $row['mobile'];
				$place  = $row['place'];

				$table.= '<tr>
				<td scope="row"> '.$id.' </th>
				<td>'.$nombre.'</td>
				<td>'.$email.'</td>
				<td>'.$mobile.'</td>
				<td>'.$place.'</td>
				<td>	
					<botton class="btn btn-dark" onclick="GetDetails('.$id.')">Actualizar</botton>
					<botton class="btn btn-danger" onclick="DeleteUser('.$id.')">Eliminar</botton>
				</td>
			</tr>';
			$number++;
			}
			$table.='</table';
			echo $table;
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
