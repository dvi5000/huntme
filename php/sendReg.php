<?
require_once 'db_conn.php';

$proceed = (isset($_POST['ts']) && isset($_COOKIE['token']) && $_COOKIE['token'] == md5('Willi3W0nka'.$_POST['ts'])) ? true : false;
$to = 'gjacuna+huntme@gmail.com';
$subject = 'Message received from ' . $_POST['Name'];
$headers = 'From: ' . $_POST['Email'] . "\r\n" .
           'Reply-To: ' . $_POST['Email'] . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

$message = 'Se agregó un nuevo registro a la base de datos. Below are the details:' . "\r\n\r\n";
     
    unset($_POST['ts']);
	foreach($_POST as $k => $v )
        {
			if($k!=$_POST['ts'])
				{
					if($k!=='interest')
					{
            			$message .= $k . ": " . $v . "\r\n\r\n";
					}
					else
					{
						$message .= $k . "s: ";
						foreach($v as $interest)
						{
							$message .= $interest.' - ';
						}
						$message .= "\r\n\r\n";
					}
				}
        }

		$update = false;
		if(array_key_exists('Name',$_POST) && array_key_exists('Last',$_POST) && array_key_exists('Email',$_POST) && array_key_exists('grad_year',$_POST) && array_key_exists('career',$_POST) && array_key_exists('uni',$_POST))
		{
			$update = true;
		}

if($proceed)
{
	if($update)
	{
		$mysqli = getConn();
		if(!insertUser($mysqli,$_POST['Name'],$_POST['Last'],$_POST['Email'],$_POST['grad_year']))
		{
			$message .= "HUBO UN ERROR AL INGRESAR LOS DATOS DE USUARIO.\r\n\r\n";
		}
		else
		{
			$id_user = flatten(selectHunted($mysqli,'email',$_POST['Email']));
			if(isset($_POST['interest'])){
			  if (is_array($_POST['interest'])) {
			    foreach($_POST['interest'] as $value){
			    	insertUserExp($mysqli,$id_user[0],$value);
			    }
			  } else {
			    //dosomething
			  }
			}
			if(!insertUserUni($mysqli,$id_user[0],$_POST['career'],$_POST['uni']))
			{
				$message .= "HUBO UN ERROR AL INGRESAR LOS DATOS DE CARRERA.\r\n\r\n";
			}
		}
		$mysqli->close();
	}	
	
	if(mail($to, $subject, $message, $headers))
	{
		$json['success']=true;
		foreach($_POST as $k => $v )
		{
				$json[$k]=$v;
		}
		echo json_encode($json);

	}
}

?>