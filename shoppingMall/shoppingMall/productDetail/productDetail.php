
 <?php 
 	require_once "productDetailObj.php";
 	$p_id 	= isset($_GET['p_id'])?$_GET['p_id']:"";
 	$productDetail = new ProductDetail($p_id);
 	$productDetail->setInfo();
  ?>

<script type="text/javascript">
	$(function(){ //수량 증감 버튼 액션
	  $('.bt_up').click(function(){ 
	    var n = $('.bt_up').index(this);
	    var count = $("#order_count:eq("+n+")").val();
	    count = $("#order_count:eq("+n+")").val(count*1+1); 
	  });
	  $('.bt_down').click(function(){ 
	    var n = $('.bt_down').index(this);
	    var count = $("#order_count:eq("+n+")").val();
	    if(count*1-1 < 1){
	    	count = $("#order_count:eq("+n+")").val(1);
	    }else{
	    	count = $("#order_count:eq("+n+")").val(count*1-1);
	    }
	  });
	}) 
	
	<?php 

	echo "
		function productBuy(){
			alert('주문하실 때에 장바구니에 담긴 상품과 함께 주문되오니 원하지않으시면 장바구니를 비워주시기 바랍니다.');
			$(function(){
				location.href = 'http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productCart/cartAddController&pageJudge=payment&p_id={$p_id}&count='+ $('#order_count').val();
			}) 
		}
		function productCart(){
				$(function(){
				location.href = 'http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productCart/cartAddController&pageJudge=cart&p_id={$p_id}&count='+ $('#order_count').val();
			}) 
		}
		function productDelete(){
			location.href = 'http://localhost/shopping/shoppingMall/productDetail/productDetail_delete.php?p_id={$p_id}';
		}
		"; 
	?>
	

</script>

<?=$productDetail->adminButton() ?>
<div id="productDetail_contents">
	<div id="productDetail_imgdiv">
		<?php 
			echo "<img src='http://localhost/shopping/upload/{$productDetail->p_main_img}'>";
		 ?>
	</div>
	<div id="productDetail_Textdiv">
		<li id="productDetail_title"> <?=$productDetail->p_detail_title?> </li>
		<li id="productDetail_content">
			<?=$productDetail->p_content?>
		<!-- 반폴라 디자인으로 정말 답답해요 : ) --><!--  <br>완전 기본ST로 활용도 빵점-!!
		<br>고객님 디자인 업글이 필요해요!-!!
		<br>빨리 마무리 하세요....-!! -->
		</li>
		<div id="productDetail_info">
			<div id="productDetail_info_title">
				<li class="productDetail_price">    판매가격	</li>
				<!-- 가격 -->
				<li class="productDetail_discount">	할인가격	</li>
				<!-- 할인가 -->
				<!-- <li class="productDetail_option">	옵션 		</li> --><!-- 옵션 -->
				<li class="productDetail_point">	적립금		</li><!-- 적립금 -->		
				<li class="productDetail_count">	수량선택	</li><!-- 수량 -->		
			</div>

			<div id="productDetail_info_value">
				<li class="productDetail_price"> <?=$productDetail->p_price?> 원</li><!-- 가격 -->
				<li class="productDetail_discount"> <?=$productDetail->p_disprice?> 원	</li><!-- 할인가격 -->

				<li class="productDetail_point"> <?=$productDetail->p_point ?> point </li>
				<!-- 적립금 -->		
				<li class="productDetail_count"> <!-- 수량 -->	
					
						<div style="width: 15px;">
								<img class="bt_up" src="http://localhost/shopping/img/basket_up.gif" />
						
								<img class="bt_down" src="http://localhost/shopping/img/basket_down.gif"/>	
						</div>		
						<input type="text" name="order_count" id="order_count" value="1">
				</li>
			</div>
		</div>
		<div id="productDetail_button">

				<button onclick="productBuy()">		즉시구매	</button>

				<button onclick="productCart()">	장바구니 	</button>
		
		</div>
	</div>
	<div class="clear"></div>
	<div id="productDetail_detailContent" align="center">
		<?php $productDetail->cycleViewImg(); ?>
	</div>
</div>
<div class="clear"></div>
