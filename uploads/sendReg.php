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
			if($k!=$_POST['ts']) {
            		$message .= $k . ": " . $v . "\r\n\r\n";
				}
        }

		$update = false;
		if(array_key_exists('Name',$_POST) && array_key_exists('Last',$_POST) && array_key_exists('Email',$_POST) && array_key_exists('grad_year',$_POST) && array_key_exists('career',$_POST) && array_key_exists('uni',$_POST) && array_key_exists('exp',$_POST))
		{
			$update = true;
		}

if($proceed && $update)
{
	if(!insertUser($_POST['Name'],$_POST['Last'],$_POST['Email'],$_POST['grad_year']))
	{
		$message .= 'HUBO UN ERROR AL INGRESAR LOS DATOS DE USUARIO.\r\n\r\n';
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

//header("location: thankyou.html");

?>