<div class="modal fade" id="edit<?php echo $row['cid'];?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header row-sm-6">
                <strong>Edit Course</strong>
            </div>
            <?php
              $query=mysqli_query($conn,"select * from tblcourse where cid='".$row['cid']."'");
               $row=mysqli_fetch_array($query);
           ?>
            <form action="./editCourse.php?id=<?php echo $row['cid']; ?>" method="POST" class="form-vertical">
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-sm-6">
                            <label for="input-normal" class=" form-control-label">Course Code</label>
                            <input type="text" id="input-course" name="edit-code" value="<?php echo $row['ccode']; ?>" class="form-control">
                        </div>
                        <div class="col col-sm-6">
                                    <label for="input-normal" class=" form-control-label">Course Description</label>
                                    <input type="text" id="input-name" name="edit-name" value="<?php echo $row['cname']; ?>" class="form-control">
                        </div>
 </div>
                                    <div class="row form-group">
                                        <div class="col col-sm-6">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-plus-circle"></i> Submit </button>
                                            <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                                                <i class="fa fa-times-circle-o"></i> Close</button>
											
                                        </div>
                                    </div>
                                </form>
                           
                        </div>
                    </div>
		</div>
</div>	
	
<div class="modal fade" id="delete<?php echo $row['cid'];?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header row-sm-6">
                <strong>Delete Course</strong>
            </div>
            <?php
              $query=mysqli_query($conn,"select * from tblcourse where cid='".$row['cid']."'");
               $row=mysqli_fetch_array($query);
           ?>
            <form action="./deletecourse.php?id=<?php echo $row['cid']; ?>" method="POST" class="form-vertical">
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-sm-6">
                            <label for="input-normal" class=" form-control-label">Course Code</label>
                            <input type="text" id="input-course" name="edit-code" value="<?php echo $row['ccode']; ?>" class="form-control" disabled>
                        </div>
                        <div class="col col-sm-6">
                                    <label for="input-normal" class=" form-control-label">Course Description</label>
                                    <input type="text" id="input-name" name="edit-name" value="<?php echo $row['cname']; ?>" class="form-control" disabled>
                        </div>
 </div>
                                    <div class="row form-group">
                                        <div class="col col-sm-6">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-plus-circle"></i> Submit </button>
                                            <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                                                <i class="fa fa-times-circle-o"></i> Close</button>
											
                                        </div>
                                    </div>
                                </form>
                           
                        </div>
                    </div>
		</div>
</div>	