
<?php 

# checks if record is selected
	if (isset($_REQUEST['id']))
	{
		# checks if selected record is an ID value
		if (ctype_digit($_REQUEST['id']))
		{
			$id = $_REQUEST['id'];

			$page_title = "Job #$id";
		   include_once('../../includes/header_admin.php');

		  
			 $sql_jobs = "SELECT jobs.jobID, clients.contactperson, categories.category, cities.name,
	jobs.code, jobs.title, jobs.description, jobs.requirements, 
	jobs.startprice, jobs.endprice, jobs.datestarted, jobs.duedate,
	jobs.contractdate, jobs.totalslots, jobs.available, jobs.status, 
	jobs.dateadded, jobs.datemodified
    	FROM jobs  
    	INNER JOIN clients ON jobs.clientID = clients.clientID
		INNER JOIN categories ON jobs.catID = categories.catID
		INNER JOIN cities ON jobs.cityID = cities.cityID
    	WHERE jobs.jobID='$id'";
			$result_jobs = $con->query($sql_jobs);

			


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
<body>
<div class="container">
<div class="sidebar">
  <div class="col-sm-6 col-md-12">
    <div class="thumbnail">
     
      <div class="caption">
        <h4 style="font-style: italic;"><?php echo $code; ?></h4>
        <h1><?php echo $title; ?></h1>
        <p><?php echo $clientID; ?></p>
        <br/>
        <h4 style="text-decoration: underline; font-style: italic;">Company Short Description</h4>
        <p><?php echo $description; ?>
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
            <li>End Price: <?php echo $endprice; ?></li>
          </ul>
        </p>
        <br/>
        <h4 style="text-decoration: underline; font-style: italic;">Slots</h4>
        <p>
          <ul style="list-style: none;">
            <li>total Slots: <?php echo $totalslots; ?> </li>
            <li>Available: <?php echo $available; ?> </li>
          </ul>
        </p>
        <br/>
        <h6 style="font-style: italic;">Date Added: <?php echo $dateadded; ?> </h6>
        <br/>
      </div>
    </div>
  </div>
</div>
  </div>
</div>
 <?php 
    $sql_application = "SELECT 
	applications.applyID, 
	applications.dateapplied,
	applications.dateapprove,
	applications.datereject, 
	applications.datecancel, 
	applications.status,
	applications.remarks,
	
	applicants.Firstname,
	applicants.Gender,
	applicants.Resume,
	applicants.Dateadded
	
    	FROM applications  
    	INNER JOIN applicants ON applications.appID = applicants.appID
    	WHERE applications.applyID='$id'";

    $result_application = $con->query($sql_application);
while ($row = mysqli_fetch_array($result_application))
			{
					   $applyID = $row['applyID'];
					   $firstname = $row['Firstname'];
					   $gender = $row['Gender']; 
					   $resume = $row['Resume'];
					   $dateadded = $row['Dateadded'];
					   
						$dateapplied = $row['dateapplied'];
						$dateapprove = $row['dateapprove'];
						$datereject = $row['datereject'];
						$datecancel = $row['datecancel'];
						$status = $row['status'];
						$remarks = $row['remarks'];
									
			}
?>

<div class="container"  style="border: 1px solid grey;">
  <br/>
<form method="POST" class="form-horizontal">
  <div class="col-lg-6">
    <div class="form-group">
      <label class="control-label col-lg-4">Name</label>
      <div class="col-lg-8">
      <input name="ut" type="text" value="<?php echo $firstname; ?>" class="form-control"  readonly />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Gender</label>
      <div class="col-lg-8">
        <input name="fn" type="text" value=" <?php echo $gender; ?>"  class="form-control" readonly />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Joined</label>
      <div class="col-lg-8">
        <input name="ln" type="text" value="<?php echo $dateadded; ?>" class="form-control" readonly />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Date Applied</label>
      <div class="col-lg-8">
        <input name="email" type="email" value="<?php echo $dateapplied; ?>" class="form-control" readonly />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Date Approve</label>
      <div class="col-lg-8">
        <input name="pw" type="text" value="<?php echo $dateapprove; ?>" class="form-control" readonly />
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group">
      <label class="control-label col-lg-4">Date Reject</label>
      <div class="col-lg-8">
        <input name="st" type="text" value="<?php echo $datereject; ?>" class="form-control" readonly />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Date Cancel</label>
      <div class="col-lg-8">
        <input name="muni" type="text" value="<?php echo $datecancel; ?>"  class="form-control" readonly />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Status</label>
      <div class="col-lg-8">
        <input name="phone" type="text" value="<?php echo $status; ?>"  class="form-control" readonly />
      </div>
    </div>

	
	
    <div>
      <div class="col-lg-offset-4 col-lg-8">
      
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Submit Resume</label>
      <div class="col-lg-8">
      <input name="phone" type="text" value="<?php echo $resume; ?>"  class="form-control" readonly />
      </div>
    </div>
  </div>
</form>

<?php
if (isset($_POST['Approve']))
			{
					$remark = mysqli_real_escape_string($con, $_POST['remarks']);
					$sql_update = "UPDATE applications SET remarks='$remark', dateapprove=NOW(), status='Approved'  where applyID=$applyID";

				$result = $con->query($sql_update) or die(mysqli_error($con));
				
				header('location: index.php');
			}
			?>
<?php
if (isset($_POST['Cancel']))
			{
					$remark = mysqli_real_escape_string($con, $_POST['remarks']);
					$sql_update = "UPDATE applications SET remarks='$remark', datecancel=NOW(), status='Canceled' where applyID=$applyID";

				$result = $con->query($sql_update) or die(mysqli_error($con));
				header('location: index.php');
			}
			?>
<?php
if (isset($_POST['Reject']))
			{
					$remark = mysqli_real_escape_string($con, $_POST['remarks']);
					$sql_update = "UPDATE applications SET remarks='$remark', datereject=NOW(), status='Rejected' where applyID=$applyID";

				$result = $con->query($sql_update) or die(mysqli_error($con));
				header('location: index.php');
			}
			?>

<form method="POST" class="form-horizontal">
<p>
    </div>
<br/>
<br/>

				<button name="Approve" type="submit" class="btn btn-success" onclick="return confirm('Are you sure?')"  <?php if ($status == 'Approved' || $status == 'Rejected' || $status == 'Canceled'){ ?> style="visibility:hidden" <?php   } ?>>
					Approve
				</button>
				 <button name="Cancel" type="submit" class="btn btn-warning" onclick="return confirm('Are you sure?')"<?php if ($status == 'Approved' || $status == 'Rejected' || $status == 'Canceled'){ ?> style="visibility:hidden" <?php   } ?>>
					Cancel
				</button>
				 <button name="Reject" type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"<?php if ($status == 'Approved' || $status == 'Rejected' || $status == 'Canceled'){ ?> style="visibility:hidden" <?php   } ?>>
					Reject
				</button>
				 <div class="form-group">
      <label class="control-label col-lg-4" style="float: left;">Remarks</label>
      <div class="col-lg-8">
        <textarea name="remarks" type="remarks"  value="<?php echo $remarks; ?>"  class="form-control"></textarea>
      </div>
	  </div>

<br/>
<br/>
</p>
</form>
</div>
</body>
<script>
	hash('sha256',$_GET['id'])
</script>
