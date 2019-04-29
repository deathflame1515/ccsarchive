
<div class="modal fade" id="edit<?php echo $row['tid'];?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<strong>Edit Study</strong>
			</div>
			<?php
              $query=mysqli_query($conn,"select * from tblthesis where tid='".$row['tid']."'");
               $row=mysqli_fetch_array($query);
           ?>
			<form action="./editthesis.php?id=<?php echo $row['tid']; ?>" method="POST" class="form-vertical">
				<div class="modal-body">
					<div class="row form-group">
						 <div class="col col-sm-6">
                          <label for="input-normal" class=" form-control-label">Call Number</label>
                            <input type="text" id="input-last" class="form-control" name="edit-no" value="<?php echo $row['tcno']; ?>">
                        </div>
						<div class="col col-sm-6">
                            <label for="input-normal" class="form-control-label">Title</label>
                            <textarea id="input-last" class="form-control" name="edit-title"><?php echo $row['tcname']; ?></textarea>
                        </div>
					</div>
					<div class="row form-group">
						
						<div class="col col-sm-6">
                          <label for="input-normal" class=" form-control-label">Copyright</label>
								<input type="text" class="form-control" id="input-year" name="edit-year" value="<?php echo $row['TYear']; ?>">
						</div>
					</div>
					
					<div class="row form-group">
					<div class="col col-sm-6">
                          <label for="input-normal" class=" form-control-label">Course</label>
							<select class="form-control" name="edit-course" id="course">
						  <?php
							  $sql = "SELECT * FROM tblcourse";
								$result2 = $conn->query($sql);
								
								if ($result2->num_rows > 0) {
								  echo'';
									while($row1 = $result2->fetch_assoc()) {
										$cid =$row1["cid"];
										$cname=$row1["cname"];
										 echo '<option value="'.$cid.'">' .$cname.'</option>';
										 
								$sql1 = "SELECT * FROM tblcourse where cid='".$row['Course']."'";
								$result3 = $conn->query($sql1);
								
								if ($result3->num_rows > 0) {
							
									while($row2 = $result3->fetch_assoc()) {
										$cid1 =$row2["cid"];
										$cname1=$row2["cname"];
									echo '<option value="'.$cid1.'" selected hidden>' .$cname1.'</option>';
									}
								}
								}}
								?>
								</select>
						</div>
					
				
					<div class="col col-sm-6">
                          <label for="input-normal" class="form-control-label">Major</label>
							<select class="form-control" name="edit-major" id="major">
						  <?php
							  $sql = "SELECT * FROM tblmajor";
								$result2 = $conn->query($sql);
								
								if ($result2->num_rows > 0) {
								  echo'';
									while($row1 = $result2->fetch_assoc()) {
										$mid =$row1["mid"];
										$mname=$row1["mname"];
										
										 echo '<option value="'.$mid.'">' .$mname.'</option>';
								$sql1 = "SELECT * FROM tblmajor where mid='".$row['Major']."'";
								$result3 = $conn->query($sql1);
								
								if ($result3->num_rows > 0) {
							
									while($row2 = $result3->fetch_assoc()) {
										$mid1 =$row2["mid"];
										$mname1=$row2["mname"];
									echo'<option value="'.$mid1.'" selected hidden>' .$mname1.'</option>';
									}
								}
								}}
								?>
								</select>
						</div>
						</div>
						<div class="row form-group">
							 <div class="col col-sm-12">
							  Author/s<textarea class="form-control" rows="3" name="edit-author"><?Php echo $row['Author'];?></textarea>
					</div>
					</div>
					
					<div class="row form-group">
							 <div class="col col-sm-12">
							Tags<textarea class="form-control" rows="3" name="edit-tag"><?Php echo $row['tags'];?></textarea>
					</div>
					</div>
					
					<div class="row form-group">
							 <div class="col col-sm-12">
							 Abstract<textarea class="form-control" rows="3" name="edit-content"><?Php echo $row['tcontent'];?></textarea>
					</div>
					</div>
				
				<div class="row form-group">
							 <div class="col col-sm-12">
							 Note<textarea class="form-control" rows="3" name="edit-NOte" disabled><?Php echo $row['Note'];?></textarea>
					</div>
					</div>
					<div class="row form-group">
							 <div class="col col-sm-12">
								<button type="submit" class="btn btn-primary btn-sm" name="edit">
									<i class="fa fa-plus-circle"></i> Save</button>
								<button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
									<i class="fa fa-times-circle-o"></i> Cancel</button>
					</div>
					</div>			
					
				</div>	
				</form>
				</div>
			</div>
		</div>


<div class="modal fade" id="update<?php echo $row['tid'];?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<strong>Approve Study</strong>
			</div>
			<?php
              $query=mysqli_query($conn,"select * from tblthesis where tid='".$row['tid']."'");
               $row=mysqli_fetch_array($query);
           ?>
			<form action="./adminapprovaledit.php?id=<?php echo $row['tid']; ?>" method="POST" class="form-vertical">
				<div class="modal-body">
					<div class="row form-group">
						 <div class="col col-sm-6">
                          <label for="input-normal" class=" form-control-label">Call Number</label>
                            <input type="text" id="input-last" class="form-control" name="edit-no" value="<?php echo $row['tcno'];  ?>"disabled>
                        </div>
						<div class="col col-sm-6">
                            <label for="input-normal" class="form-control-label">Title</label>
                            <textarea class="form-control" rows="3" name="edit-title" disabled><?Php echo $row['tcname'];?></textarea>
                        </div>
					</div>
					<div class="row form-group">
						
						<div class="col col-sm-6">
                          <label for="input-normal" class=" form-control-label">Copyright</label>
								<input type="text" class="form-control" id="input-year" name="edit-year" value="<?php echo $row['TYear']; ?>" disabled >
						</div>
					</div>
					
					<div class="row form-group">
					<div class="col col-sm-6">
                          <label for="input-normal" class=" form-control-label">Course</label>
						  <?php
							  $sql = "SELECT * FROM tblcourse where cid='".$row['Course']."'";
								$result2 = $conn->query($sql);
								
								if ($result2->num_rows > 0) {
							
									while($row1 = $result2->fetch_assoc()) {
										$cid =$row1["cid"];
										$cname=$row1["cname"];
									echo "<input type='text' class='form-control'  name='edit-course' value='{$cname}' disabled>";
									
								}}
								?>
						  
							
						</div>
					
				
									<div class="col col-sm-6">
                          <label for="input-normal" class=" form-control-label">Major</label>
						  <?php
							  $sql = "SELECT * FROM tblmajor where mid='".$row['Major']."'";
								$result2 = $conn->query($sql);
								
								if ($result2->num_rows > 0) {
							
									while($row1 = $result2->fetch_assoc()) {
										$mid =$row1["mid"];
										$mname=$row1["mname"];
									echo "<input type='text' class='form-control'  name='edit-course' value='{$mname}' disabled>";
									
								}}
								?>
						  
							
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
					<div class="row form-group">
							 <div class="col col-sm-12">
							 Note<input type="text" class="form-control"  name="note">
					</div>
					
					</div>
					<div class="row form-group">
							 <div class="col col-sm-12">
								<button type="submit" class="btn btn-primary btn-sm">
									<i class="fa fa-check-circle-o"></i> Approve</button>
									<button type="submit" class="btn btn-warning btn-sm" name="reject">
                                                <i class="fa fa-ban"></i> Reject </button>
								<button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
									<i class="fa fa-times-circle-o"></i> Close</button>
					</div>
					</div>			
					
				</div>	
				</form>
				</div>
			</div>
		</div>