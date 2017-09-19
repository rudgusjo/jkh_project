<?php 
	require_once "../DBConn.php";
	$dbConn = new DBConn('localhost',3306,'phpdb','root','');
	$p_id = isset($_GET['p_id'])?$_GET['p_id']:0;

	$dbConn->DB_delete('product',"productnum = {$p_id}");

	echo "
	<script>
		alert('상품 삭제가 왼료되었습니다');
		location.href = http://localhost/shopping/shoppingMall/index.php;
	</script>
	";
 ?>