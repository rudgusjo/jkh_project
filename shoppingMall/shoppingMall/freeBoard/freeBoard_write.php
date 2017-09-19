
<form method="POST"  enctype="multipart/form-data" action="http://localhost/shopping/shoppingMall/freeBoard/freeBoard_writeController.php">
	<div id="freeBoard_write_title">
		<span>BOARD</span>
		<span>WRITE</span>
	</div>
	<div id="freeBoard_write_info">
		<div id="freeBoard_write_info_title">
			<li>제목</li>
			<li>
				<input type="text" name="title">
			</li>		 
		</div>
		<div class="clear"></div>
		<div id="freeBoard_write_info_file">
			<li>파일 업로드</li>
			<li>
				<input multiple="multiple" type="file" name="freeBoard_file[]"/>
			</li>		 
		</div>
		<div class="clear"></div>

		<div id="freeBoard_write_info_content">
			<textarea name="content"></textarea>
		</div>
	</div>

<div id="freeBoard_write_button" align="center">
	<button>글쓰기</button>
</div>
</form>