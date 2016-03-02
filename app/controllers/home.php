<?php
	
	class Home extends Controller{
		protected $model;
		protected $view;
		protected $params;

		//protected $paginator;
		
		function __construct($params){
			parent::__construct($params);
			$this->model=new mHome(1);
			$this->view= new vHome();
			
			
			//$this->model->pagination=true;
			//$this->pag=new paginator();
			
			//echo 'Hello controller!';
		}
		function home(){
			
		}
		function log(){
			
			if (!empty($_POST['email']) && !empty($_POST['password'])) {
				$email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
				$password=md5(filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING));
				$user=$this->model->login($email,$password);
				if ($user==true){
					Session::set('user',$email);
					setcookie('user',Session::get('user'),0,APP_W);
					
					$this->json_out(array('redir'=>APP_W.'dashboard'));
				
				}else{
					$this->json_out(array('redir'=>APP_W.'home'));
				}
		}
	}

		function logout(){
			Session::destroy();
			header('Location:'.APP_W);
		}

		function getPage(){
			//extract data from the URL /p/2
			// if (($this->params)==null){
			// 	$p=1;
			// }else{
			// 	$p=$this->params['p'];
			// }
			//extracting data via post
			if(!empty($_POST['p'])){
				$p=$_POST['p'];
			}
			// Coder::code($p);
			// die;
			 $this->model->page=$p;
			 $dades=$this->model->getData('advertises');
		
			 $this->json_out($dades);			

		}

		// function showAdverts(){
		// 	//always begin in page #1
		// 	$this->model->page=1;
		//  	$dades=$this->model->getData('advertises');
		// 	$this->json_out($dades);
		// }

}