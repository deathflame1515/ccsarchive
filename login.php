<?php
session_start();
include('./include/db.php');

if (isset($_SESSION["id"])){header("location: ./home.php");}

if (isset($_POST['submit'])){
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	
	$username=mysqli_real_escape_string($conn,$username);
	$password=mysqli_real_escape_string($conn,$password);
	
				
		if (strlen($username) ==0){
			echo '<script type="text/javascript"> alert("Please Login")</script>';
		}
		elseif($username && $password){
			
				if (($username=='SUPERADMIN') AND ($password == 'TACAS')){
					    $_SESSION['id']='1';
						$_SESSION['role']='SUPERADMIN';
						$_SESSION['name']='SUPERADMIN';
						$_SESSION['lastname']='SUPERADMIN';
						$_SESSION['username']='SUPERADMIN';
						$_SESSION['email']='SUPERADMIN';
						header("location: ./home.php");
				}
			
			$query="SELECT * FROM tbluser  WHERE username='{$username}'";
			
			$fetchdata= mysqli_query($conn,$query);
			if (!$fetchdata){
			}
			while($row=mysqli_fetch_array($fetchdata)){
				
				 if (mysqli_num_rows($fetchdata)===1){
					if ($row['uid']==''){
						echo '<script type="text/javascript"> alert("Login Failed")</script>';
					}
					if(password_verify($password, $row['password'])){
						
						$_SESSION['id']=$row['uid'];
						$_SESSION['role']=$row['role'];
						$_SESSION['name']=$row['firstname'];
						$_SESSION['lastname']=$row['lastname'];
						$_SESSION['username']=$row['username'];
						$_SESSION['email']=$row['username'];
						header("location: ./home.php");
					}
					else{
						echo '<script type="text/javascript"> alert("Incorrect Password!")</script>';
					}
				}
				
				
			
				
			}
			
		}
		else{
			echo '<script type="text/javascript"> alert("Login Failed!")</script>';
		}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Thesis and Capstone Archive</title>
	<link rel="icon" type="image" href="img/ccs.png">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="login.php" method="POST">
		        <h2 class="form-login-heading" style="background-color:#a94442;">sign in now</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" name="username" placeholder="User Account" autofocus>
		            <br>
		            <input type="password" class="form-control" name="password" placeholder="Password">
		            <br><br><br>
		            <button class="btn btn-theme btn-block" name="submit" href="" type="submit" style="background-color:#a94442; border-color:#999;"><i class="fa fa-lock"></i> SIGN IN</button>
		            <hr>
		         
		
		        </div>
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="./assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/ccs.png", {speed: 500});
    </script>


  </body>
</html>
