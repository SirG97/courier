<?php
session_start();
require_once('database.php');
require_once('library.php');
isUser();
$cid= (int)$_GET['cid'];

$sql = "SELECT *
		FROM tbl_courier
		WHERE cid = $cid";
$sql_1 = "SELECT DISTINCT(off_name)
		FROM tbl_offices";
$result = dbQuery($dbConn, $sql);		
$result_1 = dbQuery($dbConn, $sql_1);
while($data = dbFetchAssoc($result)) {
extract($data);
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
<section>
 <div class="container"> 
    <div class="row mrg30">
      <div class="col-md-9 print_resize">
        <h3>Courier Info</h3>
          <table class="table table-bordered table-striped firsttable table-condensed cf" id="no-more-tables">
            <tbody>
              <tr>
                <td data-title="Tracking No : " class="headertab txt_center" colspan="3">
                  <h3 class="fs-17 in_blk"><strong><?php echo $cons_no; ?></strong> <?php echo $cid ?></h3>
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
                  <td data-title="Receiver Name : "><strong><?php echo $rev_name; ?></strong>&nbsp;</td>
                  <td data-title="Receiver Number : "><strong><?php echo $r_phone; ?></strong>&nbsp;</td>
                  <td data-title="Receiver Address : "><strong><?php echo $r_add; ?></strong>&nbsp;</td>
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
        <h5>Update location</h5>
        <form action="process.php?action=update-status" method="post" name="frmShipment" id="frmShipment"> 
           <div class="form-group">
              <select name="OfficeName" class="form-control">
                <?php 
                while($data = dbFetchAssoc($result_1)){
                ?>
                <option value="<?php echo $data['off_name']; ?>"><?php echo $data['off_name']; ?></option>
                <?php 
                }//while
                ?>
              </select> 
           </div>

          <div class="form-group">
            <select name="status" class="form-control">
              <option value="In Transit">In Transit</option>

              <option value="Landed">Landed</option>

              <option value="Delayed">Delayed</option>

              <option value="Completed">Completed</option>
              <option value="Onhold">Onhold</option>
            </select>
          </div>    
          <div class="form-group">
            <textarea name="comments" class="form-control" placeholder="comments"></textarea>
          </div>

          <input type="hidden" name="cons_no" value="<?php echo $cons_no; ?>">
          <input type="hidden" name="cid" value="<?php echo $cid; ?>">

          <input type="submit" class="btn btn-primary col-md-12 btn-1 track-result-btn" value="Update"> 
          <a href="process.php?action=delivered&cid=<?php echo $cid; ?>">Marked this shipment as <span class="style1">DELIVERED</a>
      </div>
    </div>
  </div>	
</section> 
<?php } 
?>