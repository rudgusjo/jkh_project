<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>상품 추가 </title>

	<style type="text/css">

		::selection{ background-color: #E13300; color: white; }
		::moz-selection{ background-color: #E13300; color: white; }
		::webkit-selection{ background-color: #E13300; color: white; }

		body{
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a{
			color: #003399;
			background-color: transparent;
			font-weight: normal;
		}

		h1 {
			color: #444;

			background-color: transparent;
			border-bottom: 1px solid #DODODO;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #DODODO;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body{
			margin: 0 15px 0 15px;
		}

		p.footer{

			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		.divTR{

			width:100%;
			clear:both;
			line-height:30px;
			margin:0px auto;
			margin-top:5px;
			display:inline-block;
			border-bottom:1px dotted #444444;
			/* background-colorired*/
		}

		.divTD Header {
			width:15%;
			height:100%;
			line-height:300x;

			/* background-colorIyellow:*/
			display:inline-block;
			padding-left:18px;
			float:left;
			padding:5px;
		}

		.divTDCon {
			width:75%;
			height:100%;
			float:right;
			line-height:30px;
			padding-top:5px;

			/* background-coloriblue.‘*/
			display:inline-block;
			padding:5px;
		}

		#container{
			margin: 10px;
			border: 0px solid #D0D0D0;
			-webkit-box-shadow: 0 0 8px #D0D0D0;
		}
	</style>

	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/bootstrap-theme.min.css">
	<link href="/css/justified-nav.css" rel="stylesheet">
	<link href="/css/main.css" rel="stylesheet" type="texchs"></Link>
	<script src="ljs/jquery-1 .10.1 .min.js" type="text/javascript"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/juery.bpopup.min.js" type="text/javascript"></script>
	<script src="/js/jsMain.js" type="text/javascript"></script>

	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	<!--[if lt IE 9]>( ! [endif]--><!--../../assets/jS/ie8-responsive-file-warning.js-->
	<script src="/js/ie-emulation-modes-warning.js"></script>

	<!-- HTMLS shim and Respond.js for IE8 support of HTMLS elements and media queries -->
	<!--[if It IE 9])
	<script src="/js/htmlSshiv.min.js">(/script>
	<script src="/js/respond.min.js">(/script>
	<![endif]-->
	</head>
<body>

	<div class="container">

	<div class="masthead">
	<h3 class="text-muted" style="font-family:NanumGothicBold;">소스놀이터 쇼핑몰</h3>
		<nav>
			<ul class="nav nav-justified">
				<li <?php if($menu_code == "home" || !$menu_code){echo " class='active' ";}?>>
					<a href="/am">Home</a>
				</li>
				<li <?php if($menu_code == "product" || !$menu_code){echo " class='active' ";}?>>
					<a href="http://localhost:8080/shopping/ci/index.php/Am/productAdd">상품관리</a>
				</li>
				<li <?php if($menu_code == "category" || !$menu_code){echo " class='active' ";} ?>>
					<a href="http://localhost:8080/shopping/ci/index.php/Am/categoryMng">카테고리관리</a>
				</li>
				<li><a href="#">-</a></li>
				<li><a href="#">-</a></li>
				<li><a href="#">-</a></li>
			</ul>
		</nav>
	</div>




