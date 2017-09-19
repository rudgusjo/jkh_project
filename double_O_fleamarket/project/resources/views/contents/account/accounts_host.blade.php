
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
		/*border:1px solid black;*/
	}
	
	#account_header_title{
		width:280px;
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
	}

	.account_BottomBox{
		margin: 0 auto;
		border-bottom: 1px solid #727272;
	}

	.account_leftArea{
		width: 250px; 
		height: 700px; 
		float: left;
	}

	.account_fleaName{
		line-height: 40px; 
		width: 250px; 
		height: 40px;
		background-color: white;
		box-shadow:3px 3px 6px #848484;
	}

	.account_thList{
		margin-top: 10px; 
		width: 250px; 
		height: 650px; 
		background-color:white;
		box-shadow:3px 3px 6px #848484;
	}

	.account_th{
		margin-top: 10px; 
		width: 90%; 
		height: 40px;
		line-height: 50px; 
	}

	.account_accountArea{
		float: left; 
		margin-left: 10px; 
		width: 700px;
		height: 700px;
		background-color:white;
		box-shadow:3px 3px 6px #848484;
	}

	.account_detailArea{
		float: left;
		margin-left: 10px;
		width: 225px;
		height: 700px;
		background-color: white;
		box-shadow:3px 3px 6px #848484;
	}

	.detailArea_header{
		 width:100%; 
		 height: 7%;
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

	.th_pagination{
		display: block;
	}
	.month_pagination{
		display: none;
	}
	.year_pagination{
		display: none;
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
		var chartWidth = '650';
		var chartHeight = '500';
		var chartFont = "Verdana";
		var chartFontSize = "15";
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
				            @for($i = 0, $length = count($accountInfo['pagingThInfo']); $i < $length; $i++)
				        		{
				        			"label":"{{$accountInfo['pagingThInfo'][$i]->flea_name}}<br>"+"第"+{{$accountInfo['pagingThInfo'][$i]->th}}
				        		},
				        	@endfor
			        	]
			        }],
			        "dataset": [{
			            "seriesname": "총 수익",
			            "data": [
				            @for($i = 0, $length = count($accountInfo['pagingThInfo']); $i < $length; $i++)
				        		{
				        			"value":"{{$accountInfo['pagingThInfo'][$i]->account}}"
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
						            @for($i = 0, $length = count($accountInfo['pagingThInfo']); $i < $length; $i++)
						        		{
						        			"label":"영진 플리마켓<br>"+"第"+{{$accountInfo['pagingThInfo'][$i]->th}}
						        		},
						        	@endfor
					        	]
					        }],
					        "dataset": [{
					            "seriesname": "총 수익",
					            "data": [
						            @for($i = 0, $length = count($accountInfo['pagingThInfo']); $i < $length; $i++)
						        		{
						        			"value":"{{$accountInfo['pagingThInfo'][$i]->account}}"
						        		},
						        	@endfor
					            ]
					        }]
					    }
					});

				    fusioncharts.render();
				});	
				$('.th_pagination').css('display','block');
				$('.month_pagination').css('display','none');
				$('.year_pagination').css('display','none');
			}

			if($('.account_select option:selected').val() == "month_account"){
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
						            @for($i = 0, $length = count($accountInfo['monthInfo']); $i < $length; $i++)
						        		{
						        			"label":"{{$accountInfo['monthInfo'][$i]->month}}"+"月"
						        		},
						        	@endfor
					        	]
					        }],
					        "dataset": [{
					            "seriesname": "총 수익",
					            "data": [
						            @for($i = 0, $length = count($accountInfo['monthInfo']); $i < $length; $i++)
						        		{
						        			"value":{{$accountInfo['monthInfo'][$i]->account}}
						        		},
						        	@endfor
					            ]
					        }]
					    }
					});

				    fusioncharts.render();
				});	
				$('.th_pagination').css('display','none');
				$('.month_pagination').css('display','block');
				$('.year_pagination').css('display','none');
			}

			if($('.account_select option:selected').val() == "year_account"){
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
						            @for($i = 0, $length = count($accountInfo['yearInfo']); $i < $length; $i++)
						        		{
						        			"label":"20"+{{$accountInfo['yearInfo'][$i]->year}}+"年"
						        		},
						        	@endfor
					        	]
					        }],
					        "dataset": [{
					            "seriesname": "総合売り上げ",
					            "data": [
						            @for($i = 0, $length = count($accountInfo['yearInfo']); $i < $length; $i++)
						        		{
						        			"value":{{$accountInfo['yearInfo'][$i]->account}}
						        		},
						        	@endfor
					            ]
					        }]
					    }
					});

				    fusioncharts.render();
				});	
				$('.th_pagination').css('display','none');
				$('.month_pagination').css('display','none');
				$('.year_pagination').css('display','block');
			}
		});
	});
	
