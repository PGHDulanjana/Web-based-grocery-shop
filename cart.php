<?php
    session_start();
    include("conn.php");
    $userName  = $_SESSION["userName"];
    if(empty($userName)){
        header("Location:firstpage.php");
    }
    $numberofRows = $_SESSION["numberofRows"];
    $deliveryDistrict = $_SESSION["diliveryDistrict"];
    $totalItemPrice = 0;
    $totalPrice = 0;
    $totalCost = 0;

    //Selecting Address
    $userAddress  = "";
    $userPhoneNumber = "";
    $infoSelectQuery = "SELECT * FROM userinfo WHERE username = '$userName'";
    if(mysqli_num_rows(mysqli_query($con,$infoSelectQuery)) > 0){
        $userRows = mysqli_fetch_assoc(mysqli_query($con,$infoSelectQuery));
        $userPhoneNumber = $userRows['pnumber'];
        $userAddress = $userRows['address'];
    }
    

    //Selecting delivery price
    $selectDeliveryFeeQuery = "SELECT * FROM deliveryfee WHERE district = '$deliveryDistrict'";
    $deliveryResult = mysqli_query($con,$selectDeliveryFeeQuery);
    if(mysqli_num_rows($deliveryResult) > 0){
        $deliveryRow = mysqli_fetch_assoc($deliveryResult);
        $deliveryPrice = $deliveryRow['deliveryprice'];
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
                            <!-- <a href="shop.html" class="nav-item nav-link">Shop</a> -->
                            <a href="details.php" class="nav-item nav-link">About Us</a>
                            <a href="pendingoders.php" class="nav-item nav-link">Pending Oders</a>
                            <a href="previousoders.php" class="nav-item nav-link">previous Oders</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <a href="#" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;"><?=$numberofRows   ?></span>
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
            <h1 class="text-center text-white display-6">Cart</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Cart</li>
            </ol>
        </div>
        <!-- Single Page Header End -->

        <?php
            if(isset($_GET["removeCartBtn"])){
               $itemname =  $_GET["Item"];
               $deleteQuery = "DELETE FROM cart WHERE username = '$userName' AND catname = '$itemname'";
               if(mysqli_query($con,$deleteQuery)){?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>Swal.fire({icon: "success", title: "success !",text: "This item removed from cart !",});</script>
            <?php   }else{ ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>Swal.fire({icon: "error", title: "Oops...",text: "Cannot remove from cart !",});</script>
      <?php         }
            }
        ?>

        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <?php
                        $selectQuery = "SELECT * FROM cart WHERE username = '$userName'";
                        $cartResult = mysqli_query($con,$selectQuery);
                        if(mysqli_num_rows($cartResult) > 0){?>
                            <table class="table"> 
                        <thead>
                          <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                 <?php        while($rows = mysqli_fetch_assoc($cartResult)){?>
                    <tbody>

<tr>
    <th scope="row">
        <div class="d-flex align-items-center">
            <img src="admin/images/<?=$rows['image'] ?>" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
        </div>
    </th>
    <td>
        <p class="mb-0 mt-4"><?=$rows['catname'] ?></p>
    </td>
    <td>
        <p class="mb-0 mt-4"><?=$rows['catprice'] ?></p>
    </td>
    <td>
       
            <p class="mb-0 mt-4"><?=$rows['quantity'] ?></p>
            
    </td>
    <td>
        <p class="mb-0 mt-4"><?=$totalItemPrice = $rows['quantity']  * $rows['catprice'] ?></p>
        <?php $totalPrice += $rows['quantity']  * $rows['catprice']?>
    </td>
    <td>
        <form method="Get">
            <input type="hidden" value = "<?=$rows['catname'] ?>" name = "Item">
        <button class="btn btn-md rounded-circle bg-light border mt-4"  type="submit" name="removeCartBtn">
            <i class="fa fa-times text-danger"></i>
        </button>
        </form>
    </td>

</tr>


</tbody>
                  <?php   }?>
                  </table>
         <?php               }
         if($totalPrice == 0){
            $totalCost = 0;
        }else{
           $totalCost = $totalPrice + $deliveryPrice; 
        }
         ?>
         <?php
            if(isset($_GET["chechOut"])){
                if(!empty($userAddress) && !empty($userPhoneNumber)){
                    $selectingCartQuery = "SELECT * FROM cart WHERE username = '$userName'";
                $SelectCartResult = mysqli_query($con,$selectingCartQuery);
                if(mysqli_num_rows($SelectCartResult) > 0){
                    while($cartRows = mysqli_fetch_assoc($SelectCartResult)){
                        $catName = $cartRows['catname'];
                        $images = $cartRows['image'];
                        $catPrice = $cartRows['catprice'];
                        $catQuntity = $cartRows['quantity'];
                        $catType = $cartRows['cattype'];


                        $selectCartQuery = "SELECT * FROM category WHERE catname = '$catName'";
                        $categoryResult = mysqli_query($con,$selectCartQuery);
                        $rowCart = mysqli_fetch_assoc($categoryResult);
                        $quntity = $rowCart['quantity'] - $catQuntity;

                        $categoryUpdateQuery = "UPDATE category SET quantity = '$quntity' WHERE catname = '$catName'";
                        mysqli_query($con,$categoryUpdateQuery);
                        
                        $insertPendingQuery = "INSERT INTO pendingoders(username,catname,image,catprice,quantity,cattype)
                        VALUES('$userName','$catName','$images','$catPrice','$catQuntity','$catType')";
                        mysqli_query($con,$insertPendingQuery);
                    }
                    if(mysqli_query($con,"DELETE FROM cart WHERE username = '$userName '")){ ?>
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <script>Swal.fire({icon: "success", title: "success !",text: "Successfully Place an oder!",});</script>
          <?php          }else{?>
                                 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                 <script>Swal.fire({icon: "error", title: "Oops...",text: "Cannot place an oder somthing went wrong !",});</script>
        <?php  }
                    
                }
                }else{?>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>Swal.fire({icon: "error", title: "Oops...",text: "Go to profile and add phone number and current Address !",});</script>
           <?php     }
            }
        ?>
                    
                </div>
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Subtotal:</h5>
                                    <p class="mb-0"><?=$totalPrice ?> RS/=</p>
                                </div>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Contact Number:</h5>
                                    <p class="mb-0"><?=$userPhoneNumber ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">Shipping</h5>
                                    <div class="">
                                        <p class="mb-0">Shipping rate : <?=$deliveryPrice ?> RS/=</p>
                                    </div>
                                </div>
                                <p class="mb-0 text-end"><?=$userAddress?>.</p>
                            </div>

                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Total</h5>
                                <p class="mb-0 pe-4"><?=$totalCost ?> RS/=</p>
                                </div>
                           <form method = "Get">
                            <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button" data-bs-toggle="modal" data-bs-target="#chechOut">Proceed Checkout</button>
                        </div>

                        <!-- Modelt -->
                <!-- Button trigger modal -->

                            <!-- Modal -->
                            <div class="modal fade" id="chechOut" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Confermation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to place an oder ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    <button type="submit" name="chechOut" class="btn btn-primary">yes</button>
                                </div>
                                </div>
                            </div>
                            </div>
                           </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->
        
        

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