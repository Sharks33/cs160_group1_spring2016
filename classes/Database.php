<?php

require_once 'includes/constants.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

class Database {

	private $connection;

	function __construct() {
		$this->connection = new PDO(DSN, DB_USER, DB_PASSWORD);
	}

	function checkCredentials($user) {
		$checkUser = $user->getUsername();
		$checkPass = $user->getPassword();

        $query = "SELECT Password
                  FROM Users
                  WHERE UserName = :username
				  LIMIT 1";

		$ps = $this->connection->prepare($query);
		$ps->bindParam(':username', $checkUser);
		$ps->execute();
		$return = $ps->fetch(PDO::FETCH_ASSOC);

		if (!empty($return)) {
			$hash = $return['Password'];
			// if (password_verify($checkPass, $hash))
			if(crypt($checkPass, $hash))
				return true;
			else
				return false;
		}
		else { // There's no user
			return false;
		}
	}

	function addUser($user) {
		$newUser = $user->getUsername();
		$newFirst = $user->getFirstName();
		$newLast = $user->getLastName();
		$newEmail = $user->getEmail();
		$newPass = $user->getPassword();

		$query = "INSERT INTO Users
				  VALUES (:username, :firstName, :lastName, :email, :password);";

		$ps = $this->connection->prepare($query);
		$ps->bindParam(':username', $newUser);
		$ps->bindParam(':firstName', $newFirst);
		$ps->bindParam(':lastName', $newLast);
		$ps->bindParam(':email', $newEmail);
		$ps->bindParam(':password', $newPass);
		$ps->execute();
		$ps->fetchAll(PDO::FETCH_ASSOC);
		if ($ps->rowCount() >= 1)
			return true;
		else
			return false;
	}

	function getUserInfo($user) {
		$username = $user->getUsername();

		$statement = "SELECT FirstName, LastName, EmailAddress
					  FROM Users
					  WHERE UserName = \"$username\";";

		$query = $this->connection->query($statement);
		$return = $query->fetch(PDO::FETCH_ASSOC);

		$first = $return['FirstName'];
		$last = $return['LastName'];
		$email = $return['EmailAddress'];

		$user->setFirstName($first);
		$user->setLastName($last);
		$user->setEmail($email);
	}
}

?>
