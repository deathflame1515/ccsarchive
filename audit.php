
<?php
session_start();
if (!isset($_SESSION["id"])){header("location: login.php");}


include('./include/db.php');

include('./include/header.php');


?>

      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    

 

	<!--main content start-->
      <section id="main-content">
	  
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="form-panel">
					   <h4 class="mb"><i class="fa fa-angle-right"></i>&ensp;Audit Trail</h4>
                          <table class="table table-striped table-advance table-hover" id="dataTable">
					
                              <thead>
							  
                              <tr>
                                  
                                  <th>User</th>
                                  <th>Action Taken</th>
								   <th>Date</th>
								   
                                  
                              </tr>
                              </thead>
                              <tbody>
							  <?php
							  if(isset($_POST['search'])){
									$cond = $_POST['course'];
									$cond='';
	
									if($course == 0){
										$cond = "";
									}
									else if($course !=0){
										$cond = " where userid = ".$cond."";
									}
								}
								if(!isset($_POST['search'])) {
									$sql = "SELECT * FROM tblaudit";
								}	
								else{
									$sort = "SELECT * FROM tblaudit".$cond."";
									$sql = $sort;
	 
								}
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
								   
									while($row = $result->fetch_assoc()) {
										$id =$row["id"];
										$userid=$row["userid"];
										$actiontaken=$row["actiontaken"];
										$actiondate=$row["actiondate"];
										
									echo '<tr>';
									
									$sql4="SELECT * FROM tbluser where uid='{$userid}'";
										$result4= $conn->query($sql4);
										if ($result4->num_rows > 0){
											while($row4 = $result4->fetch_assoc()) {
												$uname=$row4["firstname"];
											echo"<td>{$uname}</td>";
											}
										}
									echo"<td>{$actiontaken}</td>";
                                    echo"<td>{$actiondate}</td>";   
									
									
								
	
										
                              echo'</tr>';
									}
								}
								?>
                              </tbody>
	
                          </table>
                      </div><!-- /content-panel -->
                  </div>
				  
				  
				 
			
</div>
		</section>
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->
	  <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
	<!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
	<script>
	$('table').dataTable({searching: true,
		"aaSorting": [[ 2, "desc" ]]
		});
	</script>
	
  <?php
  include ('./include/footer.php');
  ?>
