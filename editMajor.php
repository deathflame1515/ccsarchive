<?php
	include('include/db.php');
	session_start();	
	$id=$_GET['id'];


	$mcode= strtoupper($_POST['edit-code']);
	$name=$_POST['edit-name'];
	


		$mcode = mysqli_real_escape_string($conn,$mcode);
		$name = mysqli_real_escape_string($conn,$name);




	if (($mcode == "" || empty($mcode))  OR ($name == "" || empty($name)) ){
		header('location:major.php');

			echo '<script type="text/javascript"> alert("Please check the fields")</script>';
	
	}
	else
	{
		$sql="Select COUNT(mcode) AS COUNTX from tblmajor where mcode='$mcode'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					if (($row['COUNTX']) == 0){
				$sql="update tblmajor set mname='$name', mcode='$mcode' where mid='$id'";
				mysqli_query($conn,$sql);

					date_default_timezone_set("Asia/Manila");
    $d=strtotime("now");
    $date= date("Y-m-d H:i:s", $d);
						$sesaccount = $_SESSION['id'];
						$audit ="INSERT INTO tblaudit(userid, actiontaken, actiondate)"; 
						$audit .="VALUE('{$sesaccount}','Updated Major Information of {$name}','{$date}')";
						$audit =mysqli_query($conn,$audit);
					}
				
			}		
			
		}
		
		
		
			header('location:major.php');
	}
	
	

?>