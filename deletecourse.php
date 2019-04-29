<?php
session_start();
include('include/db.php');

$id=$_GET['id'];

$sql = "SELECT * FROM tblcourse where cid={$id}";
$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$message='';
		while($row = $result->fetch_assoc()) {
			$ccode = $row["ccode"];
			
			}
		}

		

$query="DELETE  FROM tblcourse where cid={$id}";							
$deletequery = mysqli_query($conn,$query);

	date_default_timezone_set("Asia/Manila");
    $d=strtotime("now");
    $date= date("Y-m-d H:i:s", $d);

$sesaccount = $_SESSION['id'];

$audit ="INSERT INTO tblaudit(userid, actiontaken, actiondate)"; 
$audit .="VALUE('{$sesaccount}','Deleted Course with a Code of {$ccode}','{$date}')";
$audit =mysqli_query($conn,$audit);



echo "<script>
	
		alert('Account already ". $sesaccount. " exists!');
							</script>";
header('location:course.php');


?>