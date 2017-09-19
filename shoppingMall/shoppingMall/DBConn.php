<?php 

	class DBConn{
		
		private $host, $db_name, $db_id, $db_pass,$argDBPort, $pdo, $stmt, $commend, $result;

		function __construct($argHost,$argPort,$argDBName,$argDBID,$argDBPASS){
			$this->host = $argHost;
			$this->db_port = $argPort;
			$this->db_name = $argDBName;
			$this->db_id = $argDBID;
			$this->db_pass = $argDBPASS;	

			$this->pdo = new PDO("mysql:host={$this->host};port={$this->db_port};dbname={$this->db_name}",$this->db_id,$this->db_pass);
		}

		function DB_ErrConfirm(){	
			try {
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				/*echo "db연결완료";*/
			} catch (Exception $e) {
				echo $e->getMessage();
			}		
		}

		function getResult(){
			return $this->result;
		}

		function DB_select(){
			//db클래스의 범용적 select선택 함수 만들기
			$whereSeg = "";
			$selectRow = "";
			$size = func_num_args();
			$saveArg;
			for($count=0; $count<$size; $count++){
		        $saveArg[$count] = func_get_arg($count);
		    }
		    if(!array_key_exists(2,$saveArg)){$whereSeg = "";}
		    else{$whereSeg = "where {$saveArg[2]}";}
		    
		    $selectRow = "{$saveArg[1]}";
		    $selectSql = "select {$selectRow} from {$saveArg[0]} {$whereSeg};";
		    $this->stmt = $this->pdo->prepare($selectSql);	
		    $this->stmt->execute();
		    $this->result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		function DB_insert(){
			//db클래스의 범용적 insert 함수 만들기
			$size = func_num_args();
		    $saveArg;
		    $insertSql;
		    $table_name; 
		    $valueSeg;

		    //파라미터 저장(오버로딩)
		    for($count=0; $count<$size; $count++) { 
		        $saveArg[$count] = func_get_arg($count);
		    }

		    $table_name = $saveArg[0];
		    $valueSeg = $saveArg[1];
		    $insertSql = "insert into {$table_name} values($valueSeg);";
			$this->stmt = $this->pdo->prepare($insertSql);
			$this->stmt->execute();		    
		}

		function DB_update(){
			$size = func_num_args();
		    $saveArg;
		    $insertSql;
		    $table_name; 
		    $setSeg;
		    $whereSeg;

		    //파라미터 저장(오버로딩)
		    for($count=0; $count<$size; $count++) { 
		        $saveArg[$count] = func_get_arg($count);
		    }
		    $table_name	= $saveArg[0];
		    $setSeg		= $saveArg[1];
		    if(!array_key_exists(2,$saveArg)){$whereSeg = "";}
		    else{$whereSeg = "where {$saveArg[2]}";}
		    $insertSql = "update {$table_name} set {$setSeg} {$whereSeg};";
		    $this->stmt = $this->pdo->prepare($insertSql);
			$this->stmt->execute();	
		}

		function DB_delete(){
			$size = func_num_args();
		    $saveArg;
		    $insertSql;
		    $table_name; 
		    $whereSeg;

		    //파라미터 저장(오버로딩)
		    for($count=0; $count<$size; $count++) { 
		        $saveArg[$count] = func_get_arg($count);
		    }
		    $table_name = $saveArg[0];
		    if(!array_key_exists(1,$saveArg)){$whereSeg = "";}
		    else{$whereSeg = "where {$saveArg[1]}";}
		    $insertSql = "delete from {$table_name} {$whereSeg};";
		    $this->stmt = $this->pdo->prepare($insertSql);
			$this->stmt->execute();	
		}

		function DB_alter(){	//미완성
			$size = func_num_args();
		    $saveArg;
		    $insertSql;
		    $table_name; 
		    $kind;
		    $whereSeg;

		    //파라미터 저장(오버로딩)
		    for($count=0; $count<$size; $count++) { 
		        $saveArg[$count] = func_get_arg($count);
		    }
		    $table_name = $saveArg[0];
		    if(!array_key_exists(1,$saveArg)){$whereSeg = "";}
		    else{$whereSeg = "where {$saveArg[1]}";}
		    $insertSql = "alter table {$table_name} {$kind} {$whereSeg};";
		    $this->stmt = $this->pdo->prepare($insertSql);
			$this->stmt->execute();	
		}
	}
	


			
	
 ?>
