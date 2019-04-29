<?php
session_start();
if (!isset($_SESSION["id"])){header("location: ./login.php");}
if ($_SESSION["role"] == "EDITOR"){header("location: ./myaccount.php");}
include('./include/db.php');

include('./include/header.php');



if (isset($_GET['delete']) && isset($_SESSION["id"])){
$id=$_GET['delete'];
$query="DELETE  FROM tbluser where uid={$id}";							
$deletequery = mysqli_query($conn,$query);

 header("location: accounts.php");
}

if(isset($_POST['submit'])){
$fname = $_POST["fname"];
$lname=$_POST["lname"];	
$user=$_POST["user"];
$pass=$_POST["pass"];		
										
$fname = mysqli_real_escape_string($conn,$fname);
$lname = mysqli_real_escape_string($conn,$lname);
$user = mysqli_real_escape_string($conn,$user);

$pass = password_hash($pass, PASSWORD_DEFAULT);												
if (($fname == "" || empty($fname))  OR ($lname == "" || empty($lname)) OR ($user == "" || empty($user))  OR ($pass == "" || empty($pass))){
	echo '<script type="text/javascript"> alert("Please check the fields")</script>';
	
}
else{
	
	if(!isset($_POST['check'])){
				$role='EDITOR';
		}
	else{
			$role='ADMIN';
		}
	
	
	$sql="Select COUNT(username) AS COUNTX from tbluser where username='$user'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					if (($row['COUNTX']) == 0){
						$query ="INSERT INTO tbluser(firstname, lastname, username, password, role) "; 
						$query .="VALUE('{$fname}','{$lname}','{$user}','{$pass}','{$role}')";
						$course = mysqli_query($conn,$query);
						
						date_default_timezone_set("Asia/Manila");
						$d=strtotime("now");
						$date= date("Y-m-d H:i:s", $d);
                        $sesaccount = $_SESSION['id'];
						$audit ="INSERT INTO tblaudit(userid, actiontaken, actiondate)"; 
                        $audit .="VALUE('{$sesaccount}','Created an Account for {$fname} {$lname}','{$date}')";
						$audit =mysqli_query($conn,$audit);
					}
					else{
						echo '<script type="text/javascript"> alert("Account already exist")</script>';
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
                  <div class="col-md-6">
                      <div class="form-panel">
                          <table class="table table-striped table-advance table-hover">
					
	                  	  	   <h4 class="mb"><i class="fa fa-angle-right"></i>&ensp;Accounts</h4>
							  
	                  
							   
                              <thead>
                              <tr>
                                  <th><i class="fa fa-info-circle"></i> Firsname</th>
                                  <th><i class="fa fa-bookmark"></i> Lastname</th>
                                  <th><i class=" fa fa-edit"></i> Username</th>
								   <th><i class=" fa fa-edit"></i> Access</th>

								   <th><i class=" fa fa-edit"></i> Action</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
							  <?php
							 $sql = "SELECT * FROM tbluser WHERE uid>1";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
								   
										while($row = $result->fetch_assoc()) {
										$uid=$row["uid"] ;
										$firstname=$row["firstname"];
										$lastname=$row["lastname"];
										$username=$row["username"];
										
										$role=$row["role"];
	
							
							  
									 echo '<tr>';
									 echo'<td>'.$firstname.'</td>';
									  echo'<td>'.$lastname.'</td>';
									 echo'<td>'.$username.'</td>';
									 echo'<td>'.$role.'</td>';
									 echo '<td>';								 
									 echo "<button class='btn btn-primary btn-xs'  data-toggle='modal' data-target='#edit{$uid}'>";
					
									 
									 echo '<i class="fa fa-pencil">';
									
									 echo '</i>';
									 echo'</button>';
									 
									  echo " <button class='btn btn-danger btn-xs'  data-toggle='modal' data-target='#delete{$uid}'>";
									 echo '<i class="fa fa-trash-o">';
							
									 echo '</i>';
									 echo'</button>';
									 include('./include/accountmodals.php');
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
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i>Add Accounts</h4>
                          
                              <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Firstname</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="fname">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2">Lastname</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control"  name="lname">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2">Username</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="user">
								   </div>
                              </div>
							  <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2">Password</label>
                                  <div class="col-lg-10">
                                      <input type="password" class="form-control"  name="pass">
								   </div>
                              </div>
							  <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2">Confirm Password</label>
                                  <div class="col-lg-10">
                                      <input type="password" class="form-control" name="pass2" >
								   </div>
                              </div>
							  <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2">Admin</label>
                                  <div class="col-lg-10">
								  <input type="checkbox" name="check" value="1">
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
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->
	
  <?php
  include ('./include/footer.php');
  ?>
  