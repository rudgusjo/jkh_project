<?php 
	require_once "../DBConn.php";
	session_start();
	$dbConn = new DBConn('localhost',3306,'phpdb','root','');
	$dbConn->DB_ErrConfirm();
	$p_id 	= isset($_GET['p_id'])?$_GET['p_id']:"";
	$count 	= isset($_GET['count'])?$_GET['count']:"";
	$pageJudge = isset($_GET['pageJudge'])?$_GET['pageJudge']:"Cart";
	if(isset($_SESSION['user']['userID'])){
		$userid = $_SESSION['user']['userID'];	
	}else{
		echo "<script>
				alert('로그인 후에 이용 가능합니다');
				history.go(-1);
			</script>";
			return;
	}
	$dbConn->DB_insert("cartlist(user_id,productnum,productcount)","'{$userid}',{$p_id},{$count}");

	if(!strcmp($pageJudge, "payment")){
		echo "<script>
				location.href = 'http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productBuy/productBuy&pageJudge=payment';
			</script>
		";
	}else{
		echo "<script>
				var conf = confirm('장바구니에 상품이 담겼습니다. 장바구니로 이동하시겠습니까?');
				if(conf){
					location.href = 'http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productCart/productCart&pageJudge={$pageJudge}';
				}else{
					history.go(-1);
				}
			</script>
		";
	}
	
 ?>