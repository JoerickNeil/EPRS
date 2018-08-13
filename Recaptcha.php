<!DOCTYPE HTML>
<HTML>
<?php
if (isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$secretkey = "6LeCdmIUAAAAABXxgEzGgMkU78mos7Lmy290YdB9";
		$responsekey = $_POST['g-recaptcha-response'];
		$userIP = $_SERVER['REMOTE_ADDR'];
		
		$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$responsekey&remoteip=$userIP";
		$response = file_get_contents($url);
		
		
	
		$response = json_decode($url);
		
		if($response->success)
		{
			echo "Account Verified!";
		}
		else
		{
			echo "Failed to Verify! please check ReCAPTCHA";
		}
	}
	
?>

	<head>
		<title>sample recaptcha</title>
	</head>
	<body>
		<form action="Recaptcha.php" method="POST">
		<input type="text" name="username" placeholder="a"/>
		<input type="submit" name="submit" value="submit"/>
		<div class="g-recaptcha" data-sitekey="6LeCdmIUAAAAANtkmutyTHRSUTgFnOZh-gxIPfWq"></div>
 		</form>
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</body>
</HTML>