<?php
session_start();
require_once('database.php');
require_once('library.php');
isUser();

$sql = "SELECT DISTINCT(off_name)
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
    <title>Add New Manager</title>

</head>
<body>
<?php include("nav.php"); ?>

<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <h3>Add A new Office Manager</h3>
      <div class="form-wrapper">
        <form action="process.php?action=add-manager" method="post" name="frmShipment">
          <div class="form-group">
            <!-- <label for="Name">Manager Name</label> -->
            <input type="text" name="ManagerName" class="form-control" id="name" aria-describedby="NameHelp" placeholder="Enter name">
          </div>
          <div class="form-group">
            <!-- <label for="exampleInputPassword1">Password</label> -->
            <input type="password" name="Password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group">
            <!-- <label for="Address">Address</label> -->
            <textarea name="Address" id="Address" placeholder="Your Address here" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <!-- <label for="exampleInputEmail1">Email address</label> -->
            <input type="Email" name="Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            
          </div>
          <div class="form-group">
            <!-- <label for="phone">Phone No:</label> -->
            <input type="tel" name="PhoneNo" class="form-control" id="phone" placeholder="Phone no">
          </div>
          <div class="form-group">
            <!-- <label for="officename">Office Name</label> -->
            <select class="form-control" id="officename" name="Officename">
              <?php 
                while($data = dbFetchAssoc($result)){
              ?>
                <option value="<?php echo $data['off_name']; ?>"><?php echo $data['off_name']; ?></option>
              <?php 
                }//while
              ?>
            </select>
          </div>
          <input type="submit" name="Submit" value="Add New Office Manager" class="btn btn-primary">
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