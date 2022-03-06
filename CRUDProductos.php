<!DOCTYPE html>
<?php 
	include('sqlServer/conexionP.php');
 ?>
<html>
<head>
	<title>Productos CRUD Talleres Universales</title>
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
		
		<form method="POST" action="CRUDProductos.php" style="margin-left: 50%;">
			<h1>CRUD de la tabla Productos</h1>
					
			<div class="form-group">
				<label>Nombre:</label>
				<input type="text" name="nombre" class="form-control" placeholder="Escriba el nombre del producto"><br/>
			</div>
			
			<div class="form-group">
				<label>Precio:</label>
				<input type="text" name="precio" class="form-control" placeholder="Escriba el Precio"><br/>
			</div>
			
			<div class="form-group">
				<!--
				<label>Tipo:</label>
				<input type="text" name="tipo" class="form-control" placeholder="Escriba la cantidad de peronal"><br/>
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
				<input type="text" name="cantProductos" class="form-control" placeholder="Escriba la cantidaad de productos"><br/>
			</div>

			<div class="form-group">
				<label>Detalles:</label>
				<input type="text" name="detalles" class="form-control" placeholder="Escriba una descripcion"><br/>
			</div>

			<div class="form-group">
				<input type="submit" name="insert" class="btn btn-warning" value="Ingresar Datos"><br/>
			</div>
		</form>
	</div>

		<?php 
	
	if (isset($_POST['insert'])) {
			//$idProducto=$_POST['idProducto'];
			$nombre=$_POST['nombre'];
			$precio=$_POST['precio'];

			if ($_REQUEST['tipos']=="tele"){ 
    			$tipo="Television";
  			}else if ($_REQUEST['tipos']=="ref"){ 
      				$tipo="Refrigeracion";
      			}elseif ($_REQUEST['tipos']=="mic") {
      				$tipo="Microondas";
      			}elseif ($_REQUEST['tipos']=="coc") {
      				$tipo="Cocina";
      			}elseif ($_REQUEST['tipos']=="lav") {
      				$tipo="Lavadora";
      			}
  			
    			
      		//$tipo=$_POST['tipo'];
			$cantProductos=$_POST['cantProductos'];
			$detalles=$_POST['detalles'];

			

			$sql="INSERT into PRODUCTOS(NOMBRE_PRODUCTO,PRECIO,TIPO_PRODUCTO,CANTIDAD_PRODUCTOS,DESCRIPCION_PRODUCTO) values
			('$nombre','$precio','$tipo','$cantProductos','$detalles');";

			$stmt = sqlsrv_query( $conn, $sql );
			if( $stmt === false) {
				echo "Error al insertar Producto"+print_r( sqlsrv_errors(), true);
			}else{
				echo "Se agrego el Producto con exito";
			}
			sqlsrv_free_stmt( $stmt);
	}




			
 ?>

 <div class="col-md-8 col-md-offset-2">
 	<table class="table table-bordered table-responsive" style="margin-left: 40%">
 		<tr align="center">
 			<td>ID del Producto</td>
 			<td>Nombre</td>
 			<td>Precio</td>
 			<td>Tipo</td>
 			<td>Cantidad de productos</td>
 			<td>Detalles</td>
 			<td>Accion</td>
 			<td>Accion</td>
 		</tr>

 		<?php 
 			$sql="SELECT * from  PRODUCTOS;";
 			$ejecutar = sqlsrv_query($conn, $sql);
 			$i=0;
 			while ($fila=sqlsrv_fetch_array($ejecutar)) {
 				$idProducto=$fila['ID_PRODUCTO'];
				$nombre=$fila['NOMBRE_PRODUCTO'];
				$precio=$fila['PRECIO'];
				$tipo=$fila['TIPO_PRODUCTO'];
				$cantProductos=$fila['CANTIDAD_PRODUCTOS'];
				$detalles=$fila['DESCRIPCION_PRODUCTO'];
 				$i++;

 			
 		 ?>

 		<tr align="center">
 			<td><?php echo "$idProducto"; ?></td>
 			<td><?php echo "$nombre"; ?></td>
 			<td><?php echo "$precio"; ?></td>
 			<td><?php echo "$tipo"; ?></td>
 			<td><?php echo "$cantProductos"; ?></td>
 			<td><?php echo "$detalles"; ?></td>
 			<td><a href="CRUDProductos.php?editar=<?php echo $idProducto; ?>">Editar</a></td>
 			<td><a href="CRUDProductos.php?borrar=<?php echo $idProducto; ?>">Borrar</a></td>
 		</tr>

 		<?php 
 			}
 		 ?>

 	</table>
 </div>

 <?php 
 	if (isset($_GET['editar'])) {
 		include('CRUDProductoEditar.php');

 	}
  ?>

  <?php 
	if (isset($_GET['borrar'])) {
		$borrar_id=$_GET['borrar'];

		$borrar = "DELETE from PRODUCTOS where ID_PRODUCTO='$borrar_id';";
		$ejecutar = sqlsrv_query($conn, $borrar);

		if ($ejecutar) {
			echo "<script>alert('Datos han sido borrados')</script>";
			echo "<script>window.open('CRUDProductos.php','_self')</script>";

		}
	}

 ?>



</body>
</html>