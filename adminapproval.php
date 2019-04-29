
<?php
session_start();
if (!isset($_SESSION["id"])){header("location: login.php");}

if ($_SESSION["role"] != "ADMIN"){header("location: editor.php");}

include('./include/db.php');

include('./include/header.php');


if(isset($_POST['changeStatus'])){
$pass = $_POST["pass"];
$id = $_SESSION["id"];

$query="SELECT * FROM tbluser  WHERE uid='{$id}'";
			
			$fetchdata= mysqli_query($conn,$query);
			if (!$fetchdata){
			}
			while($row=mysqli_fetch_array($fetchdata)){
				
				 if (mysqli_num_rows($fetchdata)===1){
					if(password_verify($pass, $row['password'])){

						$sql = "SELECT * FROM tblthesis where adminapproval ='PENDING' ";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
						$message='';
						while($row = $result->fetch_assoc()) {
						$tcno = $row["tcno"] .',';
						$message= $message .' '. $tcno;
							}
						}
	

						$query="UPDATE tblthesis SET adminApproval='APPROVED' where adminapproval ='PENDING'";							
						$update = mysqli_query($conn,$query);

						date_default_timezone_set("Asia/Manila");
						$d=strtotime("now");
						$date= date("Y-m-d H:i:s", $d);
						$sesaccount = $_SESSION['id'];
						$audit ="INSERT INTO tblaudit(userid, actiontaken, actiondate)"; 
						$audit .="VALUE('{$sesaccount}','Approved all Studies with Call Number of {$message}','{$date}')";
						$audit =mysqli_query($conn,$audit);

						echo '<script type="text/javascript"> alert("Successfully Accepted All Studies")</script>';
					}else{
						echo '<script type="text/javascript"> alert("Incorrect Password!")</script>';
					}
				}
			}
		}

				
?>

 

	<!--main content start-->
      <section id="main-content">
	  
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-10">
                      <div class="form-panel">
					  
                          <table class="table table-striped table-advance table-hover">
								  
	                  	  	   <h4 class="mb"><i class="fa fa-angle-right"></i>&ensp;Pending Studies</h4>
							 
							  <?php 
							  $sql1 = "SELECT * FROM tblthesis where adminapproval ='PENDING' ";
								$result1 = $conn->query($sql1);

								if ($result1->num_rows > 0){
								  $button = '<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Approve All</button>';
								}
								else{
									$button = '';
								}
								echo $button; ?>
							  </form>
							  <br/><br>
							   
							   
                              <?php 
							  $sql2 = "SELECT * FROM tblthesis where adminapproval ='PENDING' ";
								$result2 = $conn->query($sql2);

								if ($result2->num_rows > 0){
								  $tableh = '<thead>
												<tr> 
													<th>Call Number</th>
													<th>Title</th>
													<th>Copyright</th>
													<th>Created By:</th>
													<th>Date Created:</th>
													<th>Date Modified:</th>
													<th style="text-align:center">Details</th>
												</tr>
											</thead>';
								}
								else{
									$tableh = '';
								}
								echo $tableh; ?>
							  
                              <tbody>
							  <?php
							  $sql = "SELECT * FROM tblthesis where adminapproval ='PENDING' ";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
								   
									while($row = $result->fetch_assoc()) {
										$tid =$row["tid"];
										$tcno=$row["tcno"];
										$tcname=$row["tcname"];
										$uid=$row["creator_uid"];
										$dtcreated=$row["TYear"];
										$date_created=$row["date_created"];
										$date_modified=$row["date_modify"];

									echo '<tr>';
									
									echo"<td>{$tcno}</td>";
									echo"<td>{$tcname}</td>";
									echo"<td>{$dtcreated}</td>";
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
									 echo "<button class='btn btn-primary btn-xs' data-toggle='modal' data-target='#update{$tid}'>";
									 echo '<i class="fa fa-eye">';
									 echo '</i>';
									 echo' View </button>';
	
										include('./include/thesismodal.php');
								   echo '</td>';
								   
                              echo'</tr>';
									}
								}
								else{
									echo '<td colspan="4">';
									echo '<h3 style = "text-align:center;">No Pending Studies</h3>';
									echo '</td>';
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
	  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" style="display: none;top:20%;" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
	  <div class="modal-header" style="border-radius: 6px;">
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	  <p class="modal-title">Approve All</p>
	  </div>
	  <form action="" method="post">
        <div class="modal-body">
          <h3><b>Approve All Studies?</b></h3>
		  <br>
		  <h5>Please Confirm Password:</h5>
		  <input type="password" name="pass" placeholder="Password">
        </div>
        <div class="modal-footer">
		
		<button class="btn btn-primary btn-sm" name="changeStatus">
                                <i class="fa fa-check-circle"></i> Confirm</button>
                            <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                                <i class="fa fa-times-circle"></i> Cancel</button>
		</form>
		</div>
      </div>
    </div>
  </div>
</div>
  <?php
  include ('./include/footer.php');
  ?>
