<?php
include('db.php');
include('function_hotel.php');
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
			INSERT INTO hotel (libelle, ville, adresse,telephone, image) 
			VALUES (:libelle, :ville, :adresse, :telephone,  :image)
		");
		$result = $statement->execute(
			array(
				':libelle'	=>	$_POST["libelle"],
				':ville'	=>	$_POST["ville"],
				':adresse'	=>	$_POST["adresse"],
				':telephone'	=>	$_POST["telephone"],
				
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
			"UPDATE hotel 
			SET libelle = :libelle, ville = :ville, adresse = :adresse, telephone = :telephone, image = :image  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':libelle'	=>	$_POST["libelle"],
				':ville'	=>	$_POST["ville"],
				':adresse'	=>	$_POST["adresse"],
				':telephone'	=>	$_POST["telephone"],
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