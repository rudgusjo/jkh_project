
 <style type="text/css">
 	
 	
 </style>

<form enctype="multipart/form-data" name="formAdd" method="post" action="./productAdd/processing_productAdd.php"  style="height: 0 auto;">
	<div id="writeBody" style="width:100%; background-color:white; display:inline-block;">
		<div class="divTR">
			<span class="divTDHeader">
				<b>상품명</b>
			</span>
			<span class="divTDCon">
				<input type="text" name="productname" id="productname" >
			</span>
		</div>
		<div class="divTR">
			<span class="divTDHeader">
				<b>상품 게시글 제목</b>
			</span>
			<span class="divTDCon">
				<input type="text" name="p_detail_title" id="p_detail_title" style="width: 60%;">
			</span>
		</div>
		<div class="divTR">
			<span class="divTDHeader">
				<b>메인 이미지</b>
			</span>
			<span class="divTDCon">
				<input type="file" name="main_img" id="main_img">
			</span>
		</div>
		<div class="divTR">
			<span class="divTDHeader">
				<b>내용 이미지</b>
			</span>
			<span class="divTDCon">
				<input multiple="multiple" type="file" name="content_img[]" id="content_img">
				<br>
				<span style="font-size: 13px;">
					(이미지는 선택된 순서대로 정렬됩니다)
				</span>
			</span>
		</div>
		<div class="divTR">
			<span class="divTDHeader">
				<b>제조사</b>
			</span>
			<span class="divTDCon">
				<input type="text" name="productseller" id="productseller" style="width:90%;" value="JKH">
			</span>
		</div>
		<div class="divTR">
			<!-- <input type="hidden" name="category_id" id="category_id" value=""> -->
			<span class="divTDHeader">
			<b>상품 카테고리</b>
			</span>
			<span class="divTDCon">
				<!-- <select name="product_category_first" id="product_category_fir " size="8" onchange="javascript:changeCategory(this.value,'product_category_second');" style="min-width: 120px;">
					<option value=""></option>
					<?=$category_first?>
				</select>
				<select name="product_category_second" id="product_category_second" size="8" onchange="javascriptichangeCategory(this.value,'product_category_third');" style="min-width: 120px;">
				</select>

				<select name="product_category_third" id="product_category_third" size="8" onchange="javascriptichangeCategory(this.value,'product_category_fourth'):" style="min-width: 120px;">
				</select>

				<select name="product_category_fourth" id="product_category_fourth" size="8" style="min-width:120px;">
				</select> -->
				<select name="productcategory" id="productcategory">
					<option value="outer">		아우터	</option>
					<option value="top">		티		</option>
					<option value="pants">		바지	</option>
					<option value="accessory">	악세사리</option>
				</select>
			</span>
		</div>
		<div class="divTR">
			<span class="divTDHeader">
				<b>상품 수량</b>
			</span>
			<span class="divTDCon">
				<input type=text name="productcount" id="productcount" style="width:80px;" value="100"> EA
			</span>
		</div>
		<div class="divTR">
			<span class="divTDHeader">
				<b>상품가격</b>
			</span>
			<span class="divTDCon">
				<input type=text name="productprice" id="productprice" style="width:130px;" value="50000"> ￦
			</span>
		</div>
		<div class="divTR">
			<span class="divTDHeader">
				<b>배송비</b>
			</span>
			<span class="divTDCon">
				<input type='text' name="delivery_price" id="delivery_price" style="width:130px;" value="1000"> ￦
			</span>
		</div>
		<div class="divTR">
			<span class="divTDHeader">
				<b>가격 할인율(%)</b>
			</span>
			<span class="divTDCon">
				<input type='text' name="discount" id="discount" style="width:200px;" value="1"> %
				<br>
				<span style="font-size: 13px;">(DB에는 입력된 퍼센트가 반영된 적립금이 입력됩니다)</span>
			</span>
		</div>
		<div class="divTR">
			<span class="divTDHeader">
				<b>적립금(%)</b>
			</span>
			<span class="divTDCon">
				<input type='text' name="point" id="point" style="width:200px;" value="1"> %
				<br>
				<span style="font-size: 13px;">(DB에는 입력된 퍼센트가 반영된 적립금이 입력됩니다)</span>
			</span>
		</div>
		<div class="divTR" style="height:250px; border-bottom:0px;">
			<span class="divTDHeader">
				<b>내용</b>
			</span>
			<span class="divTDCon">
				<textarea style="width:60%; height:150px;" name="productexplain" id="productexplain"></textarea>
			</span>
		</div>
		<div style="width:40%: height:60px; margin:0px auto; top:50px; text-align:center; ">
				<button onclick="">저장하기</button>
		</div>
	</div>
</form>
