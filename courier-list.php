<?php
session_start();
require_once('database.php');
require_once('library.php');
isUser();

$sql = "SELECT cid, cons_no, ship_name, rev_name, pick_date, pick_time, status
		FROM tbl_courier
		-- WHERE status != 'Delivered'
		ORDER BY cid DESC 
		LIMIT 0, 20";
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
    <title>Courier List</title>

</head>
<body>
<?php include("nav.php"); ?>

<div class="container">
	<div class="row">
    <div class="col-md-12">
        <h4>Consignments</h4>
		<?php if(isset($_SESSION['success'])){?>
			<div class="alert alert-success">
				<strong>Success!</strong> <?php echo 'Courier added successfully' ?>
			</div>
		<?php }  ?>
        <div class="table-responsive">   
					<table id="mytable" class="table table-bordered table-striped table-hover"> 
						<thead> 
							<th>Consignment No</th>
							<th>Shipper</th>
							<th>Reciever</th>
							<th>Destination</th>
							<th>Pickup Date</th>
							<th>Time</th>
							<th>Status</th>
							<th>Edit</th>
							<th>Delete</th>
						</thead>
						<tbody>
							<?php
								while($data = dbFetchAssoc($result)){
								extract($data);	
							?>
			
							<tr>
								<td><?php echo $cons_no; ?></td>
								<td><?php echo $ship_name; ?></td>
								<td><?php echo $rev_name; ?></td>
								<td>Nigeria</td>
								<td><?php echo $pick_date; ?></td>
								<td><?php echo $pick_time; ?></td>
								<td><?php echo $status; ?></td>
								<td>
										<a class="btn btn-primary btn-xs"  href="edit-courier.php?cid=<?php echo $cid; ?>">Edit</a>
								</td>
								<td>
										<button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" >
										<span class="glyphicon glyphicon-trash">Delete</span></button>
								</td>
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
</body></html>