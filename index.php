<?php
session_start(); //we need session for the log in thingy XD 
include("connection.php");
$con = connection();
unset($_SESSION['id']);

?>
<?php include("admin/loader.php"); ?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="src/img/dagatanlogo.ico">
    <title>Dagatan Senior High School</title>


    <script>
    window.addEventListener('load', () => {
        AOS.init({
            offset: 250,
        })
    });
    </script>
    <!-- notification  -->
    <link href="admin/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen" />
    <!-- wysiwug  -->

    <script src="admin/vendors/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="assets/aos.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <link rel="stylesheet" href="src/css/font-awesome.min.css" />
    <link rel="stylesheet" href="src/css/owl.carousel.css" />
    <link rel="stylesheet" href="src/css/owl.transitions.css" />

    <link rel="stylesheet" href="src/css/lightbox.css" />
    <link rel="stylesheet" href="src/css/bootstrap.min.css" />
    <link rel="stylesheet" href="src/css/preloader.css" />
    <link rel="stylesheet" href="src/css/image.css" />
    <link rel="stylesheet" href="src/css/icon.css" />
    <link rel="stylesheet" href="src/css/stylesss.css" />
    <link rel="stylesheet" href="src/css/responsive.css" />
    <link rel="stylesheet" href="src/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>

<style>
.card {
    height: auto;
    width: auto;
    border: solid 1px black;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 10px;
}

.card-header {
    padding: 5px;
    border-bottom: solid 1px black;
}

.card-body {
    padding: 10px;
}

h4 {
    display: flex;
    align-items: end;
}
</style>

