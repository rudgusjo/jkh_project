<?php 
	require_once "../DBConn.php";
	session_start();

	$dbConn = new DBConn('localhost',3306,'phpdb','root','');
	$dbConn->DB_ErrConfirm();
	$cart_id = isset($_GET['cart_id'])?$_GET['cart_id']:"";

	$dbConn->DB_delete('cartlist',"cart_id = {$cart_id}");

	echo "
		<script>
			alert('해당 상품의 삭제가 완료되었습니다.');
			history.go(-1);
		</script>
	";

 ?>