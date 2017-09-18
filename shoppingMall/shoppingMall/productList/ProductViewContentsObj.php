<?php 
	require_once "./productList/ViewContentsObj.php";
	require_once "paging.php";

	class ProductViewContents extends ViewContents{
		public $productKind;
		public $category_title;
		public $paging;
		protected $imgListArr;

		function __construct($argKind){
			parent::__construct();
			$this->productKind		= $argKind;
			$this->category_title	= ucfirst($this->productKind);
			$this->paging = new paging('product',"*","productcategory = '{$this->productKind}'","productnum",5);

			$this->dbConn->DB_select("product_images","filename,productnum","imagekind = 'main'");
			$this->imgListArr = $this->dbConn->getResult();
		}

		function ProductCreateContents(){
			for($count = $this->paging->startContent ; $count< $this->paging->rowCount && $count < ($this->paging->startContent+$this->paging->maxContent); $count++){

				$this->contentBody($count,$this->paging->getListArr());

				if(($count+1) % 5 == 0 || $count == ($this->paging->startContent+$this->paging->maxContent-1) || $count== $this->paging->rowCount -1 ){
					echo "<div class='clear'></div>";
				}
			}
		}
	}

 ?>