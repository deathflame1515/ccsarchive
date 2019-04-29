 <div class="modal fade" id="edit<?php echo $row['uid'];?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header row-sm-6">
                <strong>Edit Account Password</strong>
            </div>
           
            <form action="#" method="POST" class="form-vertical">
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-sm-6">
                            <label for="input-normal" class=" form-control-label">Old Password</label>
                            <input type="text" id="input-last" name="edit-code" value="" class="form-control">
                        </div>
                        <div class="col col-sm-6">
                                    <label for="input-normal" class=" form-control-label">New Password</label>
                                    <input type="text" id="input-name" name="edit-name" value="" class="form-control">
                        </div>
						<div class="col col-sm-6">
                                    <label for="input-normal" class=" form-control-label">Confirm New Password</label>
                                    <input type="text" id="input-name" name="edit-name" value="" class="form-control">
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