   <!-- sample modal content -->
   <div id="delete<?php echo $strand_id ?>" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel">
<form method="POST" action="del_strand.php" >
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
      <h5 class="modal-title" id="myModalLabel"><i class="ti ti-trash"> </i> Delete </h5>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
 <div class="modal-body">
  <input type="hidden" name="id" value="<?php echo $strand_id ?>">
   <div class="row mb-3">
    <div class="col-md-12 position-relative">
          <div class="form-group">
              <label for="validationTooltip01">Are you sure want to delete?</label>
                
            </div>
          </div>
   </div>
</div>
         <div class="modal-footer">
          <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_delete"><i class="mdi mdi-check-bold"></i> Yes</button>
         </div>
     </div>
            <!-- /.modal-content -->
   </div>
           <!-- /.modal-dialog -->
</form>
  </div>
    <!-- /.modal -->