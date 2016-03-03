<?php

	class User{
		public $email;
		public $rol;
		public $username;
		public $idUser;

		function __construct($email,$idUSer,$rol,$username){
			$this->email=$email;
			$this->idUSer=$idUSer;
			$this->rol=$rol;
			$this->username=$username;
		}

		
	}