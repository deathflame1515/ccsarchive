<?php
	include('include/db.php');
	session_start();
	$id=$_GET['id'];
	$id2=$_SESSION['id'];
	$pass=$_POST['edit-password'];
	$pass1=$_POST['edit-password1'];
	$fname=$_POST['edit-name'];
	$lname=$_POST['edit-last'];

	$sql = "SELECT * FROM tbluser where uid= '$id'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
	while($row = $result->fetch_assoc()) {								
		$username=$row["username"];
	}
	}
	
	if(!isset($_POST['check'])){
				$role='EDITOR';
		}
	else{
			$role='ADMIN';
		}
		
	
	if (($pass1 != $pass)){		
			echo '<script type="text/javascript">'; 
			echo 'alert("Password did not match");'; 
			echo 'window.location.href = "adminaccounts.php";';
			echo '</script>';
			
	}
	elseif (($pass == '') AND ($pass1 == '')){
		mysqli_query($conn,"update tbluser set firstname='$fname', lastname='$lname', role='$role' where uid='$id'");
		date_default_timezone_set("Asia/Manila");
    $d1=strtotime("now");
    $date1= date("Y-m-d H:i:s", $d1);
	$sesaccount1 = $_SESSION['id'];
	$audit1 ="INSERT INTO tblaudit(userid, actiontaken, actiondate)"; 
	$audit1 .="VALUE('{$sesaccount1}','Updated Account with Username of {$username}','{$date1}')";
	$audit1 =mysqli_query($conn,$audit1);
		if (($role == 'EDITOR')&&($id == $id2)){
			echo '<script type="text/javascript">'; 
			echo 'alert("Successfully Updated Account");'; 
			echo 'window.location.href = "include/unset.php";';
			echo '</script>';
		}else{
			echo '<script type="text/javascript">'; 
			echo 'alert("Successfully Updated Account");'; 
			echo 'window.location.href = "adminaccounts.php";';
			echo '</script>';
		}
	}
		
	else
	{
		$pass = password_hash($pass, PASSWORD_DEFAULT);	
		mysqli_query($conn,"update tbluser set password='$pass', firstname='$fname', lastname='$lname', role='$role' where uid='$id'");
	date_default_timezone_set("Asia/Manila");
    $d=strtotime("now");
    $date= date("Y-m-d H:i:s", $d);
	
	
	$sesaccount = $_SESSION['id'];
	$audit ="INSERT INTO tblaudit(userid, actiontaken, actiondate)"; 
	$audit .="VALUE('{$sesaccount}','Changed Account Password with the Username of {$username}','{$date}')";
	$audit =mysqli_query($conn,$audit);
		if (($role == 'EDITOR')&&($id == $id2)){
			echo '<script type="text/javascript">'; 
			echo 'alert("Successfully Changed Account Password");'; 
			echo 'window.location.href = "include/unset.php";';
			echo '</script>';
		}else{
			echo '<script type="text/javascript">'; 
			echo 'alert("Successfully Changed Account Password");'; 
			echo 'window.location.href = "adminaccounts.php";';
			echo '</script>';
		}

		echo '<script type="text/javascript"> alert("Save")</script>';
		

	}
	
	

?>