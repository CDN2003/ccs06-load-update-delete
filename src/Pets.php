<?php

namespace App;

use PDO;

class Pets
{
	protected $id;
	protected $name;
	protected $gender;
	protected $birthdate;
	protected $owner;
	protected $email;
	protected $address;
	protected $contact;
	protected $created_at;

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getGender()
	{
		return $this->gender;
	}

	public function getBirthdate()
	{
		return $this->birthdate;
	}

	public function getOwner()
	{
		return $this->owner;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getAddress()
	{
		return $this->address;
	}

	public function getContact()
	{
		return $this->contact;
	}


	public static function list()
	{
		global $conn;

		try {
			$sql = "SELECT * FROM pets";
			$statement = $conn->query($sql);
			
			$pet = [];
			while ($row = $statement->fetchObject('App\Pets')) {
				array_push($pet, $row);
			}

			return $pet;
		} catch (PDOException $e) {
			error_log($e->getMessage());
		}

		return null;
	}

	public static function getById($id)
	{
		global $conn;

		try {
			$sql = "
				SELECT * FROM pets
				WHERE id=:id
				LIMIT 1
			";
			$statement = $conn->prepare($sql);
			$statement->execute([
				'id' => $id
			]);
			$result = $statement->fetchObject('App\Pets');
			return $result;
		} catch (PDOException $e) {
			error_log($e->getMessage());
		}

		return null;
	}

	public static function register($name, $gender, $birthdate, $owner, $email, $address, $contact)
	{
		global $conn;

		try {
			$sql = "
				INSERT INTO pets (name, gender, birthdate, owner, email, address, contact)
				VALUES ('$name', '$gender', '$birthdate', '$owner', '$email', '$address', '$contact')
			";
			$conn->exec($sql);

			return $conn->lastInsertId();
		} catch (PDOException $e) {
			error_log($e->getMessage());
		}

		return false;
	}

	public static function registerMany($pets)
	{
		global $conn;

		try {
			foreach ($pets as $pet) {
				$sql = "
					INSERT INTO pets
					SET
						name=\"{$pet['name']}\",
						gender=\"{$pet['gender']}\",
						birthdate=\"{$pet['birthdate']}\",
						owner=\"{$pet['owner']}\",
						email=\"{$pet['email']}\",
						address=\"{$pet['address']}\",
						contact=\"{$pet['contact']}\"
				";
				$conn->exec($sql);
			}
			return true;
		} catch (PDOException $e) {
			error_log($e->getMessage());
		}

		return false;
	}

	public static function update($id, $name, $gender, $birthdate, $owner, $email, $address, $contact)
	{
		global $conn;

		try {
			$sql = "
				UPDATE pets
				SET
					name=?,
					gender=?,
					birthdate=?,
					owner=?,
					email=?,
					address=?,
					contact=?
				WHERE id=?
			";
			$statement = $conn->prepare($sql);
			return $statement->execute([
				$name,
				$gender,
				$birthdate,
				$owner,
				$email,
				$address,
				$contact,
				$id
			]);
		} catch (PDOException $e) {
			error_log($e->getMessage());
		}

		return false;
	}

	public static function updateUsingPlaceholder($id, $name, $gender, $birthdate, $owner, $email, $address, $contact)
	{
		global $conn;

		try {
			$sql = "
				UPDATE pets
				SET
				name=:name,
				gender=:gender,
				birthdate=:birthdate,
				owner=:owner,
				email=:email,
				address=:address,
				contact=:contact
				WHERE id=:id
			";
			$statement = $conn->prepare($sql);
			return $statement->execute([
				'name' => $name,
				'gender' => $gender,
				'birthdate' => $birthdate,
				'owner' => $owner,
				'email' => $email,
				'address' => $address,
				'contact' => $contact,
				'id' => $id
			]);
		} catch (PDOException $e) {
			error_log($e->getMessage());
		}

		return false;
	}

	public static function deleteById($id)
	{
		global $conn;

		try {
			$sql = "
				DELETE FROM pets
				WHERE id=:id
			";
			$statement = $conn->prepare($sql);
			return $statement->execute([
				'id' => $id
			]);
		} catch (PDOException $e) {
			error_log($e->getMessage());
		}

		return false;
	}

	public static function clearTable()
	{
		global $conn;

		try {
			$sql = "TRUNCATE TABLE pets";
			$statement = $conn->prepare($sql);
			return $statement->execute();
		} catch (PDOException $e) {
			error_log($e->getMessage());
		}

		return false;
	}
}