<body id="top">

    <div id="content">

        <header id="navigation" class="navbar-fixed-top animated-header">

            <div class=" container">

                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->

                    <!-- logo -->
                    <h1 class="navbar-brand">
                        <a href=""><img src="img/logo.png" height="40" width="164" alt="" /></a>
                    </h1>
                    <!-- /logo -->
                </div>

                <!-- main nav -->

                <nav class="collapse navbar-collapse navbar-right " role="navigation">
                    <ul id="nav" class="nav navbar-nav menu">
                        <li><a href="#top">Home</a></li>
                        <li><a href="#team">Announcement</a></li>
                        <li><a href="#features">Service</a></li>

                        
                        <!-- <li><a href="#pricing-table">Price</a></li>
                    <li><a href="#blog">Blog</a></li> -->

                        <li><a href="#contact-form">Information</a></li>
                        <li><a href="#" data-target="#teachers" data-toggle="modal">Login</a></li>
                        <li><a href="admin/index.php">Administrator</a></li>


                    </ul>
                </nav>
                <!-- /main nav -->
            </div>


        </header>

        <div class="wrapper">






            <div class="modal fade" id="teachers">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title " id="exampleModalLabel">Login Your Account</h5>

                        </div>
                        <div class="modal-body">
                            <form id="login_form1" class="form-signin" method="post">
                                <h3 class="form-signin-heading"> Sign in</h3> <br>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="USER-ID" required> <br>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="PASSWORD" required>
                                <hr>

                                <button title="Click Here to Sign In" id="signin" name="login" class="btn btn-info"
                                    type="submit"><i class="icon-signin icon-large"></i> Sign in</button>
                                <a href="forgot/forgotPassword.php">Forgot Password?</a>
                                <script type="text/javascript">
                                $(document).ready(function() {
                                    $('#signin').tooltip('show');
                                    $('#signin').tooltip('hide');
                                });
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
                </form>


            </div>

            <div class="container-fluid" id="juan">

                <div class="row">






                    <div class="col-12 pt-5 mt-5">

                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                                <li data-target="#myCarousel" data-slide-to="3"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" >
                                <div class="item active">
                                    <div class="desc"></div>
                                    <img class="" src="src/img/c1.jpg" alt="Los Angeles"
                                        style="width: 100%" />
                                </div>

                                <div class="item" >

                                    <img class="img-fluid" src="src/img/c2.jpg" alt="Chicago" style="width: 100%" />
                                </div>

                                <div class="item">

                                    <img class="img-fluid" src="src/img/c3.jpg" alt="New york" style="width: 100%" />
                                </div>
                                <div class="item">

                                    <img class="img-fluid" src="src/img/c4.jpg" alt="New york" style="width: 100%" />
                                </div>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <section id="team" data-aos="zoom-in-down">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title">
                                <h2>Announcement</h2>
                                <p>
                                    DAGATAN SENIOR HIGH SCHOOL
                                    <br /> DOLORES, QUEZON
                                </p>
                            </div>
                            <div id="blog-post" class="owl-carousel">


                                <?php
                                $query = mysqli_query($connection, "select * from announcement") or die($connection->error);
                                while ($row = mysqli_fetch_array($query)) {
                                    $video=$row['location'];
                                ?>
                                <div>
                                    <div class="block">


                                        <div class="content">
                                            <?php
                                        if($video==true){
                                                ?>
                                                        <video width="100%" height="auto" controls>
					<source src="admin/<?php echo $row['location']?>">
				</video>
                                                
                                           <?php }else{
?>                                        
                                        <img  src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>"  width="100%" height="auto" alt="IMAGE"/>
                                        <?php } ?>
                                        <br>
                                        <br>
                                            <h3 class="shesh"><a href="#"><?php echo $row['title'];  ?></a></h3>
                                            <small class="shesh"><?php echo $row['datee']; ?></small>
                                            <p class="shesh">
                                                <?php echo $row['announcement']; ?>
                                            </p>
                                          


                                        </div>
                                    </div>

                                </div>
                                <?php } ?>


                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <div class="motherbanner">



                <div class=" banner-text " data-aos="fade-left">
                    <h1 data-aos="fade-left ">DAGATAN SENIOR HIGH SCHOOL</h1>
                </div>

                <div class=" banner-text-two " data-aos="fade-left">
                    <h1 data-aos="fade-left ">DSHS Tracks Offers: </h1>
                    <div class="maintracks">
                        <h3 data-aos="fade-up"><i class="fa fa-check-circle" aria-hidden="true"></i>General Academic
                            Strand</h3>
                        <h3 data-aos="fade-up"><i class="fa fa-check-circle" aria-hidden="true"></i>Accountancy Business
                            and Management</h3>
                        <h3 data-aos="fade-up"><i class="fa fa-check-circle" aria-hidden="true"></i>Science, Technology,
                            Engineering, and Mathematics</h3>
                        <h3 data-aos="fade-up"><i class="fa fa-check-circle" aria-hidden="true"></i>Humanities and
                            Social Sciences</h3>
                        <h3 data-aos="fade-up"><i class="fa fa-check-circle"
                                aria-hidden="true"></i>Technical-Vocational-Livelihood Track</h3>
                        <div class="tvl">
                            <li data-aos="fade-up"><i class="pl-5" aria-hidden="true"></i>Information and Communications
                                Technology</li>
                            <li data-aos="fade-up"><i class="pl-5" aria-hidden="true"></i>Electrical Installation and
                                Maintenance</li>
                            <li data-aos="fade-up"><i class="pl-5" aria-hidden="true"></i>Shielded Metal Arc Welding
                            </li>
                        </div>
                    </div>
                </div>

                <div><img data-aos="fade-right" class="sonbanner" src="img/model.png" alt=""></div>

            </div>





            <section id="features">
                <div class="container">

                    <div class="row">
                        <div class="title">
                            <h2>DAGATAN ELMS</h2>
                            <p>
                                DAGATAN SENIOR HIGH SCHOOL DOLORES,QUEZON
                            </p>
                        </div>

                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <div class="">
                                <div class="feature-block text-center" data-aos="zoom-in-down">
                                    <div class="icon-box">
                                        <i class="ion-easel " style="color: #2f448c;"></i>
                                    </div>
                                    <h3 class="wow">
                                        MISSION
                                    </h3>
                                    <p class="wow">
                                        To protect and promote the right of every Filipino<span
                                            id="dots">...</span><span id="more"> to quality, equitable, culture-based,
                                            and complete basic education where: Students learn in a child-friendly,
                                            gender-sensitive,
                                            safe and motivating environment Teachers facilitate learning and constantly
                                            nurture every learner Administrators and staff, as steward of the
                                            institution, ensure an enabling and supportive environment for effective
                                            learning to happen Family, community and other stakeholders are actively
                                            engaged and share responsibility for developing lifelong learners
                                        </span>
                                    </p>
                                    <button onclick="myFunction()" id="myBtn">Read more</button>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <div class="">
                                <div class="feature-block text-center" data-aos="zoom-in-down">
                                    <div class="icon-box">
                                        <i class="ion-easel" style="color: #2f448c;"></i>
                                    </div>
                                    <h3 class="wow">
                                        CORE VALUES
                                    </h3>
                                    <p class="wow">
                                        Maka-Diyos, Maka-Tao, Makakalikasan,Makabansa
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <div class="">
                                <div class="feature-block text-center" data-aos="zoom-in-down">
                                    <div class="icon-box">
                                        <i class="ion-easel" style="color: #2f448c;"></i>
                                    </div>
                                    <h3 class="wow">
                                        VISION
                                    </h3>
                                    <p class="wow">
                                        We dream of Filipino who passionately love their<span id="dut">...</span><span
                                            id="all"> country and whose competencies and values enable them to realize
                                            their full potential and contribute meaningfully to
                                            building the nation. We are learner-centered public institution, the
                                            Department of Education continuously improves itself to better serve its
                                            stakeholders.

                                        </span>
                                    </p>
                                    <button onclick="shesh()" id="btns">Read more</button>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </section>




            <section id="counter1">
                <div class="container">
                    <div class="row">

                        <img src="img/strands.jpg" alt="" data-aos="zoom-in-down">

                    </div>
                </div>
            </section>










            <section id="dagatanprog">
                <div class="container">
                    <div class="row">
                        <div class="">
                            <h4 data-aos="fade-right"
                                style="color: white; font-size: 40px; text-align: start; margin-top: 20px;">
                                Dagatan Programs
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <div class="cards-list" data-aos="zoom-in-down">

                                <div class="cardst 1">
                                    <div class="card_image"> <img src="img/modelhs.png" /> </div>
                                    <div class="card_title title-white">
                                        <img src="img/hstext.png" alt="">
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="cards-list" data-aos="zoom-in-down">

                                <div class="cardst 1">
                                    <div class="card_image"> <img src="img/modelshs.png" /> </div>
                                    <div class="card_title title-white">
                                        <img src="img/SHStext.png" alt="">
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- <section id="client-logo ">
            <div class="container ">
                <div class="row ">
                    <div class="col-md-12 ">
                        <div class="block ">
                            <div id="Client_Logo " class="owl-carousel ">
                                <div>
                                    <a href="# "><img class="simg-responsive " src="img/clientLogo/client-logo1.jpg " alt=" " /></a>
                                </div>
                                <div>
                                    <a href="# "><img class="img-responsive " src="img/clientLogo/client-logo2.jpg " alt=" " /></a>
                                </div>
                                <div>
                                    <a href="# "><img class="img-responsive " src="img/clientLogo/client-logo3.jpg " alt=" " /></a>
                                </div>
                                <div>
                                    <a href="# "><img class="img-responsive " src="img/clientLogo/client-logo4.jpg " alt=" " /></a>
                                </div>
                                <div>
                                    <a href="# "><img class="img-responsive " src="img/clientLogo/client-logo5.jpg " alt=" " /></a>
                                </div>
                                <div>
                                    <a href="# "><img class="img-responsive " src="img/clientLogo/client-logo6.jpg " alt=" " /></a>
                                </div>
                                <div>
                                    <a href="# "><img class="img-responsive " src="img/clientLogo/client-logo1.jpg " alt=" " /></a>
                                </div>
                                <div>
                                    <a href="# "><img class="img-responsive " src="img/clientLogo/client-logo2.jpg " alt=" " /></a>
                                </div>
                                <div>
                                    <a href="# "><img class="img-responsive " src="img/clientLogo/client-logo3.jpg " alt=" " /></a>
                                </div>
                                <div>
                                    <a href="# "><img class="img-responsive " src="img/clientLogo/client-logo4.jpg " alt=" " /></a>
                                </div>
                                <div>
                                    <a href="# "><img class="img-responsive " src="img/clientLogo/client-logo5.jpg " alt=" " /></a>
                                </div>
                                <div>
                                    <a href="# "><img class="img-responsive " src="img/clientLogo/client-logo6.jpg " alt=" " /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

            <section id="contact-form">
                <div class="container">
                    <div class="row" data-aos="flip-left">

                        <div class="title">
                            <h2>Location</h2>

                        </div>
                        <div class="col-md-12">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3871.22948241506!2d121.37340351521725!3d14.004402795161843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd45769239e4a9%3A0xf398cb7bd807f509!2sDagatan%20National%20High%20School%20-%20Senior%20High%20School!5e0!3m2!1sen!2sph!4v1673852442499!5m2!1sen!2sph"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                    </div>
                </div>
            </section>


            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <a href="#"><img src="img/logo.png" alt="" /></a>

                                <br>
                                <i class="fa-brands fa-facebook "> <a
                                        href="https://www.facebook.com/dagatannationalhighschool ">Dagatan SHS/NHS</a>
                                </i>
                                <br>
                                <br>
                                <i class="fa-solid fa-phone text-white ">
                                    <a href="https://www.facebook.com/dagatannationalhighschool ">(042) 565 6605</a>
                                </i>
                            </div>
                        </div>
                        <div class="col-md-12 ">

                        </div>
                    </div>
                </div>
            </footer>


        </div>
    </div>



    <script src="assets/aos.js "></script>
    <script>
    AOS.init();
    </script>
    <script>
    jQuery(document).ready(function() {
        jQuery("#login_form1").submit(function(e) {
            e.preventDefault();
            var formData = jQuery(this).serialize();
            $.ajax({
                type: "POST",
                url: "login.php",
                data: formData,
                success: function(html) {
                    if (html == 'true') {
                        $.jGrowl("Loading File Please Wait......", {
                            sticky: true
                        });
                        $.jGrowl("Welcome To Dagatan Senior High School ELMS", {
                            header: 'Access Granted'
                        });
                        var delay = 1000;
                        setTimeout(function() {
                            window.location = 'teacherclass.php'
                        }, delay);
                    } else if (html == 'true_student') {
                        $.jGrowl("Welcome To Dagatan Senior High School ELMS", {
                            header: 'Access Granted'
                        });
                        var delay = 1000;
                        setTimeout(function() {
                            window.location = 'studentclass.php'
                        }, delay);
                    } else {
                        $.jGrowl("Please Check your username and Password", {
                            header: 'Login Failed'
                        });
                    }
                }
            });
            return false;
        });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#signin_student').tooltip('show');
        $('#signin_student').tooltip('hide');
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#signin_teacher').tooltip('show');
        $('#signin_teacher').tooltip('hide');
    });
    </script>

    <script>
    function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
        }
    }
    </script>

    <script>
    function shesh() {
        const dut = document.getElementById("dut");
        const all = document.getElementById("all");
        const btns = document.getElementById("btns");

        if (dut.style.display === "none") {
            dut.style.display = "inline";
            btns.innerHTML = "Read more";
            all.style.display = "none";
        } else {
            dut.style.display = "none";
            btns.innerHTML = "Read less";
            all.style.display = "inline";
        }
    }
    </script>



    <!-- load Js -->
    <script src="src/js/jquery-1.11.3.min.js "></script>
    <script src="src/js/bootstrap.min.js "></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&amp;sensor=false ">
    </script>
    <script src="src/js/waypoints.min.js "></script>
    <script src="src/js/lightbox.js "></script>
    <script src="src/js/jquery.counterup.min.js "></script>
    <script src="src/js/owl.carousel.min.js "></script>
    <script src="src/js/html5lightbox.js "></script>
    <script src="src/js/jquery.mixitup.js "></script>

    <script src="src/js/jquery.scrollUp.js "></script>
    <script src="src/js/jquery.sticky.js "></script>
    <script src="src/js/jquery.nav.js "></script>
    <script src="src/js/main.js "></script>

    <script>
    $(".carousel ").carousel({
        interval: 3000,
    });
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js "
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc " crossorigin="anonymous ">
    </script>
    <?php include('scripts.php'); ?>
</body>



</html>