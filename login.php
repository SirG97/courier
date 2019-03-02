<?php
session_start();
require_once('database.php');
require_once('library.php');
$error = "";
if(isset($_POST['txtusername'])){
	$error = checkUser($_POST['txtusername'],$_POST['txtpassword'],$_POST['OfficeName']);
}//if

require_once('database.php');
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
    <title>Login!</title>

</head>
<body>
   <?php include("nav.php"); ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
          
            <?php if(isset($_SESSION['error'])){?>
              <div class="alert alert-danger">
              <strong>Error!</strong> <?php echo 'Something is not right, please try again'; ?>
              </div>
            <?php } unset($_SESSION['error']); ?>
            <form class="form-signin" name="form1" id="form1" method="post">
              <div class="form-label-group">
              <label for="inputEmail"></label>
                <input type="text" id="inputEmail" class="form-control" name="txtusername" placeholder="username" required autofocus>
                
              </div>

              <div class="form-label-group">
              <label for="inputPassword"></label>
                <input type="password" id="inputPassword" name="txtpassword" class="form-control" placeholder="password" required>
                
              </div>

              <select class="custom-select custom-select-lg mb-3">
                <?php 
                  while($data = dbFetchAssoc($result)){
                  ?>
                  <option value="<?php echo $data['off_name']; ?>"><?php echo $data['off_name']; ?></option>
                  <?php 
                  }//while
                ?>
              </select>
              <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="Submit" value="Log In">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <form name="form1" id="form1" method="post" onSubmit="return memloginvalidate()">
 
	<input name="txtusername" class="forminput" id="txtusername" maxlength="20" type="text">
  <input name="txtpassword" class="forminput" id="txtpassword" maxlength="20" type="password"> 
	<select name="OfficeName">
			<?php 
			while($data = dbFetchAssoc($result)){
			?>
			<option value="<?php echo $data['off_name']; ?>"><?php echo $data['off_name']; ?></option>
			<?php 
			}//while
			?>
	</select>
			<input name="Submit" class="green-button" value="Login Now" type="submit" style=""></td> -->

</body>
</html>