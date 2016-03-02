<?php

	class Register extends Controller{
			protected $model;
			protected $view;
			
			function __construct($params,$array=null){
				parent::__construct($params);
				$this->model=new mRegister();
				$this->view= new vRegister();
				
				//echo 'Hello controller!';
			}
			function home(){
				//Coder::codear($this->conf);
		}
		function reg(){
			//getting data $_POST
			if (!empty($_POST['email']) && 
				!empty($_POST['passwd'])) {
				$email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
				$password=md5(filter_input(INPUT_POST,'passwd',FILTER_SANITIZE_STRING));
				$repassword=md5(filter_input(INPUT_POST,'repasswd',FILTER_SANITIZE_STRING));
				$usrname=filter_input(INPUT_POST,'nom',FILTER_SANITIZE_STRING);
				if($password===$repassword){
					$user=$this->model->register($usrname,$email,$password);
					if($user==true){
						$this->json_out(array('redir'=>'home'));
					}
				}
				
			}
		}
	}