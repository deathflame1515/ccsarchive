<?php
	include('include/db.php');
	session_start();	
	$id=$_GET['id'];

	$code=strtoupper($_POST['edit-code']);
	$name=$_POST['edit-name'];

		$code = mysqli_real_escape_string($conn,$code);
		$name = mysqli_real_escape_string($conn,$name);




	if (($code == "" || empty($code))  OR ($name == "" || empty($name)) ){
		header('location:course.php');

		
			
	}
	else
	{
		
		$sql="Select COUNT(ccode) AS COUNTX from tblcourse where ccode='$code'";
			$result = $conn->query($sql);
			
				while($row = $result->fetch_assoc()) {
					if (($row['COUNTX']) == 0){
						
					$sql="update tblcourse set cname='$name', ccode='$code' where cid='$id'";
						mysqli_query($conn,$sql);

							date_default_timezone_set("Asia/Manila");
    $d=strtotime("now");
    $date= date("Y-m-d H:i:s", $d);
						$sesaccount = $_SESSION['id'];
						$audit ="INSERT INTO tblaudit(userid, actiontaken, actiondate)"; 
						$audit .="VALUE('{$sesaccount}','Updated Course Information of {$name}','{$date}')";
						$audit =mysqli_query($conn,$audit);
			}
			
			}
		
		header('location:course.php');
	
		

	}
	
	

?>