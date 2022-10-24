<?php


function get_total_all_records()
{
	include('db.php');
	$statement = $connection->prepare("select booking.*,categorie.libelle,chambre.number,DATEDIFF( fin, debut ) as date from booking,chambre,categorie where booking.chambre= chambre.id and chambre.categorie = categorie.id");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>