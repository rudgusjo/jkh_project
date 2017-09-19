
@extends('layouts.app')

@section('content')

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
	<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js?cacheBust=56"></script>

</head>
<style type="text/css">

	body{
		font-family:'interparkM','interparkMEot';
	}
	li{
		list-style: none;
	}

	.account_header{
		margin:0 auto; 
		width: 1200px;
		margin-top:140px;
	}

	.account_header_title{
		width:340px;
		height:35px; 
		border-bottom:2px solid #383838; 
		color:#383838; 
		text-shadow:1px 1px 2px #828282; 
		box-shadow:3px 3px 3px #828282;
	}

	.account_wrapper{
		margin: 0 auto; 
		width: 1200px; 
		height: 800px;
	}

	.account_divBox{
		border: 1px solid #727272;
		border-radius: 5px;
		background-color: white;
		box-shadow:3px 3px 6px #848484;
	}

	.account_BottomBox{
		margin: 0 auto;
		border-bottom: 1px solid #727272;
	}

	.account_leftArea{
		width: 290px; 
		height: 1210px; 
		float: left;
		/*border: 1px solid black;*/
	}

	.account_fleaName{
		line-height: 40px; 
		width: 290px; 
		height: 40px;
	}

	.account_thList{
		margin-top: 10px; 
		width: 290px; 
		height: 1140px; 
	}

	.account_th{
		margin-top: 10px; 
		width: 90%; 
		height: 40px;
		line-height: 50px; 
	}

	.account_boothFrame{
		width: 640px; 
		height: 480px;
	}

	.account_accountArea{
		float: left; 
		margin-top: 10px;
		width: 640px;
		height: 700px;
	}

	.account_detailArea{
		float: left;
		margin-top: 10px;
		width: 250px;
		height: 700px;
	}

	.detailArea_header{
		 width:100%; 
		 height: 50px;
		 line-height: 50px;
	}

	.detailArea_body{
		width: 100%; 
		height: 80%;
	}

	.detailArea_content{
		margin-top: 20px;
		width: 90%;
	}

	.detailArea_content_title{
		width: 100%;
		margin-bottom: 5px;
	}

	.detailArea_content_text{
		width: 100%;
		margin-bottom: 3px;
	}

	.detailArea_footer{
		margin: 0 auto;
		width: 90%;
		height: 10.5%;
		border-top: 1px solid #727272;
	}

	.booth{

		border: 1px solid black;
	}

	.selectedBooth{
		border-color: #ff2b2b;
	}

	a:link{
		text-decoration: none;
		color: black;
	}
	a:visited{
		text-decoration: none;
		color: black;
	}
	a:hover{
		color: #ff2b2b;

	}

</style>

