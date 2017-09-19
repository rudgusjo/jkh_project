
<?php require_once "productBuyInfo.php"; ?>

<?php require_once "./productCart/productCart.php"; ?>
<script>

	<?php 
		echo "
			function applyPoint(){
				$(function(){
					var applyPoint 	= Number($('#applyPoint').val());
					var finalPay 	= Number($('#finalPay_value').text().replace(/[^\d]+/g, ''));
					if(applyPoint > {$user_point}){
						alert('적용할 포인트가 사용가능 포인트보다 많습니다');
						return;
					}else if(applyPoint >= finalPay){
						alert('적용할 포인트가 총 구매금액 보다 많이 입력되었습니다.');
						return;
					}else{
						var sum = finalPay - applyPoint;
						$('#appliedPay').text($.number(sum));
					}
				})
			}			
			 function actionBuy(){
				$(function(){
					var savingPoint = Number($('#savingPoint').text().replace(/[^\d]+/g, ''));
					var usePoint = Number($('#applyPoint').val());
					location.href= 'http://localhost/shopping/shoppingMall/productBuy/productBuyController.php?usePoint='+usePoint+'&totalPoint='+savingPoint;
				})				
			}
		";
	 ?>

</script>

<div id="productBuy_img_pointUse">
	<img id="productBuy_pointUse" src="http://localhost/shopping/img/pointUse.gif">	
</div>
<div id="productBuy_point"><!-- 적립금 사용여부 -->
	<div>
		&nbsp;&nbsp;사용할 POINT : <input id="applyPoint" type="text"> POINT [사용가능 POINT : <?=$user_point ?> POINT] 
		<button onclick="applyPoint()">적용하기</button>	
	</div>
	<diV>
		&nbsp;&nbsp;최종 결제금액 : <span id="appliedPay"><?=number_format($cartView->finalPay); ?></span> 원
	</div>	
</div>

<div id="productBuy_button" align="center"><!-- 주문 관련 버튼 구성 div -->
	<button onclick="actionBuy()">주문하기</button>
	<button onclick="javascript:history.go(-1);">주문취소</button>
</div>

