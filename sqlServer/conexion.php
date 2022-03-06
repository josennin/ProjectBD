<?php

$serverName = "JOSE\SQL_JOSE"; //serverName\instanceName, portNumber (default is 1433)
$connectionInfo = array( "Database"=>"Universidad", "UID"=>"sa", "PWD"=>"sa2311","CharacterSet"=>"UTF-8");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

/*
if( $conn ) {
     echo "Conexion exitosa!!.<br />";
}else{
     echo "Error al conectar con la base de datos.<br />";
     die( print_r( sqlsrv_errors(), true));
}
*/
?>