</script>
<body>


	<div class="account_header">
		<h1 id="account_header_title" >FLEA ACCOUNT</h1>
		<!--<hr style="border: 1px solid #a0a0a0; width: 1190px;">	-->
	</div>
	
	<br>
	<div class="account_wrapper"> 
	<!--정산 wrapper-->
		<div class="account_leftArea">
			<div class="text-center account_divBox account_fleaName"> 
				<a href="/account/host/{{$accountInfo['pagingThInfo'][0]->id}}}"> {{$accountInfo['pagingThInfo'][0]->flea_name}} </a> 
			</div>
			<!--플레마켓 전체 정산 버튼-->
			<div class="account_divBox account_thList">
			<!--플레마켓 회차별 리스트-->
				@for($i = 0, $len = count($accountInfo['fleaThList']); $i < $len; $i++)
					<div class="text-center account_BottomBox account_th">
						<a href="/account/host/{{$accountInfo['fleaThList'][0]->flea_id}}/th/{{$accountInfo['fleaThList'][$i]->id}}">{{$accountInfo['pagingThInfo'][0]->flea_name}}　第{{$accountInfo['fleaThList'][$i]->th}}</a>
					</div>	
				@endfor
			</div>
		</div>
		
		
		<div class="account_accountArea account_divBox">
			<div style="margin-left: 10px; margin-top: 30px; height: 60px;">
				<select class="account_select account_divBox" style="width: 180px; height: 31px;">
					<option value="ths_account">フリーマーケット回次別・売り上げ</option>
					<option value="month_account">月別・決算</option>
					<option value="year_account">年別・決算</option>
				</select>
				<button class="btn btn-default" id="accountBtn" style="margin-top: -3px;">確認</button>
				
			</div>
			<div style="margin-left: 10px;" id="chart-container"></div>
			<br/>
			<div class="text-center th_pagination" style="margin: 0 auto; width: 100%;">
			1
				{{$accountInfo['pagingThInfo']->Links()}}
			</div>
			<div class="text-center month_pagination" style="margin: 0 auto; width: 100%;">
			2
				{{$accountInfo['monthInfo']->Links()}}
			</div>
			<div class="text-center year_pagination" style="margin: 0 auto; width: 100%;">
			3
				{{$accountInfo['yearInfo']->Links()}}
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
					<li class="text-left detailArea_content_title">出店者の総合手数料実績</li>
					<li class="text-right detailArea_content_text">{{number_format($accountInfo['allCommAcc'])}} ウォン</li>
				</div>
				<div class="account_BottomBox detailArea_content">
					<li class="text-left detailArea_content_title">回次別・総合ブース手数料</li>
					<li class="text-right detailArea_content_text">{{number_format($accountInfo['allBoothFeeAcc'])}} ウォン</li>
				</div>
				<div class="account_BottomBox detailArea_content">
					<li class="text-left detailArea_content_title">その他</li>
					<li class="text-right detailArea_content_text">0 ウォン</li>
				</div>	
			</div>
			<div class="detailArea_footer">
				<li class="text-left" style="width: 100%; margin-top: 10px; ">総合実績額</li>
				<li class="text-right" style="width: 100%; margin-top: 3px;">
				{{number_format($accountInfo['allAccount'])}} ウォン</li>
			</div>
		</div>
	</div>
	<br/>
	<br/>
	<br/>
</body>

@endsection