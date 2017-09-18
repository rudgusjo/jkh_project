<?php 
	require_once 'DBConn.php';

	class productCart{
		protected $dbConn;
		protected $userid;
		public $finalPay;
		public $totalPoint;

		public $p_main_img;

		function __construct(){
			$this->dbConn 	= new DBConn('localhost',3306,'phpdb','root','');
			$this->userid 	= isset($_SESSION['user']['userID'])?$_SESSION['user']['userID']:"";

			$this->dbConn->DB_ErrConfirm();	
		}

		function setInfo(){
			/*$img_id 				= $this->dbConn->getResult()[0]['image_id'];*/
			$this->dbConn->DB_select("product p, product_images pi, userinfo u, cartlist c","p.productnum,p.productname,p.productexplain,p.point,p.productprice,p.delivery_price,pi.filename,c.productcount,c.cart_id","p.productnum = pi.productnum and u.user_id = c.user_id and c.productnum = p.productnum and pi.imagekind='main' and u.user_id = '{$this->userid}'");
			if($this->dbConn->getResult() == array()){
				echo <<<FORM
					<div id='productCart_orderInfo_empty'>
						장바구니가 비어있습니다.
					</div>
FORM;
			}
			for($count = 0;$count<count($this->dbConn->getResult());$count++){
				$num = $count + 1;
				$point 	= $this->dbConn->getResult()[$count]['productcount'] * $this->dbConn->getResult()[$count]['point'];
				$price 	= number_format($this->dbConn->getResult()[$count]['productcount'] * $this->dbConn->getResult()[$count]['productprice']);
				$explain= nl2br($this->dbConn->getResult()[$count]['productexplain']);
				$cart_id = $this->dbConn->getResult()[$count]['cart_id'];
				$delivery_price = $this->dbConn->getResult()[$count]['delivery_price'];
				$this->totalPoint += $point;
				echo <<<FORM
				<div class="productCart_orderInfo_div{$num}">
				<li class='productCart_info1'>{$num}</li>
				<li class='productCart_info2'>
					<img class='productCart_img' src='http://localhost/shopping/upload/{$this->dbConn->getResult()[$count]['filename']}'>
				</li>
				<li class='productCart_info3'>
					<p>
						{$this->dbConn->getResult()[$count]['productname']}
					</p>
					<p style='height:20%; border-bottom:0px; margin-top:10px;'>
						{$explain}
					</p>
				</li>
				<li class='productCart_info4'>{$this->dbConn->getResult()[$count]['productcount']} 개</li>
				<li class='productCart_info5'>{$point} point</li>
				<li class='productCart_info6'>{$price} 원</li>
				<li class='productCart_info7'>{$this->dbConn->getResult()[$count]['delivery_price']} 원</li>
				<li class='productCart_info8'><a href='http://localhost/shopping/shoppingMall/productCart/cartDelete.php?cart_id={$cart_id}'>취소</a></li>	
				</div>	
FORM;

				$this->finalPay += (int)str_replace(',', '', $price) + $delivery_price;

			}
		}

		function createButton(){
			echo <<<FORM
				<div id="productCart_button"><!-- 주문 관련 버튼 구성 div -->
					<button onclick='productBuy()'>주문하기</button>	
					<button onclick="javascript:location.href='http://localhost/shopping/shoppingMall/index.php';">쇼핑 계속하기</button>	
				</div>
FORM;
		}
	}

 ?>