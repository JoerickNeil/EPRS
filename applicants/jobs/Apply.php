<?php 
	$page_title = "Apply for a Job";
    include_once('../../includes/header_applicants.php');

	validateAccess();
	
	   $sql_jobs = "SELECT jobs.jobID, jobs.dateadded, clients.contactperson, 
	 jobs.title
    	FROM jobs  
    	INNER JOIN clients ON jobs.clientID = clients.clientID
    	WHERE jobs.status!='Archived' order by dateadded ";

    $result_jobs = $con->query($sql_jobs);
	
   ?>
<form method="POST" class="form-horizontal">
	<div class="col-lg-12">
		<table id="tblUsers" class="table table-hover">
			<thead>
				<th>Title</th>
				<th>Client</th>
				<th>Date added</th>
				<th>Apply Now</th>

				
				
				
			</thead>
			<tbody>

  <?php
  if (mysqli_num_rows($result_jobs) > 0)
  {
	  while($row = mysqli_fetch_array($result_jobs))
	  {
	  $jobID = $row['jobID'];
	  $dateadded = $row['dateadded'];
	  $client = $row['contactperson'];
	  $title = $row['title'];

	  
	  echo "
	  <tr>

        <td><h3>$title</h3></td>
         <td><p>$client</p></td>
		 <td><p>$dateadded</p></td>
         <td><p><a href='jobdetails.php?id=$jobID' class='btn btn-primary' role='button' style='width: 100%;'>Details</a></p></td>

</tr>
";
  }
  }
?>
  </div>
</div>
</div>
	</tbody>
		</table>
		<script>
			$(document).ready(function(){
			    $('#tblUsers').DataTable();
			});
		</script>
	</div>
</form>
<?php
	include_once('../../includes/footer.php');
?>