<script type="text/javascript">

	$(document).ready(function(){
		var chartWidth = '600';
		var chartHeight = '500';
		var chartFont = "Verdana";
		var chartFontSize = "13";
		var chartFontColor = "#000000";
		var plotFillAlpha = "80";
		var barColorArr = {};
		barColorArr['main'] = "#ff2b2b";
		barColorArr['sub_1'] = "#ad2d2d";
		barColorArr['sub_2'] = "#f79b9b";

		FusionCharts.ready(function(){
		    var fusioncharts = new FusionCharts({
			    type: 'mscolumn2d',
			    renderAt: 'chart-container',
			    width: chartWidth,
			    height: chartHeight,
			    dataFormat: 'json',
			    dataSource: {
			        "chart": {
			        	//레이블 값 및 단위 등 설정
			        	//"yaxismaxvalue": ,
			            "caption": $('.account_select option:selected').text(),
			            "subcaption": "<br><br>",
			            "xAxisName": "<br>",
			            "yAxisName": "",
			            "numberPrefix": '￦',
			            //"thousandSeparator": ",",
			            "formatNumberScale": "0",
			            "showPlotBorder" : 1,
			            "plotBorderColor":"#ffffff",
			            "plotFillAlpha":plotFillAlpha,
			            //"yFormatNumberScale":"0",

			            // 기본 레이블 폰트설정
			            "baseFont": chartFont,
				        "baseFontSize": chartFontSize,
				        "baseFontColor": chartFontColor,

				        // 데이터 막대의 value값 설정
				        // "valueFontSize": "12",
				        // "rotateValues": "0",
				        // "placeValuesInside": "0",
				        // "valueFontColor": "#000000",
				        "showValues":0,

				        "paletteColors": barColorArr['main']+","+barColorArr['sub_1'],
				        "slantLabels": "0",
				        //"labelDisplay": "wrap",
			            "theme": "fint"
			        },
			        "categories": [{
			            "category": [
							@for($i = 0, $length = count($accountInfo['pagingBoothInfo']); $i < $length; $i++)
				        		{
				        			"label":"B{{($accountInfo['paginateNum'] * $accountInfo['pagingBoothInfo']->currentPage() - ($length - 1)) + $i}}"
				        		},
				        	@endfor
			        	]
			        }],
			        "dataset": [{
			            "seriesname": "총 수익",
			            "data": [
			            	@for($i = 0, $length = count($accountInfo['pagingBoothInfo']); $i < $length; $i++)
				        		{
				        			"value":"{{$accountInfo['pagingBoothInfo'][$i]->account}}"
				        		},
				        	@endfor
			            ]
			        }]
			    }
			});

		    fusioncharts.render();
		});	

		$('#accountBtn').click(function(){

			if($('.account_select option:selected').val() == "ths_account"){
				
			}

			if($('.account_select option:selected').val() == "month_account"){
				
			}

			if($('.account_select option:selected').val() == "year_account"){
				
			}
			
		});

		var boothFrame = $('.account_boothFrame').offset();
		
		@for($i = 0, $length = count($accountInfo['boothInfo']); $i < $length; $i++)
			var top = boothFrame.top + ( ( {{$accountInfo['boothInfo'][$i]->top}} / 100 ) * 80 );
			var left = boothFrame.left + ( ( {{$accountInfo['boothInfo'][$i]->left}} / 100 ) * 80 );
			var width =( ( {{$accountInfo['boothInfo'][$i]->width}} / 100 ) * 80 );
			var height = ( ( {{$accountInfo['boothInfo'][$i]->height}} / 100 ) * 80 );
			var boothDiv = "<div class='booth account_divBox booth text-center' id='booth_{{$accountInfo['boothInfo'][$i]->id}}' style='position:absolute; top:"+top+"px; left:"+left+"px; width:"+width+"px; height:"+height+"px; line-height:"+height+"px;'>B{{$i + 1}}</div>";
			$('.account_boothFrame').append(boothDiv);
		@endfor

		var boothInfo = Array();
		@for($i = 0, $length = count($accountInfo['boothInfo']); $i < $length; $i++)

		@endfor

		$('.booth').click(function(){
			
            var id = $(this).attr('id');
            var idArr = id.split('_');
            var idValue = Number(idArr[1]);

            $('.selectedBooth').removeClass('selectedBooth');
            $(this).addClass('selectedBooth');

            @for($i = 0, $length = count($accountInfo['boothInfo']); $i < $length; $i++)
            	if(idValue == {{$accountInfo['boothInfo'][$i]->id}}){
            		$('.booth_header').text('{{$accountInfo['boothInfo'][$i]->booth_name}}');
            		$('.booth_content:eq(0)').text('{{number_format($accountInfo['boothInfo'][$i]->account)}} 원');
            		$('.booth_content:eq(1)').text('{{number_format($accountInfo['boothInfo'][$i]->commAccount)}} 원');
            		$('.booth_content:eq(2)').text('{{number_format($accountInfo['fleaThList'][0]->booth_fee)}} 원');
            		$('.booth_content:eq(3)').text('{{number_format($accountInfo['boothInfo'][$i]->finalAccount)}} 원');
            	}
            @endfor
		});
	});
	
