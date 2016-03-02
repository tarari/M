<?php

	class mRegister extends Model{

		function __construct(){
			parent::__construct();
			
		}
		function register($usrname,$email,$password){
			$sql="SELECT * FROM users WHERE email=:email AND passw=:password";
			$this->query($sql);
			$this->bind(':email',$email);
			$this->bind(':password',$password);
			$this->execute();
			//$this->debugDumpParams();
			if($this->rowcount()==1){
				return false;
			}
			else{
				$rol='2';
				$this->new_user($usrname,$email,$password,$rol);	
				return true;
			}
		}
		function new_user($usrname,$email,$password,$rol){
			echo 'eeee';
			$sql="CALL sp_new_user(:username,:email,:passw,:rol)";
				$this->query($sql);
				$this->bind(':username',$usrname);
				$this->bind(':email',$email);
				$this->bind(':passw',$password);
				$this->bind(':rol',$rol);
				$this->execute();
				}
	}