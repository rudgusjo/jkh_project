<?php 
	require_once "DBConn.php";
	class paging{
		public $rowCount;
		public $maxContent;
		public $total_page;
		public $page;
		public $startContent;
		public $contentNum;
		public $newUrl;

		protected $dbConn;
		protected $listArr;

		function __construct($argTableName,$argSelectSeg,$argWhereSeg,$argOrderKey,$argMaxView){

			$this->dbConn = new DBConn('localhost',3306,'phpdb','root','');
			$this->dbConn->DB_ErrConfirm();
			$this->dbConn->DB_select("{$argTableName}","{$argSelectSeg}","{$argWhereSeg} order by {$argOrderKey} desc");
			$this->listArr 			= $this->dbConn->getResult();
			$this->rowCount 		= count($this->dbConn->getResult());
			$this->maxContent 		= $argMaxView;

			if($this->rowCount % $this->maxContent == 0){
				$this->total_page = floor($this->rowCount/$this->maxContent);
			}else{
				$this->total_page = floor($this->rowCount/$this->maxContent) + 1;
			}
		 
			if(!isset($_GET['page'])){$this->page = 1;}
			else 					 {$this->page = $_GET['page'];}
		 
			// 표시할 페이지($page)에 따라 $start 계산  
			$this->startContent	= ($this->page - 1) * $this->maxContent;
			$this->ContentNum 	= $this->rowCount - $this->startContent;

		}
		function getListArr(){
			return $this->listArr;
		}

		function pageCreate(){
			$url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
			$urlArr = explode('&', $url);
			$this->newUrl;
			for($count=0;$count<count($urlArr);$count++){
				if(strpos($urlArr[$count], "page=") !== false){
					$urlArr[$count] = "page=";
				}
				$this->newUrl .=$urlArr[$count];
				if($count != count($urlArr) -1){
					$this->newUrl .= "&";
				}
			}

			echo "<span id='first'> 
					<a class='tag_a' href='{$this->newUrl}1'>[처음] </a> 
				</span>&nbsp;&nbsp;&nbsp;&nbsp;
			";
			for ($count=1; $count<=$this->total_page; $count++){
				if ($this->page == $count){
					echo "<a class='tag_a' href='{$this->newUrl}{$count}'> {$count} </a>";
				}else{ 
					echo "<span id='page_number'>
						<a class='tag_a' href='{$this->newUrl}{$count}'> {$count} </a>";
				}      
	   		}
	   		echo "&nbsp;&nbsp;&nbsp;&nbsp;
	   			<span id='end'> 
	   				<a class='tag_a' href='{$this->newUrl}{$this->total_page}'> [끝] </a>
				</span>
			";	
		}
	}

 ?>