<?php

	class Model{
		// if model pagination 
		// activate $pagination=true

		protected $db;

		protected $stmt;
		//pagination attributes
		public $pagination=false;
		public $limit;
        public $page; // current number of page
        public $total; //number of records
        public $npages;

		function __construct($pag=null){
			$this->db=DB::singleton();
			//construct in pagination mode
			if ($pag){
				$this->pagination=true;
				$this->limit=LIMIT_ROWS;
			}

		}
		public function query($query){
    		$this->stmt = $this->db->prepare($query);
		}
		/**
		 *  function bind
		 * @param $param string :name
		 * @param $value PHP variable
		 * @param $type  PDO::PARAM_STR.... or null
		 * 
		 * */
		public function bind($param, $value, $type = null){
    	if (is_null($type)) {
        switch (true) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        	}
    	}
    	$this->stmt->bindValue($param, $value, $type);
	}
	public function execute(){
		$result=$this->stmt->execute();
    	return $result;

	}
	public function resultset(){
    	$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function single(){
	    $this->execute();
	    return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
	public function rowCount(){
	    return $this->stmt->rowCount();
	}
	public function lastInsertId(){
    	return $this->db->lastInsertId();
	}
	public function beginTransaction(){
	    return $this->db->beginTransaction();
	}
	public function endTransaction(){
	    return $this->db->commit();
	}
	public function cancelTransaction(){
	    return $this->db->rollBack();
	}
	public function debugDumpParams(){
	    return $this->stmt->debugDumpParams();
	}
	//pagination functions
	public function getTotal($table){
            //extracting total records
            $sql="SELECT * FROM ".$table;
            $this->query($sql);
            $this->execute();
            $total=$this->rowCount();
            $this->total=$total;
            $this->npages=ceil($total/$this->limit);
            Session::set('total',$this->total);
            setcookie('total',Session::get('total'),0,APP_W);
            return $this->total;
        }

    public function setPage($page){
        $this->page=$page;
    }

    public function getData($table){
    		
            $total=$this->getTotal($table);
            
            //if there are more records than one page..
            if ($total>$this->limit){
                 $npages=ceil($total/$this->limit);
                // if ($this->page==null){
                //         $this->page=1;
                // }else{
                //     $this->page++;
                // }

            }
            if($this->page==1){
                $offset=0;
            }else{
                $offset=(($this->page-1)*$this->limit)+1;
            }
            //Coder::code($this->page);
            //Coder::code($offset);
            //die;
            
            $sql="SELECT * FROM ".$table." LIMIT ".$offset.",".$this->limit;
            
            $this->query($sql);
            $data=$this->resultSet();
            Session::set('npages',$this->npages);
            setcookie('npages',Session::get('npages'),0,APP_W);
            Session::set('page',$this->page);
            setcookie('page',Session::get('page'),0,APP_W);
            return $data;
        }

}

