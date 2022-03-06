<?php 
	if (isset($_GET['editar'])) {
		$editar_id=$_GET['editar'];

		$consulta = "SELECT * from CLIENTES where CEDULA_CLIENTE='$editar_id';";
		$ejecutar = sqlsrv_query($conn, $consulta);

		$fila=sqlsrv_fetch_array($ejecutar);

				$cedula=$fila['CEDULA_CLIENTE'];
				$nombre=$fila['NOMBRE_CLIENTE'];
				$apellidos=$fila['APELLIDOS_CLIENTE'];
     			$email=$fila['EMAIL_CLIENTE'];
     			$telefono=$fila['TELEFONO_CLIENTE'];
				$direccion=$fila['DIRECCION_CLIENTE'];

	}
 ?>
 <br/>

 <div class="col-md-8 col-md-offset-2">
		
		<form method="POST" action="" style="margin-left: 50%;">
			<div class="form-group">
				<label>Cedula:</label>
				<input type="text" name="cedula" class="form-control" value="<?php echo $cedula ?>"><br/>
			</div>
			
			<div class="form-group">
				<label>Nombre:</label>
				<input type="text" name="nombre" class="form-control" value="<?php echo $nombre ?>"><br/>
			</div>
			
			<div class="form-group">
				<label>Apellidos:</label>
				<input type="text" name="apellidos" class="form-control" value="<?php echo $apellidos ?>"><br/>
			</div>

			<div class="form-group">
				<label>Email:</label>
				<input type="text" name="email" class="form-control" value="<?php echo $email ?>"><br/>
			</div>
			
			<div class="form-group">
				<label>Teléfono:</label>
				<input type="text" name="telefono" class="form-control" value="<?php echo $telefono ?>"><br/>
			</div>
			
			<div class="form-group">
				<label>Direccion:</label>
				<input type="text" name="direccion" class="form-control" value="<?php echo $direccion ?>"><br/>
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
 				$actualizar_apellidos=$_POST['apellidos'];
 				$actualizar_email=$_POST['email'];
 				$actualizar_telefono=$_POST['telefono'];
 				$actualizar_direccion=$_POST['direccion'];

		$consulta = "UPDATE CLIENTES set CEDULA_CLIENTE='$actualizar_cedula', NOMBRE_CLIENTE='$actualizar_nombre',
		APELLIDOS_CLIENTE='$actualizar_apellidos',EMAIL_CLIENTE='$actualizar_email',TELEFONO_CLIENTE='$actualizar_telefono'
		,DIRECCION_CLIENTE='$actualizar_direccion'
		where CEDULA_CLIENTE=$editar_id;";
		
		$ejecutar = sqlsrv_query($conn, $consulta);

		if ($ejecutar) {
			echo "<script>alert('Datos actualizados')</script>";
			echo "<script>window.open('CRUDCliente.php','_self')</script>";
		}

	}
 ?>