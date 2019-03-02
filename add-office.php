<?php 
session_start();
require_once('library.php');
$rand = get_rand_id(8);
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
    <title>Add New Office</title>

</head>
<body>
<?php include("nav.php"); ?>

<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <h3>Add A new Office</h3>
      <div class="form-wrapper">
        <form action="process.php?action=add-office" method="post" name="frmShipment">
          <div class="form-group">
            <!-- <label for="Name">Office Name</label> -->
            <input type="text" name="OfficeName" class="form-control" id="name" aria-describedby="NameHelp" placeholder="Enter Office name">
          </div>
          <div class="form-group">
            <!-- <label for="city">Password</label> -->
            <input type="text" name="City" class="form-control" id="city" placeholder="City">
          </div>

          <div class="form-group">
            <!-- <label for="phone">Phone </label> -->
            <input type="tel" name="PhoneNo" class="form-control" id="phone"  placeholder="Enter Phone">
            
          </div>
          <div class="form-group">
            <!-- <label for="officetime">Office Time</label> -->
            <input type="text" name="OfficeTiming" class="form-control" id="officetime" placeholder="Working hours">
					</div>
					
					<div class="form-group">
            <!-- <label for="contact">PContact Person:</label> -->
            <input type="text" name="ContactPerson" class="form-control" id="contact" placeholder="Contact Person">
					</div>
					
					<div class="form-group">
            <!-- <label for="Address">Address</label> -->
            <textarea name="OfficeAddress" id="Address" placeholder="Your Office Address here" class="form-control"></textarea>
          </div>
          
          <input type="submit" name="Submit" value="Add New Office" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>