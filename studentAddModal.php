<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
<form  enctype="multipart/form-data" method="POST" action="student_classAdd.php" class="needs-validation" novalidate>
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel"><i class="mdi mdi-plus-circle"> </i> Add Student </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      <div class="modal-body">
  <input type="hidden" name="class_id" value="<?php echo $get_id ?>">
  <input type="hidden" name="teacher_id" value="<?php echo $session_id ?>">
       <div class="row mb-3">
    <div class="col-md-12 position-relative">
          <div class="form-group">
              <label for="validationTooltip01" style="float: left" class="mb-2">Student <span style="color:red;">*</span></label>
               <select class="form-control" name="student_id" required="">
                <option selected="" disabled="">Select Student. . .</option>
                <?php
                $student = mysqli_query($connection,"select * from student") or die (mysqli_error($connection));
                while($row = mysqli_fetch_assoc($student)) {
                 ?>
                 <option value="<?php echo $row['student_id'] ?>"><?php echo $row['firstname'] ?> <?php echo $row['middle_name'] ?> <?php echo $row['lastname'] ?></option>
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