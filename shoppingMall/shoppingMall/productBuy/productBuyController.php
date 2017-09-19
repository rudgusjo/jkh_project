<?php 

	require_once "../DBConn.php";
	session_start();

	$dbConn 	= new DBConn('localhost',3306,'phpdb','root','');
	$dbConn->DB_ErrConfirm();	

	$order_year 	= date('y');
	$order_month 	= date('m');
	$order_day 		= date('d');

	$totalPoint		= isset($_GET['totalPoint'])?$_GET['totalPoint']:"";
	$user_id 		= isset($_SESSION['user']['userID'])?$_SESSION['user']['userID']:"";
	$usePoint 		= isset($_GET['usePoint'])?$_GET['usePoint']:"";

	$dbConn->DB_select('cartlist',"*","user_id = '{$user_id}'");

	for($count = 0;$count<count($dbConn->getResult());$count++){
		$dbConn->DB_insert('orderlist(order_date,user_id,productnum,productcount)',"'{$order_year}/{$order_month}/{$order_day}','{$dbConn->getResult()[$count]['user_id']}',{$dbConn->getResult()[$count]['productnum']},{$dbConn->getResult()[$count]['productcount']}");	
		$dbConn->DB_update('product',"productcount = (productcount + {$dbConn->getResult()[$count]['productcount']})","productnum = {$dbConn->getResult()[$count]['productnum']}");

	}	
	$dbConn->DB_delete('cartlist',"user_id = '{$user_id}'");
	$dbConn->DB_update('userinfo',"user_point = (user_point - {$usePoint})","user_id = '{$user_id}'");
	$_SESSION['user']['userpoint'] -= $usePoint;
	$dbConn->DB_update('userinfo',"user_point = (user_point + {$totalPoint})","user_id = '{$user_id}'");
	$_SESSION['user']['userpoint'] += $totalPoint;

	echo "
		<script>
			alert('상품 구입이 완료되었습니다. 메인페이지로 이동됩니다.');
			location.href ='http://localhost/shopping/shoppingMall/index.php';
		</script>
	";
 ?>