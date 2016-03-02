<?php

	class mDashboard extends Model{

		function __construct(){
			parent::__construct();
			
		}
		function extractAdverts(){
			$sql="SELECT * FROM Advertises";
			$this->query($sql);
			$this->execute();
			return $dades=$this->resultSet();

		}
	}