<!DOCTYPE html>
<?php 
	include('sqlServer/conexionP.php');
 ?>
<html>
<head>
	<title>Sucursal CRUD Talleres Universales</title>
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
		
		<form method="POST" action="CRUDSucursal.php" style="margin-left: 50%;">
			<h1>CRUD de la tabla Sucursal</h1>
						
			<div class="form-group">
				<label>Direccion:</label>
				<input type="text" name="direccion" class="form-control" placeholder="Escriba la direccion"><br/>
			</div>
			
			<div class="form-group">
				<label>Telefono:</label>
				<input type="text" name="telefono" class="form-control" placeholder="Escriba el telefono"><br/>
			</div>
			
			<div class="form-group">
				<label>Cantidad de peronal:</label>
				<input type="text" name="cantPersonal" class="form-control" placeholder="Escriba la cantidad de peronal"><br/>
			</div>
			
			<div class="form-group">
				<label>Precio de renta:</label>
				<input type="text" name="precioRenta" class="form-control" placeholder="Escriba el precio de renta"><br/>
			</div>

			<div class="form-group">
				<input type="submit" name="insert" class="btn btn-warning" value="Ingresar Datos"><br/>
			</div>
		</form>
	</div>

		<?php 
	
	if (isset($_POST['insert'])) {
			//$numSucursal=$_POST['numSucursal'];
			$direccion=$_POST['direccion'];
			$telefono=$_POST['telefono'];
			$cantPersonal=$_POST['cantPersonal'];
			$precioRenta=$_POST['precioRenta'];

			$sql="INSERT into SUCURSAL(DIRECCION_SURCUSAL,TELEFONO_SUCURSAL,CANT_PERSONAL,PRECIO_RENTA) values
			('$direccion','$telefono','$cantPersonal','$precioRenta');";

			$stmt = sqlsrv_query( $conn, $sql );
			if( $stmt === false) {
				echo "Error al insertar Sucursal"+print_r( sqlsrv_errors(), true);
			}else{
				echo "Se agrego la Sucursal con exito";
			}
			sqlsrv_free_stmt( $stmt);
	}
			
 ?>

 <div class="col-md-8 col-md-offset-2">
 	<table class="table table-bordered table-responsive" style="margin-left: 40%">
 		<tr align="center">
 			<td>Numero de sucursal</td>
 			<td>Direccion</td>
 			<td>Telefono</td>
 			<td>Cantidad de peronal</td>
 			<td>Precio de renta</td>
 			<td>Accion</td>
 			<td>Accion</td>
 		</tr>

 		<?php 
 			$sql="SELECT * from  sucursal;";
 			$ejecutar = sqlsrv_query($conn, $sql);
 			$i=0;
 			while ($fila=sqlsrv_fetch_array($ejecutar)) {
 				$numSucursal=$fila['NUM_SURCUSAL'];
				$direccion=$fila['DIRECCION_SURCUSAL'];
				$telefono=$fila['TELEFONO_SUCURSAL'];
				$cantPersonal=$fila['CANT_PERSONAL'];
				$precioRenta=$fila['PRECIO_RENTA'];
 				$i++;

 			
 		 ?>

 		<tr align="center">
 			<td><?php echo "$numSucursal"; ?></td>
 			<td><?php echo "$direccion"; ?></td>
 			<td><?php echo "$telefono"; ?></td>
 			<td><?php echo "$cantPersonal"; ?></td>
 			<td><?php echo "$precioRenta"; ?></td>
 			<td><a href="CRUDSucursal.php?editar=<?php echo $numSucursal; ?>">Editar</a></td>
 			<td><a href="CRUDSucursal.php?borrar=<?php echo $numSucursal; ?>">Borrar</a></td>
 		</tr>

 		<?php 
 			}
 		 ?>

 	</table>
 </div>

 <?php 
 	if (isset($_GET['editar'])) {
 		include('CRUDSucursalEditar.php');

 	}
  ?>

  <?php 
	if (isset($_GET['borrar'])) {
		$borrar_id=$_GET['borrar'];

		$borrar = "DELETE from SUCURSAL where NUM_SURCUSAL='$borrar_id';";
		$ejecutar = sqlsrv_query($conn, $borrar);

		if ($ejecutar) {
			echo "<script>alert('Datos han sido borrados')</script>";
			echo "<script>window.open('CRUDSucursal.php','_self')</script>";

		}
	}

 ?>



</body>
</html>