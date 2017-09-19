
<?php 
	require_once "./productList/ViewContentsObj.php";
	$mainViewContents = new viewContents();
 ?>


<div class='mainContents_category'>
	<div class='mainContents_title'>
		<span>OUTER</span>	
	</div>
	<div class='mainContents_detail'>
		<span><a class='tag_a' href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productList/productList&kind=outer">+더보기</a></span>	
	</div>	
</div>

<div class="mainContents_contents">
	<?php $mainViewContents->mainCreateContents('outer',0,5); ?>
</div>	
<div class="clear"></div>


<div class='mainContents_category'>
	<div class='mainContents_title'>
		<span>TOP</span>	
	</div>
	<div class='mainContents_detail'>
		<span><a class='tag_a' href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productList/productList&kind=top">+더보기</a></span>
	</div>
</div>

<div class="mainContents_contents">
	<?php $mainViewContents->mainCreateContents('top',0,5); ?>
</div>	
<div class="clear"></div>

<div class='mainContents_category'>
	<div class='mainContents_title'>
		<span>PANTS</span>	
	</div>
	<div class='mainContents_detail'>
		<span><a class='tag_a' href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productList/productList&kind=pants">+더보기</a></span>
	</div>	
</div>

<div class="mainContents_contents">
	<?php $mainViewContents->mainCreateContents('pants',0,5); ?>
</div>	
<div class="clear"></div>

<div class='mainContents_category'>
	<div class='mainContents_title'>
		<span>SHOES</span>	
	</div>
	
	<div class='mainContents_detail'>
		<span><a class='tag_a' href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productList/productList&kind=shoes">+더보기</a></span>
	</div>	
</div>

<div class="mainContents_contents">
	<?php $mainViewContents->mainCreateContents('shoes',0,5); ?>
</div>	
<div class="clear"></div>

<div class='mainContents_category'>
	<div class='mainContents_title'>
		<span>ACCESSORY</span>	
	</div>
	
	<div class='mainContents_detail'>
		<span><a class='tag_a' href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productList/productList&kind=accessory">+더보기</a></span>
	</div>	
</div>

<div class="mainContents_contents">
	<?php $mainViewContents->mainCreateContents('accessory',0,5); ?>
</div>	
<div class="clear"></div>

<div class='mainContents_category'>
	<div class='mainContents_title'>
		<span>BAG</span>	
	</div>
	
	<div class='mainContents_detail'>
		<span><a class='tag_a' href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productList/productList&kind=bag">+더보기</a></span>
	</div>	
</div>

<div class="mainContents_contents">
	<?php $mainViewContents->mainCreateContents('bag',0,5); ?>
</div>	
<div class="clear"></div>

<br/><br/><br/><br/>
