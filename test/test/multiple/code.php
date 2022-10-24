<?php
session_start();
$con = mysqli_connect("localhost","root","","hotels");

if(isset($_POST['save_multiple_data']))
{
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];
    $name = $_POST['name'];
    $cin = $_POST['cin'];
     $email = $_POST['email'];
    $phone = $_POST['phone'];
    $chambre = $_SESSION['chambre'];
    foreach($name as $index => $names)
    {
        $s_name = $names;
        $s_phone = $phone[$index];
        $s_email = $email[$index];
        $s_cin = $cin[$index];
        // $s_otherfiled = $empid[$index];

        $query = "INSERT INTO `booking`( `debut`, `fin`, `fullname`, `cin`, `telephone`, `email`, `chambre`) VALUES ('$debut','$fin','$s_name','$s_cin','$s_phone','$s_email','$chambre')";
        $query_run = mysqli_query($con, $query);
    }

    if($query_run)
    {
        $_SESSION['status'] = "Multiple Data Inserted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Data Not Inserted";
        header("Location: index.php");
        exit(0);
    }
}
?>