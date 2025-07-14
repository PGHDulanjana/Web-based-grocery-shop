<?php
    session_start();
    include("conn.php");
    $userName  = $_SESSION["userName"];
    if(empty($userName)){
        header("Location:firstpage.php");
    }
    $numberofRows = $_SESSION["numberofRows"];
    $deliveryDistrict = $_SESSION["diliveryDistrict"];
    $pNumber ="";
    $address = "";
    //showing current informations
    $selectinfoQuery = "SELECT * FROM userinfo WHERE username = '$userName'";
    $userinfoReuslt = mysqli_query($con,$selectinfoQuery);
    if(mysqli_num_rows($userinfoReuslt) > 0){
        $rows = mysqli_fetch_assoc($userinfoReuslt);
      $pNumber =  $rows['pnumber'];
      $address =  $rows['address'];
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>The Market Basket</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">

                 <!-- favicon -->
                 <link rel="icon" href="img/userimg/favicon.ico" type="image/x-icon">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">59/E clock tower junction/Piliyandala</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">ThemarketBasket@gmail.com</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white"><?=$userName ?></a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white"><?=$deliveryDistrict ?></a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="details.php" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                        <a href="details.php" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                        <a href="firstpage.php" class="text-white"><small class="text-white ms-2">LogOut</small></a>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="index.php" class="navbar-brand"><h1 class="text-primary display-6">The Market Basket</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="details.php" class="nav-item nav-link">About Us</a>
                            <a href="pendingoders.php" class="nav-item nav-link">Pending Oders</a>
                            <a href="previousoders.php" class="nav-item nav-link">previous Oders</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <a href="cart.php" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;"><?=$numberofRows?></span>
                            </a>
                            <a href="userprofile.php" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">User Prifile</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">User Prifile</li>
            </ol>
        </div>
        <!-- Single Page Header End -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
               
           </div>
        </div>

                <?php
                    if(isset($_GET["submitBtn"])){
                        $mobileNumber = $_GET["pnumber"];
                        $address = $_GET["address"];
                        $comment = $_GET["comment"];
                        $checkQuery = "SELECT * FROM userinfo WHERE username = '$userName'";
                        $insertQuery = "INSERT INTO userinfo(pnumber,username,review,address)VALUES('$mobileNumber','$userName','$comment','$address')";
                        $checkResult = mysqli_query($con,$checkQuery);
                        if(!mysqli_num_rows($checkResult) >= 1){
                            if(mysqli_query($con,$insertQuery)){ ?>
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <script>Swal.fire({icon: "success", title: "success !",text: "Information successfully added to the System !",});</script>
                  <?php         }else{ ?>
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <script>Swal.fire({icon: "error", title: "Oops...",text: "Somthing went Wrong try Again later !",});</script>
                  <?php      }
                        }else{ ?>
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <script>Swal.fire({icon: "error", title: "Oops...",text: "Your information already Exist !",});</script>
                 <?php    }
                        
                    }
               
                ?>
        <!-- Tastimonial Start -->
        <!-- <div class="container-fluid contact py-5"> -->
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <div class="row g-4">
                        <h2>Add new informations</h2>
                        <div class="col-lg-7">
                            <form mrthod = "Get">
                                <input type="number" class="w-100 form-control border-0 py-3 mb-4" name="pnumber" required placeholder="Enter your mobile number">
                                <input type="text" class="w-100 form-control border-0 py-3 mb-4" name="address" required placeholder="Enter Your Address">
                                <textarea class="w-100 form-control border-0 mb-4" rows="5" cols="10" name="comment" placeholder="Rewiew us"></textarea>
                                <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " name="submitBtn" type="submit">Submit</button>
                            </form>
                        </div>
                        <div class="col-lg-5">
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Our Address</h4>
                                    <p class="mb-2">59/E clock tower junction/Piliyandala</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Mail Us</h4>
                                    <p class="mb-2">ThemarketBasket@gmail.com </p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded bg-white">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Contact Us</h4>
                                    <p class="mb-2">(078) 3715 777</p>
                                    <p class="mb-2">(070) 2455 137</p>
                                    <!-- <p class="mb-2">(074) 1192 090</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <?php

                        if(isset($_GET["changeBtn"])){
                                $changeNumber = $_GET["changePnumber"];
                                $changeAddress = $_GET["changeAddress"];
                                $updateQuery = "UPDATE userinfo SET pnumber = '$changeNumber', address = '$changeAddress' WHERE username = '$userName'";
                                if(mysqli_query($con,$updateQuery)){ ?>
                                     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                      <script>Swal.fire({icon: "success", title: "success !",text: "Information successfully updated !",});</script>
                        <?php        }else{ ?>
                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                        <script>Swal.fire({icon: "error", title: "Oops...",text: "Cannot update your informations !",});</script>
                   <?php     }
                        }
                    ?>
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <div class="row g-4">
                        <h2>Change your informations</h2>
                        <div class="col-lg-7">
                            <form mrthod = "Get">
                                <input type="number" class="w-100 form-control border-0 py-3 mb-4" name="changePnumber" required placeholder="Enter your mobile number">
                                <input type="text" class="w-100 form-control border-0 py-3 mb-4" name="changeAddress" placeholder="Enter Your Address">
                                <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " name="changeBtn" type="submit">Change info</button>
                            </form>
                        </div>
                        <div class="col-lg-5">
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Your Address</h4>
                                    <p class="mb-2"><?=$address?></p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded bg-white">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Your Contactnumber</h4>
                                    <p class="mb-2"><?=$pNumber?></p>
                                    <!-- <p class="mb-2">(074) 1192 090</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        <!-- </div> -->
        <!-- Tastimonial End -->


      <!-- Footer Start -->
      <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="#">
                            <h1 class="text-primary mb-0">The <br>Market Basket</h1>
                                <p class="text-secondary mb-0">Fresh products</p>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-end pt-3">
                                <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Why People Like us!</h4>
                            <p class="mb-4">typesetting, remaining essentially unchanged. It was 
                                popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>
                            <a href="details.php" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Shop Info</h4>
                            <a class="btn-link" href="details.php">About Us</a>
                            <a class="btn-link" href="details.php">Contact Us</a>
                            <a class="btn-link" href="details.php">Privacy Policy</a>
                            <a class="btn-link" href="details.php">Terms & Condition</a>
                            <a class="btn-link" href="details.php">FAQs & Help</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Account</h4>
                            <a class="btn-link" href="userprofile.php">My Account</a>
                            <a class="btn-link" href="cart.php">Shopping Cart</a>
                            <a class="btn-link" href="details.php">Order History</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Contact</h4>
                            <p>59/E clock tower junction/Piliyandala</p>
                            <p>ThemarketBasket@gmail.com</p>
                            <p>Phone: +94783715777</p>
                            <p>Payment Accepted</p>
                            <img src="img/userimg/paymet.png" width = "100px" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="details.php"><i class="fas fa-copyright text-light me-2"></i>The Market Basket</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        Designed By <a class="border-bottom" href="">Code Crashers</a> Distributed By <a class="border-bottom" href="">Code Crashers</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>

</html>