<?php

require('session.php');
$connection = $con;


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/card.css">
    <title>Announcement</title>
    <link rel="icon" type="image/x-icon" href="../img/dagatanlogo.ico">
    <link href="../fileuploads.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/cards.css">
    <link href="../src/css/a.css" rel="stylesheet" type="text/css">

</head>
</style>


<body>

    <?php include('sidebar.php'); ?>
   
    <main id="content">
        <div class="container-fluid">






            <div class="row p-0">
                <div class="col-md-12 pt-1">
                    <div class="pt-3" id="card">
                        <h1 class="">ANNOUNCEMENTS</h1>

                        <hr>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary mb-1 bx bxs-user-plus" data-toggle="modal"
                        data-target="#import"> ADD PHOTO ANNOUNCEMENT</button>

                        <button type="button" class="btn btn-primary mb-1 bx bxs-user-plus" data-toggle="modal"
                        data-target="#importt"> ADD VIDEO ANNOUNCEMENT</button>
                </div>

                <?php
                $query = mysqli_query($connection, "select * from announcement") or die($connection->error);
                while ($row = mysqli_fetch_array($query))
               {
                $id = $row['id']; 
                $video=$row['location'];    
                ?>
                <br><br><br>
                <div class="col-md-3">
                    <div class="card text-black bg-light mb-3" style="max-width: auto;">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-9">
                                    <h5><?php echo $row['datee'] ?></h5>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-danger btn-md" data-toggle="modal"
                                        data-target="#delete<?php echo $id ?>"><i class='bx bxs-trash'></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                      <?php
                        if($video==true){
                                                ?>
                                                        <video width="100%" height="240" controls>
					<source src="<?php echo $row['location']?>">
				</video>
                                                
                                           <?php }else{
?>                                        
                                        <img  src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>"  width="100%" height="auto" alt="IMAGE"/>
                                        <?php } ?>

                            <h3 class="card-title"><?php echo $row['title'] ?></h3>
                            <p class="card-text"><?php echo $row['announcement'] ?></p>
                        </div>
                        <div class="col-4 ">

                        </div>

                    </div>

                </div>
                <?php
                include('deleteann.php');
                } ?>

            </div>
        </div>
    </main>


    <div class="modal fade" id="import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD PHOTO ANNOUNCEMENT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                <div class="modal-body">

                    <form action="addannouncement.php" method="post" enctype="multipart/form-data"  >
                        <label>Title</label>
                        <input type="text" name="title" required="" id="validationTooltip01" class="form-control" />

                        <label>Date</label>
                        <input class="form-control" type="date" name="datee" required="" id="validationTooltip01" />
                        <label for="exampleFormControlTextarea1">Message</label>
                        <textarea class="form-control" name="announcement" id="exampleFormControlTextarea1" rows="3"> </textarea>
                        <div class="col-12">
                        <div class="col-12">

                        <div class="control-group">
                                    <label class="control-label" for="input01">Image:</label>
                                    <div class="controls">

                                        <div class="upload-container">
                                        <div id="display-image" style="position: absolute; top:100px; left:0%; color:#468d94; height:auto; width:100%;"></div>
                                            <input type="file" name="image" class="font" style="border:1px solid black" onchange="getImage(this.value);" required>
                                         
                                        </div>

                                    </div>

                                </div>

                                </div>
                  
                            </div>
                            
                    </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            </div>

                </div>
                </form>
            </div>

        </div>


    


        <div class="modal fade" id="importt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD VIDEO ANNOUNCEMENT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                <div class="modal-body">

                    <form action="announcementvid.php" method="post" enctype="multipart/form-data"  >
                        <label>Title</label>
                        <input type="text" name="title" required="" id="validationTooltip01" class="form-control" />

                        <label>Date</label>
                        <input class="form-control" type="date" name="datee" required="" id="validationTooltip01" />
                        <label for="exampleFormControlTextarea1">Message</label>
                        <textarea class="form-control" name="announcement" id="exampleFormControlTextarea1" rows="3"> </textarea>
                        <div class="col-12">
                        <div class="col-12">

                                <label class="control-label" for="input01">Video:</label>
                                    <div class="controls">

                                        <div class="upload-container">
                                        <div id="display-image" style="position: absolute; top:100px; left:0%; color:#468d94; height:auto; width:100%;"></div>
                                            <input type="file" name="video" class="font" style="border:1px solid black" onchange="getImage(this.value);" required>
                                         
                                        </div>

                                    </div>

                                </div>
                  
                            </div>
                            
                    </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            </div>

                </div>
                </form>
            </div>

        </div>
    </div>
    <script>
        function getImage(imagename) {
            $('#display-image').html(imagename);
        }
    </script>
    <script src="../fileupload.js"></script>
    <script>
    $(document).ready(function() {

        $('.deletebtn').on('click', function() {

            $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[0]);

        });
    });
    </script>

</body>

</html>