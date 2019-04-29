
<?php
session_start();
if (!isset($_SESSION["id"])){header("location: login.php");
die();}
include('./include/db.php');

include('./include/header.php');

if (isset($_GET['delete']) && isset($_SESSION["id"])){
$id=$_GET['delete'];


$sql = "SELECT * FROM tblcourse where mid={$id}";
$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$message='';
		while($row = $result->fetch_assoc()) {
			$mcode = $row["mcode"];
			
			}
		}


$query="DELETE  FROM tblmajor where mid={$id}";							
$deletequery = mysqli_query($conn,$query);	

	date_default_timezone_set("Asia/Manila");
    $d=strtotime("now");
    $date= date("Y-m-d H:i:s", $d);
$sesaccount = $_SESSION['id'];
		$audit ="INSERT INTO tblaudit(userid, actiontaken, actiondate)"; 
		$audit .="VALUE('{$sesaccount}','Delete Major with an Abbreviated Name of {$mcode}','{$date}')";
		$audit =mysqli_query($conn,$audit);

 echo '<meta http-equiv="Location" url="major.php">';
}


if(isset($_POST['submit'])){
$mname =$_POST["mname"];
$mcode=strtoupper($_POST["mcode"]);	
										
$mname = mysqli_real_escape_string($conn,$mname);
$mcode = mysqli_real_escape_string($conn,$mcode);
											
if (($mname == "" || empty($mname))  OR ($mcode == "" || empty($mcode))){
	echo '<script type="text/javascript"> alert("Please check the fields")</script>';
}
else{
	
	        $sql="Select COUNT(mcode) AS COUNTX from tblmajor where mcode='$mcode'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					if (($row['COUNTX']) == 0){
						$query ="INSERT INTO tblmajor(mcode,mname)"; 
							$query .="VALUE('{$mcode}','{$mname}')";
							$major = mysqli_query($conn,$query);

							date_default_timezone_set("Asia/Manila");
  							$d=strtotime("now");
							$date= date("Y-m-d H:i:s", $d);
						    $sesaccount = $_SESSION['id'];
							$audit ="INSERT INTO tblaudit(userid, actiontaken, actiondate)"; 
							$audit .="VALUE('{$sesaccount}','Create Major with an Abbreviated Name of {$mcode}','{$date}')";
							$audit =mysqli_query($conn,$audit);
						
					}
				
				}
				
			}
		   echo'<meta http-equiv="Refresh" content="2; url=major.php">';	
}								
	}
						
?>

      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    
<section id="main-content">
                          <section class="wrapper">
                            <div class="row mt">
                  <div class="col-lg-6">
                      <div class="form-panel">
                          <table class="table table-striped table-advance table-hover">
					
	                  	  	   <h4 class="mb"><i class="fa fa-angle-right"></i>&ensp;Major</h4>
							  
	                  
							   
                              <thead>
                              <tr>
                                  <th hidden><i class="fa fa-bullhorn"></i> ID</th>
                                  <th><i class="fa fa-question-circle"></i> Major Code</th>
                                  <th><i class="fa fa-bookmark"></i> Major Name</th>
								   <th><i class=" fa fa-edit"></i> Action</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
							  <?php
							  $sql = "SELECT * FROM tblmajor";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
								   
										while($row = $result->fetch_assoc()) {
										$mid=$row["mid"] ;
										$mcode=$row["mcode"];
										$mname=$row["mname"];
								
							
							  
									 echo '<tr>';
									 echo'<td hidden>'.$mid.'</td>';
									 echo'<td>'.$mcode.'</td>';
									 echo'<td>'.$mname.'</td>';
									 echo '<td>';								 						
									  echo "<button class='btn btn-primary btn-xs'  data-toggle='modal' data-target='#edit{$mid}'>";
									 echo '<i class="fa fa-pencil">';									
									 echo '</i>';
									 echo'</button>';
									 
									 
									   echo " <button class='btn btn-danger btn-xs'  data-toggle='modal' data-target='#delete{$mid}'>";
									 echo '<i class="fa fa-trash-o">';									
									 echo '</i>';
									 echo'</button>';
									 
									 
									  include('./include/majormodal.php');
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
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i>Add Major</h4>
                          
                              <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Major code</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="mcode">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputWarning">Major Name</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="mname">
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
      </section><!-- /MAIN CONTENT -->
	   </section>
    
      <!--main content end-->
  <?php
  include ('./include/footer.php');
  ?>