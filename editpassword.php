<?php
	include('include/db.php');
	session_start();

	$id=$_GET['id'];


	
	$pass=$_POST['edit-password'];
	$pass1=$_POST['edit-password1'];
	$fname=$_POST['edit-name'];
	$lname=$_POST['edit-last'];
	
	
	
if (($pass1 != $pass)){		
		echo '<script type="text/javascript">'; 
		echo 'alert("Password did not match");'; 
		echo 'window.location.href = "myaccount.php";';
		echo '</script>';
		
}if (($pass == '') AND ($pass1 == '')){
	mysqli_query($conn,"update tbluser set firstname='$fname', lastname='$lname' where uid='$id'");
	date_default_timezone_set("Asia/Manila");
    $d1=strtotime("now");
    $date1= date("Y-m-d H:i:s", $d1);
	
	
	$sesaccount1 = $_SESSION['id'];
	$audit1 ="INSERT INTO tblaudit(userid, actiontaken, actiondate)"; 
	$audit1 .="VALUE('{$sesaccount1}','Updated Account Information','{$date1}')";
	$audit1 =mysqli_query($conn,$audit1);
	echo '<script type="text/javascript">'; 
	echo 'alert("Successfully Updated Account");'; 
	echo 'window.location.href = "myaccount.php";';
	echo '</script>';
}else
	{
		$pass = password_hash($pass, PASSWORD_DEFAULT);	
		mysqli_query($conn,"update tbluser set password='$pass' where uid='$id'");
		date_default_timezone_set("Asia/Manila");
    $d=strtotime("now");
    $date= date("Y-m-d H:i:s", $d);
	
	
	$sesaccount = $_SESSION['id'];
	$audit ="INSERT INTO tblaudit(userid, actiontaken, actiondate)"; 
	$audit .="VALUE('{$sesaccount}','Changed Account Password','{$date}')";
	$audit =mysqli_query($conn,$audit);
		echo '<script type="text/javascript">'; 
		echo 'alert("Successfully Changed Account Password");'; 
		echo 'window.location.href = "myaccount.php";';
		echo '</script>';
	
		

	}
	
	

?>