<!DOCTYPE HTML>
<HTML>
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

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
	  <li><a class="active" href="#">Dynamics</a></li>
  <li><a href="AHome.php">HOME</a></li>
  <li><a href="About.php">ABOUT</a></li>
  <li><a href="Service.php">SERVICE</a></li>
  <li><a href="Team.php">TEAM</a></li>
  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">REGISTER<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="Register.php">Applicant</a></li>
            <li><a href="EmpReg.php">Employee</a></li>
            <li><a href="ClientReg.php">Client</a></li>
            <li class="divider"></li>
            <li><a href="AdminReg.php">Administrator</a></li>
			<li><a href="SAdminReg.php">Super Administrator</a></li>
        
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">LOGIN <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="applicants/loginz.php">Applicant</a></li>
            <li><a href="employee/loginz.php">Employee</a></li>
            <li><a href="clients/loginz.php">Client</a></li>
            <li class="divider"></li>
            <li><a href="admin/login.php">Administrator</a></li>
			<li><a href="SuperAdmin/login.php">Super Administrator</a></li>
        
          </ul>
        </li>
      </ul>
  
    </div>
  </div>
</nav>
<div class="jumbotron" 
	style=" margin-bottom: 0px; margin-top: 0px;
    background-image: url(./images/dynamics.png);
    background-position: 0% 60%;
    background-size: cover;
    background-repeat: no-repeat;
    color: white;
    text-shadow: black 0.3em 0.3em 0.3em;
	height:400px;
    ">
<br/>
<br/>
<br/>
<br/>

  <p>Made by Team DynamicsPH</p>
	
  <p><a class="btn btn-danger btn-lg">Learn more</a></p>
</div>
<br/>
<br/>
<div class="container">
	<img id="hover" class="col-md-6" src="./images/jobseeker.JPG" />
	<img id="hover" class="col-md-6" src="./images/employers.JPG" />
	</div>
	<br/>
<br/>
<br/>
<br/>
<div class="footer" style="position: relative;
    left: 0;
    bottom: 0;
    height:180px;
    width: 100%;
    background-color: red;
    color: white;
    text-align: center;">
    <br/>
  <p class="fa fa-user">Dynamics</p>
  <p>Rm. 204 Regina Building, Escolta St., Binondo, Manila</p>
  <p>0939-2135163/0922-8402055/0915-2780813</p>
  <p>400-3944/401-2038/559-6031 (Accounting Line)</p>
  <p>info@dynamics.ph</p>
</div>
</body>
</HTML>