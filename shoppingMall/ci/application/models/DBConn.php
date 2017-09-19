<?php
class DBConn extends CI_Model{
	public $result;

   	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function db_select(){
		$whereSeg = "";
		$selectRow = "";
		$size = func_num_args();
		$saveArg = array($size);
		for($count=0; $count<$size; $count++){
		    $saveArg[$count] = func_get_arg($count);
		}
		if($saveArg[0] == "" || $saveArg[1] == ""){
			echo "row OR tableName -> empty";
			return FALSE;
		}

		if($saveArg[2] == ""){$whereSeg = "";}
		else{$whereSeg = "where {$saveArg[2]}";}
			    
		$selectRow = "{$saveArg[1]}";
		$selectSql = "select {$selectRow} from {$saveArg[0]} {$whereSeg};";

		return $this->db->query($selectSql)->result();	
	}

	public function db_insert(){
		$size = func_num_args();
		$saveArg;
		$insertSql;
		$table_name; 
		$valueSeg;

		    //파라미터 저장(오버로딩)
		for($count=0; $count<$size; $count++) { 
		    $saveArg[$count] = func_get_arg($count);
		}

		if($saveArg[0] == "" || $saveArg[1] == ""){
			echo "values OR tableName -> empty";
			return;
		}
		$table_name = $saveArg[0];
		$valueSeg = $saveArg[1];
		$insertSql = "insert into {$table_name} values($valueSeg);";
		$this->db->query($insertSql);
	}
}
?>