<!DOCTYPE html>
<?php 
	include('sqlServer/conexion.php');
 ?>
<html>
<head>
	<title>CRUD php y SQL SERVER</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link href="images/tallerUni.ico" rel="icon">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="col-md-8 col-md-offset-2">
		
		<form method="POST" action="CRUD.php" style="margin-left: 50%;">
			<h1>CRUD con php y sql</h1>
			<div class="form-group">
				<label>cedula</label>
				<input type="text" name="cedula" class="form-control" placeholder="Escriba su cedula"><br/>
			</div>
			
			<div class="form-group">
				<label>nombre</label>
				<input type="text" name="nombre" class="form-control" placeholder="Escriba su nombre"><br/>
			</div>
			
			<div class="form-group">
				<label>apellido 1</label>
				<input type="text" name="apellido1" class="form-control" placeholder="Escriba su apellido 1"><br/>
			</div>
			
			<div class="form-group">
				<label>apellido 2</label>
				<input type="text" name="apellido2" class="form-control" placeholder="Escriba su apellido 2"><br/>
			</div>
			
			<div class="form-group">
				<label>domicilio</label>
				<input type="text" name="domicilio" class="form-control" placeholder="Escriba su domicilio"><br/>
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
			$apellido1=$_POST['apellido1'];
			$apellido2=$_POST['apellido2'];
			$domicilio=$_POST['domicilio'];

			$sql="INSERT into empleados(cedula,nombre,apellido1,apellido2,domicilio) values
			('$cedula','$nombre','$apellido1','$apellido2','$domicilio');";

			$stmt = sqlsrv_query( $conn, $sql );
			if( $stmt === false) {
				echo "Error al insertar emplado"+print_r( sqlsrv_errors(), true);
			}else{
				echo "Se agrego el empleado";
			}
			sqlsrv_free_stmt( $stmt);
	}
			
 ?>

 <div class="col-md-8 col-md-offset-2">
 	<table class="table table-bordered table-responsive" style="margin-left: 40%">
 		<tr align="center">
 			<td>cedula</td>
 			<td>nombre</td>
 			<td>apellido1</td>
 			<td>apellido2</td>
 			<td>domicilio</td>
 			<td>Accion</td>
 			<td>Accion</td>
 		</tr>

 		<?php 
 			$sql="SELECT * from  empleados;";
 			$ejecutar = sqlsrv_query($conn, $sql);
 			$i=0;
 			while ($fila=sqlsrv_fetch_array($ejecutar)) {
 				$cedula=$fila['cedula'];
 				$nombre=$fila['nombre'];
 				$apellido1=$fila['apellido1'];
 				$apellido2=$fila['apellido2'];
 				$domicilio=$fila['domicilio'];
 				$i++;

 			
 		 ?>

 		<tr align="center">
 			<td><?php echo "$cedula"; ?></td>
 			<td><?php echo "$nombre"; ?></td>
 			<td><?php echo "$apellido1"; ?></td>
 			<td><?php echo "$apellido2"; ?></td>
 			<td><?php echo "$domicilio"; ?></td>
 			<td><a href="CRUD.php?editar=<?php echo $cedula; ?>">Editar</a></td>
 			<td><a href="CRUD.php?borrar=<?php echo $cedula; ?>">Borrar</a></td>
 		</tr>

 		<?php 
 			}
 		 ?>

 	</table>
 </div>

 <?php 
 	if (isset($_GET['editar'])) {
 		include('CRUDEditar.php');

 	}
  ?>

  <?php 
	if (isset($_GET['borrar'])) {
		$borrar_id=$_GET['borrar'];

		$borrar = "DELETE from empleados where cedula='$borrar_id';";
		$ejecutar = sqlsrv_query($conn, $borrar);

		if ($ejecutar) {
			echo "<script>alert('Datos han sido borrados')</script>";
			echo "<script>window.open('CRUD.php','_self')</script>";

		}
	}

 ?>



</body>
</html>