
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
					   <h4 class="mb"><i class="fa fa-angle-right"></i>&ensp;Approved Studies</h4>
                          <table class="table table-striped table-advance table-hover">
					
                              <thead>
							  
                              <tr>
                                  
                                  <th>Call Number</th>
                                  <th>Title</th>
								   <th>Copyright</th>
								   <th>Course</th>
								    <th style="text-align:center">Status</th>
									<th>Uploaded By:</th>
									<th>Date Created:</th>
									<th>Date Modified:</th>
								   <th>Details</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
							  <?php
							  if(isset($_POST['search'])){
									$course = $_POST['course'];
									$cond='';
	
									if($course == 0){
										$cond = " where adminApproval='APPROVED'";
									}
									else if($course !=0){
										$cond = " where adminApproval='APPROVED' and Course = ".$course."";
									}
								}
								if(!isset($_POST['search'])) {
									$sql = "SELECT * FROM tblthesis where adminApproval ='APPROVED'";
								}	
								else{
									$sort = "SELECT * FROM tblthesis".$cond."";
									$sql = $sort;
	 
								}
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
								   
									while($row = $result->fetch_assoc()) {
										$tid =$row["tid"];
										$tcno=$row["tcno"];
										$tcname=$row["tcname"];
										$course=$row["Course"];
										$dtcreated=$row["TYear"];
										$status=$row["adminApproval"];
										$uid=$row["creator_uid"];
										$date_created=$row["date_created"];
										$date_modified=$row["date_modify"];
									echo '<tr>';
									
									echo"<td>{$tcno}</td>";
									echo"<td>{$tcname}</td>";
								
									echo"<td>{$dtcreated}</td>";
									$sql2 = "SELECT * FROM tblcourse where cid = '{$course}'";
									$result2 = $conn->query($sql2);
									if ($result2->num_rows > 0){
										while($row2 = $result2->fetch_assoc()) {
											$ccode=$row2["ccode"];
									echo"<td>{$ccode}</td>";
									}
									}
									
									echo"<td><span class='label label-primary label-mini'>{$status}</span></td>";
									$sql4="SELECT * FROM tbluser where uid='{$uid}'";
										$result4= $conn->query($sql4);
										if ($result4->num_rows > 0){
											while($row4 = $result4->fetch_assoc()) {
												$cname=$row4["firstname"];
											echo"<td>{$cname}</td>";
											}
										}
										echo"<td>{$date_created}</td>";
										echo"<td>{$date_modified}</td>";
								    echo'<td>';
									 echo "<button class='btn btn-primary btn-xs' data-toggle='modal' data-target='#edit{$tid}'>";
									 echo '<i class="fa fa-pencil">';
									 echo '</i>';
									 echo'</button>';
	
										include('./include/thesismodal.php');
								   echo '</td>';
								   
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
	$('table').dataTable({searching: true,});
	</script>
	<script>
	$(function() {
		$("#major option[value='44']").attr("disabled","disabled");
		$("#major option[value='41']").attr("disabled",false);
		$("#major option[value='42']").attr("disabled",false);
		$("#major option[value='43']").attr("disabled",false);
		$("#course").change(function() {
                if ($(this).val() == "75") {
					$("#major option[value='41']").attr("disabled","disabled");
					$("#major option[value='42']").attr("disabled","disabled");
					$("#major option[value='43']").attr("disabled","disabled");
					$("#major option[value='44']").attr("disabled","disabled");
                }
                else if ($(this).val() == "76") {
                    $("#major option[value='41']").attr("disabled","disabled");
					$("#major option[value='42']").attr("disabled","disabled");
					$("#major option[value='43']").attr("disabled","disabled");
					$("#major option[value='44']").attr("disabled",false);
				}else if ($(this).val() == "74") {
					$("#major option[value='44']").attr("disabled","disabled");
					$("#major option[value='41']").attr("disabled",false);
					$("#major option[value='42']").attr("disabled",false);
					$("#major option[value='43']").attr("disabled",false);
				}
            });
        });
	</script>
  <?php
  include ('./include/footer.php');
  ?>
