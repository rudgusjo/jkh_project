<?php 
	require_once "DBConn.php";

	$dbConn 	= new DBConn('localhost',3306,'phpdb','root','');
	$c_id = isset($_GET['c_id'])?$_GET['c_id']:"";
	$title;
	$content;
	$file = array();

	$dbConn->DB_update('freeboard',"board_viewCount = (board_viewCount + 1)","board_id = {$c_id}");
	$dbConn->DB_select('freeboard',"*","board_id = {$c_id}");
	$title 		= $dbConn->getResult()[0]['board_title'];
	$content 	= $dbConn->getResult()[0]['board_content'];
	$date 	 	= $dbConn->getResult()[0]['board_date'];
	$viewCount 	= $dbConn->getResult()[0]['board_viewCount'];

	function fileDownView(){
		global $dbConn,$c_id;
		$dbConn->DB_select('uploadfile',"*","board_id ='{$c_id}'");
		for($count = 0;$count < count($dbConn->getResult());$count++){
			echo "
			<span><a href='http://localhost/shopping/shoppingMall/freeBoard/fileDownload.php?filename={$dbConn->getResult()[$count]['filename']}'>{$dbConn->getResult()[$count]['filename']}</a></span> &nbsp;&nbsp;
			";
		}
	}
 ?>