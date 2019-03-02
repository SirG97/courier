<?php 
require_once('database.php');

function checkUser($un, $pwd, $city) {
	if($un == 'admin' && $pwd = 'admin123') {
		$_SESSION['user_name'] = 'Admin';
		$_SESSION['user_type'] = 'admin-role';
		header('Location: courier-list.php');
		//echo 'Iam here.......';
	}else {
		$sql = "SELECT officer_name
				FROM tbl_courier_officers
				WHERE officer_name = '$un'
				AND off_pwd = '$pwd'
				AND office = '$city'";
		$result = dbQuery($dbConn, $sql);
		$no = dbNumRows($result);
		if($no >= 1) {
			$_SESSION['user_name']= $un;
			$_SESSION['user_type']= 'officer';
			header('Location: courier-list.php');
		}//else
		else {
			$_SESSION['error'] = "Your Credentials are not a Valid. Please try Again.";
			header('Location: login.php');
		}		
	}//else
}//checkUser

function isUser(){
	if(!isset($_SESSION['user_name'])){
		header('Location: login.php');
	}
	
}
?>