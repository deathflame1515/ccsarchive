<div class="modal fade" id="view<?php echo $row['tid'];?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header"> 
                       
                            <h4 class="modal-title">
                            	<i class="fa fa-book"></i> &ensp;Study Information
                            </h4> 
                       </div>
            <?php
			$query = "SELECT * FROM tblthesis
					    LEFT JOIN tblcourse ON tblthesis.course = tblcourse.cid 
						LEFT JOIN tblmajor ON tblthesis.major = tblmajor.mid 
					WHERE tid='".$row['tid']."'";
             
			$resultx = $conn->query($query);
			
				while($rowx = $resultx->fetch_assoc()) {
					$a = $rowx['tid'];
					
					
           ?>
                <div class="modal-body">
							<div id="dynamic-content">
								
								<div class="table-responsive">
									<table class="table table-striped table-bordered">
												<tr>
											<th>Call No.</th>
											<td><?php echo $rowx["tcno"];?></td>
										</tr>
										<tr>
											<th>Title</th>
											<td><?php echo $rowx["tcname"];?></td>
										</tr>
										<tr>
											<th>Tags</th>
											<td><?php echo $rowx["tags"];?></td>
										</tr>
										<tr>
											<th>Course</th>
											<td><?php echo $rowx["cname"];?></td>
										</tr>
										<tr>
											<th>Major</th>
											<td><?php echo $rowx["mname"];?></td>
										</tr>
										<tr>
											<th>Authors</th>
											<td><?php echo $rowx["Author"];?></td>
										</tr>
										
	
									</table>
				
									</div>
									
										<div class="form-group">	
										
										<h4 style="font-size:17px;">Abstract</h4>
											<div id="disable" class="form-control" style="min-width: 100%; height:200px; overflow:auto;" rows="8" ><?php echo $rowx["tcontent"];  } ?></div>
										</div>

						</div>				
							
					</div>
					<div class="modal-footer"> 
						<div class="form-group">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">
									<i class="fa fa-times-circle-o"></i> Close</button>  
                        </div>
						</div> 
                        </div>
                    </div>
					
					</div>
						