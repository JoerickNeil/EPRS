
<?php 
	if (isset($_REQUEST['id']))
	{
		# checks if selected record is an ID value
		if (ctype_digit($_REQUEST['id']))
		{
			$id = $_REQUEST['id'];

			$page_title = "Shortlist #$id";
		   include_once('../../includes/header_admin.php');

	$sql_application = "SELECT
	jobs.code,
	jobs.title,
	jobs.description,
	jobs.requirements,
	jobs.startprice,
	jobs.endprice,
	jobs.totalslots,
	jobs.available,
	jobs.dateadded,
	applications.dateapplied,
	applications.dateapprove,
	applications.datereject,
	applications.datecancel,
	applications.remarks,
	applications.status,
	clients.contactperson,
	applicants.Firstname,
	applicants.Street,
	applicants.Gender,
	applicants.appID
	FROM applications
	INNER JOIN jobs ON applications.jobID = jobs.jobID
	INNER JOIN clients ON jobs.clientID = clients.clientID
	INNER JOIN applicants ON applications.appID = applicants.appID
	where applications.applyID='$id'";
	$result_application = $con->query($sql_application);
	while ($row = mysqli_fetch_array($result_application))
			{
				$code = $row['code'];
				$title = $row['title'];
				$description = $row['description'];
				$requirements = $row['requirements'];
				$startprice = $row['startprice'];
				$endprice = $row['endprice'];
				$totalslots = $row['totalslots'];
				$available = $row['available'];
				$dateadded = $row['dateadded'];
				
			
				
				$firstname = $row['Firstname'];
				$street = $row['Street'];
				$gender = $row['Gender'];

				
				$dateapplied = $row['dateapplied'];
				$dateapprove = $row['dateapprove'];
				$datereject = $row['datereject'];
				$datecancel = $row['datecancel'];
				$remarks = $row['remarks'];
				$appID = $row['appID'];
				$status = $row['status'];
				
				$contactperson = $row['contactperson'];
			}
		if ($status == "Rejected" || $status == "Canceled" || $status == "Shortlisted")
			 {
				 header('location: index.php');
			 }
			}
		else
		{
			header('location: index.php');
		}
	}
	
?>
<div class="sidebar">
  <div class="col-sm-8 col-md-4">
    <div class="thumbnail">
     
      <div class="caption">
        <h3><center><u><b>Applicant Information</b></u></center></h3>
        <h4 style="text-decoration: underline; font-style: italic;"><?php  echo $firstname;  ?></h4>
        <h4 style="text-decoration: underline; font-style: italic;"><?php echo $street; ?></h4>
        <h4 style="text-decoration: underline; font-style: italic;"><?php echo $gender; ?></h4>
      </div>
    </div>
  </div>
</div>
<div class="sidebar">
  <div class="col-sm-8 col-md-4">
    <div class="thumbnail">
     
      <div class="caption">
        <h3><center><u><b>Job Information</b></u></center></h3>
        <br/>
        <h4 style="font-style: italic;"><?php echo $code; ?></h4>
        <h1><?php echo $title; ?></h1>
        <p><?php echo $contactperson; ?></p>
        <br/>
        <h4 style="text-decoration: underline; font-style: italic;">Company Short Description</h4>
        <p>
		<?php echo $description; ?>
		</p>
      <br/>
        <h4 style="text-decoration: underline; font-style: italic;">Requirements</h4>
        <p>
          <ul>
            <li><?php echo $requirements; ?></li>
          </ul>
        </p>
        <br/>
        <h4 style="text-decoration: underline; font-style: italic;">Salary price range</h4>
        <p>
          <ul style="list-style: none;">
            <li>Start price: <?php echo $startprice; ?> </li>
            <li>End Price: <?php echo $endprice; ?> </li>
          </ul>
        </p>
        <br/>
		
        <h4 style="text-decoration: underline; font-style: italic;">Slots</h4>
        <p>
          <ul style="list-style: none;">
            <li>total Slots: <?php echo $totalslots; ?> </li>
            <li>Available: <?php echo $available; ?> </li>
			 <li>Shortlisted: <?php echo countApplication("Status");?> </li>
          </ul>
        </p>
        <br/>
        <h6 style="font-style: italic;">Date Added: <?php echo $dateadded; ?> </h6>
        <br/>
      </div>
    </div>
  </div>
</div>
<div class="sidebar">
  <div class="col-sm-8 col-md-4">
    <div class="thumbnail">
     
      <div class="caption">
        <h3><center><u><b>Application Information</b></u></center></h3>
        <h4 style="text-decoration: underline; font-style: italic;"><?php  echo $dateapplied;  ?></h4>
        <h4 style="text-decoration: underline; font-style: italic;"><?php echo $dateapprove; ?></h4>
        <h4 style="text-decoration: underline; font-style: italic;"><?php echo $datereject; ?></h4>
        <h4 style="text-decoration: underline; font-style: italic;"><?php echo $datecancel; ?></h4>
		 <h4 style="text-decoration: underline; font-style: italic;"><?php echo $remarks; ?></h4>
		  <h4 style="text-decoration: underline; font-style: italic;"><?php echo $status; ?></h4>
      
        
      </div>
    </div>
  </div>
</div>
<br/>
<br/>
<br/>
<div class="container col-sm-8 col-md-8" style="align: center;">
<p>
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
				$applyID = $_REQUEST["id"];
					$remark = mysqli_real_escape_string($con, $_POST['remarks']);
					$sql_update = "UPDATE applications SET  status='Shortlisted'  where applyID=$applyID";
					$sql_insert = "INSERT INTO shortlist values ('', $applyID, $appID, NOW(), '$remark' )";
				$con->query($sql_update) or die(mysqli_error($con));
				$con->query($sql_insert) or die(mysqli_error($con));
				auditLog($_SESSION['userid'], 'Added record to shortlist');
				header('location: ../Shortlist');
			}
			?>
		   
				<button name="add" type="submit" class="btn btn-success">
					Add to shortlist
				</button>
				</form>
</p>
</div>


<?php
	include_once('../../includes/footer.php');
?>