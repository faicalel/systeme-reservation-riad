<?php session_start();

$x = $_GET['hotel'];
$_SESSION['hotel'] = $_GET['hotel']; 
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
    <title>The Palatin - Hotel &amp; Resort Template</title>

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
                                    <li class="active"><a href="welcome.php">Accueil</a></li>
                                    <li><a href="about-us.html">À propos</a></li>
                               
                             
                                    <li><a href="reservation.php">Mes Reservations</a></li>
                                    <li><a href="contact.php">Contact</a></li>


                                    <li><a href="#"><?php echo $_SESSION['fullname'];?></a></li>
                                </ul>

                                <!-- Button -->
                                <div class="menu-btn">
                                <a href="logout.php" class="btn palatin-btn">Logout</a>
                                </div>

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
    <section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/bg-6.jpg);">
        <div class="bradcumbContent">
            <h2>Rooms</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Book Now Area Start ##### -->
    <div class="book-now-area">
        <div class="container">
            <div class="row justify-content-center">
                

            </div>
        </div>
    </div>
    <!-- ##### Book Now Area End ##### -->

    <!-- ##### Rooms Area Start ##### -->
    <section class="rooms-area section-padding-0-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="section-heading text-center">
                        <div class="line-"></div>
                        <h2>Choisir Une Chambre</h2>
                    </div>
                </div>
            </div>

            <div class="row">

            <?php
$db = mysqli_connect("localhost","root","rootroot","riad");


if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
} 
$records = mysqli_query($db, "select chambre.*,hotel.libelle as hotel,categorie.libelle as cat from chambre,hotel,categorie where hotel.id = chambre.hotel and categorie.id = chambre.categorie and hotel.id =".$x);  // Use select query here 

while($data = mysqli_fetch_array($records))
{
?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-rooms-area wow fadeInUp" data-wow-delay="100ms">
                        <!-- Thumbnail -->
                        <div class="bg-thumbnail bg-img" style="background-image: url(upload/<?php echo $data['image'];?>);"></div>
                        <!-- Price -->
                        <p class="price-from"><?php echo $data['hotel'];?></p>
                        <!-- Rooms Text -->
                        <div class="rooms-text">
                            <div class="line"></div>
                            <h4><?php echo $data['cat'];?></h4>
                            <p>Numero De Place :  <h4 ><?php echo $data['nbr_place'];?></h4>
                        </p>
                        </div>
                        <!-- Book Room -->
                        <a href="reserver.php?chambre=<?php echo $data['id'];?>" class="book-room-btn btn palatin-btn">Reserver</a>
                    </div>
                </div>
<?php
}?>







             
                <div class="col-12">
                    <!-- Pagination -->
                    <div class="pagination-area wow fadeInUp" data-wow-delay="400ms">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                                <li class="page-item"><a class="page-link" href="#">02.</a></li>
                                <li class="page-item"><a class="page-link" href="#">03.</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ##### Rooms Area End ##### -->

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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">Developer</a>
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