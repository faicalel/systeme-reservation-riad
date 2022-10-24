<?php
include('db.php');
include('function.php');
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
			INSERT INTO users (fullname, cin, adresse,telephone,email,pass, image) 
			VALUES (:fullname, :cin, :adresse, :telephone, :email, :pass, :image)
		");
		$result = $statement->execute(
			array(
				':fullname'	=>	$_POST["first_name"],
				':cin'	=>	$_POST["last_name"],
				':adresse'	=>	$_POST["adresse"],
				':telephone'	=>	$_POST["telephone"],
				':email'	=>	$_POST["email"],
				':pass'	=>	$_POST["password"],
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
			"UPDATE users 
			SET fullname = :fullname, cin = :cin, adresse = :adresse, telephone = :telephone, email = :email, pass = :pass, image = :image  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':fullname'	=>	$_POST["first_name"],
				':cin'	=>	$_POST["last_name"],
				':adresse'	=>	$_POST["adresse"],
				':telephone'	=>	$_POST["telephone"],
				':email'	=>	$_POST["email"],
				':pass'	=>	$_POST["password"],
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