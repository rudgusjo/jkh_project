<script type="teXt/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>

<script type= "text/javascript">
	function init(){
		CKEDITOR.disableAutolnline = true;
		var editor = CKEDITOR.replace('product_contents', {height:'300px'});

		CKFinder.setupCKEditor( editor, '/ckfinder' );
	}

	function openMessage(lDS){
		$('#'+IDS).bPopup();
	}

	$(document).ready(function(){
		init();
	});

	function loadingList(){
		/* $.aiax({
			type: 'POST',
			urII "/board/getList",
			data: { PAGE: '1' },
			cache: false,
			async: false
		})
		.done(function(html){
			$("#tableBody").html(html);
		}});*/

	function Trim(str){	 // Remove Blank Function

		var index, len, bJudge;

		while(true){
			bJudge = true;
			index = str.indexOf(' ');
			if (index == -1) break;
			if (index == 0){
				len = str.length;
				str = str.substring(0, index) + str.substring((index+1),len);
			}else{
				bJudge = false;
			}

			index = str.lastlndexOf(' ');

			if (index == -1) break;
			if (index == str.length - 1){
				len = str.length;
				str = str.substring(0, index) + str.substring((index+1),len);
			}else{
				if(bJudge == false){
					break;
				}
			}
		}
	}
	</script>
</head>

<form name="formList" method="lost" enctype="MULTIPART/FORM-DATA" action="/am/productAddOk">
</form>
<div style="width:100%; border-bottom:2px solid #eeeeee; border-top:2px solid gray; margin-top:23px;">
	<div style="border-bottom:1px solid #e5e5e5; font-size:13px; line-height:32px; height:32px; text-align:center; width:100%;">
		<div style="width:5%; height:32px; text-align:center; padding-left:10px; float:left; line-height:32px; text-align:center; font-weight:900;">선택</div>
		<div style="width:5%; height:32px; text-align:center; padding-left:10px; float:left; line-height:32px; text-align:center; font-weight:900;">번호</div>
		<div style="width:38%; height:32px; text-align:center; padding-left:10px; float:left; line-height:32px; text-align:center; font-weight:900;">상품명</div>
		<div style="width:10%; height:32px; text-align:center; padding-left:10px; float:left; line-height:32px; text-align:center; font-weight:900;">이미지</div>
		<div style="width:10%; height:32px; text-align:center; padding-left:10px; float:left; line-height:32px; text-align:center; font-weight:900;">제조사</div>
		<div style="width:10%; height:32px; text-align:center; padding-left:10px; float:left; line-height:32px; text-align:center; font-weight:900;">카테고리</div>
		<div style="width:10%; height:32px; text-align:center; padding-left:10px; float:left; line-height:32px; text-align:center; font-weight:900;">가격</div>
		<div style="width:10%; height:32px; text-align:center; padding-left:10px; float:left; line-height:32px; text-align:center; font-weight:900;">등록날짜</div>
	</div>

<?php
	if($rsProductList){
		$idx = 0;
		foreach($rsProductList as $this_rs){
			$idx++;
			$goods_id = $this_rs["goods_id"];
			$goods_name = $this_rs["goods_name"];
			$main_img = $this_rs["main_img"];

			if(!$main_im){
				$main_img = "-";
			}else{
				$main_img = "<img src='".$main_img."' width='60'/>";
			}
			$maker = $this_rs["maker"];
			$category_id = $this_rs["category_id"];
			$category_name = $this_rs["category_name"];
			$price = $this_rs["price"];
			$register_date = $this_rs["register_date"];
			$register_date_arr = explode(" ",$register_date);
			$register_date = $register_date_arr[0];

?>

	<div style="border-bottom:1px solid #e5e5e5; font-size:13px; line-height:32px; height:32px; text-align:center; width:100%; display:inline-block;">
		<div style="width:5%; height:32px; text-align:center; padding-left:10px; float:left; line-height:32px; text-align:center;">
			<input type='checkbox' name='chSelect' value="">
		</div>
		<div style="width:5%; height:32px; text-align:center; padding-left:10px; float:left; line-height:32px; text-align:center; ">
			<?=(($max_record * ($page_inx-1))+$idx) ?>	
		</div>
		<div style="width:38%; height:32px; text-align:center; padding-left:10px; float:left; line-height:32px; text-align:center;">
			<a href="#"><?=$goods_name?></a>
		</div>
		<div style="width:10%; height:62px; text-align:center; padding-left:10px; float:left; line-height:32px; text-align:center;">
			<?=$main_img?>
		</div>
		<div style="width:10%; height:32px; text-align:center; padding-left:10px; float:left; line-height:32px; text-align:center;">
			<?=$maker?>
		</div>
		<div style="width:10%; height:32px; text-align:center; padding-left:10px; float:left; line-height:32px; text-align:center;">
			<?=$category_name?>
		</div>
		<div style="width:10%; height:32px; text-align:center; padding-left:10px; float:left; line-height:32px; text-align:center;">
			<?=$price?>원
		</div>
		<div style="width:10%; height:32px; text-align:center; padding-left:10px; float:left; line-height:32px; text-align:center;">
			<?=$register_date?>
		</div>
	</div>
<?php 

	}
}
 ?>
 <div style="font-size: 13px; line-height: 32px; width: 250px; margin: 0px auto; border:0px solid red">
 	<?=$pagestr?>
 </div>
</div>







