<?php
session_start();
require_once('database.php');
require_once('library.php');

isUser();

$sql = "SELECT *
		FROM tbl_offices";
$result = dbQuery($dbConn, $sql);		

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Our offices</title>

</head>
<body>
<?php include("nav.php"); ?>

<div class="container">
	<div class="row">
    <div class="col-md-12">
        <h4>Office Details</h4>
        <div class="table-responsive">   
					<table id="mytable" class="table table-bordered table-striped table-hover"> 
						<thead> 
							<th>Office Name</th>
							<th>Address</th>
							<th>City</th>
							<th>Phone Number</th>
							<th>Working hours</th>
							<th>Contact Person</th>
						</thead>
						<tbody>
							<?php
								while($data = dbFetchAssoc($result)){
								extract($data);	
							?>
			
							<tr>
								<td><?php echo $off_name ?></td>
								<td><?php echo $address; ?></td>
								<td><?php echo $city; ?></td>
								<td><?php echo $ph_no; ?></td>
								<td><?php echo $office_time; ?></td>
								<td><?php echo $contact_person ?></td>
							</tr>
							<?php
								}
							?>
    				</tbody>
        	</table>       
      	</div> 
    </div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>