<?php
	include('include/db.php');
session_start();
	$id=$_GET['id'];
	$sql = "SELECT * FROM tbluser where uid= '$id'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
	while($row = $result->fetch_assoc()) {								
		$username=$row["username"];
	}
	}
	mysqli_query($conn,"delete from tbluser where uid='$id'");

	date_default_timezone_set("Asia/Manila");
    $d=strtotime("now");
    $date= date("Y-m-d H:i:s", $d);
	
	
	$sesaccount = $_SESSION['id'];
	$audit ="INSERT INTO tblaudit(userid, actiontaken, actiondate)"; 
	$audit .="VALUE('{$sesaccount}','Deleted Account with Username of {$username}','{$date}')";
	$audit =mysqli_query($conn,$audit);

	header('location:adminaccounts.php');



	
	
?>

