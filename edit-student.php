<?php

require "config.php";

use App\Pets;

$pet_id = $_GET['id'];

$pet = Pets::getById($pet_id);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Pet Information</title>
</head>
<body>
<h1>Edit Pet Information</h1>

<form action="save-changes.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $pet->getId(); ?>">
	<div>
		<label>Pet Name: </label>
		<input type="text" name="name" placeholder="Pet Name" value="<?php echo $pet->getName();?>" />	
	</div>
	<div>
		<label>Pet Gender</label>
		<input type="text" name="gender" value="<?php echo $pet->getGender();?>" />	
	</div>
	<div>
		<label>Pet Birthdate</label>
		<input type="date" name="birthdate" value="<?php echo $pet->getBirthdate();?>" />	
	</div>
	<div>
		<label>Owner Name</label>
		<input type="text" name="owner" placeholder="Owner Name" value="<?php echo $pet->getOwner();?>" />	
	</div>
	<div>
		<label>Email Address</label>
		<input type="email" name="email" placeholder="email@address.com" value="<?php echo $pet->getEmail();?>" />	
	</div>
	<div>
		<label>Address</label>
		<input type="text" name="address" placeholder="Address" value="<?php echo $pet->getAddress();?>" />	
	</div>
	<div>
		<label>Contact Number</label>
		<input type="number" name="number" placeholder="Number" value="<?php echo $pet->getContact();?>" />	
	</div>
	<div>
		<button>
			Save
		</button>
		<a href="index.php">Cancel</a>
	</div>
</form>
</body>
</html>