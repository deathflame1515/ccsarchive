<?php
session_start();
if (!isset($_SESSION["id"])){header("location: login.php");}
if ($_SESSION["role"] == "ADMIN"){header("location: adminaccounts.php");}


include('./include/db.php');

include('./include/header.php');

$sql = "SELECT * FROM tbluser where uid= '".$_SESSION["id"]."'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
	while($row = $result->fetch_assoc()) {
										$uid=$row["uid"] ;
										$firstname=$row["firstname"];
										$lastname=$row["lastname"];
										$username=$row["username"];
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
					<div class="form-horizontal tasi-form" >
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i>&ensp;Account Details</h4>
                          
                             <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2">Username:</label>
                                  <label class="col-sm-2 control-label col-lg-2"><?php echo $username; ?></label>
								   
                              </div>
							  
                              <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2">Firstname:</label>
                                  <label class="col-sm-2 control-label col-lg-2"><?php echo $firstname; ?></label>
                                  
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2">Lastname:</label>
                                  <label class="col-sm-2 control-label col-lg-2"><?php echo $lastname; ?></label>
                                  
                              </div>
							 
							  <div class="form-group">	 
                               <label class="col-sm- control-label col-lg-4"></label>
                                  <div class="col-lg-12">
								   <button class="btn btn-theme btn-block" type="submit" name="submit" data-toggle="modal" data-target="#edit<?php echo $uid;?>">Update Account</button>
								
                                    
								   </div>
								   
								   
                              </div>
                          </div><!-- /col-md-6 -->
              </div><!-- /row -->
	</div>
	</div>
		</section>
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->

	  <div class="modal fade" id="edit<?php echo $uid; ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header row-sm-6">
                <strong>Update Account</strong>
            </div>
            <?php
              $query=mysqli_query($conn,"select * from tbluser where uid='".$uid."'");
               $row=mysqli_fetch_array($query);
           ?>
            <form action="./editpassword.php?id=<?php echo $uid; ?>" method="POST" class="form-vertical">
                <div class="modal-body">
                    <div class="row form-group">
                    <div class="col col-sm-6">
                            <label for="input-normal" class=" form-control-label">Last Name</label>
                            <input type="text" id="input-last" name="edit-last" value="<?php echo $row['lastname']; ?>" class="form-control">
                        </div>
                        <div class="col col-sm-6">
                                    <label for="input-normal" class=" form-control-label">Name</label>
                                    <input type="text" id="input-name" name="edit-name" value="<?php echo $row['firstname']; ?>" class="form-control">
                        </div>
                        
                        
                        <div class="col col-sm-6">
                        <br>
                                    <label for="input-normal" class=" form-control-label">Password</label>
                                    <input type="password" id="password" name="edit-password" placeholder="Password" class="form-control">
                                    </div>
                        <div class="col col-sm-6">
                        <br>
                                        <label for="input-normal" class=" form-control-label">Confirm New Password</label>
                                        <input type="password" id="password1" name="edit-password1" placeholder="Confirm Password" class="form-control">
                                        </div>
						
                     </div>
                     <div class="row form-group">
                         <div class="col col-sm-6">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus-circle"></i> Submit</button>
                            <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                                <i class="fa fa-times-circle"></i> Cancel</button>
                         </div>
                      </div>
                                
                            </div>
						</form>
                        </div>
                    </div>
					</div>
<?php
include('./include/footer.php');
?>