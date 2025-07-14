<?php
    session_start();
    include("conn.php");
    $userName  = $_SESSION["userName"];
    if(empty($userName)){
        header("Location:firstpage.php");
    }
    $numberofRows = $_SESSION["numberofRows"];
    $deliveryDistrict = $_SESSION["diliveryDistrict"];

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
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <!-- <a href="shop.php" class="nav-item nav-link">Shop</a> -->
                            <a href="details.php" class="nav-item nav-link active">About Us</a>
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
            <h1 class="text-center text-white display-6">About The Market Basket</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">About  Us</li>
            </ol>
        </div>
        <!-- Single Page Header End -->

                         

        <!-- Single Product Start -->
        <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <div class="row g-4">
                    <div class="col-12">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <h1 class="text-primary">Get in touch</h1>
                            </div>
                        </div>
                    <div class="col-lg-12">
                            <div class="h-100 rounded">
                                <iframe class="rounded w-100" 
                                style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126764.64060753466!2d79.81934353906254!3d6.843156812381544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae24ff6e5809aa5%3A0xcfeb246c1c023785!2sPiliyandala%20Clock%20Tower!5e0!3m2!1sen!2slk!4v1726982585032!5m2!1sen!2slk" 
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>

                        <div class="col-lg-7">
                        
                          <h3>About Us</h3>
                          <p>Greetings from The Market Basket, your one-stop online store for high-quality, freshly-picked food delivered straight to your door!
                             We are proud to provide a broad range of products, such as delicious seafood, crisp veggies, juicy fruits, premium meats, and lovely
                              baked goods. Our goal is to make purchasing easy and pleasurable for you, with the extra bonus of cash on delivery (COD) for a simple
                               and hassle-free payment method. At The Market Basket, we're dedicated to giving you the greatest products and exceptional service while
                                encouraging a happier and healthier way of living. Come along as we change the way you buy groceries!.</p>
                                <h3>Privecy Policy</h3>
                                <p>At The Market Basket, we are committed to protecting your privacy and ensuring that your personal information is handled in a safe and responsible manner. This Privacy Policy outlines how we collect, use, and protect your information when you visit our website and use our services.</p>
                                <p>Information We Collect We collect personal information that you provide to us when you register on our site, place an order, subscribe to our newsletter, or fill out a form. This may include your name, email address, mailing address, phone number, and payment information.</p>
                                <p>How We Use Your Information The information we collect from you may be used in the following ways:</p>
                                <p>* To personalize your experience and respond to your individual needs</p>
                                <p>* To improve our website and customer service</p>
                                <p>* To process transactions and deliver your orders</p>
                                <p>* To send periodic emails regarding your order or other products and services</p>
                                <p>Protection of Your Information We implement a variety of security measures to maintain the safety of your personal information. Your personal information is contained behind secured networks and is only accessible by a limited number of persons who have special access rights to such systems and are required to keep the information confidential.</p>
                                <p>Cookies We use cookies to enhance your experience, gather general visitor information, and track visits to our website. You can choose to disable cookies through your browser settings, but this may affect your ability to use certain features of our site.</p>
                                <p>Third-Party Disclosure We do not sell, trade, or otherwise transfer to outside parties your personally identifiable information unless we provide users with advance notice. This does not include website hosting partners and other parties who assist us in operating our website, conducting our business, or serving our users, so long as those parties agree to keep this information confidential.</p>
                                <p>Your Consent By using our site, you consent to our privacy policy.</p>
                                <p>Changes to Our Privacy Policy If we decide to change our privacy policy, we will post those changes on this page. Policy changes will apply only to information collected after the date of the change.</p>
                                <p>Contacting Us If there are any questions regarding this privacy policy, you may contact us using the information below:</p>
                                <h6>The Market Basket <br> [59/E clock tower junction/Piliyandala] <br> [Piliyandala, Sri Lanka, 10300] <br> [ThemarketBasket@gmail.com] <br> [(078) 3715 777 / (070) 2455 137 / (074) 1192 090]</h6>

                            </div>
                        <div class="col-lg-5">
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <div>
                                   <h3>Terms and Conditions</h3>
                                   <p>Welcome to The Market Basket! By accessing or using our website, you agree to comply with and be bound by the following terms and conditions. Please read them carefully. By using our website, you agree to these terms and conditions. If you do not agree, please do not use our site. We reserve the right to change these terms at any time, and your continued use of the site signifies your acceptance of any updated terms. We offer a variety of food products, including vegetables, fruits, meats, seafood, beverages, and bakery items. </p>
                                   <p>All products are subject to availability, and we reserve the right to limit quantities or discontinue products without notice. All orders are subject to acceptance and availability. We offer cash on delivery (COD) as our primary payment method. By placing an order, you agree to provide accurate and complete information. We deliver to specified areas and strive to deliver your order within the estimated time frame.</p>
                                   <p>However, delivery times are not guaranteed and may be affected by factors beyond our control. If you are not satisfied with your purchase, please contact us within 24 hours of delivery. We will review your request and, if applicable, arrange for a return or refund. You agree to use our website only for lawful purposes and in a way that does not infringe the rights of others or restrict their use of the site.</p>
                                   <p> You must not misuse our site by introducing viruses or other harmful material. All content on our website, including text, graphics, logos, and images, is the property of The Market Basket or its content suppliers and is protected by copyright laws. You may not reproduce, distribute, or create derivative works from any content without our express written permission.</p>
                                   <p>The Market Basket is not liable for any direct, indirect, incidental, or consequential damages arising from the use of our website or products. This includes, but is not limited to, damages for loss of profits, data, or other intangible losses. These terms and conditions are governed by and construed in accordance with the laws of [Sri Lanka]</p>
                                   <p>Any disputes arising from these terms will be subject to the exclusive jurisdiction of the courts of [Your Country/State]. If you have any questions about these terms and conditions, please contact us at: The Market Basket, [Your Address], [Pliyandala, Sri Lanka, 10300], [ThemarketBasket@gmail.com], [078-3715-777].</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Single Product End -->
    

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