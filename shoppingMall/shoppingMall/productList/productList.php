
<?php 
	require_once "ProductViewContentsObj.php";

	$productKind = isset($_GET['kind'])?$_GET['kind']:"";
	$productViewObj = new ProductViewContents($productKind);
?>

<div class='productList_title'>
	<?=$productViewObj->category_title ?>
</div>
<div class='productlist_contents' name='product_list'>
	<?php $productViewObj->ProductCreateContents(); ?>
</div>
<div class='clear'></div><br/><br/><br/>
<div class='productList_pageCount' align='center'> 

	<?php $productViewObj->paging->pageCreate(); ?>

</div>
<br/><br/><br/>