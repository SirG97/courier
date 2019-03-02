<?php
session_start();
require_once('database.php');
require_once('library.php');
$cons= $_POST['Consignment'];
if(!$cons){
  header('Location: track-status.php');
}


$sql = "SELECT * FROM tbl_courier WHERE cons_no = '$cons'";
$result = dbQuery($dbConn, $sql);
$no = dbNumRows($result);
if($no == 1){
while($data = dbFetchAssoc($result)) {
extract($data);
}
}
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
    <title>Hello, world!</title>
  </head>
  <body>
  <?php include("nav.php"); ?>
<section>
 <div class="container"> 
    <div class="row mrg30">
      <div class="col-md-9 print_resize">
        <button class="btn-1 col-md-1 print btn btn-primary" style="float:right;" onclick="window.print()">Print</button>
          <table class="table table-bordered table-striped firsttable table-condensed cf" id="no-more-tables">
            <tbody>
              <tr>
                <td data-title="Tracking No : " class="headertab txt_center" colspan="3">
                  <h3 class="fs-17 in_blk"><strong><?php echo $cons_no; ?></strong></h3>
                </td>
              </tr>
            </tbody>
            <tbody>
                <tr>
                    <td data-title="Origin : "><strong><?php echo $s_add; ?></strong>&nbsp;</td>
                    <td data-title="Last Update : "><strong>Saturday , February 2 , 2019</strong>&nbsp;</td>
                    <td data-title="Status : "><strong><?php echo $status; ?></strong>&nbsp;</td>
                </tr>
                <tr>
                  <td data-title="Sender Name : "><strong><?php echo $ship_name; ?></strong>&nbsp;</td>
                  <td data-title="Sender Number : "><strong><?php echo $phone; ?></strong>&nbsp;</td>
                  <td data-title="Sender Address : "><strong><?php echo $s_add; ?></strong>&nbsp;</td>
                </tr>
                
                <tr>
                    <td data-title="Type of Shipment : "><strong><?php $type; ?></strong>&nbsp;</td>
                    <td data-title="Weight : "><strong><?php echo $weight; ?></strong>&nbsp;</td>
                    <td data-title="Destination : "><strong><?php echo $r_add; ?></strong>&nbsp;</td>
                </tr>
                <tr>
                    <td data-title="Invoice No. : "><strong><?php echo $invice_no; ?></strong>&nbsp;</td>
                    <td data-title="Product type: "><strong><?php echo $type; ?></strong>&nbsp;</td>
                    <td data-title="Qnty : "><strong><?php echo $qty; ?></strong>&nbsp;</td>
                </tr>
                <tr>
                    <td data-title="Payment Mode : "><strong>Cash</strong>&nbsp;</td>
                    <td data-title="Totalfreight : "><strong><?php echo $freight; ?></strong>&nbsp;</td>
                    <td data-title="Mode : "><strong><?php echo $mode; ?></strong>&nbsp;</td>
                </tr>
                <tr>
                    <td data-title="Depttime : "><strong><?php echo $pick_time; ?></strong>&nbsp;</td>
                    <td data-title="Expected Delivery date : "><strong><?php echo $pick_date; ?></strong>&nbsp;</td>
                    <td></td>
                </tr>
                <tr>
                    <td data-title="Comments : " colspan="3"><strong><?php echo $comments; ?></strong>&nbsp;</td>
                </tr>
            </tbody>
          </table>                   
      </div>
      <div class="col-md-3 right_track print">
        <h5>Enter the Consignment No</h5>
        <form name="tracking" id="tracking" class="form-horizontal" method="post" action="track-result.php">      
          <input name="Consignment" id="Consignment" maxlength="50" type="text" placeholder="Enter Consignment No" class="form-control txt_box" required autofocus>
          <button class="btn btn-primary col-md-12 btn-1 track-result-btn"> Track Now </button>  
        </form>
      </div>
    </div>
  </div>	
</section>
</body>
</html>
