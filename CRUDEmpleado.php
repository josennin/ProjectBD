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
		
		<form method="POST" action="CRUDEmpleado.php" style="margin-left: 50%;">
			<h1>CRUD de la tabla Empleado</h1>
					
			<div class="form-group">
				<label>Nombre:</label>
				<input type="text" name="nombre" class="form-control" placeholder="Escriba nombre"><br/>
			</div>
			
			<div class="form-group">
				<label>Apellidos:</label>
				<input type="text" name="apellidos" class="form-control" placeholder="Escriba el apellido"><br/>
			</div>

			<div class="form-group">
				<label>Salario:</label>
				<input type="text" name="salario" class="form-control" placeholder="Escriba el salario"><br/>
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
				<input type="submit" name="insert" class="btn btn-warning" value="Ingresar Datos"><br/>
			</div>
		</form>
	</div>

		<?php 
	
	if (isset($_POST['insert'])) {
			
			$nombre=$_POST['nombre'];
			$apellidos=$_POST['apellidos'];
     		$telefono=$_POST['telefono'];
			$email=$_POST['email'];
			$salario=$_POST['salario'];

			

			$sql="INSERT into EMPLEADOS(NOMBRE_EMPLEADOS,APELLIDOS_EMPLEADOS,SALARIO_EMPLEADOS,EMAIL_EMPLEADOS,TELEFONO_EMPLEADOS) values
			('$nombre','$apellidos','$salario','$email','$telefono');";

			$stmt = sqlsrv_query( $conn, $sql );
			if( $stmt === false) {
				echo "Error al insertar Empleado"+print_r( sqlsrv_errors(), true);
			}else{
				echo "Se agrego el Empleado con exito";
			}
			sqlsrv_free_stmt( $stmt);
	}




			
 ?>

 <div class="col-md-8 col-md-offset-2">
 	<table class="table table-bordered table-responsive" style="margin-left: 40%">
 		<tr align="center">
 			<td>ID del Empleado</td>
 			<td>Nombre</td>
 			<td>Apellidos</td>
 			<td>Salario</td>
 			<td>Email</td>
 			<td>Teléfono</td>
 			<td>Accion</td>
 			<td>Accion</td>
 		</tr>

 		<?php 
 			$sql="SELECT * from  EMPLEADOS;";
 			$ejecutar = sqlsrv_query($conn, $sql);
 			$i=0;
 			while ($fila=sqlsrv_fetch_array($ejecutar)) {
 				$idEmpleado=$fila['ID_EMPLEADOS'];
				$nombre=$fila['NOMBRE_EMPLEADOS'];
				$apellidos=$fila['APELLIDOS_EMPLEADOS'];
				$salario=$fila['SALARIO_EMPLEADOS'];
				$email=$fila['EMAIL_EMPLEADOS'];
     			$telefono=$fila['TELEFONO_EMPLEADOS'];
				$i++;

 			
 		 ?>

 		<tr align="center">
 			<td><?php echo "$idEmpleado"; ?></td>
 			<td><?php echo "$nombre"; ?></td>
 			<td><?php echo "$apellidos"; ?></td>
 			<td><?php echo "$salario"; ?></td>
 			<td><?php echo "$email"; ?></td>
 			<td><?php echo "$telefono"; ?></td>
 			<td><a href="CRUDEmpleado.php?editar=<?php echo $idEmpleado; ?>">Editar</a></td>
 			<td><a href="CRUDEmpleado.php?borrar=<?php echo $idEmpleado; ?>">Borrar</a></td>
 		</tr>

 		<?php 
 			}
 		 ?>

 	</table>
 </div>

 <?php 
 	if (isset($_GET['editar'])) {
 		include('CRUDEmpleadoEditar.php');

 	}
  ?>

  <?php 
	if (isset($_GET['borrar'])) {
		$borrar_id=$_GET['borrar'];

		$borrar = "DELETE from EMPLEADOS where ID_EMPLEADOS='$borrar_id';";
		$ejecutar = sqlsrv_query($conn, $borrar);

		if ($ejecutar) {
			echo "<script>alert('Datos han sido borrados')</script>";
			echo "<script>window.open('CRUDEmpleado.php','_self')</script>";

		}
	}

 ?>



</body>
</html>