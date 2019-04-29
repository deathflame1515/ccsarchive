<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Thesis and Capstone Archive</title>
	<link rel="icon" type="image" href="img/ccs.png">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		a.edit ,a.delete{
		color:white}
	</style>
  
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="home.php" class="logo"><b>Thesis and Capstone Archive</b></a>
            <!--logo end-->
            
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="include/unset.php">Logout</a></li>
            	</ul>
            </div>
			
			<?php 
			$usernameload=$_SESSION["username"];
			
			?>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><img src="assets/img/image.jpg" class="img-circle" width="60"></a></p>
              	<h3 class="centered">Welcome Back</h3>
				<h5 class="centered"><?php echo $_SESSION['name']; ?></h5>
              	  	
                  <li class="mt">
                      <a href="home.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="accounts.php">
                          <i class="fa fa-user"></i>
                          <span>Account Settings</span>
                      </a>
                  </li>
                <?php
				
				$account= $_SESSION["role"];
                    if ($_SESSION["role"] == 'ADMIN'||$_SESSION["role"] == 'SUPERADMIN'){
                        echo'<li class="sub-menu">
                      <a href="thesis.php">
                          <i class="fa fa-book"></i>
                          <span>Pending Studies</span>
                      </a>
                  </li>';
                }
                  else{
                    echo'<li class="sub-menu">
                    <a href="thesis.php">
                        <i class="fa fa-book"></i>
                        <span>Pending/Add Studies</span>
                    </a>
                </li>';

                  }
                  ?>
				  <li class="sub-menu">
						<a href="thesis1.php">
							<i class="fa fa-thumbs-up"></i>
							<span>Approved Studies</span>
						</a>
					</li>
				  
				  <?php

						
							 echo'<li class="sub-menu">
								  <a href="#" >
									  <i class="fa fa-cog"></i>
									  <span>Utilities</span>
								  </a>
								  <ul class="sub">';
								  if ($_SESSION["role"] == 'EDITOR'){
									  echo  '<li><a  href="course.php">Add/Edit Course</a></li>
									  <li><a  href="major.php">Add/Edit Major</a></li>
									 
								  </ul>
							  </li>';
								  }
								  else{
								   echo  '<li><a  href="audit.php">Audit Trail</a></li>';
									
						}
				  ?>
				  
				  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->