<?php
require_once 'db_conn.php';
$mysqli = getConn();
	
/* RECEIVE VALUE */
$emailValue=$_REQUEST['email'];

	/* RETURN VALUE */
	$arrayToJs = array();
	$arrayToJs[0] = array();
	$arrayToJs[1] = array();
	
$result = selectHunted($mysqli,'email',$emailValue);

if(count($result)<=0){		// validate??
	$arrayToJs[1][0] = 'email';
	$arrayToJs[1][1] = true;			// RETURN TRUE
			// RETURN ARRAY WITH success
}else{
	$arrayToJs[1][0] = 'email';
	$arrayToJs[1][1] = false;
	$arrayToJs[1][2] = "Este correo ya está registrado";
}

	echo json_encode($arrayToJs);

$mysqli->close();
?>