<?php 
	require_once "DBConn.php";

	$dbConn = new DBConn('localhost',3306,'phpdb','root','');

	function buyCheck(){
		global $dbConn;

		$user_id = isset($_SESSION['user']['userID'])?$_SESSION['user']['userID']:"";
		$dbConn->DB_select('orderlist o, product p',"o.order_date,o.user_id,o.productnum,o.productcount,p.p_detail_title,p.productprice","p.productnum = o.productnum and user_id = '{$user_id}'");

		if (!strcmp($user_id, "") || count($dbConn->getResult()) == 0 ) {
			echo "<div id='buyCheck_empty'>구매 내역이 존재하지 않습니다<div>";
		}
		
		for($count=0;$count<count($dbConn->getResult());$count++){
			$num = $count + 1;
			$orderPrice = number_format($dbConn->getResult()[$count]['productprice'] * $dbConn->getResult()[$count]['productcount']);
			echo <<<FORM
			<div class="buyCheck_content_info">
				<li>{$num}</li>
				<li>{$dbConn->getResult()[$count]['order_date']}</li>
				<li>{$dbConn->getResult()[$count]['p_detail_title']}</li>
				<li>{$orderPrice}</li>
				<li>{$dbConn->getResult()[$count]['productcount']}</li>
			</div>
FORM;
		}
	}
	
 ?>