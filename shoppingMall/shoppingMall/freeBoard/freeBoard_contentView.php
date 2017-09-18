
<?php require_once "contentViewController.php"; ?>
<div id="freeBoard_Content_title">
	<span>FREE</span>
	<span>BOARD</span>
</div>

<div id="freeBoard_Content_DateViewCount">
	<li>작성일자 : <?=$date ?></li>
	<li>조회수 : <?=$viewCount ?></li>
</div>
<div class="clear"></div>
<div id="freeBoard_Content_info">
	<div id="freeBoard_Content_info_title">
		<li>제목</li>
		<li><?=$title ?></li>
	</div>
	<div id="freeBoard_Content_info_file">
		<li>업로드 된 파일</li>
		<li><?=fileDownView(); ?></li>
	</div>
	<div id="freeBoard_Content_info_content">
		<?=$content ?>
	</div>
</div>