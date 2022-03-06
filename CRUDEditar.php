<?php 
	if (isset($_GET['editar'])) {
		$editar_id=$_GET['editar'];

		$consulta = "SELECT * from empleados where cedula='$editar_id';";
		$ejecutar = sqlsrv_query($conn, $consulta);

		$fila=sqlsrv_fetch_array($ejecutar);

				$cedula=$fila['cedula'];
 				$nombre=$fila['nombre'];
 				$apellido1=$fila['apellido1'];
 				$apellido2=$fila['apellido2'];
 				$domicilio=$fila['domicilio'];

	}
 ?>
 <br/>

 <div class="col-md-8 col-md-offset-2">
		
		<form method="POST" action="" style="margin-left: 50%;">
			<div class="form-group">
				<label>cedula</label>
				<input type="text" name="cedula" class="form-control" value="<?php echo $cedula ?>"><br/>
			</div>
			
			<div class="form-group">
				<label>nombre</label>
				<input type="text" name="nombre" class="form-control" value="<?php echo $nombre ?>"><br/>
			</div>
			
			<div class="form-group">
				<label>apellido 1</label>
				<input type="text" name="apellido1" class="form-control" value="<?php echo $apellido1 ?>"><br/>
			</div>
			
			<div class="form-group">
				<label>apellido 2</label>
				<input type="text" name="apellido2" class="form-control" value="<?php echo $apellido2 ?>"><br/>
			</div>
			
			<div class="form-group">
				<label>domicilio</label>
				<input type="text" name="domicilio" class="form-control" value="<?php echo $domicilio ?>"><br/>
			</div>

			<div class="form-group">
				<input type="submit" name="actualizar" class="btn btn-warning" value="Actualizar Datos"><br/>
			</div>
		</form>
	</div>
<?php 
	if (isset($_POST['actualizar'])) {
	
				$actualizar_cedula=$_POST['cedula'];
 				$actualizar_nombre=$_POST['nombre'];
 				$actualizar_apellido1=$_POST['apellido1'];
 				$actualizar_apellido2=$_POST['apellido2'];
 				$actualizar_domicilio=$_POST['domicilio'];

		$consulta = "UPDATE empleados set cedula='$actualizar_cedula', nombre='$actualizar_nombre',
		apellido1='$actualizar_apellido1',apellido2='$actualizar_apellido2',domicilio='$actualizar_domicilio'
		where cedula=$editar_id;";
		
		$ejecutar = sqlsrv_query($conn, $consulta);

		if ($ejecutar) {
			echo "<script>alert('Datos actualizados')</script>";
			echo "<script>window.open('CRUD.php','_self')</script>";
		}

	}
 ?>