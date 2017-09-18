<?php 
	require_once "paging.php";

	$paging = new paging('freeboard',"*","board_id = board_id","board_id",3);

	function createContents(){
		global $dbConn,$paging;
		if(count($paging->getListArr()) == 0){
			echo <<<FORM
			<div id='freeBoard_contents_empty'>
				게시글이 비어 있습니다.
			</div>
FORM;
		return;
		}
		for($count = $paging->startContent; $count< $paging->rowCount && $count< ($paging->startContent+$paging->maxContent);$count++){
			$num = $count + 1;
			echo <<<FORM
			<div class="freeBoard_contents_info">
				<li>{$num}</li>
				<li><a href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./freeBoard/freeBoard_contentView&content_id={$paging->getListArr()[$count]['board_id']}">{$paging->getListArr()[$count]['board_title']}</a></li>
				<li>{$paging->getListArr()[$count]['board_writer']}		</li>
				<li>{$paging->getListArr()[$count]['board_date']}			</li>
				<li>{$paging->getListArr()[$count]['board_viewCount']}	</li>
			</div>
FORM;
		}
	}

 ?>