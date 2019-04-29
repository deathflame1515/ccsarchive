
<?php
session_start();
if (!isset($_SESSION["id"])){header("location: login.php");}
include('./include/db.php');

include('./include/header.php');

if (isset($_POST['submit'])){
	echo'<h4>hello</h4>';
}

if (isset($_GET['delete']) && isset($_SESSION["id"])){
$id=$_GET['delete'];
$query="DELETE  FROM tbluser where uid={$id}";							
$deletequery = mysqli_query($conn,$query);
 echo '<meta http-equiv="Location" content="accounts.php/">';
}

if(isset($_POST['submit'])){
$cname = $_POST["cname"];
$ccode=$_POST["ccode"];	
										
$cname = mysqli_real_escape_string($conn,$cname);
$ccode = mysqli_real_escape_string($conn,$ccode);
											
if (($cname == "" || empty($cname))  OR ($ccode == "" || empty($ccode))){
	echo "Please check the fields";
}
else{
	$query ="INSERT INTO tblcourse(ccode,cname)"; 
	$query .="VALUE('{$ccode}','{$cname}')";
	$course = mysqli_query($conn,$query);
	if(!$course){
	die();
				}
	else{
		//echo'<meta http-equiv="Refresh" content="2; url=course.php">';
	}
											
	}
										
}
								
?>

      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    
  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
	<!--main content start-->
      <section id="main-content">
	  
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-6">
                      <div class="form-panel">
                          <table class="table table-striped table-advance table-hover">
					
	                  	  	   <h4 class="mb"><i class="fa fa-angle-right"></i>Course</h4>
							  
	                  
							   
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> ID</th>
                                  <th><i class="fa fa-question-circle"></i> Firsname</th>
                                  <th><i class="fa fa-bookmark"></i> Lastname</th>
                                  <th><i class=" fa fa-edit"></i> Username</th>
								   <th><i class=" fa fa-edit"></i> Access</th>

								   <th><i class=" fa fa-edit"></i> Action</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
							  <?php
							 $sql = "SELECT * FROM tbluser";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
								   
										while($row = $result->fetch_assoc()) {
										$uid=$row["uid"] ;
										$firstname=$row["firstname"];
										$lastname=$row["lastname"];
										$username=$row["username"];
										
										$role=$row["role"];
	
							
							  
									 echo '<tr>';
									 echo'<td>'.$uid.'</td>';
									 echo'<td>'.$firstname.'</td>';
									  echo'<td>'.$lastname.'</td>';
									 echo'<td>'.$username.'</td>';
									 echo'<td>'.$role.'</td>';
									 echo '<td>';								 
									 echo'<button class="btn btn-primary btn-xs">';
									 echo "<a  class='myedit' href='course.php?edit={$uid}'>";
									 echo '<i class="fa fa-pencil">';
									 echo'</a>';
									 echo '</i>';
									 echo'</button>';
									 
									 echo'<button class="btn btn-danger btn-xs">';
									 echo "<a class='mydelete' href='accounts.php?delete={$uid}'>";
									 echo '<i class="fa fa-trash-o">';
									 echo'</a>';
									 echo '</i>';
									 echo'</button>';
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
                                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Firstname</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="fname" id="inputSuccess">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputWarning">Lastname</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control"  name="lname"id="inputWarning">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputError">Username</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="user" id="inputError">
								   </div>
                              </div>
							  <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputError">Password</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control"  name="pass" id="inputError">
								   </div>
                              </div>
							  <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputError">Confirm Password</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="pass2" id="inputError">
								   </div>
                              </div>
							  <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputError">Admin</label>
                                  <div class="col-lg-10"">
								  <input type="checkbox" checked="" name="admin">
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
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->
  <?php
  include ('./include/footer.php');
  ?>