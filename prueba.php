
<?php

$serverName = "JOSE\SQL_JOSE"; //serverName\instanceName, portNumber (default is 1433)
$connectionInfo = array("Database"=>"Universidad", "UID"=>"sa", "PWD"=>"sa2311","CharacterSet"=>"UTF-8");
$conn = sqlsrv_connect($serverName, $connectionInfo);
if( $conn ) {
     echo "Conexion exitosa!!.<br />";
}else{
     echo "Error al conectar con la base de datos.<br />";
     die( print_r( sqlsrv_errors(), true));
}

/*
$sql = "insert into empleados (cedula,nombre, apellido1, apellido2, domicilio) values 
('".$_POST["cedula"]."','".$_POST["nombre"]."','".$_POST["apellido1"]."','".$_POST["apellido2"]."','".$_POST["domicilio"]."');";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
	echo "Error al insertar emplado"+print_r( sqlsrv_errors(), true);
}else{
	echo "Se agrego el empleado";
}
sqlsrv_free_stmt( $stmt);
*/
?>