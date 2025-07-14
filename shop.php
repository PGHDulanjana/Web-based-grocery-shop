<?php
    session_start();
    include("conn.php");
    $userName  = $_SESSION["userName"];
    if(empty($userName)){
        header("Location:firstpage.php");
    }
    $categoryType = $_SESSION["catogoryType"];
    $deliveryDistrict = $_SESSION["diliveryDistrict"];
    
    //counting tuples in cart
    // $countQuery = "SELECT * FROM cart WHERE username = '$userName'";
    // $numberofRows = mysqli_num_rows(mysqli_query($con,$countQuery));
    $numberofRows = $_SESSION["numberofRows"];
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Fruitables - Vegetable Website Template</title>
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
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <!-- <a href="shop.html" class="nav-item nav-link">Shop</a> -->
                            <a href="details.php" class="nav-item nav-link">About Us</a>
                            <a href="pendingoders.php" class="nav-item nav-link">Pending Oders</a>
                            <a href="previousoders.php" class="nav-item nav-link">previous Oders</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <!-- <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button> -->
                            <a href="cart.php" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;"><?=$numberofRows ?></span>
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


<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="mb-4">Fresh fruits shop</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Categories</h4>
                                            <ul class="list-unstyled fruite-categorie">
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>Apples</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>Oranges</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>Strawbery</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>Banana</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>Pumpkin</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h4 class="mb-3">Featured products</h4>
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                                <img src="img/featur-1.jpg" class="img-fluid rounded" alt="">
                                            </div>
                                            <div>
                                                <h6 class="mb-2">Big Banana</h6>
                                                <div class="d-flex mb-2">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                                <img src="img/featur-2.jpg" class="img-fluid rounded" alt="">
                                            </div>
                                            <div>
                                                <h6 class="mb-2">Big Banana</h6>
                                                <div class="d-flex mb-2">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                                <img src="img/featur-3.jpg" class="img-fluid rounded" alt="">
                                            </div>
                                            <div>
                                                <h6 class="mb-2">Big Banana</h6>
                                                <div class="d-flex mb-2">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="position-relative">
                                            <img src="img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                                            <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                                <h3 class="text-secondary fw-bold">The <br> Market <br> Basket</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php 
                            //Items addedd to the  cart
                                $totalItemPrice = 0;
                                if(isset($_GET["addToCart"])){
                                    $catName = $_GET["catname"];
                                    $catimage = $_GET["catImage"];
                                    $catprice = $_GET["catprice"];
                                    $catQuntity = $_GET["quntity"];
                                    $cattype = $_GET["cattype"];
                                    $avalilability = $_GET["quantites"];
                                    if($avalilability >= $catQuntity){
                                        $insertQuery = "INSERT INTO cart(catname,image,catprice,quantity,cattype,username)VALUES('$catName','$catimage','$catprice','$catQuntity','$cattype','$userName')";
                                        if(mysqli_query($con,$insertQuery)){?>
                                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                            <script>Swal.fire({icon: "success", title: "Welldone !",text: "Item Successfully aded to the cart !",});</script>
                                     <?php   }else{?>
                                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                            <script>Swal.fire({icon: "error", title: "Oops...",text: "Item cannot add to the cart Please try agein !",});</script>
                                  <?php      }
                                    }else{ ?>
                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                        <script>Swal.fire({icon: "error", title: "Oops...",text: "Out going Stockes !",});</script>
                                <?php    }
                                ?>
                                  <?php  }
                                 ?>

                            <div class="col-lg-9">
                                <div class="row g-4 justify-content-center">
                                <?php
                                    $selectQery = "SELECT * FROM category WHERE cattype = '$categoryType'";
                                    $catresult = mysqli_query($con,$selectQery);
                                    if(mysqli_num_rows($catresult) > 0){
                                        while($row = mysqli_fetch_assoc($catresult)){ ?>
                                           <div class="col-md-6 col-lg-6 col-xl-4">
                                       <form method="Get">
                                       <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="admin/images/<?=$row['image'] ?>" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"><?=$row['cattype'] ?></div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <input type="hidden" value = "<?=$row['catname']?>" name="catname">
                                                <input type="hidden" value = "<?=$row['image']?>" name="catImage">
                                                <input type="hidden" value = "<?=$row['price']?>" name="catprice">
                                                <input type="hidden" value = "<?=$row['cattype']?>" name="cattype">
                                                <input type="hidden" value = "<?=$row['quantity']?>" name="quantites">
                                                <h4><?=$row['catname'] ?></h4>
                                                <p><?=$row['catdiscription'] ?></p>
                                                <p>Availability : <?=$row['quantity'] ?> </p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p><input type="number" class="btn border border-secondary rounded-pill px-3 text-primary" value="1" name="quntity"></p>
                                                    <p class="text-dark fs-5 fw-bold mb-0"><?=$row['price'] ?> /=</p>
                                                    <button type="submit" name="addToCart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                       </form>
                                    </div>
                               <?php         }
                                    }else{?>
                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                        <script>Swal.fire({icon: "error", title: "Oops...",text: "Out of stock !",});</script>
                                  <?php  }
                                ?>
                                        </div>
                                    </div>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->


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