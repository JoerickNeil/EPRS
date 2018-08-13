<?php 
	$page_title = "Add a Admin";
    include_once('config.php');

    //validateAccess();
    
    # displays list of user types
    

	

	# add a user record
	if (isset($_POST['add']))
	{
		$typeID = mysqli_real_escape_string($con, $_POST['type']);
		$Name = mysqli_real_escape_string($con, $_POST['Name']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		
		
		$sql_check = "SELECT email from users where email='$email'";
		$result_check = $con->query($sql_check) or die(mysqli_error($con));
		
		if (mysqli_num_rows($result_check) == 0)
		{
			
			$sql_add = "INSERT INTO users VALUES ('', 1, '$Name',
				'$email', '47937d13a66c91a3430c460c61514909509c8a9b754625295f15dd1961cbb861','Active', NOW(), NULL)";
				
			$con->query($sql_add) or die(mysqli_error($con));
			$userID = $con->insert_id;
			
			
			
			
		}
		else
		{
			echo "<script>alert('Email already existing!');</script>";
		}
		
	}

?>
<head>
		 <title>UI</title>
		  <meta charset='utf-8'>
		   <meta http-equiv="X-UA-Compatible" content="IE=edge">
		   <meta name="viewport" content="width=device-width, initial-scale=1">
		   <link rel="stylesheet" href="styles.css">
		   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		   <script src="script.js"></script>
		   <title>Dynamics UI Proto 1.4</title>
		   <meta name="viewport" content="width=device-width, initial-scale=1">
		       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		    <!-- Bootstrap CSS CDN -->
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		    <!-- Our Custom CSS -->
		    <link rel="stylesheet" href="css/custom.css">
	</head>
	<style>
img:hover
{
	opacity: 0.5;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: red;
}

.active {
    background-color: red;
}
</style>



<body>
<form method="POST" class="form-horizontal">
				<!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--Body Starts here-->
<!--DA NAVBAR-->
<div>
<ul>
  <li><a class="active" href="#">Dynamics</a></li>
 <li><a href="AHome.php">HOME</a></li>
  <li><a href="About.php">ABOUT</a></li>
  <li><a href="Service.php">SERVICE</a></li>
  <li><a href="Team.php">TEAM</a></li>
  <li><a href="Register.php">REGISTER</a></li>
  <li><a href="Admin/login.php" style="">LOGIN</a></li>
</ul>
</div>
<!--END of DA NAVBAR-->
<form method="POST" class="form-horizontal">
<table border='0' width='480px' cellpadding='0' cellspacing='0' align='center'>
<center><tr>
   <td><h3>Dynamics Admin Registration Form</h3></td>
</tr><center>
<table border='0' width='480px' cellpadding='0' cellspacing='0' align='center'>
<br/>
<br/>
<tr>
    <td align='center'>Name:</td>
    <td><input name="Name" type="Name" class="form-control" id="txtbox1" type="text" value="<?= isset($_POST['Name']) ? $_POST['Name'] : '' ?>"></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>Email:</td>
    <td><input name="email" type="email" class="form-control" id="txtbox1" type="text" value="<?= isset($_POST['Email']) ? $_POST['Email'] : '' ?>"></td>
</tr>
<tr> <td>&nbsp;</td> </tr>

<tr> <td>&nbsp;</td> </tr>

	<table border='0' cellpadding='0' cellspacing='0' width='480px' align='center'>
<tr>
    <td align='center'><button name="add" type="submit" class="btn btn-danger" style="height:50px; width:300px;">
					REGISTER
				</button>	</td>
</tr>
<br/>
</table>
</table>
 
</table>
<br/>
	
	
	
	
	
	
	</form>
	</body>