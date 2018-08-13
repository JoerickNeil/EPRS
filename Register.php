<?php 
	$page_title = "Add a Applicant";
    include_once('config.php');

    //validateAccess();
    
    # displays list of user types
    

	 $sql_city = "SELECT cityID, name FROM cities ORDER BY cityID";
    $result_city = $con->query($sql_city);

    $list_city = "";
	while ($row = mysqli_fetch_array($result_city))
	{
		$cityID = $row['cityID'];
		$name = $row['name'];
		$list_city .= "<option value='$cityID'>$name</option>";
	}

	# add a user record
	if (isset($_POST['add']))
	{
		$typeID = mysqli_real_escape_string($con, $_POST['type']);
		$Name = mysqli_real_escape_string($con, $_POST['Name']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		
		
		$CityID = mysqli_real_escape_string($con, $_POST['CityID']);
		$Firstname = mysqli_real_escape_string($con, $_POST['Firstname']);
		$Middlename = mysqli_real_escape_string($con, $_POST['Middlename']);
		$Nickname = mysqli_real_escape_string($con, $_POST['Nickname']);
		$Street = mysqli_real_escape_string($con, $_POST['Street']);
		$Municipality = mysqli_real_escape_string($con, $_POST['Municipality']);
		$Birthdate = mysqli_real_escape_string($con, $_POST['Birthdate']);
		$Gender = mysqli_real_escape_string($con, $_POST['Gender']);
		$Lastname = mysqli_real_escape_string($con, $_POST['Lastname']);
		$Postal = mysqli_real_escape_string($con, $_POST['Postal']);
		
		$sql_check = "SELECT email from users where email='$email'";
		$result_check = $con->query($sql_check) or die(mysqli_error($con));
		
		if (mysqli_num_rows($result_check) == 0)
		{
			
			$sql_add = "INSERT INTO users VALUES ('', 3, '$Firstname',
				'$email', '47937d13a66c91a3430c460c61514909509c8a9b754625295f15dd1961cbb861','Active', NOW(), NULL)";
				
			$con->query($sql_add) or die(mysqli_error($con));
			$userID = $con->insert_id;
			
			$sql_insert = "INSERT INTO applicants VALUES ('', $userID, '$CityID',
				'$Firstname', '$Middlename','$Lastname', '$Nickname', '$Street', '$Municipality',
				'$Postal',NULL, '$Birthdate', '$Gender', 'Active', NULL, NOW(), NULL)";
				
			
			$con->query($sql_insert) or die(mysqli_error($con));
			
			$appli = $con->insert_id;
			
			mkdir("upload/$appli", 0755, true);
			
			
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
  <li><a href="applicants/loginz.php" style="">LOGIN</a></li>
</ul>
</div>
<!--END of DA NAVBAR-->
<form method="POST" class="form-horizontal">
<table border='0' width='480px' cellpadding='0' cellspacing='0' align='center'>
<center><tr>
   <td><h1>Dynamics Registration Form</h1></td>
</tr><center>
 
<table border='0' width='480px' cellpadding='0' cellspacing='0' align='center'>
<tr>
    <td align='center'>Email:</td>
    <td><input name="email" type="email" class="form-control" id="txtbox1" type="text" value="<?= isset($_POST['Email']) ? $_POST['Email'] : '' ?>"></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>City:</td>
    <td> <select name="CityID" class="form-control" id="select">
          <option value="<?= isset($_POST['City']) ? $_POST['City'] : '' ?>">Select one...</option>
					<?php echo $list_city; ?>
					</select>
    </td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>First Name:</td>
    <td><input name="Firstname" type="Firstname" class="form-control" id="txtbox2" type="text" value="<?= isset($_POST['Firstname']) ? $_POST['Firstname'] : '' ?>"></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>Middle Name:</td>
    <td><input name="Middlename" type="Middlename" class="form-control" id="txtbox3" type="text" value="<?= isset($_POST['Middlename']) ? $_POST['Middlename'] : '' ?>"></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>Last Name:</td>
   <td><input name="Lastname" type="Lastname" class="form-control" id="txtbox4" type="text" value="<?= isset($_POST['Lastname']) ? $_POST['Lastname'] : '' ?>"></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>Nickname:</td>
   <td><input name="Nickname" type="Nickname" class="form-control" id="txtbox5" type="text" value="<?= isset($_POST['Nickname']) ? $_POST['Nickname'] : '' ?>"></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>Street:</td>
   <td><input name="Street" type="Street" class="form-control" id="txtbox6" type="text" value="<?= isset($_POST['Nickname']) ? $_POST['Nickname'] : '' ?>"></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>Municipality:</td>
   <td><input name="Municipality" type="Municipality" class="form-control" id="txtbox7" type="text" value="<?= isset($_POST['Municipality']) ? $_POST['Municipality'] : '' ?>"></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>Postal Code:</td>
   <td><input name="Postal" type="Postal" class="form-control" id="txtbox8" type="number" value="<?= isset($_POST['Postal']) ? $_POST['Postal'] : '' ?>"></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>Birth date:</td>
   <td><input name="Birthdate" type="date" max="<?php echo date('Y-m-d');?>" class="form-control" class="form-control" id="txtbox9" type="date" value="<?= isset($_POST['Birthdate']) ? $_POST['Birthdate'] : '' ?>"></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>Gender:</td>
   <td><input name="Gender" type="Gender" class="form-control" id="txtbox10" type="text" value="<?= isset($_POST['Gender']) ? $_POST['Gender'] : '' ?>"></td>
</tr>
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
</form>

<?php
	include_once('../../includes/footer.php');
	?>