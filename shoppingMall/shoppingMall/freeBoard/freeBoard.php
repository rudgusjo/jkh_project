<script type="text/javascript">
	function boardWrite(){
		location.href='http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./freeBoard/freeBoard_write';
	}
</script>
<?php require_once "freeBoardViewController.php"; ?>
<div id="freeBoard_title">
	<div style="width: 20%;">
		<span>FREE</span>
		<span>BOARD</span>
	</div>
	<div align="right">
		<button onclick="boardWrite()">글쓰기</button>
	</div>	
</div>
<div id="freeBoard_contents">
	<div id="freeBoard_contents_title">
		<li>번호	</li>
		<li>제목	</li>
		<li>작성자</li>
		<li>날짜	</li>
		<li>조회수</li>
	</div>
	<?=createContents() ?>
</div>
<div id="freeBoard_page">
	<?=$paging->pageCreate(); ?>
</div>
