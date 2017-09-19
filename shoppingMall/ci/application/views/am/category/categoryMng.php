<script type='text/javascript'>
	function categoryAdd(num, parentCategory){

		openMessaoe('popupCateooryAdd');
		$("#cateoory_add_code").val(num);
		$("#category_add_upper_code").val(parentCategory);
		$("#category_add_name").focus();
	}

	function categorySave(textObjID){
		if(!Trim($('#'+textObjID).val())){
			alert('추가하실 카테고리명을 입력해주십시오');
			return false;
		}

		insertAdd($('#'+textObjID).$('#category_add_code').val(),$("#category_add_upper_code").val());
	}

	function lodingList(UPPER_CODE){
	$.ajax({
		type: 'POST',
		url: "/am/categoryGetList",
		data: {upper_code: UPPER_CODE},
		cache: false,
		async: false
	})

	.done(function(html){
		if(UPPER_CODE == -1){$("#divMain").html(html);}
		else 				{$("#divTDCon" + UPPER_CODE).html(html);}
	});

	// if(UPPER_CODE == -1) //1if9fE1|.T'.E'-|% Elf.
	openAIICategory(UPPER_CODE);
	// }
	}
	
	function errorDebugging(jqXHR, textStstus){
		var errorTxt = " ";

		if(jqXHR.status==0){
			errorTxt = "offline";
		}else if(jqXHR.status==404){
			errorTxt = "URL not found";
		}else if(jqXHR.status==500){
			errorTxt = "Internel Server Error";
		}else{
			errorTxt = "Else... ";
		}

		errorTxt += jqXHR.responseText;
		alert(errorTxt);
	}

	function openAllCategory(UPPER_CODE){
		var upper_code_array = null;
		$.ajax({
			type: 'POST',
			url: "/am/categoryGetCategoryCode",
			data: {upper_code: UPPER_CODE },
			cache: false,
			async: false
		})
		.done(function(html){
			if(html){upper_code_array = eval(html);}
		})
		.fail(function(jqXHR, textStstus){
			errorDebugging(jqXHR, textStstus);
		});

		for(var i=0; i < upper_code_array.length; i++){

			var upper_code_now = upper_code_array[i];
			if(upper_code_now){lodingList(upper_code_now);}
		}

	}

	function insertAdd(textObj, CODE, UPPER_CODE){

		/* var HTMLS = " (div class='divTR amCA1'>":
		HTMLS += " (span class='divTDHeader')":
		HTMLS += " " + textObj.va|() + " ".‘
		HTMLS += " (/span)":
		HTMLS += " (span class='divTDCon')":
		HTMLS += " (/span)":
		HTMLS += " (/div> ".‘
		$("#divMain").append(HTMLS); */

		$.ajax({
			type: 'POST',
			url: "/am/categoryMngOk",
			data: {name: Trim(textObj.val()), upper_code : CODE},
			cache: false,
			async: false
		})

		.done(function(html){
			if(html == "1"){
				alen("저장되었습니다.");
				lodingList(UPPER_CODE);
			}else{
				alert("Error 2" + html);
			}
		});

		closeMessage("popupCategoryAdd");
		textObj.val("");
	}

	function categorySaveEvent(KEYCODE){
		if(KEYCODE == 13){	//13 = ENTER KEY
			categorySave('category_add_name');
			return false;
		}
		return true;
	}

	function init(){
		lodingList(-1);
	}

	$(document).ready(function(){
		init();
	});

	</script>

	<div style="width:100%; background-color:white; display:inline-block;">
		<div class="divTR">
			<span class="divTDHeader">
				<b style="font-size:14px">1차 분류</b>
				<a style="margin-left:10px; color:blue; cursor:pointer;" id="aF1" onmouseover="javascript:toSizeStyle(this, 18);" onmouseout="javascript:toSizeStyle(this);" onclick="javascript:categoryAdd(1,-1);">+</a>
			</span>
		</div>
	</div>

	<div style="width:100%; background-color:white; display:inline-block;" id="divMain">
		<div class="divTR">
			<span class="divTDCon" id="divTDConId"></span>
		</div>
	</div>
	
	<div id="popupCategoryAdd" style="width:300px; height:70px; background-color:white; display:none; border:2px solid #dddddd;">
		<div style="margin: 0px auto; width:80%; height:30px; text-align:center; margin-top:18px;">
			<input type=hidden id="category_add_code" name="category_add_code" value="">
			<input type=hidden id="category_add_upper_code" name="category_add_upper_code" value="">
			<input type=text id="category_add_name" name="category_add_name" value="" onkeypress="javascript:return categorySaveEvent(event.keyCode);">
			<button class="css3button" style="width:40px;" onclick="javascript:categorySave('category_add_name');">
				저장
			</button>
			
		</div>
	</div>
	<br/>
			<br/>
			<br/>
			










