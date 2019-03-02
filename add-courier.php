<?php 
session_start();
require_once('library.php');

function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

$rand = generateRandomString(8);
//echo $rand;
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
  <div class="row" style="">
  
    <div class="col-md-7">
      <h3>Add New Courier</h3>
      <?php if(isset($_SESSION['error'])){?>
		  <div class="alert alert-danger">
			<strong>Error!</strong> <?php echo 'Something is not right, please try again'; ?>
		  </div>
		<?php } unset($_SESSION['error']); ?>
      <form action="process.php?action=add-cons" method="post" name="frmShipment">
        <!-- shipper info -->
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="Shippername">Shipper Name</label>
            <input type="text" name="Shippername" class="form-control" id="Shippername" placeholder="Name">
          </div>
          <div class="form-group col-md-6">
            <label for="sphone">Shipper Phone</label>
            <input type="text" name="Shipperphone" class="form-control" id="sphone" placeholder="Phone">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Shipper Address</label>
          <input type="text" name="Shipperaddress" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
          <!-- Reciever Info -->
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="recievername">Reciever Name</label>
            <input type="text" name="Receivername" class="form-control" id="recievername" placeholder="Name">
          </div>
          <div class="form-group col-md-6">
            <label for="rphone">Reciever Phone</label>
            <input type="text" name="Receiverphone" class="form-control" id="rphone" placeholder="Phone">
          </div>
        </div>
        <div class="form-group">
          <label for="raddress">Reciever Address</label>
          <input type="text" name="Receiveraddress" class="form-control" id="raddress" placeholder="1234 Main St">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="consignment_no">Consignment No</label>
            <input type="text" name="ConsignmentNo"  value="<?php echo strtoupper($rand); ?>" class="form-control" id="consignment_no" readonly>
          </div>
          <div class="form-group col-md-4">
            <label for="Shipment_type">Type of Shipment</label>
            <select id="Shipment_type" name="Shiptype" class="form-control">
              <option value="Documents" selected>Documents</option>
              <option value="Parcel">Parcel</option>
              <option value="Sentiments">Sentiments</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="weight">Weight(kg)</label>
            <input type="number" step="0.1" name="Weight" class="form-control" id="weight">
          </div>
        </div>

        <!-- Invoice no -->
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="invoice_no">Invoice No</label>
            <input type="text" name="Invoiceno" class="form-control" id="invoice_no">
          </div>
          <div class="form-group col-md-2">
            <label for="qnty">Quantity</label>
            <input type="number" name="Qnty"   id="qnty" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label for="booking">Booking Mode</label>
            <select id="booking" name="Bookingmode" class="form-control">
              <option value="Paid" selected>Paid</option>
              <option value="ToPay">ToPay</option>
              <option value="TBB">TBB</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="destination">Destination office</label>
            <input type="text" name="Destination" class="form-control" id="destination">
          </div>
          <div class="form-group col-md-2">
            <label for="freight">Total Freight</label>
            <input type="number" name="Totalfreight" id="freight" class="form-control">
          </div>
          <div class="form-group col-md-3">
            <label for="depttime">Departure Time</label>
            <input type="text" name="Depttime" id="depttime" class="form-control">
          </div>
          <div class="form-group col-md-3">
            <label for="Mode">Travelling Mode</label>
            <select id="Mode" name="Mode" class="form-control">
              <option value="Air" selected>Air</option>
              <option value="Road">Road</option>
              <option value="Train">Train</option>
              <option value="Sea">Sea</option>
            </select>
          </div>
        </div>
        <!-- Pickup information -->
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="pickupdate">Pickup Date</label>
            <input type="text" name="Packupdate" id="pickupdate" class="form-control">
          </div>
          <div class="form-group col-md-3">
            <label for="pickuptime">Pickup Time</label>
            <input type="text" name="Pickuptime" id="pickuptime" class="form-control">
          </div>
          <div class="form-group col-md-5">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control">
              <option selected value="In Transit">In Transit</option>
            </select>
          </div>
        </div>
        <!-- Comment -->
        <div class="form-row">
          <div class="form-group col-md-12">
          <label for="Comments">Comment</label>
            <textarea name="Comments" placeholder="Write a note" id="Comments"  class="form-control"></textarea>
          </div>
        </div>
        <input type="submit" value="Add Courier" class="btn btn-primary">
      </form>
    </div>
  </div>
</div>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>