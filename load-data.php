<?php

require "config.php";

use App\Pets;

try {
	Pets::register('Faye', 'Female', '1999-02-11', "Richard", 'richard@feynman.com', '37 Irish Lane, La Crosse, Wisconsin, USA','2029182132');
	echo "<li>Added 1 Pet";

	$pets = [
		[
			'name' => 'Albert',
			'gender' => 'Male',
			'birthdate' => '1995-08-14',
			'owner' => 'Einstein',
			'email' => 'albert@einstein.com',
			'address' => '1904 Hillview Street, Columbi, South Carolina, USA',
			'contact' => '5056460019',
		],
		[
			'name' => 'Maya',
			'gender' => 'Female',
			'birthdate' => '2003-09-14',
			'owner' => 'Paul',
			'email' => 'paul@erdos.com',
			'address' => '1871 Terry Lane, Cocoa, Florida, USA',
			'contact' => '7033829828',
		]
	];
	Pets::registerMany($pets);
	echo "<li>Added " . count($pets) . " more pets";
	echo "<br /><a href='index.php'>Proceed to Index Page</a>";

} catch (PDOException $e) {
	error_log($e->getMessage());
	echo "<h1 style='color: red'>" . $e->getMessage() . "</h1>";
}

