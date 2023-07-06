
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="GET" action="updateTeacher.php">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Username</label>
                            <div class="controls">
                                <input type="text" id="inputEmail" name="username" value="<?php echo $row['username']; ?>" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Password</label>
                            <div class="controls">
                                <input type="text" name="password" id="inputPassword" value="<?php echo $row['password']; ?>" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Firstname</label>
                            <div class="controls">
                                <input type="text" id="inputEmail" name="firstname" value="<?php echo $row['firstname']; ?>" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Lastname</label>
                            <div class="controls">
                                <input type="text" id="inputEmail" name="lastname" value="<?php echo $row['lastname']; ?>" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Middlename</label>
                            <div class="controls">
                                <input type="text" id="inputEmail" name="middlename" value="<?php echo $row['middlename'] ?>" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="input01">Image:</label>
                            <div class="controls">
                                <input type="file" name="image" class="font">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Department:</label>
                            <div class="controls">

                                <select name="department" class="span4" required>
                                    <option><?php echo $row['department']; ?></option>
                                    <?php
                                    $query = mysqli_query($connection, "select * from department");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <option><?php echo $row['department']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">

                                <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save</button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </form>
</div>