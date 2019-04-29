<div class="modal fade" id="edit<?php echo $row['mid'];?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header row-sm-6">
                <strong>Edit Major</strong>
            </div>
            <?php
              $query=mysqli_query($conn,"select * from tblmajor where mid='".$row['mid']."'");
               $row=mysqli_fetch_array($query);
           ?>
            <form action="./editMajor.php?id=<?php echo $row['mid']; ?>" method="POST" class="form-vertical">
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-sm-6">
                            <label for="input-normal" class=" form-control-label">Major Code</label>
                            <input type="text" id="input-last" name="edit-code" value="<?php echo $row['mcode']; ?>" class="form-control">
                        </div>
                        <div class="col col-sm-6">
                                    <label for="input-normal" class=" form-control-label">Major Description</label>
                                    <input type="text" id="input-name" name="edit-name" value="<?php echo $row['mname']; ?>" class="form-control">
                        </div>
 </div>
                                    <div class="row form-group">
                                        <div class="col col-sm-6">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-plus-circle"></i> Submit </button>
                                            <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                                                <i class="fa fa-times-circle"></i> Close</button>
											
                                        </div>
                                    </div>
                                </form>
                           
                        </div>
                    </div>
					</div>
					</div>
					
<div class="modal fade" id="delete<?php echo $row['mid'];?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header row-sm-6">
                <strong>Delete Major</strong>
            </div>
            <?php
              $query=mysqli_query($conn,"select * from tblmajor where mid='".$row['mid']."'");
               $row=mysqli_fetch_array($query);
           ?>
            <form action="./deletemajor.php?id=<?php echo $row['mid']; ?>" method="POST" class="form-vertical">
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-sm-6">
                            <label for="input-normal" class=" form-control-label">Major Code</label>
                            <input type="text" id="input-last" name="edit-code" value="<?php echo $row['mcode']; ?>" class="form-control" disabled>
                        </div>
                        <div class="col col-sm-6">
                                    <label for="input-normal" class=" form-control-label">Major Description</label>
                                    <input type="text" id="input-name" name="edit-name" value="<?php echo $row['mname']; ?>" class="form-control" disabled>
                        </div>
 </div>
                                    <div class="row form-group">
                                        <div class="col col-sm-6">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-plus-circle"></i> Submit </button>
                                            <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                                                <i class="fa fa-times-circle"></i> Close</button>
											
                                        </div>
                                    </div>
                                </form>
                           
                        </div>
                    </div>
					</div>
					</div>