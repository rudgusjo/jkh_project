
	<?php 
		require_once "cartViewControllObj.php";

		$cartView = new productCart();
		$pageJudge = isset($_GET['pageJudge'])?$_GET['pageJudge']:"cart";
	 ?>

	 <script type="text/javascript">
	 	<?php 
	 		echo "function productBuy(){
	 			location.href = 'http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productBuy/productBuy&pageJudge=payment';
	 		}";

	 	 ?>
	 </script>

<div id="productCart_title">
	<div>
		<span id="productCart_title_shopping">SHOPPING</span>
		<span id="productCart_title_cart">CART</span>
	</div>
	<img src="http://localhost/shopping/img/productCart.gif">	
</div>
<div id="productCart_wapper" align="center">
	<div id="productCart_orderTitle">
		<li id="productCart_title1">번호</li>
		<li id="productCart_title2">사진</li>
		<li id="productCart_title3">제품명</li>
		<li id="productCart_title4">수량</li>
		<li id="productCart_title5">적립</li>
		<li id="productCart_title6">가격</li>
		<li id="productCart_title7">배송비</li>
		<li id="productCart_title8">취소</li>
	</div>
	<div class="clear"></div>
	<div id="productCart_orderInfo">
		<?php $cartView->setInfo(); ?>
	</div>
	<div id="productCart_finalPay">
		총 구매금액 : <span id="finalPay_value"><?=number_format($cartView->finalPay); ?></span> 원 
		[적립가능 POINT : <span id="savingPoint"><?=number_format($cartView->totalPoint); ?></span> POINT]
	</div>
	<?php 
		if(!strcmp($pageJudge, "cart")){
			$cartView->createButton();
		}
	 ?>
</div>
	