</script>
<body>


	<div class="account_header">
		<h1 class="account_header_title">FLEA ACCOUNT TH</h1>
		<!--<hr style="border: 1px solid #a0a0a0; width: 1190px;">	-->
	</div>
	
	<br>
	<div class="account_wrapper"> 
	<!--정산 wrapper-->
		<div class="account_leftArea">
			<div class="text-center account_divBox account_fleaName"> 
				<a href="/account/host/{{$accountInfo['fleamarket'][0]->id}}}"> {{$accountInfo['fleamarket'][0]->flea_name}} </a>
			</div>
			<!--플레마켓 전체 정산 버튼-->
			<div class="account_divBox account_thList">
			<!--플레마켓 회차별 리스트-->
			@for($i = 0, $len = count($accountInfo['fleaThList']); $i < $len; $i++)
				<div class="text-center account_BottomBox account_th">
					<a href="/account/host/{{$accountInfo['fleamarket'][0]->id}}/th/{{$accountInfo['fleaThList'][$i]->id}}">{{$accountInfo['fleamarket'][0]->flea_name}} 第{{$accountInfo['fleaThList'][$i]->th}}</a>
				</div>	
			@endfor
			</div>
		</div>
		
		<div style="float: left; margin-left: 10px; width: 640px; height: 1190px;">
			<div class="account_divBox account_boothFrame">

				
				
			</div>
			<div class="account_accountArea account_divBox">
				<div style=" margin-left: 10px; margin-top: 30px; height: 60px;">
					<select class="account_select account_divBox" style="width: 180px; height: 31px;">
						<option value="ths_account">ブース別・総合売り上げ</option>
						<option value="month_account">ブース別・手数料の売り上げ</option>
					</select>
					<button class="btn btn-default" id="accountBtn" style="margin-top: -3px;">確認</button>
					
				</div>
				<div style="margin-left: 10px;" id="chart-container"></div>
				<br/>
				<div class="text-center" style="margin: 0 auto; width: 100%;"></div>
				<br/>
				<div class="text-center" style="margin: 0 auto; width: 100%;">{{$accountInfo['pagingBoothInfo']->Links()}}</div>
			</div>
		</div>
		<div style="float: left;margin-left: 10px;">
			<div class="account_divBox" style="width: 250px; height: 480px;">
				<div class="text-center detailArea_header account_BottomBox booth_header">NO SELECT</div>
				<div class="detailArea_body" style="height: 72%;">
					<div class="account_BottomBox detailArea_content">
						<li class="text-left detailArea_content_title">総合販売売り上げ</li>
						<li class="text-right detailArea_content_text booth_content">0 ウォン</li>
					</div>
					<div class="account_BottomBox detailArea_content">
						<li class="text-left detailArea_content_title">販売手数料・差額({{$accountInfo['commission']}}%)</li>
						<li class="text-right detailArea_content_text booth_content">0 ウォン</li>
					</div>
					<div class="account_BottomBox detailArea_content">
						<li class="text-left detailArea_content_title">ブース手数料・差額</li>
						<li class="text-right detailArea_content_text booth_content">0 ウォン</li>
					</div>
				</div>
				<div class="detailArea_footer">
					<li class="text-left" style="width: 100%; margin-top: 10px;">総合売り上げ</li>
					<li class="text-right booth_content" style="width: 100%; margin-top: 3px;">
					0 ウォン</li>
				</div>
			</div>
			<div class="account_detailArea account_divBox">
				<div class="text-center detailArea_header account_BottomBox">統括精算</div>
				<div class="detailArea_body">
					<div class="account_BottomBox detailArea_content">
						<li class="text-left detailArea_content_title">回次最高実績</li>
						<li class="text-right detailArea_content_text">{{number_format($accountInfo['maxAcc'])}} ウォン</li>
					</div>
					<div class="account_BottomBox detailArea_content">
						<li class="text-left detailArea_content_title">回次最低実績</li>
						<li class="text-right detailArea_content_text">{{number_format($accountInfo['minAcc'])}} ウォン</li>
					</div>
					<br>
					<br>
					<div class="account_BottomBox detailArea_content">
						<li class="text-left detailArea_content_title">ブース別・総合手数料実績</li>
						<li class="text-right detailArea_content_text">{{number_format($accountInfo['finalCommAccount'])}} ウォン</li>
					</div>
					<div class="account_BottomBox detailArea_content">
						<li class="text-left detailArea_content_title">ブース別・総合ブース手数料実績</li>
						<li class="text-right detailArea_content_text">{{number_format($accountInfo['finalBoothFee'])}} ウォン</li>
					</div>
					<div class="account_BottomBox detailArea_content">
						<li class="text-left detailArea_content_title">その他</li>
						<li class="text-right detailArea_content_text">0 ウォン</li>
					</div>	
				</div>
				<div class="detailArea_footer">
					<li class="text-left" style="width: 100%; margin-top: 10px; ">総合実績額</li>
					<li class="text-right" style="width: 100%; margin-top: 3px;">
					{{number_format($accountInfo['finalAccount'])}} ウォン</li>
				</div>
			</div>
		</div>
	</div>

</body>
@endsection