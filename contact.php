<?php
$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "riad";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['submit'])){
    $sql = "INSERT INTO `message`( `name`, `email`, `subject`, `message`) VALUES ('".$_POST["text"]."','".$_POST["email"]."','".$_POST["subject"]."','".$_POST["message"]."')";
    
    if ($conn->query($sql) === TRUE) {
        header("location: contact.php");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>The Palatin - Riad &amp; Resort Template</title>

    <!-- Favicon -->
    <link rel="icon" href="test/img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="test/style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="cssload-container">
            <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="palatin-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="palatinNav">

                        <!-- Nav brand -->
                        <a href="index.html" class="nav-brand"><img src="test/img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li class="active"><a href="index.php">Accueil</a></li>
                                    <li><a href="about-us.html">À propos</a></li>
                               
                             
                                    <li><a href="contact.php">Contact</a></li>

                                    <li><a href="login.php">Connexion</a></li>
                                    <li><a href="register.php">Inscription</a></li>


                                    
                                </ul>

                             

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/bg-8.jpg);">
        <div class="bradcumbContent">
            <h2>Contact</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

 
    <!-- ##### Book Now Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
  <section class="our-hotels-area section-padding-100-0">
        <div class="container">
          

            <div class="row justify-content-center">
                <!-- Single Hotel Info -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-hotel-info mb-100">
                        <div class="hotel-info-text">
                            <h6><span class="fa fa-check"></span> Besoin d'aide pour une réservation?</h6>
                            <h6><span class="fa fa-check"></span> Vous avez des questions?</h6>
                            <h6><span class="fa fa-check"></span> Vous êtes un établissement et vous avez d'aide? </h6>
                        </div>
                     
                    </div>
                </div>
                <!-- Single Hotel Info -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-hotel-info mb-100">
                        <div class="hotel-info-text">
                            <h6><span class="fa fa-check"></span> Vous voulez travailler pour MBooking.com?</h6>
                            <h6><span class="fa fa-check"></span> Vous êtes de la presse?</h6>
                            <h6><span class="fa fa-check"></span> A votre Service 24/24 et 7 / 7</h6>
                        </div>
                       
                    </div>
                </div>
                <!-- Single Hotel Info -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-hotel-info mb-100">
                        <div class="hotel-info-text">
                            <h6><span class="fa fa-check"></span> Vous êtes un agent des pouvoirs publics?</h6>
                            <h6><span class="fa fa-check"></span> Vous voulez des informations sur MBooking.com?</h6>
                            <h6><span class="fa fa-check"></span> Séjour magnifique, personnels très serviables</h6>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Contact Form Area Start ##### -->
    <section class="contact-form-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <div class="line-"></div>
                        <h2>Envoyer Votre Message</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Contact Form -->
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="text" placeholder="Nom Complet">
                            </div>
                            <div class="col-lg-4">
                                <input type="email" class="form-control" name="email" placeholder="E-mail">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="subject" placeholder="Sujet">
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit" class="btn palatin-btn mt-50">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Form Area End ##### -->

    <!-- ##### Google Maps ##### -->
    <div class="map-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1372227.2054876613!2d-7.876256327337137!3d32.183918380308114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0b88619651c58d%3A0xd9d39381c42cffc3!2sMaroc!5e0!3m2!1sfr!2sma!4v1629195813402!5m2!1sfr!2sma" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">

                <!-- Footer Widget Area -->
                <div class="col-12 col-lg-5">
                    <div class="footer-widget-area mt-50">
                        <a href="#" class="d-block mb-5"><img src="test/img/core-img/logo.png" alt=""></a>
                        <p></p>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="footer-widget-area mt-50">
                        <h6 class="widget-title mb-5">Retrouvez-nous sur la carte</h6>
                        <img src="test/img/bg-img/footer-map.png" alt="">
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="footer-widget-area mt-50">
                        <h6 class="widget-title mb-5">Abonnez-vous à notre newsletter</h6>
                        <form action="#" method="post" class="subscribe-form">
                            <input type="email" name="subscribe-email" id="subscribeemail" placeholder="Your E-mail">
                            <button type="submit">Inscription</button>
                        </form>
                    </div>
                </div>

                <!-- Copywrite Text -->
                <div class="col-12">
                    <div class="copywrite-text mt-30">
                    <p><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">REDA BOUTA</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="test/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="test/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="test/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="test/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="test/js/active.js"></script>
</body>

</html>