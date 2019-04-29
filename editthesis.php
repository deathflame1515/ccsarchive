<?php
session_start();
	include('include/db.php');
	
	$id=$_GET['id'];

	$tid=$_POST['edit-no'];
	$title=$_POST['edit-title'];
	$meta_title = metaphone($title);
	$year=$_POST['edit-year'];
	$course=$_POST['edit-course'];
	$major=$_POST['edit-major'];
	$author=$_POST['edit-author'];
	$meta_author = metaphone($author);
	$tag=$_POST['edit-tag'];
	$meta_tag = metaphone($tag);
	$content=$_POST['edit-content'];

		$tid = mysqli_real_escape_string($conn,$tid);
		$title = mysqli_real_escape_string($conn,$title);
		$meta_title = mysqli_real_escape_string($conn,$meta_title);
		$status = mysqli_real_escape_string($conn,$status);
		$author = mysqli_real_escape_string($conn,$author);
		$meta_author = mysqli_real_escape_string($conn,$meta_author);
		$year = mysqli_real_escape_string($conn,$year);
		$course = mysqli_real_escape_string($conn,$course);
		$major = mysqli_real_escape_string($conn,$major);
		$tag = mysqli_real_escape_string($conn,$tag);
		$meta_tag = mysqli_real_escape_string($conn,$meta_tag);
		$content = mysqli_real_escape_string($conn,$content);
		$uid = mysqli_real_escape_string($conn,$uid);



	if (($tid == "" || empty($tid))  OR ($title == "" || empty($title)) ){
		header('location:thesis.php');

		
			
	}
	else
	{

		mysqli_query($conn,"UPDATE tblthesis SET tcno='$tid',tcname='$title', meta_tcname='$meta_title',Author='$author',meta_Author='$meta_author',Course='$course',Major='$major',TYear='$year',tags='$tag',meta_tags='$meta_tag',tcontent='$content',date_modify=NOW(),adminApproval='PENDING' where tid='$id'");
		
			date_default_timezone_set("Asia/Manila");
    $d=strtotime("now");
    $date= date("Y-m-d H:i:s", $d);
		$sesaccount = $_SESSION['id'];
		$audit ="INSERT INTO tblaudit(userid, actiontaken, actiondate)"; 
		$audit .="VALUE('{$sesaccount}','Edit Thesis with a Call Number of {$tid}','{$date}')";
		$audit =mysqli_query($conn,$audit);
		header('location:thesis.php');
	
		

	}
	
	

?>

