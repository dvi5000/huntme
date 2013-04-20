<?
$proceed = (isset($_POST['ts']) && isset($_COOKIE['token']) && $_COOKIE['token'] == md5('Willi3W0nka'.$_POST['ts'])) ? true : false;
$to = 'gjacuna+huntme@gmail.com';
$subject = 'Message received from ' . $_POST['Name'];
$headers = 'From: ' . $_POST['Email'] . "\r\n" .
           'Reply-To: ' . $_POST['Email'] . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

$message = 'You received a message from your website contact form. Below are the details:' . "\r\n\r\n";
     
    unset($_POST['ts']);
	foreach($_POST as $k => $v )
        {
			if($k!=$_POST['ts']) {
            		$message .= $k . ": " . $v . "\r\n\r\n";
				}
        }
if($proceed)
{
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