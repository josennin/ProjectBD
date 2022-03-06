<!DOCTYPE html>
<?php 
	include('sqlServer/conexionP.php');
 ?>
<html>
<head>
	<title>Empleado CRUD Talleres Universales</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link href="images/tallerUni.ico" rel="icon">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div id="header">
		<a title="Inicio" href="index.html"><img src="images/logo1.png" alt="Inicio" /></a>
	</div>

	<div class="col-md-8 col-md-offset-2">
		
		<form method="POST" action="CRUDCliente.php" style="margin-left: 50%;">
			<h1>CRUD de la tabla Cliente</h1>
			<div class="form-group">
				<label>Cedula:</label>
				<input type="text" name="cedula" class="form-control" placeholder="Escriba la cedula"><br/>
			</div>
			
			<div class="form-group">
				<label>Nombre:</label>
				<input type="text" name="nombre" class="form-control" placeholder="Escriba el nombre"><br/>
			</div>
			
			<div class="form-group">
				<label>Apellidos:</label>
				<input type="text" name="apellidos" class="form-control" placeholder="Escriba el apellido"><br/>
			</div>
			
			<div class="form-group">
				<label>Email:</label>
				<input type="text" name="email" class="form-control" placeholder="Escriba el email"><br/>
			</div>

			<div class="form-group">
				<label>Teléfono:</label>
				<input type="text" name="telefono" class="form-control" placeholder="Escriba el telefono"><br/>
			</div>
			
			

			<div class="form-group">
				<label>Direccion:</label>
				<input type="text" name="direccion" class="form-control" placeholder="Escriba la direccion"><br/>
			</div>

			<div class="form-group">
				<input type="submit" name="insert" class="btn btn-warning" value="Ingresar Datos"><br/>
			</div>
		</form>
	</div>

		<?php 
	
	if (isset($_POST['insert'])) {
			$cedula=$_POST['cedula'];
			$nombre=$_POST['nombre'];
			$apellidos=$_POST['apellidos'];
     		$telefono=$_POST['telefono'];
			$email=$_POST['email'];
			$direccion=$_POST['direccion'];

			

			$sql="INSERT into CLIENTES(CEDULA_CLIENTE,NOMBRE_CLIENTE,APELLIDOS_CLIENTE,EMAIL_CLIENTE,TELEFONO_CLIENTE,DIRECCION_CLIENTE) values
			('$cedula','$nombre','$apellidos','$email','$telefono','$direccion');";

			$stmt = sqlsrv_query( $conn, $sql );
			if( $stmt === false) {
				echo "Error al insertar Cliente"+print_r( sqlsrv_errors(), true);
			}else{
				echo "Se agrego el Cliente con exito";
			}
			sqlsrv_free_stmt( $stmt);
	}




			
 ?>

 <div class="col-md-8 col-md-offset-2">
 	<table class="table table-bordered table-responsive" style="margin-left: 40%">
 		<tr align="center">
 			<td>Cedula</td>
 			<td>Nombre</td>
 			<td>Apellidos</td>
 			<td>Email</td>
 			<td>Teléfono</td>
 			<td>Direccion</td>
 			<td>Accion</td>
 			<td>Accion</td>
 		</tr>

 		<?php 
 			$sql="SELECT * from  CLIENTES;";
 			$ejecutar = sqlsrv_query($conn, $sql);
 			$i=0;
 			while ($fila=sqlsrv_fetch_array($ejecutar)) {
 				$cedula=$fila['CEDULA_CLIENTE'];
				$nombre=$fila['NOMBRE_CLIENTE'];
				$apellidos=$fila['APELLIDOS_CLIENTE'];
     			$email=$fila['EMAIL_CLIENTE'];
     			$telefono=$fila['TELEFONO_CLIENTE'];
				$direccion=$fila['DIRECCION_CLIENTE'];
 				$i++;

 			
 		 ?>

 		<tr align="center">
 			<td><?php echo "$cedula"; ?></td>
 			<td><?php echo "$nombre"; ?></td>
 			<td><?php echo "$apellidos"; ?></td>
 			<td><?php echo "$email"; ?></td>
 			<td><?php echo "$telefono"; ?></td>
 			<td><?php echo "$direccion"; ?></td>
 			<td><a href="CRUDCliente.php?editar=<?php echo $cedula; ?>">Editar</a></td>
 			<td><a href="CRUDCliente.php?borrar=<?php echo $cedula; ?>">Borrar</a></td>
 		</tr>

 		<?php 
 			}
 		 ?>

 	</table>
 </div>

 <?php 
 	if (isset($_GET['editar'])) {
 		include('CRUDClienteEditar.php');

 	}
  ?>

  <?php 
	if (isset($_GET['borrar'])) {
		$borrar_id=$_GET['borrar'];

		$borrar = "DELETE from CLIENTES where CEDULA_CLIENTE='$borrar_id';";
		$ejecutar = sqlsrv_query($conn, $borrar);

		if ($ejecutar) {
			echo "<script>alert('Datos han sido borrados')</script>";
			echo "<script>window.open('CRUDCliente.php','_self')</script>";

		}
	}

 ?>



</body>
</html>