<?php 
session_start();
$x = $_SESSION['fullname'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Reservations</title>

	<!-- Google font -->
	<link href="http://fonts.googleapis.com/css?family=Playfair+Display:900" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Alice:400,700" rel="stylesheet" type="text/css" />

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="test/cs/css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="test/cs/css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body >
	
		
<div id="element">			
		
                            
            <?php
$db = mysqli_connect("localhost","root","rootroot","riad");


if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
} 
$records = mysqli_query($db, "SELECT booking.*, DATEDIFF( fin, debut ) as date,categorie.libelle as cat  from booking,chambre,categorie,users where booking.chambre = chambre.id and categorie.id = chambre.categorie and users.id = booking.reserver and users.id = '".$_SESSION["id"]."'");  // Use select query here 


while($data = mysqli_fetch_array($records))
{
?>

<div id="booking" class="section" style="background:linear-gradient(to right, #7a7b7b, #7d889a, #7f9ea9, #8694a7);">
		<div class="section-center" style="background:linear-gradient(to right, #7a7b7b, #7d889a, #7f9ea9, #8694a7);">
	<div class="container" style="background:linear-gradient(to right, #7a7b7b, #7d889a, #7f9ea9, #8694a7);">
	<div >			
<div class="booking-form" >
						<div class="booking-bg" bg-color="#cb8670">
							<div class="form-header">
								<h2> Reservation:</h2>
								<p>Voici Votre Reservation </p>
							</div>
						</div>
						<form>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Début de Reservation</span>
										<input class="form-control" type="text" required disabled value="<?php echo $data['debut'];?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Fin de Reservation</span>
										<input class="form-control" type="text" required disabled value="<?php echo $data['fin'];?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Nom Complet</span>
                                        <input class="form-control" type="text" required disabled value="<?php echo $data['fullname'];?>">

										<span class="select-arrow"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Telephone</span>
                                        <input class="form-control" type="text" required disabled value="<?php echo $data['telephone'];?>">

										<span class="select-arrow"></span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<span class="form-label">Email</span>
                                <input class="form-control" type="text" required disabled value="<?php echo $data['email'];?>">

								<span class="select-arrow"></span>
							</div>

							<div class="form-group">
								<span class="form-label">Nombre De Jours</span>
                                <input class="form-control" type="text" required disabled value="<?php echo $data['date'];?>">

								<span class="select-arrow"></span>
							</div>
							</form>
					</div>
					</div>
					</div>

					</div>
	</div>
					<?php }?>
</div>
					</body>			
					<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
<script>

var element = document.getElementById('element');
	html2pdf(element, {
  margin:       1,
  filename:     'facture.pdf',
  image:        { type: 'jpeg', quality: 0.98 },
  html2canvas:  { scale: 2, logging: true, dpi: 192, letterRendering: true },
  jsPDF:        { unit: 'mm', format: 'a3', orientation: 'portrait' }
});
</script>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>

