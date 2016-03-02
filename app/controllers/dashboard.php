<?php

class Dashboard extends Controller{
		protected $model;
		protected $view;
		
		function __construct($params,$array=null){
			parent::__construct($params);
			$this->model=new mDashboard();
			$this->view= new vDashboard();
			
			//echo 'Hello controller!';
		}
		function home(){
			
	}
		// function showAdverts(){
		// 	$dades=$this->model->extractAdverts();
		// 	$this->json_out($dades);
		// }
}