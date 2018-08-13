<?php 
	$page_title = "View Users";
    include_once('../../includes/header_admin.php');

    validateAccess();

    # displays list of users
    $sql_logs = "select users.Name, users.email, logs.logtype,
	 logs.timestamp
	 from logs
	 INNER JOIN users ON logs.userID = users.userID";
    $result_logs = $con->query($sql_logs);

?>
<form method="POST" class="form-horizontal">
	<div class="col-lg-12">
		<table id="tblUsers" class="table table-hover">
			<thead>
				
				<th>Name</th>
				<th>Email</th>
				<th>logtype</th>
				<th>Timestamp</th>
				<th></th>
				
			</thead>
			<tbody>
				<?php
					while ($row = mysqli_fetch_array($result_logs))
					{
						$Name = $row['Name'];
						$email = $row['email'];
						$logtype = $row['logtype'];
						$timestamp = $row['timestamp'];
					

						echo "
							<tr>
								<td>$Name</td>
								<td>$email</td>
								<td>$logtype</td>
								<td>$timestamp</td>
								<td>
								</td>
							</tr>
						";
					}

				?>
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