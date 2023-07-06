<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
<form  enctype="multipart/form-data" method="POST" action="classAdd.php">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel"><i class="mdi mdi-plus-circle"> </i> Add Class </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      <div class="modal-body">
  <div class="row">
    <div class="col-md-12 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">Class Name <span style="color:red;">*</span></label>
                <select name="course_id" id="validationTooltip01" class="form-control" required>
                  <option></option>
                  <?php
                  $course = mysqli_query($conn,"select * from course") or die (mysqli_error($conn));
                  while($row = mysqli_fetch_assoc($course)) {
                   ?>
                   <option value="<?php echo $row['course_id']?>"><?php echo $row['cys'] ?></option>
                  <?php } ?>
                </select>
                   <div class="valid-tooltip">
                     Looks good!
                    </div>
                   
                  <div class="invalid-tooltip">
                        Please provide a valid data.
                  </div>
            </div>
     </div>
  </div>
  <div class="row">
    <div class="col-md-12 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">Subject <span style="color:red;">*</span></label>
               <select name="subject_id" id="validationTooltip01" class="form-control" required>
                  <option id="shes"></option>
                  <?php
                  $course = mysqli_query($conn,"select * from subject") or die (mysqli_error($conn));
                  while($row = mysqli_fetch_assoc($course)) {
                   ?>
                   <option value="<?php echo $row['subject_id']?>"><?php echo $row['subject_title'] ?></option>
                  <?php } ?>
                </select>
                   <div class="valid-tooltip">
                     Looks good!
                    </div>
                   
                  <div class="invalid-tooltip">
                        Please provide a valid data.
                  </div>
            </div>
     </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="btn_add" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
  </div>
</div>

<script>
 
</script>