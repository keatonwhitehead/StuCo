<?php
	class User{
		var $name;
		var $email;

		function User($name, $email){
			$this->$name=$name;
			$this->$email=$email;
		}
	}
?>