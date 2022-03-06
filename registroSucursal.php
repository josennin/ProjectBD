<!DOCTYPE HTML>
<html>
	<head>
		<title>Talleres Universales</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="images/tallerUni.ico" rel="icon">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<body class="is-preload">

		<!-- Header -->
			<div id="header">
				<a title="Inicio" href="index.html"><img src="images/logo1.png" alt="Inicio" /></a>
				
			</div>

		<!-- Main -->
			<div id="main">

				<header class="major container medium">
					<h2>Proyecto Bases de Datos
					<br />
					Talleres Universales
					<br />
					</h2>
					
				</header>

				<div class="box container" >
					<section>
						<header>
							<h1>Registro de Sucursal</h1>
							<?php
							include('sqlServer/conexionP.php');
						
							$sql = "insert into SUCURSAL (DIRECCION_SURCUSAL, TELEFONO_SUCURSAL, CANT_PERSONAL,PRECIO_RENTA) values 
							('".$_POST["direccion"]."','".$_POST["telefono"]."','".$_POST["cantPersonal"]."','".$_POST["precioRenta"]."');";
	
							$stmt = sqlsrv_query( $conn, $sql );
							if( $stmt === false) {
								echo "Error al agregar la Sucursal"+print_r( sqlsrv_errors(), true);
							}else{
								echo "Se agrego la Sucursal correctamente";
							}
							sqlsrv_free_stmt( $stmt);

							?>
							
						</header>
					</section>
						
					

				

			</div>

		<!-- Footer -->
			<div id="footer">
				
					<ul class="copyright">
						<li style="color: black;">&copy; Todos los derechos reservados.</li><li style="color: black;">Design: Jose Andres Brenes Arce 2020</li>
					</ul>

				</div>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>