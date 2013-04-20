<?php
require_once 'db_conn.php';

/* RECEIVE VALUE */
$validateValue=$_REQUEST['fieldValue'];
$validateId=$_REQUEST['fieldId'];
$mysqli=getConn();
$result = selectHunted($mysqli,'email',$validateValue);

	/* RETURN VALUE */
	$arrayToJs = array();
	$arrayToJs[0] = $validateId;

if(count($result)<=0){		// validate??
	$arrayToJs[1] = true;			// RETURN TRUE
	echo json_encode($arrayToJs);			// RETURN ARRAY WITH success
}else{
	echo json_encode($arrayToJs);		// RETURN ARRAY WITH ERROR
}

$mysqli->close();

?>