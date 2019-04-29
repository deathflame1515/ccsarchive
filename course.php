
<?php
session_start();
if (!isset($_SESSION["id"])){header("location: login.php");}
include('./include/db.php');

include('./include/header.php');




if (isset($_GET['delete']) && isset($_SESSION["id"])){
$id=$_GET['delete'];

$sql = "SELECT * FROM tblcourse where cid={$id}";
$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$message='';
		while($row = $result->fetch_assoc()) {
			$ccode = $row["ccode"];
			
			}
		}


$query="DELETE  FROM tblcourse where cid={$id}";							
$deletequery = mysqli_query($conn,$query);

	date_default_timezone_set("Asia/Manila");
    $d=strtotime("now");
    $date= date("Y-m-d H:i:s", $d);
$sesaccount = $_SESSION['id'];
		$audit ="INSERT INTO tblaudit(userid, actiontaken, actiondate)"; 
		$audit .="VALUE('{$sesaccount}','Delete Course with an Abbreviated Name of {$ccode}','{$date}')";
		$audit =mysqli_query($conn,$audit);

		header('location:thesis.php');
	

 echo '<meta http-equiv="Location" content="course.php/">';
}

if(isset($_POST['submit'])){
$cname = $_POST["cname"];
$ccode=strtoupper($_POST["ccode"]);	
										
$cname = mysqli_real_escape_string($conn,$cname);
$ccode = mysqli_real_escape_string($conn,$ccode);
											
if (($cname == "" || empty($cname))  OR ($ccode == "" || empty($ccode))){
	echo '<script type="text/javascript"> alert("Please check the fields")</script>';

}
else{
	
	$sql="Select COUNT(ccode) AS COUNTX from tblcourse where ccode='$ccode'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					if (($row['COUNTX']) == 0){
						$query ="INSERT INTO tblcourse(ccode,cname) VALUE('{$ccode}','{$cname}')";
						$course = mysqli_query($conn,$query);

							date_default_timezone_set("Asia/Manila");
    $d=strtotime("now");
    $date= date("Y-m-d H:i:s", $d);
						$sesaccount = $_SESSION['id'];
						$audit ="INSERT INTO tblaudit(userid, actiontaken, actiondate)"; 
						$audit .="VALUE('{$sesaccount}','Create Course with an Abbreviated Name of {$ccode}','{$date}')";
						$audit =mysqli_query($conn,$audit);
						}										
				
										
			}
			
}
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
     
                  <div class="col-lg-6">
                      <div class="form-panel">
                          <table class="table table-striped table-advance table-hover">
					
	                  	  	   <h4 class="mb"><i class="fa fa-angle-right"></i>&ensp;Course</h4>
							  
	                  
							   
                              <thead>
                              <tr>
                                  <th hidden><i class="fa fa-bullhorn"></i> ID</th>
                                  <th><i class="fa fa-question-circle"></i> Course Code</th>
                                  <th><i class="fa fa-bookmark"></i> Course Name</th>
								   <th><i class=" fa fa-edit"></i> Action</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
							  <?php
							  $sql = "SELECT * FROM tblcourse";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
								   
										while($row = $result->fetch_assoc()) {
										$cid=$row["cid"] ;
										$ccode=$row["ccode"];
										$cname=$row["cname"];
								
							
							  
									 echo '<tr>';
									 echo'<td hidden>'.$cid.'</td>';
									 echo'<td>'.$ccode.'</td>';
									 echo'<td>'.$cname.'</td>';
									 echo '<td>';								 
			
								
									 
									 
									  echo "<button class='btn btn-primary btn-xs'  data-toggle='modal' data-target='#edit{$cid}'>";
									 echo '<i class="fa fa-pencil">';									
									 echo '</i>';
									
									 echo'</button> ';
									 
									 
									 echo "<button class='btn btn-danger btn-xs'  data-toggle='modal' data-target='#delete{$cid}'>";
									 echo '<i class="fa fa-trash-o">';									
									 echo '</i>';
									
									 echo'</button>';
									 
									 
									  include('./include/coursemodal.php');
									 echo'</td>';
									 echo'</tr>';
							 }
									 echo '</table>';
									 
							}else {
									echo '0 results';
									}
							
									
							  
							  ?>
							  
							  
						
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div>
				  
				  
				  <div class="col-lg-6">
          			<div class="form-panel">
					<form class="form-horizontal tasi-form" method="post">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i>Add Course</h4>
                          
                              <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Course code</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="ccode">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputWarning">Course Name</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="cname">
                                  </div>
                              </div>
							  <div class="form-group">	 
                               <label class="col-sm- control-label col-lg-4" for="inputError"></label>
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
  <?php
  include ('./include/footer.php');
  ?>