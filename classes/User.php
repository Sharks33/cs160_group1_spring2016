<?php

require 'classes/Database.php';

class User {

	private $username;
	private $firstName;
	private $lastName;
	private $email;
	private $password;
	// private $creditCard;

	public function __construct($user, $first, $last, $email, $pass) {
		$this->username = $user;
		$this->firstName = $first;
		$this->lastName = $last;
		$this->email = $email;
		$this->password = $pass;
		// $this->creditCard = $credit;
	}

	public function authenticate() {
		$db = new Database();
		if ($db != null) {
			if ($db->checkCredentials($this)) {
				$db->getUserInfo($this);
				echo "<h1 style=\"color: green; text-align: center\">Authentication succeeded</h1>";
				return true;
			}
			else {
				echo "<h1 style=\"color: red; text-align: center\">Authentication failed</h1>";
				return false;
			}
		}
		else {
			echo "Database connection failure...";
			return false;
		}
	}

	public function create() {
		$db = new Database();
		if ($db != null) {
			if ($db->addUser($this)) {
				return true;
			}
			else {
				return false;
			}
		}
		else {
			echo "Database connection failure...";
			return false;
		}
	}

	public function getUsername() {
		return $this->username;
	}

	public function getPassword() {
		return $this->password;
	}

	public function getFirstName() {
		return $this->firstName;
	}

	public function getLastName() {
		return $this->lastName;
	}

	public function getEmail() {
		return $this->email;
	}

	// public function getCredit() {
	// 	return $this->creditCard;
	// }

	public function setUsername($username) {
		$this->username = $username;
	}

	public function setFirstName($name) {
		$this->firstName = $name;
	}

	public function setLastName($name) {
		$this->lastName = $name;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	// public function setCredit($credit)
	// {
	// 	$this->creditCard = $credit;
	// }
}

?>
