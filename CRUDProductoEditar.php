<?php 
	if (isset($_GET['editar'])) {
		$editar_id=$_GET['editar'];

		$consulta = "SELECT * from PRODUCTOS where ID_PRODUCTO='$editar_id';";
		$ejecutar = sqlsrv_query($conn, $consulta);

		$fila=sqlsrv_fetch_array($ejecutar);

				$nombre=$fila['NOMBRE_PRODUCTO'];
				$precio=$fila['PRECIO'];
				$tipo=$fila['TIPO_PRODUCTO'];
				$cantProductos=$fila['CANTIDAD_PRODUCTOS'];
				$detalles=$fila['DESCRIPCION_PRODUCTO'];

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
				<label>Precio:</label>
				<input type="text" name="precio" class="form-control" value="<?php echo $precio ?>"><br/>
			</div>
			
			<div class="form-group">
				<!--
				<label>Tipo:</label>
				<input type="text" name="Tipo" class="form-control" value="<?php echo $tipo ?>"><br/>
				-->
				<label for="tipos">Tipo:</label>
				<select id="tipos" name="tipos">
 					 <option value="tele">Television</option>
  					 <option value="ref">Refrigeracion</option>
  					 <option value="mic">Microondas</option>
 					 <option value="coc">Cocina</option>
 					 <option value="lav">Lavadora</option>
				</select>
			</div>
			
			<div class="form-group">
				<label>Cantidad de productos:</label>
				<input type="text" name="cantProductos" class="form-control" value="<?php echo $cantProductos ?>"><br/>
			</div>

			<div class="form-group">
				<label>Detalles:</label>
				<input type="text" name="detalles" class="form-control" value="<?php echo $detalles ?>"><br/>
			</div>

			<div class="form-group">
				<input type="submit" name="actualizar" class="btn btn-warning" value="Actualizar Datos"><br/>
			</div>
			
		</form>
	</div>
<?php 
	if (isset($_POST['actualizar'])) {
	
			//	$actualizar_idProducto=$_POST['idProducto'];
 				$actualizar_nombre=$_POST['nombre'];
 				$actualizar_precio=$_POST['precio'];

 				if ($_REQUEST['tipos']=="tele"){ 
    				$actualizar_tipo="Television";
  				}else if ($_REQUEST['tipos']=="ref"){ 
      				$actualizar_tipo="Refrigeracion";
      			}elseif ($_REQUEST['tipos']=="mic") {
      				$actualizar_tipo="Microondas";
      			}elseif ($_REQUEST['tipos']=="coc") {
      				$actualizar_tipo="Cocina";
      			}elseif ($_REQUEST['tipos']=="lav") {
      				$actualizar_tipo="Lavadora";
      			}

    			//$actualizar_tipo=$_POST['tipo'];

 				$actualizar_cantProductos=$_POST['cantProductos'];
 				$actualizar_detalles=$_POST['detalles'];

		$consulta = "UPDATE PRODUCTOS set  NOMBRE_PRODUCTO='$actualizar_nombre',
		PRECIO='$actualizar_precio',TIPO_PRODUCTO='$actualizar_tipo',CANTIDAD_PRODUCTOS='$actualizar_cantProductos',
		DESCRIPCION_PRODUCTO='$actualizar_detalles'
		where ID_PRODUCTO=$editar_id;";
		
		$ejecutar = sqlsrv_query($conn, $consulta);

		if ($ejecutar) {
			echo "<script>alert('Datos actualizados')</script>";
			echo "<script>window.open('CRUDProductos.php','_self')</script>";
		}

	}
 ?>