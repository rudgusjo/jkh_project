<?php 
	require_once "DBConn.php";
	
	class ProductDetail{
		protected $dbConn;
		public $p_id;
		public $p_detail_title;
		public $p_content;
		public $p_price;
		public $p_point;
		public $p_count;
		public $p_disprice;
		public $p_main_img;
		public $p_sub_img = array();


		function __construct($argP_id){
			$this->dbConn = new DBConn('localhost',3306,'phpdb','root','');
			$this->dbConn->DB_ErrConfirm();	
			$this->p_id = $argP_id;
		}
		function adminButton(){
			$user_id = isset($_SESSION['user']['userID'])?$_SESSION['user']['userID']:"";
			$user_level = isset($_SESSION['user']['level'])?$_SESSION['user']['level']:1;
			if(!strcmp($user_id, "admin") && $user_level == 9 ){
				echo "
					<div id='ProductDetail_adminButton' align='right'>
						<button onclick='productDelete()'>상품 삭제</button>
					</div>
				";
			}
		}

		function setInfo(){
			$this->dbConn->DB_select("product","*","productnum = {$this->p_id}");
			$this->p_detail_title 	= $this->dbConn->getResult()[0]['p_detail_title'];
			$this->p_content 		= nl2br($this->dbConn->getResult()[0]['productexplain']);
			$this->p_price  		= number_format($this->dbConn->getResult()[0]['productprice']);
			$this->p_point  		= $this->dbConn->getResult()[0]['point'];
			$this->p_count  		= $this->dbConn->getResult()[0]['productcount'];
			$this->p_disprice  		= number_format($this->dbConn->getResult()[0]['p_disprice']);
			/*$img_id 				= $this->dbConn->getResult()[0]['image_id'];*/
			$this->dbConn->DB_select("product_images","filename,productnum,imagekind","productnum = {$this->dbConn->getResult()[0]['productnum']}");
			$subImgCount = 0;
			for($count = 0;$count<count($this->dbConn->getResult());$count++){
				if(!strcmp($this->dbConn->getResult()[$count]['imagekind'], 'main')){
					$this->p_main_img = $this->dbConn->getResult()[$count]['filename'];	
				}
				if(!strcmp($this->dbConn->getResult()[$count]['imagekind'], 'sub')){
					$this->p_sub_img[$subImgCount]= $this->dbConn->getResult()[$count]['filename'];
					$subImgCount++;
				}				
			}
		}
		
		function cycleViewImg(){
			for($count = 0;$count < count($this->p_sub_img);$count++){
				echo "<img src='http://localhost/shopping/upload/{$this->p_sub_img[$count]}'>";
			}			
		}
	}
 ?>