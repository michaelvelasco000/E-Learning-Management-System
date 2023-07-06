<!-- Modal -->


<div id="myModal" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form enctype="multipart/form-data" method="POST" action="moduleAdd.php" class="needs-validation" novalidate>
    <div class="modal-dialog modal-md">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel"><i class="mdi mdi-plus-circle"> </i> Add Module </h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="class_id" value="<?php echo $get_id ?>">
          <div class="row">
            <div class="col-md-12 position-relative">
              <div class="form-group">
                <label for="validationTooltip01" style="float: left" class="mb-2">Title <span style="color:red;">*</span></label>
                <input type="text" name="file_name" class="form-control"  id="" required>
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
                <label for="validationTooltip01" style="float: left" class="mb-2">Lessons <span style="color:red;">*</span></label>
                <br>

        
                <div class="upload-container">
                                        <div id="display-image" style="position: absolute; top:140px; left:0%; color:#468d94; width:100%;"></div>
                                            <input type="file" name="module" class="font" style="border:1px solid black" onchange="getImage(this.value);" required>
                                         
                                        </div>
     
                <br> 

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
        function getImage(imagename) {
            $('#display-image').html(imagename);
        }
    </script>
<script src="fileupload.js"></script>