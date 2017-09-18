<script type="text/javascript" src="http://localhost:8080/shopping/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="http://localhost:8080/shopping/ckeditor/adapters/jquery.js"></script>
<!-- <script type="text/javascript" src="http://localhost:8080/shopping/ckfinder/ckfindesz"></script> -->

<script type= "text/javascript">

	function init(){
		CKEDITOR.disableAutolnline = true;
		var editor = CKEDITOR.replace('product_contents', {height:'300px'});
		CKFinder.setupCKEditor(editor, '/ckfinder');
	}

	function openMessage(IDS){

		$('#'+IDS).bPopup();
	}

	$(document).ready(function(){
		init();
	});

	function loadingList(){
		/* $.ajax({

		type: 'POST',
		urII "/board/getList",
		data: { PAGE: '1' },
		cache: false,
		asynci false

		})
.done(function( html ) {
S("#tableBody").htm|(htm|):
}}):*/

	function execSave(){

		if(!Trim($("#goods_name").val())){
			alert("상품명을 입력해주십시오.");
			$("#goods_name").select();
			$("#goods_name").focus();
			return false;
		}
		if(!Trim($("#main_img").val())){
			alert("이미지파일을 선택해주십시오");
			S("#main_img").focus();
			return false;
		}
		if(!Trim($("#maker").val())){

			alert("제조사를 업력해주십시오.");
			$("#maker").select();
			$("#maker").focus();
			return false;
		}
		if(!Trim($("#category_id").val())){
			alert("상품 카테고리를 선택해주십시오");
			return false;
		}
		if(!Trim(S("#price").val())){

			alert("상품가격을 입력해주십시오");
			$("#price").select();
			$("#price").focus();
			return false;
		}
		if(isNaN(Trim($("#price").val()))){

			alert("상품 가격을 숫자로 입력해주십시오");
			$("#price").select();
			$("#price").focus();
			return false;
		}
		if(!Trim($("#pay_method").val())){

			alert("주문 방법을 선택해주십시오");
			$("#pay_method").focus();
			return false;
		}
		if(!Trim($("#delivery_method").val())){

			alert("배송정보를 선택해주십시오");
			$("#delivery_method").focus();
			return false;
		}
		if(!Trim($("#delivery_price").val())){
			alert("배송비를 입력해주십시오");
			$("#delivery_price").select();
			$("#delivery_price").focus();

			return false;
		}
		if(isNaN(Trim($("#delivery_price").val()))){

		alert("배송비를 숫자로 입력해주십시오");
			$("#delivery_price").select();
			$("#delivery_price").focus();

			return false;
		}
		if(Trim($("#point").val())){
			if(isNaN(Trim($("#point").val()))){
				alert("적립금을 숫자로 입력해주십시오");
				$("#point").select();
				$("#point").focus();
				return false;
			}
		}

		document.formAdd.submit();
		return false;
	}

	function Trim(str){

		var index, len, bJudge;

		while(true){
			bJudge = true;
			index = str.indexOf(' ');

			if (index == -1) break;

			if (index == 0){
				len = strlength;
				str = str.substring(0, index) + str.substring((index+1),len);
			}else{
				bJudge = false;
			}

			index = str.lastIndexOf(' ');

			if (index == -1) break;

			if (index == str.length - 1){
				len = str.length;
				str = str.substring(0, index) + str.substring((index+1),len);
			}else{
				if(bJudge == false){break;}
			}
		}
		return str;
	}
	function changeCategory(cat_code,dest0bjlD){
		$("#category_id").val(cat_code);
		$.ajax({
			type: 'POST',
			url: "/am/categoryDeepLoad",
			data: {category:cat_code},
			cache: false,
			async: false
		})

		.done(function( html ) {
			var ddl_this = document.getElementById(destObjID);
			ddl_this.options.length = 0;

			if(destObjID == "product_category_second"){
				document.getElementById("product_category_third").options.length = 0;
				document.getElementById("product_category_fourth").options.length = 0;
			}
			else if(destObjID == "product_category_third"){
				document.getElementById("product_category_fourth").options.length = 0;
			}

			var category_recordset = html.split("*");

			for(var i=0; i < category_recordset.length; i++){
				var code_name = category_recordset[i] .split("|");
				var option_this = new Option(code_name[1],code_name[0]);
				ddl_this.options.length = ddl_this.options.length + 1;
				ddl_this.options[ddl_this.options.length-1] = option_this;
			}
		});
	}
</script>
</head>
<form name="formAdd" method="post" enctype="MULﬁPART/FORM-DATA" action="/shopping/ci/index.php/am/productAddOk">
	<div id="writeBody" style="width:100%; background-color:white; display:inline-block;">
		<div class="divTR">
			<span class="divTDHeader">
				<b>상품명</b>
			</span>
			<span class="divTDCon">
				<input type="text" name="goods_name" id="goods_name">
			</span>
		</div>
		<div class="divTR">
			<span class="divTDHeader">
				<b>이미지</b>
			</span>
			<span class="divTDCon">
				<input type="file" name="main_img" id="main_img">
			</span>
		</div>
		<div class="divTR">
			<span class="divTDHeader">
				<b>제조사</b>
			</span>
			<span class="divTDCon">
				<input type="text" name="maker" id="maker" style="width290%:">
			</span>
		</div>
		<!--<div class="divTR">
			<span class="divTDHeader">
				<b>’él%-E--.ET</b>
			</span>
			<span class="divTDCon">
				<select name="product_group" id="product_group">
			<option value=" ">+iE-|1(/option>
			</se|ect>
			</span>
		</div-->
		<div class="divTR">
			<input type="hidden" name="category_id" id="category_id" value="">
			<span class="divTDHeader">
			<b>상품 카테고리</b>
			</span>
			<span class="divTDCon">
				<select name="product_category_first" id="product_category_fir " size="8" onchange="javascript:changeCategory(this.value,'product_category_second');" style="min-width: 120px;">
					<option value=""></option>
					<?=$category_first?>
				</select>
				<select name="product_category_second" id="product_category_second" size="8" onchange="javascriptichangeCategory(this.value,'product_category_third');" style="min-width: 120px;">
				</select>

				<select name="product_category_third" id="product_category_third" size="8" onchange="javascriptichangeCategory(this.value,'product_category_fourth'):" style="min-width: 120px;">
				</select>

				<select name="product_category_fourth" id="product_category_fourth" size="8" style="min-width:120px;">
				</select>

				<button class="css3button" onclick="javascript:location.href = '/am/categoryMng';">GGG</button>
			</span>
		</div>

		<div class="divTR">
			<span class="divTDHeader">
				<b>상품가격</b>
			</span>
			<span class="divTDCon">
				<input type=text name="price" id="price" style="width:200px;">원
			</span>
		</div>
		<div class="divTR">
			<span class="divTDHeader">
				<b>주문방법</b>
			</span>
			<span class="divTDCon">
				<select name="pay_method" id="pay_method">
					<option value=" ">선택</option>
					<option value="BANK">온라인입금</option>
					<option value="BANKCARD">온라인+카드</option>
				</select>
			</span>
		</div>
		<div class="divTR">
			<span class="divTDHeader">
				<b>배송정보</b>
			</span>
			<span class="divTDCon">
				<select name="delivery_method" id="delivery_method">
					<option value=" ">선택</option>
					<option value="basic">기본배송</option>
				</select>
			</span>
		</div>
		<div class="divTR">
			<span class="divTDHeader">
				<b>배송비</b>
			</span>
			<span class="divTDCon">
				<input type='text' name="delivery_price" id="delivery_price" style="width:200px;">원
			</span>
		</div>
		<div class="divTR">
			<span class="divTDHeader">
				<b>적립금</b>
			</span>
			<span class="divTDCon">
				<input type='text' name="point" id="point" style="width:200px;">원
			</span>
		</div>
		<!--
		<div class="divTR">
			<span class="divTDHeader">
				<b>옵션추가</b>
			</span>
			<span class="divTDCon">
				<select name="product_group" id="product_group">
					<option value="">선택</option>
				</select>
			</span>
		</div>
		-->
		<div class="divTR" style="height:350px; border-bottom:0px;">
			<span class="divTDHeader">
				<b>내용</b>
			</span>
			<span class="divTDCon">
				<textarea style="width:90%; height:100%;" name="product_contents" id="product_contents"></textarea>
			</span>
		</div>
		<div style="width:80%: height:60px; margin:0px auto; top:164px; text-align:center; position: relative;">
			<button onclick="javascript:return execSave();">저장하기</button>
		</div>
	</div>
</form>


 












