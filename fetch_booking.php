<?php
include('db.php');
function test()
{
	include('db.php');
	$statement = $connection->prepare("select booking.*,DATEDIFF( fin, debut ) as date from booking,chambre,categorie where chambre.id = booking.chambre and chambre.categorie = categorie.id");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
$query = '';
$output = array();
$query .= "select booking.*,DATEDIFF( fin, debut ) as date from booking ";

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE fullname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR telephone LIKE "%'.$_POST["search"]["value"].'%" ';
}

$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{

	$sub_array = array();

	$sub_array[] = $row["fullname"];
	$sub_array[] = $row["cin"];

	$sub_array[] = $row["telephone"];
   
	$sub_array[] = $row["email"];
    $sub_array[] = $row["date"];
    $data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	test(),
	"data"				=>	$data
);
echo json_encode($output);
?>