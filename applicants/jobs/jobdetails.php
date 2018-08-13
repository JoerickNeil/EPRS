
   <?php 
   
# checks if record is selected
	if (isset($_REQUEST['id']))
	{
		# checks if selected record is an ID value
		if (ctype_digit($_REQUEST['id']))
		{
			$id = $_REQUEST['id'];

			$page_title = "Job #$id";
		   include_once('../../includes/header_applicants.php');

		    # display existing recobord
			 $sql_jobs = "SELECT
			 jobs.jobID,
			 clients.contactperson,
			 categories.category,
				cities.name,
				jobs.code,
				jobs.title,
				jobs.description,
				jobs.requirements, 
				jobs.startprice,
				jobs.endprice,
				jobs.datestarted,
				jobs.duedate,
				jobs.contractdate,
				jobs.totalslots,
				jobs.available,
				jobs.status, 
				jobs.dateadded,
				jobs.datemodified
    	FROM jobs  
    	INNER JOIN clients ON jobs.clientID = clients.clientID
		INNER JOIN categories ON jobs.catID = categories.catID
		INNER JOIN cities ON jobs.cityID = cities.cityID
    	WHERE jobs.jobID='$id'";
			$result_jobs = $con->query($sql_jobs);

			# checks if record is not existing


			while ($row = mysqli_fetch_array($result_jobs))
			{
					    $jobID = $row['jobID'];
						$clientID = $row['contactperson'];
						$catID = $row['category'];
						$cityID = $row['name'];
						
						$code = $row['code'];
						$title = $row['title'];
						$description = $row['description'];
						
						$requirements = $row['requirements'];
						$startprice = number_format($row['startprice'], 2);
						$endprice = $row['endprice'];
						
						$datestarted = $row['datestarted'];
						$duedate = $row['duedate'];
						$contractdate = $row['contractdate'];
						
						$totalslots = $row['totalslots'];
						$available = $row['available'];
						$status = $row['status'];
						
						$dateadded = $row['dateadded'];
						$datemodified = $row['datemodified'];
			}
		}
		else
		{
			header('location: Apply.php');
		}
	}
?>

<div class="sidebar">
  <div class="col-sm-6 col-md-8">
    <div class="thumbnail">
     
      <div class="caption">
        <br/>
        <h4 style="text-decoration: underline; font-style: italic;">Company</h4>
        <p><?php echo $title; ?></p>
      <br/>
        <h4 style="text-decoration: underline; font-style: italic;">Job Description</h4>
        <p>
          <ul>
				<li><?php echo $description; ?></li>
          </ul>
        </p>
        <br/>
        <h4 style="text-decoration: underline; font-style: italic;">Requirements</h4>
        <p>
          <ul>
            <li><?php echo $requirements; ?></li>
          </ul>
        </p>
      </div>
    </div>
  </div>
</div>
<?php
$userID = $_SESSION['userid'];
	 $sql_app = "select
	 
		users.userID,
		applicants.appID,
		applicants.Street,
		applicants.Firstname
	 from applicants
	 INNER JOIN users ON applicants.userID = users.userID
	 where users.userID=$userID ";
			$result_app = $con->query($sql_app);

			# checks if record is not existing


			while ($row = mysqli_fetch_array($result_app))
			{
					    $appID = $row['appID'];
						$Firstname = $row['Firstname'];
						$Street = $row['Street'];
			}
?>

  <div class="col-sm-6 col-md-4" style="float: right;">
    <div class="thumbnail">
      
      <div class="caption">
        <h3><?php echo $title; ?></h3>
        <p>JobID: <?php echo $code; ?></p>
        <p>Client Name: <?php echo $clientID; ?></p>
        <p>Title: <?php echo $title; ?></p>
        <p>Status: <?php echo $status; ?></p>
        <p>Available: <?php echo $available; ?></p>
        <p>Total Slots: <?php echo $totalslots; ?></p>
	    <p>Applicant: <?php echo $Firstname; ?></p>
		<a href='route.php?origin=<?php echo $Street; ?>&dest=<?php echo $cityID; ?>' class="btn btn-info" target="_blank">
	View Routes
</a>
		<form method="POST" class="form-horizontal">
 <div class="form-group">
      <label class="control-label col-lg-6" style="float: left;">Remarks</label>
      <div class="col-lg-8">
        <textarea name="remarks" type="remarks"    class="form-control"></textarea>
      </div>
	  </div>
	  <br/>
	    <br/>
		  <br/>
		   <br/>

		   <?php
				if (isset($_POST['add']))
			{
     				$remarks = mysqli_real_escape_string($con, $_POST['remarks']);
					
				    $userID = $_SESSION['userid'];
					
					$jobID = $_REQUEST["id"];
					
					
					$sql_insert = "INSERT INTO applications values ('', $userID, $jobID, $appID, NOW(), NULL, NULL, NULL, '$remarks', 'Active' )";
					$sql_update = "UPDATE jobs SET  TotalSlots = TotalSlots - 1  where jobID=$jobID";	
				$con->query($sql_update) or die(mysqli_error($con));	
				$con->query($sql_insert) or die(mysqli_error($con));
				header('location: ../jobs/Apply.php');
				
				
			}
			?>
		   
				<button name="add" type="submit" class="btn btn-success">
					Add to Applications
				</button>
				</form>

<?php
	include_once('../../includes/footer.php');
?>