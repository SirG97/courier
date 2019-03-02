<?php 
//start session
session_start();

require_once('database.php');

$action = $_GET['action'];


switch($action) {
	case 'add-cons':
		addCons($dbConn);
	break;
	
	case 'delivered':
		markDelivered($dbConn, $sql);
	break;
	
	case 'add-office':
		addNewOffice($dbConn, $sql);
	break;
	
	case 'add-manager':
		addManager($dbConn, $sql);
	break;
	
	case 'update-status':
		updateStatus($dbConn);
	break;
	
	case 'change-pass':
		changePass($dbConn, $sql);
	break;
			
	case 'logOut':
		logOut();
	break;		
	
}//switch

function addCons($dbConn){

	$Shippername = $_POST['Shippername'];
	$Shipperphone = $_POST['Shipperphone'];
	$Shipperaddress = $_POST['Shipperaddress'];
	
	$Receivername = $_POST['Receivername'];
	$Receiverphone = $_POST['Receiverphone'];
	$Receiveraddress = $_POST['Receiveraddress'];
	
	$ConsignmentNo = $_POST['ConsignmentNo'];
	$Shiptype = $_POST['Shiptype'];
	$Weight = $_POST['Weight'];
	$Invoiceno = $_POST['Invoiceno'];
	$Qnty = $_POST['Qnty'];

	$Bookingmode = $_POST['Bookingmode'];
	$Totalfreight = $_POST['Totalfreight'];
	$Mode = $_POST['Mode'];
	
	
	$Packupdate = $_POST['Packupdate'];
	$Pickuptime = $_POST['Pickuptime'];
	$status = $_POST['status'];
	$Comments = $_POST['Comments'];

	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'courier_db';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	

	$sql = "INSERT INTO tbl_courier (cons_no, ship_name, phone, s_add, rev_name, r_phone, r_add,  type, weight, invice_no, qty, book_mode, freight, mode, pick_date, pick_time, status, comments, book_date )
			VALUES('$ConsignmentNo', '$Shippername','$Shipperphone', '$Shipperaddress', '$Receivername','$Receiverphone','$Receiveraddress', '$Shiptype',$Weight , '$Invoiceno', $Qnty, '$Bookingmode', '$Totalfreight', '$Mode', '$Packupdate', '$Pickuptime', '$status', '$Comments', NOW())";

if (mysqli_query($conn, $sql)) {
	echo "New record created successfully";
	$_SESSION['success'] = 'New record created successfully';
	header('Location: courier-list.php'); 
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	die();
	$_SESSION['error'] = 'New record entry was successful';
	//header('Location: add-courier.php'); 
}
	
	mysqli_close($conn);
	
	//echo $Ship;
}//addCons

function markDelivered($dbConn, $sql) {
	$cid = (int)$_GET['cid'];
	$sql = "UPDATE tbl_courier
			SET status = 'Delivered'
			WHERE cid= $cid";
	dbQuery($dbConn, $sql);
	header('Location: delivered-success.php'); 
			
}//markDelivered();

function addNewOffice($dbConn, $sql) {
	
	$OfficeName = $_POST['OfficeName'];
	$OfficeAddress = $_POST['OfficeAddress'];
	$City = $_POST['City'];
	$PhoneNo = $_POST['PhoneNo'];
	$OfficeTiming = $_POST['OfficeTiming'];
	$ContactPerson = $_POST['ContactPerson'];
	
	$sql = "INSERT INTO tbl_offices (off_name, address, city, ph_no, office_time, contact_person)
			VALUES ('$OfficeName', '$OfficeAddress', '$City', '$PhoneNo', '$OfficeTiming', '$ContactPerson')";
	dbQuery($dbConn, $sql);
	header('Location: office-add-success.php');
}//addNewOffice

function addManager($dbConn, $sql) {
	
	$ManagerName = $_POST['ManagerName'];
	$Password = $_POST['Password'];
	$Address = $_POST['Address'];
	$Email = $_POST['Email'];
	$PhoneNo = $_POST['PhoneNo'];
	$OfficeName = $_POST['OfficeName'];
	
	$sql = "INSERT INTO tbl_courier_officers (officer_name, off_pwd, address, email, ph_no, office, reg_date)
			VALUES ('$ManagerName', '$Password', '$Address', '$Email', '$PhoneNo', '$OfficeName', NOW())";
	dbQuery($dbConn, $sql);
	header('Location: manager-add-success.php');

}//addNewOffice

function updateStatus($dbConn) {
	
	$OfficeName = $_POST['OfficeName'];
	$status = $_POST['status'];
	$comments = $_POST['comments'];
	$cid = $_POST['cid'];
	$cons_no = $_POST['cons_no'];
	//$OfficeName = $_POST['OfficeName'];
	$sql = "INSERT INTO tbl_courier_track (cid, cons_no, current_city, status, comments, bk_time)
			VALUES ($cid, '$cons_no', '$OfficeName', '$status', '$comments', NOW())";
	dbQuery($dbConn, $sql);
	
	$sql_1 = "UPDATE tbl_courier 
				SET status = '$status' 
				WHERE cid = $cid
				AND cons_no = '$cons_no'";
	dbQuery($dbConn, $sql_1);	
	
	header('Location: update-success.php');

}//addNewOffice



function logOut(){
	if(isset($_SESSION['user_name'])){
		unset($_SESSION['user_name']);
	}
	if(isset($_SESSION['user_type'])){
		unset($_SESSION['user_type']);
	}
	session_destroy();
	header('Location: login.php');
}//logOut

?>