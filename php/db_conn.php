<?php
date_default_timezone_set('America/Santiago');
function getExp($mysqli)
{
	$query = "SELECT id, name FROM interests_exp ORDER BY name ASC";
	$rows = doSelect($mysqli,$query);
	return $rows;
}

function printOptions($array)
{
	foreach($array as $value)
	{
		echo('<option value="'.$value['id'].'">'.$value['name'].'</option>');
	}
}

function printChecks($array)
{
	foreach($array as $value)
	{
		echo('<input type="checkbox" name="interest[]" id="'.$value['id'].'" value="'.$value['id'].'"/><label for="'.$value['id'].'">'.$value['name'].'</label><br>');
	}
}

function printYears()
{
	for($i=date("Y");$i>=1980;$i--)
	{
		echo('<option value="'.$i.'">'.$i.'</option>');
	}
}

function getUnis($mysqli)
{
	$query = "SELECT id, name FROM universities ORDER BY name ASC";
	$rows = doSelect($mysqli,$query);
	return $rows;
}

function getCareers($mysqli)
{
	$query = "SELECT id, name FROM careers ORDER BY name ASC";
	$rows = doSelect($mysqli,$query);
	return $rows;
}

function doSelect($mysqli,$query)
{
	$result = $mysqli->query($query);

	while($row = $result->fetch_array())
	{
		$rows[] = $row;
	}
	
	/* free result set */
	$result->close();
	return $rows;
}

function selectHunted($mysqli,$field,$data)
{
	$escaped_field = $mysqli->real_escape_string($field);
	$escaped_data = $mysqli->real_escape_string($data);
	$query = "SELECT id FROM hunted WHERE ".$escaped_field." = '".$escaped_data."';";
	
	$result = $mysqli->query($query);
	
	$rows = array();

	while($row = $result->fetch_array())
	{
		$rows[] = $row;
	}
	
	/* free result set */
	$result->close();
	return $rows;
}



function insertUser($mysqli,$name,$last,$email,$grad_year)
{
	$success = false;
	$name = $mysqli->real_escape_string($name);
	$last = $mysqli->real_escape_string($last);
	$email = $mysqli->real_escape_string($email);
	$grad_year = $mysqli->real_escape_string($grad_year);			
	$query = 'INSERT INTO hunted (name,last_names,email,grad_year) VALUES ("'.$name.'","'.$last.'","'.$email.'",'.$grad_year.');';
	if($result = $mysqli->query($query))
	{
		$success = true;
	}
	return $success;
}

function insertUserExp($mysqli,$id_user,$id_exp)
{
	$success = false;
	$id_user = $mysqli->real_escape_string($id_user);
	$id_exp = $mysqli->real_escape_string($id_exp);
	$query = 'INSERT INTO user_interest_exp (id_user,id_interest) VALUES ("'.$id_user.'","'.$id_exp.'");';
	if($result = $mysqli->query($query))
	{
		$success = true;
	}
	return $success;
}

function insertUserUni($mysqli,$id_hunted,$id_career,$id_uni)
{
	$success = false;
	$id_hunted = $mysqli->real_escape_string($id_hunted);
	$id_uni = $mysqli->real_escape_string($id_uni);
	$id_career = $mysqli->real_escape_string($id_career);
	$query = 'INSERT INTO users_unis (id_hunted,id_career,id_university) VALUES ("'.$id_hunted.'","'.$id_career.'","'.$id_uni.'");';
	if($result = $mysqli->query($query))
	{
		$success = true;
	}	
	return $success;
}

function getConn()
{
	/*$hostname='127.0.0.1';
	$username='root';
	$password='';
	$dbname='huntme';*/
	
	$hostname='huntme.db.7326610.hostedresource.com';
	$username='huntme';
	$password='PR0gm@t25';
	$dbname='huntme';

	$mysqli = new mysqli($hostname, $username, $password, $dbname);
	
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit;
	}

	if (!$mysqli->set_charset("utf8")) {
	    printf("Error loading character set utf8: %s\n", $mysqli->error);
	}
	
	return $mysqli;
}

function flatten(array $array) {
    $return = array();
    array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
    return $return;
}
		
?>