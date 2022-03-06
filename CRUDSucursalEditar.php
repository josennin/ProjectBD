<?php 
	if (isset($_GET['editar'])) {
		$editar_id=$_GET['editar'];

		$consulta = "SELECT * from SUCURSAL where NUM_SURCUSAL='$editar_id';";
		$ejecutar = sqlsrv_query($conn, $consulta);

		$fila=sqlsrv_fetch_array($ejecutar);

				$direccion=$fila['DIRECCION_SURCUSAL'];
				$telefono=$fila['TELEFONO_SUCURSAL'];
				$cantPersonal=$fila['CANT_PERSONAL'];
				$precioRenta=$fila['PRECIO_RENTA'];

	}
 ?>
 <br/>

 <div class="col-md-8 col-md-offset-2">
		
		<form method="POST" action="" style="margin-left: 50%;">
					
			<div class="form-group">
				<label>Direccion:</label>
				<input type="text" name="direccion" class="form-control" value="<?php echo $direccion ?>"><br/>
			</div>
			
			<div class="form-group">
				<label>Telefono:</label>
				<input type="text" name="telefono" class="form-control" value="<?php echo $telefono ?>"><br/>
			</div>
			
			<div class="form-group">
				<label>Cantidad de peronal:</label>
				<input type="text" name="cantPersonal" class="form-control" value="<?php echo $cantPersonal ?>"><br/>
			</div>
			
			<div class="form-group">
				<label>Precio de renta:</label>
				<input type="text" name="precioRenta" class="form-control" value="<?php echo $precioRenta ?>"><br/>
			</div>

			<div class="form-group">
				<input type="submit" name="actualizar" class="btn btn-warning" value="Actualizar Datos"><br/>
			</div>
			
		</form>
	</div>
<?php 
	if (isset($_POST['actualizar'])) {
	
				$actualizar_numSucursal=$_POST['numSucursal'];
 				$actualizar_direccion=$_POST['direccion'];
 				$actualizar_telefono=$_POST['telefono'];
 				$actualizar_cantPersonal=$_POST['cantPersonal'];
 				$actualizar_precioRenta=$_POST['precioRenta'];

		$consulta = "UPDATE SUCURSAL set DIRECCION_SURCUSAL='$actualizar_direccion',
		TELEFONO_SUCURSAL='$actualizar_telefono',CANT_PERSONAL='$actualizar_cantPersonal',PRECIO_RENTA='$actualizar_precioRenta'
		where NUM_SURCUSAL=$editar_id;";
		
		$ejecutar = sqlsrv_query($conn, $consulta);

		if ($ejecutar) {
			echo "<script>alert('Datos actualizados')</script>";
			echo "<script>window.open('CRUDSucursal.php','_self')</script>";
		}

	}
 ?>