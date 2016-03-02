<?php
	/**
	 *  Controller
	 *  
	 *  @author Toni
	 *  @package sys
	 * 
	 * 
	 * */
	
	class Controller{
		protected $model;
		protected $paginator;
		protected $view; 
		protected $params;
		protected $conf;
		function __construct($params){
			$this->params=$params;
			//Coder::codear($this->params);
			$this->conf=Registry::getInstance();
		}

		function json_out($output){
			ob_clean();
			if (is_array($output)){
				echo json_encode($output);
			}
		}
	}