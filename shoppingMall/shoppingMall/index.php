<?php 	
	$mainContents = isset($_GET['main'])?$_GET['main']:"mainContents.php";
?>

<link href="/shopping/css/topContents.css" rel="stylesheet" type="text/css">
<link href="/shopping/css/join.css" rel="stylesheet" type="text/css">
<link href="/shopping/css/login.css" rel="stylesheet" type="text/css">
<link href="/shopping/css/productList.css" rel="stylesheet" type="text/css">
<link href="/shopping/css/product_detail.css" rel="stylesheet" type="text/css">
<link href="/shopping/css/productCart.css" rel="stylesheet" type="text/css">
<link href="/shopping/css/productAdd.css" rel="stylesheet" type="text/css">
<link href="/shopping/css/productBuy.css" rel="stylesheet" type="text/css">
<link href="/shopping/css/productBuy.css" rel="stylesheet" type="text/css">
<link href="/shopping/css/buyCheck.css" rel="stylesheet" type="text/css">
<link href="/shopping/css/freeBoard.css" rel="stylesheet" type="text/css">
<link href="/shopping/css/freeBoard_write.css" rel="stylesheet" type="text/css">
<link href="/shopping/css/freeBoard_contentView.css" rel="stylesheet" type="text/css">
<link href="/shopping/css/productWish.css" rel="stylesheet" type="text/css">
<script src="/shopping/js/jquery-3.1.1.min.js"></script>
<script src="/shopping/js/jquery-number-master/jquery.number.min.js"></script>

 <style type="text/css">
 		
 	#footer{
 		border-top: solid 1px #dddddd;
 	}
 	#middle{
 		width: 1250px;
 		margin: 0 auto;
 	}

 </style>
<div id="header" name="header">
		<?php require_once "header.php"; ?>
	</div>
<div id="middle" name="middle">
	<?php require_once $mainContents; ?>
</div>
<div id="footer" name="footer">
	<?php require_once "footer.php"; ?>
</div>

