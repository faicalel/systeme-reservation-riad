<?php 
$cv = $_GET['chambre'];
session_start();

$_SESSION["chambre"] = $cv;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Title -->
    <title>The Palatin - Hotel &amp; Resort Template</title>

    <!-- Favicon -->
    <link rel="icon" href="test/img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="test/style.css">

</head>

<body>
 
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
    </header><br><br><br><br><br><br><br><br>
  
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php 
                    if(isset($_SESSION['fullname']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['fullname']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        
                    }
                ?>

                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Faire une Reservation
                            <a href="javascript:void(0)" class="add-more-form float-end btn btn-primary">Ajouter</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="code.php" method="POST">
                        
                            <div class="main-form mt-3 border-bottom">
                                <div class="row">

                                <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="">Date Debut</label>
                                            <input type="date" name="debut[]" class="form-control" required placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="">Date Fin</label>
                                            <input type="date" name="fin[]" class="form-control" required placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="">Nom Complet</label>
                                            <input type="text" name="name[]" class="form-control" required placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="">CIN</label>
                                            <input type="text" name="cin[]" class="form-control" required placeholder="Enter Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="">Telephone</label>
                                            <input type="text" name="phone[]" class="form-control" required placeholder="Enter Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="">Email</label>
                                            <input type="email" name="email[]" class="form-control" required placeholder="Enter Phone Number">
                                        </div>
                                    </div>

                                    <input type="hidden" name="chambre[]" value="<?php echo $_SESSION["chambre"]; ?>" class="form-control" required placeholder="Enter Name">
                                    <input type="hidden" name="reserver[]" value="<?php echo $_SESSION["id"]; ?>" class="form-control" required placeholder="Enter Name">

                                </div>
                            </div>

                            <div class="paste-new-forms"></div>

                            <button type="submit" name="save_multiple_data" class="btn btn-primary">Reserver</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<br><br><br><br><br>
    <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {

            $(document).on('click', '.remove-btn', function () {
                $(this).closest('.main-form').remove();
            });
            
            $(document).on('click', '.add-more-form', function () {
                $('.paste-new-forms').append('<div class="main-form mt-3 border-bottom">\
                                <div class="row">\
                                <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <label for="">Date Debut</label>\
                                            <input type="date" name="debut[]" class="form-control" required placeholder="Enter Name">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <label for="">Date Fin</label>\
                                            <input type="date" name="fin[]" class="form-control" required placeholder="Enter Name">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <label for="">Nom Complet</label>\
                                            <input type="text" name="name[]" class="form-control" required placeholder="Enter Name">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <label for="">CIN</label>\
                                            <input type="text" name="cin[]" class="form-control" required placeholder="Enter Phone Number">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <label for="">Telephone</label>\
                                            <input type="text" name="phone[]" class="form-control" required placeholder="Enter Phone Number">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <label for="">Email</label>\
                                            <input type="email" name="email[]" class="form-control" required placeholder="Enter Phone Number">\
                                        </div>\
                                    </div>\
                                    <input type="hidden" name="chambre[]" value="<?php echo $_SESSION['chambre']; ?>" class="form-control" required placeholder="Enter Name">\
                                    <input type="hidden" name="reserver[]" value="<?php echo $_SESSION["id"]; ?>" class="form-control" required placeholder="Enter Name">\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <br>\
                                            <button type="button" class="remove-btn btn btn-danger">Remove</button>\
                                        </div>\
                                    </div> </div>\
                            </div>');
            });

        });
    </script>


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