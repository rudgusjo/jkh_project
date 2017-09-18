<?php 
	require_once "DBConn.php";
	class ViewContents{
		protected $dbConn;
		protected $productListArr;
		protected $imgListArr;
		public $rowCount;

		function __construct(){
			$this->dbConn = new DBConn('localhost',3306,'phpdb','root','');
			$this->dbConn->DB_ErrConfirm();	
			$this->dbConn->DB_select("product_images","filename,productnum","imagekind = 'main'");
			$this->imgListArr = $this->dbConn->getResult();
		}

		function contentBody($argCount,$argProductList){
			if($this->imgListArr == array()){
					return;
				}
			for($imgArrCount=0;$imgArrCount<count($this->imgListArr);$imgArrCount++){
				if($this->imgListArr[$imgArrCount]['productnum'] == $argProductList[$argCount]['productnum']){
					$img_filename = $this->imgListArr[$imgArrCount]['filename'];
				}
			}
			$price = number_format($argProductList[$argCount]['productprice']);
			$p_content = nl2br($argProductList[$argCount]['productexplain']);
			$productID = $argProductList[$argCount]['productnum'];
			echo "<ul>
					<li class='content_1'>
					<a class='tag_a' href='http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productDetail/productDetail&p_id={$productID}'><img src='http://localhost/shopping/upload/{$img_filename}'></a>
					</li>
					<li class='content_2'>
						<a class='tag_a' href='http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productDetail/productDetail&p_id={$productID}'>{$this->productListArr[$argCount]['p_detail_title']}</a>
					</li>
					<li class='content_3'>
						<a class='tag_a' href='http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productDetail/productDetail&p_id={$productID}'>{$p_content}</a>
					</li>
					<li class='content_4'>
						{$price} 원
					</li>
				</ul>";
		}

		function mainCreateContents($argCategory,$argCount,$argCondition){

			$this->dbConn->DB_select("product","*","productcategory = '{$argCategory}' order by productnum desc");
			$this->productListArr = $this->dbConn->getResult();
			$this->rowCount = count($this->productListArr);

			for(; $argCount< $this->rowCount && $argCount < $argCondition ; $argCount++){
				$this->contentBody($argCount,$this->productListArr);
			}
		}		
	}

 ?>