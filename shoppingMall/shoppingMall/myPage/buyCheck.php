<?php 
	require_once "buyCheckControllerObj.php";
?>
<div id="buyCheck_title">
	<span>ORDER</span>
	<span>LIST</span>
</div>
<div id="buyCheck_contents">
	<div id="buyCheck_content_title">
		<li>번호</li>
		<li>구매일자</li>
		<li>상품명</li>
		<li>상품금액</li>
		<li>상품수량</li>
	</div>
	<?=buyCheck() ?>
</div>