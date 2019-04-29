<?php

include('include/db.php');
session_start();	

$id=$_GET['id'];

$sql = "SELECT * FROM tblmajor where mid={$id}";
$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$message='';
		while($row = $result->fetch_assoc()) {
			$mcode = $row["mcode"];
			
			}
		}


$query="DELETE  FROM tblmajor where mid={$id}";							
$deletequery = mysqli_query($conn,$query);

	date_default_timezone_set("Asia/Manila");
    $d=strtotime("now");
    $date= date("Y-m-d H:i:s", $d);

$sesaccount = $_SESSION['id'];

$audit ="INSERT INTO tblaudit(userid, actiontaken, actiondate)"; 
$audit .="VALUE('{$sesaccount}','Deleted Major with a Code of {$mcode}','{$date}')";
$audit =mysqli_query($conn,$audit);


header('location:major.php');


?>