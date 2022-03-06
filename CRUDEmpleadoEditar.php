<?php 
	if (isset($_GET['editar'])) {
		$editar_id=$_GET['editar'];

		$consulta = "SELECT * from EMPLEADOS where ID_EMPLEADOS='$editar_id';";
		$ejecutar = sqlsrv_query($conn, $consulta);

		$fila=sqlsrv_fetch_array($ejecutar);

				$idEmpleado=$fila['ID_EMPLEADOS'];
				$nombre=$fila['NOMBRE_EMPLEADOS'];
				$apellidos=$fila['APELLIDOS_EMPLEADOS'];
				$salario=$fila['SALARIO_EMPLEADOS'];
				$email=$fila['EMAIL_EMPLEADOS'];
     			$telefono=$fila['TELEFONO_EMPLEADOS'];

	}
 ?>
 <br/>

 <div class="col-md-8 col-md-offset-2">
		
		<form method="POST" action="" style="margin-left: 50%;">
					
			<div class="form-group">
				<label>Nombre:</label>
				<input type="text" name="nombre" class="form-control" value="<?php echo $nombre ?>"><br/>
			</div>
			
			<div class="form-group">
				<label>Apellidos:</label>
				<input type="text" name="apellidos" class="form-control" value="<?php echo $apellidos ?>"><br/>
			</div>
			
			<div class="form-group">
				<label>Salario:</label>
				<input type="text" name="salario" class="form-control" value="<?php echo $salario ?>"><br/>
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
				<input type="submit" name="actualizar" class="btn btn-warning" value="Actualizar Datos"><br/>
			</div>
			
		</form>
	</div>
<?php 
	if (isset($_POST['actualizar'])) {
	
				
 				$actualizar_nombre=$_POST['nombre'];
 				$actualizar_apellidos=$_POST['apellidos'];
 				$actualizar_salario=$_POST['salario'];
 				$actualizar_email=$_POST['email'];
 				$actualizar_telefono=$_POST['telefono'];
 				
 				

		$consulta = "UPDATE EMPLEADOS set  NOMBRE_EMPLEADOS='$actualizar_nombre',
		APELLIDOS_EMPLEADOS='$actualizar_apellidos',SALARIO_EMPLEADOS='$actualizar_salario',EMAIL_EMPLEADOS='$actualizar_email'
		,TELEFONO_EMPLEADOS='$actualizar_telefono'
		where ID_EMPLEADOS=$editar_id;";
		
		$ejecutar = sqlsrv_query($conn, $consulta);

		if ($ejecutar) {
			echo "<script>alert('Datos actualizados')</script>";
			echo "<script>window.open('CRUDEmpleado.php','_self')</script>";
		}

	}
 ?>