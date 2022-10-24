<?php
include('db.php');
include('function_chambre.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $connection->prepare("
			INSERT INTO chambre (number, nbr_place, hotel,categorie, image) 
			VALUES (:number, :nbr_place, :hotel, :categorie,  :image)
		");
		$result = $statement->execute(
			array(
				':number'	=>	$_POST["number"],
				':nbr_place'	=>	$_POST["nbr_place"],
				':hotel'	=>	$_POST["hotel"],
				':categorie'	=>	$_POST["categorie"],
				
				':image'		=>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE chambre 
			SET number = :number, nbr_place = :nbr_place, hotel = :hotel, categorie = :categorie, image = :image  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':number'	=>	$_POST["number"],
				':nbr_place'	=>	$_POST["nbr_place"],
				':hotel'	=>	$_POST["hotel"],
				':categorie'	=>	$_POST["categorie"],
				':image'		=>	$image,
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>