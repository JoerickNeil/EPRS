<?php
	# displays total number of records from a chosen table
	function countData($table)
	{
		include 'config.php';
		$sql_count = "SELECT COUNT(*) AS total FROM $table
			WHERE Status!='Archived'";
		$result = $con->query($sql_count);

		$data = mysqli_fetch_assoc($result);
		return $data['total'];
	}
	function countApplication($table)
	{
		include 'config.php';
		$sql_count = "SELECT COUNT(*) AS total FROM applications
			WHERE Status='Shortlisted'";
		$result = $con->query($sql_count);

		$data = mysqli_fetch_assoc($result);
		return $data['total'];
	}

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
			$admin_login = getAppFolder() . 'admin/login.php';
			$lastURL = $_SERVER['REQUEST_URI'];
			header('location: ' . $admin_login .'?url=' . $lastURL);
		}
	}

	
	# sends a message to a chosen email address
	/**
	function sendEmail2($email, $subject, $message)
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
		$mail->Username = "DynamicsThesis@gmail.com";
		$mail->Password = "jjjj8888";
		$mail->SetFrom("DynamicsThesis@gmail.com");
		$mail->FromName = "The Administrator";
		$mail->Subject = $subject;
		$mail->Body = $message;
		$mail->AddAddress($email);
		//$mail->Send();
		if(!$mail->Send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		//put error in WS error.log
			error_log('Mailer Error: ' . $mail->ErrorInfo);
		} else {
			echo 'Message has been sent';
			//error_log('Message has been sent to '.$someVarThatDetermineRecipientAddr,'somefilewhereto.log');
		}
	}
	*/
	function sendEmail($email, $subject, $message)
	{
		/**
		 * This example shows settings to use when sending via Google's Gmail servers.
		 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
		 * example to see how to use XOAUTH2.
		 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
		 */
		//Import PHPMailer classes into the global namespace
		require 'phpmailer/Exception.php';
		require 'phpmailer/PHPMailer.php';
		require 'phpmailer/SMTP.php';
		//require '../vendor/autoload.php';
		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 2;
		//Set the hostname of the mail server
		$mail->Host = 'DynamicsThesis@gmail.com';
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587;
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "DynamicsThesis@gmail.com";
		//Password to use for SMTP authentication
		$mail->Password = "jjjj8888";
		//Set who the message is to be sent from
		$mail->setFrom('DynamicsThesis@gmail.com', 'First Last');
		//Set an alternative reply-to address
		$mail->addReplyTo('DynamicsThesis@gmail.com', 'First Last');
		//Set who the message is to be sent to
		$mail->addAddress('DynamicsThesis@gmail.com', 'John Doe');
		//Set the subject line
		$mail->Subject = $subject;
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML = $message;   //(file_get_contents('contents.html'), __DIR__);
		//Replace the plain text body with one created manually
		$mail->AltBody = 'This is a plain-text message body';
		//Attach an image file
		$mail->addAttachment('images/phpmailer_mini.png');
		//send the message, check for errors
		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message sent!";
			//Section 2: IMAP
			//Uncomment these to save your message in the 'Sent Mail' folder.
			#if (save_mail($mail)) {
			#    echo "Message saved!";
			#}
		}
	}
	
	function auditLog($userID, $logType)
	{
		include 'config.php';
		$sql_log = "INSERT INTO logs VALUES ('', $userID, '$logType', NOW())";
		$con->query($sql_log) or die(mysqli_error($con));
	}
	
?>