<?php 
	$urlKind = isset($_GET['urlKind'])?$_GET['urlKind']:"";
	if(	!strcmp($urlKind, 'mainContents')				|| !strcmp($urlKind, './login/login')				|| 
		!strcmp($urlKind, './join/join')				|| !strcmp($urlKind, './productAdd/productAdd')		||
		!strcmp($urlKind, './login/logout')				|| !strcmp($urlKind, './myPage/buyCheck')			||
		!strcmp($urlKind, './freeBoard/freeBoard_write')|| !strcmp($urlKind, './productWish/productWish')){
		$urlKind .= '.php';
		echo "
			<script>
			location.href='http://localhost/shopping/shoppingMall/index.php?main={$urlKind}';
			</script>";
	}

	if(!strcmp($urlKind, './productList/productList')){
		$urlKind .= '.php';
		$productKind = isset($_GET['kind'])?$_GET['kind']:"";
		$page = isset($_GET['page'])?$_GET['page']:1;
		echo "<script>
				location.href='http://localhost/shopping/shoppingMall/index.php?main={$urlKind}&kind={$productKind}&page={$page}';
			</script>";
	}
	
	if(!strcmp($urlKind, './productDetail/productDetail')){
		$urlKind .= '.php';
		$p_id = isset($_GET['p_id'])?$_GET['p_id']:"";
		echo "<script>
				location.href='http://localhost/shopping/shoppingMall/index.php?main={$urlKind}&p_id={$p_id}';
			</script>";
	}

	if(!strcmp($urlKind, './productCart/cartAddController')){
		$urlKind	.= '.php';
		$p_id 		= isset($_GET['p_id'])?$_GET['p_id']:"";
		$count 		= isset($_GET['count'])?$_GET['count']:"";
		$pageJudge	= isset($_GET['pageJudge'])?$_GET['pageJudge']:"";
		echo "<script>
				location.href='http://localhost/shopping/shoppingMall/{$urlKind}?p_id={$p_id}&count={$count}&pageJudge={$pageJudge}';
			</script>";
	}

	if(!strcmp($urlKind, './productCart/productCart')){
		$urlKind	.= '.php';
		$pageJudge	= isset($_GET['pageJudge'])?$_GET['pageJudge']:"cart";
		echo "<script>
				location.href='http://localhost/shopping/shoppingMall/index.php?main={$urlKind}&pageJudge={$pageJudge}';
			</script>";
	}
	
	if(!strcmp($urlKind, './productBuy/productBuy')){
		$urlKind	.= '.php';
		$p_id 		= isset($_GET['p_id'])?$_GET['p_id']:"";
		$pageJudge	= isset($_GET['pageJudge'])?$_GET['pageJudge']:"payment";
		echo "<script>
				location.href='http://localhost/shopping/shoppingMall/index.php?main={$urlKind}&p_id={$p_id}&pageJudge={$pageJudge}';
			</script>";
	}

	if(!strcmp($urlKind, './freeBoard/freeBoard_contentView')){
		$urlKind	.= '.php';
		$c_id 		= isset($_GET['content_id'])?$_GET['content_id']:"";
		echo "<script>
				location.href='http://localhost/shopping/shoppingMall/index.php?main={$urlKind}&c_id={$c_id}';
			</script>";
	}

	if(!strcmp($urlKind, './freeBoard/freeBoard')){
		$urlKind	.= '.php';
		$page 		= isset($_GET['page'])?$_GET['page']:1;
		echo "<script>
				location.href='http://localhost/shopping/shoppingMall/index.php?main={$urlKind}&page={$page}';
			</script>";
	}
 ?>