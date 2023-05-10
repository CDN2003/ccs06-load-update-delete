<?php

require "config.php";

use App\Pets;

// Save the Student information, and automatically redirect to index

try {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$birthdate = $_POST['birthdate'];
	$owner = $_POST['owner'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$result = Pets::update($id, $name, $gender, $birthdate, $owner, $email, $address, $contact);

	if ($result) {
		header('Location: index.php');
	}

} catch (PDOException $e) {
	error_log($e->getMessage());
	echo "<h1 style='color: red'>" . $e->getMessage() . "</h1>";
}

