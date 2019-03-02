<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Courier track:: Home</title>
  </head>
  <body>
  <?php include("nav.php"); ?>
    
<div class="container mycontainer ">
	<div class="row">

        <div class="col-md-8 inner-wrapper">
			
			<form class="form-horizontal" action="track-result.php" method="post" name="form" id="form" >
			<div class="ind_form">
				<div class="col-md-12 ovr_hd">
			
				</div>
				<div class="row pad5">
				<div class="col-md-8 ovr_hd lft mrg10res">
					<input name="Consignment" id="Consignment" maxlength="50" type="text" placeholder="Enter Consignment No" class="form-control txt_box" required autofocus>
				</div>
				<div class="col-md-4 lft">
        <button class="btn btn-primary col-md-12 btn-1" type="submit">Track Now</button> 
				</div> 
				
				
				</div> 
				 
			</div>
			<div class="col-md-4">
							</div>
			</form>

              </div>
            
          </div>
		  
		  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>