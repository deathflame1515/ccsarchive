
<?php
session_start();
if (!isset($_SESSION["id"])){header("location: login.php");}
include('./include/db.php');

include('./include/header.php');


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
					
	                  	  	   <h4 class="mb"><i class="fa fa-angle-right"></i>Major</h4>
							  
	                  
							   
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> ID</th>
                                  <th><i class="fa fa-question-circle"></i> Course Code</th>
                                  <th><i class="fa fa-bookmark"></i> Course Name</th>
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
									?>
									
							  
							  
                              <tr>
                                  <td><?php echo $row["mid"] ?></td>
                                  <td><?php echo $row["mcode"] ?></td>
                                  <td><?php echo $row["mname"] ?></td>
                               
                                  <td>
                                      
                                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                  </td>
                              </tr>
                             <?php
							 }
									echo "</table>";
								} else {
									echo "0 results";
								}
								$conn->close();
							  
							  ?>
						
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div>
				  
				  
				  <div class="col-lg-6">
          			<div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i>Add Major</h4>
                          <form class="form-horizontal tasi-form" method="get">
                              <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Course code</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="inputSuccess">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputWarning">Course Name</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="inputWarning">
                                  </div>
                              </div>
                             
							  
							 
							  <div class="form-group">
							 
                               <label class="col-sm- control-label col-lg-4" for="inputError"></label>
                                  <div class="col-lg-3">
                                     <button type="button" class="btn btn-success btn-lg btn-block">SAVE</button>
								   </div>
                              </div>
							  
							 
                          </form><!-- /col-md-6 -->
              </div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
			<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
					
                      <form method="POST" align="center" >
					  <hr>
							College Course
					  <hr>
                          <div class="form-group" >
                              <input type="text" class="form-control" id="fname" placeholder="Enter Course Code">
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control" id="lname" placeholder="Enter Course Name">
                          </div>
                          <button type="submit" class="btn btn-theme">SAVE</button>
						  <button type="submit" class="btn btn-alert">CLOSE</button>
					<hr>
                      </form>
                </div>
</div>
      <!--main content end-->
  <?php
  include ('./include/footer.php');
  ?>