<?php
session_start();
$con = mysqli_connect("localhost","root","rootroot","riad");

if(isset($_POST['save_multiple_data']))
{
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];
    $name = $_POST['name'];
    $cin = $_POST['cin'];
     $email = $_POST['email'];
    $phone = $_POST['phone'];
    $chambre = $_POST['chambre'];
    $reserver = $_POST['reserver'];
    foreach($name as $index => $names)
    {
        $s_name = $names;
        $s_phone = $phone[$index];
        $s_debut= $debut[$index];
        $s_fin = $fin[$index];
        $s_email = $email[$index];
        $s_cin = $cin[$index];
        $s_chambre = $chambre[$index];
        $s_reserver = $reserver[$index];

        // $s_otherfiled = $empid[$index];

        $query = "INSERT INTO `booking`( `debut`, `fin`, `fullname`, `cin`, `telephone`, `email`, `chambre`,`reserver`) VALUES ('$s_debut','$s_fin','$s_name','$s_cin','$s_phone','$s_email','$s_chambre','$s_reserver')";
        $query_run = mysqli_query($con, $query);
    }

    if($query_run)
    {
        $_SESSION['status'] = "Multiple Data Inserted Successfully";
        header("Location: welcome.php");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Data Not Inserted";
        header("Location: welcome.php");
        exit(0);
    }
}
?>