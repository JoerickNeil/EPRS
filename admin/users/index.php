<?php 
	$page_title = "View Users";
    include_once('../../includes/header_admin.php');

    validateAccess();

    # displays list of users
	
    $sql_users = "select users.userID, types.userType,
	 users.email, users.status, users.dateadded, users.datemodified
	 from users 
	 INNER JOIN types ON users.typeID = types.typeID";
    $result_users = $con->query($sql_users);

?>
<form method="POST" class="form-horizontal">
	<div class="col-lg-12">
		<table id="tblUsers" class="table table-hover">
			<thead>
				<th>#</th>
				<th>User Type</th>
				<th>Email</th>
				<th>Status</th>
				<th>Added On</th>
				<th>Last Modified</th>
				<th></th>
				
			</thead>
			<tbody>
				<?php
					while ($row = mysqli_fetch_array($result_users))
					{
						$userID = $row['userID'];
						$type = $row['userType'];
						$email = $row['email'];
						$status = $row['status'];
						$dateadded = $row['dateadded'];
						$datemodified = $row['datemodified'];

						echo "
							<tr>
								<td>$userID</td>
								<td>$type</td>
								<td>$email</td>
								<td>$status</td>
								<td>$dateadded</td>
								<td>$datemodified</td>
								<td>
									<a href='delete.php?id=$userID' class='btn btn-xs btn-warning' title='View application'>
										<i class='fa fa-book'> Archive</i>
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