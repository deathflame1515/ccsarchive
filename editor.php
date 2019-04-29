
<?php
session_start();
if (!isset($_SESSION["id"])){header("location: login.php");}

if ($_SESSION["role"] == "ADMIN"){header("location: adminapproval.php");}

include('./include/db.php');

include('./include/header.php');



if(isset($_POST['submit'])){
	$ccode = $_POST["ccode"];
	$cname = $_POST["cname"];
	$meta_cname = metaphone($cname);
	$author=$_POST["author"];
	$meta_author = metaphone($author);
	$course=$_POST["course"];	
	$major=$_POST["major"];
	$tyear=$_POST["tyear"];
	$tag=$_POST["tag"];	
	$meta_tag = metaphone($tag);
	$uid = $_SESSION["id"];						
	$ccode = mysqli_real_escape_string($conn,$ccode);
	$cname = mysqli_real_escape_string($conn,$cname);
	$meta_cname = mysqli_real_escape_string($conn,$meta_cname);
	$status = mysqli_real_escape_string($conn,$status);
	$author = mysqli_real_escape_string($conn,$author);
	$meta_author = mysqli_real_escape_string($conn,$meta_author);
	$course = mysqli_real_escape_string($conn,$course);
	$major = mysqli_real_escape_string($conn,$major);
	$tyear = mysqli_real_escape_string($conn,$tyear);
	$tag = mysqli_real_escape_string($conn,$tag);
	$meta_tag = mysqli_real_escape_string($conn,$meta_tag);
	$uid = mysqli_real_escape_string($conn,$uid);
	$query = "SELECT * from tblthesis where tcno = '{$ccode}'";
	$results = $conn->query($query);
	
	$content = mysqli_real_escape_string($conn,$_POST['tcontent']);
	if (($cname == "" || empty($cname))  OR ($ccode == "" || empty($ccode)) OR ($author == "" || empty($author))  OR ($tyear == "" || empty($tyear)) OR ($tag == "" || empty($tag))){
		echo '<script type="text/javascript"> alert("Please check all the fields")</script>';
	}
	else if (strlen($tyear)<> 4){
		echo '<script type="text/javascript"> alert("Please insert a valid year!")</script>';
	}
	else if ($results->num_rows > 0 ){
		echo '<script type="text/javascript"> alert("The Call Number of the study is already existing!")</script>';
	}
	else{
		mysqli_query($conn,"INSERT INTO tblthesis (tcno, tcname, meta_tcname, Author, meta_Author, Course, Major, tags, meta_tags, TYear, adminApproval, creator_uid, date_created, date_modify, tcontent)
		VALUES('$ccode', '$cname', '$meta_cname', '$author', '$meta_author', '$course', '$major', '$tag', '$meta_tag', $tyear, 'PENDING', $uid, NOW(), NOW(), '$content')");
			echo '<script type="text/javascript"> alert("'.$cname.' has been Added")</script>';
		
				date_default_timezone_set("Asia/Manila");
    $d=strtotime("now");
    $date= date("Y-m-d H:i:s", $d);
			$sesaccount = $_SESSION['id'];
			$audit ="INSERT INTO tblaudit(userid, actiontaken, actiondate)"; 
			$audit .="VALUE('{$sesaccount}','Created a New Thesis  with a Call Number of  {$ccode}','{$date}')";
			$audit =mysqli_query($conn,$audit);
		
		}	

	}
								

				


								
?>

      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    

 

	<!--main content start-->
      <section id="main-content">
	  
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-6">
                      <div class="form-panel">
                          <table class="table table-striped table-advance table-hover">
					
	                  	  	   <h4 class="mb"><i class="fa fa-angle-right"></i>&ensp;Pending Studies</h4>
                              <thead>
                              <tr>
                                  
                                  <th>Call Number</th>
                                  <th>Title</th>
								   <th>Copyright</th>
								    <th style="text-align:center">Status</th>
								   <th>Details</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
							  <?php
							  $sql = "SELECT * FROM tblthesis where adminApproval !='APPROVED'";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
								   
									while($row = $result->fetch_assoc()) {
										$tid =$row["tid"];
										$tcno=$row["tcno"];
										$tcname=$row["tcname"];
								
										$dtcreated=$row["TYear"];
										$status=$row["adminApproval"];
									echo '<tr>';
									
									echo"<td>{$tcno}</td>";
									echo"<td>{$tcname}</td>";
								
									echo"<td>{$dtcreated}</td>";
									
									if ($status =='REJECT'){
										echo"<td><span class='label label-danger label-mini'>{$status}</span></td>";
									}
									else{
										echo"<td><span class='label label-primary label-mini'>{$status}</span></td>";
									}
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
				  
				  
				  <div class="col-md-6">
          			<div class="form-panel">
					<form class="form-horizontal tasi-form" method="post" action="editor.php">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i>Add Study</h4>
                          
                              <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2">Call No.</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="ccode">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2">Title</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="cname">
                                  </div>
                              </div>
							  
							  <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2">Author/s</label>
                                  <div class="col-lg-10">
                                       <textarea class="form-control" rows="5" name="author"></textarea>
                                  </div>
                              </div>
							  <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2">Course</label>
                                  <div class="col-lg-10">
						     <select name="course" id="course">
                                      <?php
							  $sql = "SELECT * FROM tblcourse";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										$cid =$row["cid"];
										$cname=$row["cname"];
										$ccode=$row["ccode"];
										 echo '<option value="'.$cid.'">' .$cname.'</option>';
								}}
									
										?>
							 </select>	 
										
								</div>
                              </div>
							  <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2">Major</label>
                                  <div class="col-lg-10">
                                   
							<select name="major" id="major">		
										<?php
							  $sql = "SELECT * FROM tblmajor";
								$result = $conn->query($sql);
								
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										$mid =$row["mid"];
										$mname=$row["mname"];
										$mcode=$row["mcode"];
										 echo '<option id="major" value="'.$mid.'">' .$mname.'</option>';
								}}
									
									
							?>
							</select>
                                  </div>
                              </div>
							  <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2">Copyright</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="tyear"  onkeypress="return onlyNos(event,this);" >
                                  </div>
                              </div>
							  
							  <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2">Tag</label>
                                  <div class="col-lg-10">
                                       <textarea class="form-control" rows="5" name="tag"></textarea>
                                  </div>
                                  </div>
								  
								  <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2">Abstract</label>
                                  <div class="col-lg-10">
                                       <textarea class="form-control" rows="5" name="tcontent"></textarea>
                                  </div>
                                  </div>
								  
							  <div class="form-group">	 
                               <label class="col-sm- control-label col-lg-4"></label>
                                  <div class="col-lg-12">
								   <button class="btn btn-theme btn-block" type="submit" name="submit" value="add">ADD</button>
								
                                    
								   </div>
                              </div>
							  
							  
                          </form><!-- /col-md-6 -->
							</div><!-- /row -->
					
				  </div>
			
</div>
		</section>
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->
	  <!-- Bootstrap core JavaScript -->
	 <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
	<!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
	<!-- <script>
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
	</script> -->
  <?php
  include ('./include/footer.php');
  ?>
