
<div class="modal fade" id="edit<?php echo $row['tid'];?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<strong>View Study</strong>
			</div>
			<?php
             $sql = "Select * from tblthesis LEFT JOIN tblcourse  on tblthesis.Course= tblcourse.cid LEFT JOIN tblmajor on tblthesis.major = tblmajor.mid  where tblthesis.tid='".$row['tid']."'";
			
			
              $query=mysqli_query($conn,$sql);
               $row=mysqli_fetch_array($query);
           ?>
			<form action="./editthesis.php?id=<?php echo $row['tid']; ?>" method="POST" class="form-vertical">
				<div class="modal-body">
					<div class="row form-group">
						 <div class="col col-sm-6">
                          <label for="input-normal" class=" form-control-label">Call Number</label>
                            <input type="text" id="input-last" class="form-control" name="edit-no" value="<?php echo $row['tcno']; ?>" disabled>
                        </div>
						<div class="col col-sm-6">
                            <label for="input-normal" class="form-control-label">Title</label>
							<textarea class="form-control" rows="3" name="edit-title" disabled><?Php echo $row['tcname'];?></textarea>
                        </div>
					</div>
					<div class="row form-group">
						
						<div class="col col-sm-6">
                          <label for="input-normal" class=" form-control-label">Copyright</label>
								<input type="text" class="form-control" id="input-year" name="edit-year" value="<?php echo $row['TYear']; ?>" disabled>
						</div>
					</div>
					
					<div class="row form-group">
					<div class="col col-sm-6">
                          <label for="input-normal" class=" form-control-label">Course</label>
							<input type="text" class="form-control" id="input-year" name="edit-course" disabled value="<?php echo $row['cname']; ?>">
						
								
						</div>
					
				
					<div class="col col-sm-6">
                          <label for="input-normal" class="form-control-label">Major</label>
							
								<input type="text" class="form-control" id="input-year" name="edit-year" disabled value="<?php echo $row['mname']; ?>">
						</div>
						</div>
						<div class="row form-group">
							 <div class="col col-sm-12">
							  Author/s<textarea class="form-control" rows="3" name="edit-author" disabled><?Php echo $row['Author'];?></textarea>
					</div>
					</div>
					
					<div class="row form-group">
							 <div class="col col-sm-12">
							Tags<textarea class="form-control" rows="3" name="edit-tag" disabled><?Php echo $row['tags'];?></textarea>
					</div>
					</div>
					
					<div class="row form-group">
							 <div class="col col-sm-12">
							 Abstract<textarea class="form-control" rows="3" name="edit-content" disabled><?Php echo $row['tcontent'];?></textarea>
					</div>
					</div>
				
					<div class="modal-footer">
					<div class="form-group">
							 
								<button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
									<i class="fa fa-times-circle-o"></i> Close</button>
					</div>
					</div>			
					
				</div>	
				</form>
				</div>
			</div>
		</div>