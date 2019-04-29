
<?php
session_start();

if (!isset($_SESSION["id"])){header("location:login.php");}

include('./include/db.php');

include('./include/header.php');


?>

      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    
  <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                  	
                  
                      
                     
                    
                    				
					<div class="row">
						
						<div class="col-md-3 col-sm-3 mb">
							<!-- REVENUE PANEL -->
							<div class="darkblue-panel pn">
								<div class="darkblue-header">
									<h5>Total Registered User</h5>
								</div>
								<div class="darkblue-body">
								<i class="fa fa-user" style="font-size:68px;color:white;"></i>
								<h5 style="font-size:18px;"><?php
							  $sql = "SELECT count(uid) as Total FROM tbluser ";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {								   
										while($row = $result->fetch_assoc()) {
																	
										$Total=$row["Total"];								
							echo $Total;							  
								}}
							  ?></h5>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 mb">
							<!-- REVENUE PANEL -->
							<div class="darkblue-panel pn">
								<div class="darkblue-header">
									<h5>Total Approved Study</h5>
								</div>
								<div class="darkblue-body">
								<i class="fa fa-book" style="font-size:68px;color:white;"></i>
								<h5 style="font-size:18px;">
								<?php
							  $sql = "SELECT count(tid) as Total FROM tblthesis where adminApproval='Approved'";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {								   
										while($row = $result->fetch_assoc()) {
																	
										$mname=$row["Total"];								
							echo$mname;							  
								}}
							  ?>
								
								</h5>
								</div>
						</div>
						</div>
						<div class="col-md-3 col-sm-3 mb">
							<!-- REVENUE PANEL -->
							<div class="darkblue-panel pn">
								<div class="darkblue-header">
									<h5>Total Pending Study</h5>
										
								</div>
								<div class="darkblue-body">
								<i class="fa fa-gears" style="font-size:68px;color:white"></i>
								<h5 style="font-size:18px;">
								<?php
							  $sql = "SELECT count(tid) as Total FROM tblthesis where adminApproval ='PENDING'";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {								   
										while($row = $result->fetch_assoc()) {
																	
										$total=$row["Total"];								
							echo $total;							  
								}}
							  ?>
								</h5>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-3 mb">
							<!-- REVENUE PANEL -->
							<div class="darkblue-panel pn">
								<div class="darkblue-header">
									<h5>Total Reject Study</h5>
										
								</div>
								<div class="darkblue-body">
								<i class="fa fa-ban" style="font-size:68px;color:white"></i>
								<h5 style="font-size:18px;">
								<?php
							  $sql = "SELECT count(tid) as Total FROM tblthesis where adminApproval ='REJECT'";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {								   
										while($row = $result->fetch_assoc()) {
																	
										$total=$row["Total"];								
							echo $total;							  
								}}
							  ?>
								</h5>
								</div>
							</div>
						</div>
						
					</div><!-- /row -->
					
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
              </div><!-- --/row ---->
          </section>
      </section>
      <!--main content end-->
  <?php
  include ('./include/footer.php');
  ?>