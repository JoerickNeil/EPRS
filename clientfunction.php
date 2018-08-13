<?php
	# displays total number of records from a chosen table
	

	# hides elements if customer is not logged in
	function toggleUser()
	{
		if (!isset($_SESSION['userid']))
		{
			echo 'style="display:none;"';
		}
	}

	# hides elements if customer is logged in
	function toggleGuest()
	{
		if (isset($_SESSION['userid']))
		{
			echo 'style="display:none;"';
		}
	}

	# gets path of application folder
	function getAppFolder()
	{
	    $protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
	    $port      = $_SERVER['SERVER_PORT'];
	    $disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";
	    $domain    = $_SERVER['SERVER_NAME'];

	    return "${protocol}://${domain}${disp_port}" . "/Dynamics/";
	}

	# checks if user has logged in; redirects to login page if not logged in
	function validateAccess()
	{
		if (!isset($_SESSION['userid']))
		{
			$client_login = getAppFolder() . 'clients/loginz.php';
			$lastURL = $_SERVER['REQUEST_URI'];
			header('location: ' . $client_login .'?url=' . $lastURL);
		}
	}

	# sends a message to a chosen email address
	function sendEmail($email, $subject, $message)
	{
		require('phpmailer/PHPMailerAutoload.php');
		$mail = new PHPMailer;

		if(!$mail->validateAddress($email))
		{
			echo 'Invalid Email Address';
			exit;
		}

		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465; // or 587
		$mail->IsHTML(true);
		$mail->Username = "benilde.web.development@gmail.com";
		$mail->Password = "Awebdevelopmentisfun";
		$mail->SetFrom("benilde.web.development@gmail.com");
		$mail->FromName = "The Administrator";
		$mail->Subject = $subject;
		$mail->Body = $message;
		$mail->AddAddress($email);
		$mail->Send();
	}
?>