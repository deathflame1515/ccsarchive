<?php
session_start();
	include('include/db.php');
	
	$id=$_GET['id'];
$note=$_POST['note'];
$sql4="SELECT * FROM tblthesis where tid='{$id}'";
$result4= $conn->query($sql4);
	if ($result4->num_rows > 0){
		while($row4 = $result4->fetch_assoc()) {
			$cid=$row4["tcno"];
		}
	}
	if(isset($_POST['reject'])){
		mysqli_query($conn,"UPDATE tblthesis SET  adminApproval='REJECT', Note='$note' where tid='$id'");
		
			date_default_timezone_set("Asia/Manila");
    $d=strtotime("now");
    $date= date("Y-m-d H:i:s", $d);
		$sesaccount = $_SESSION['id'];
		$audit ="INSERT INTO tblaudit(userid, actiontaken, actiondate)"; 
		$audit .="VALUE('{$sesaccount}','Rejected Thesis with a Call Number of {$cid}','{$date}')";
		$audit =mysqli_query($conn,$audit);
		
		header('location:adminapproval.php');
	}
	else{
		mysqli_query($conn,"UPDATE tblthesis SET  adminApproval='APPROVED' where tid='$id'");
			date_default_timezone_set("Asia/Manila");
    $d=strtotime("now");
    $date= date("Y-m-d H:i:s", $d);
		$sesaccount = $_SESSION['id'];
		$audit ="INSERT INTO tblaudit(userid, actiontaken, actiondate)"; 
		$audit .="VALUE('{$sesaccount}','Approved Thesis with a Call Number of {$cid}','{$date}')";
		$audit =mysqli_query($conn,$audit);
		
		header('location:adminapproval.php');
	
	}

?>