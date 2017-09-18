<?php session_start(); ?>
<?php 
	require_once "joinControllObj.php";
	if(!isset($_SESSION['id_conf_judge'])){
		$_SESSION['id_conf_judge'] = false;
		// $_SESSION['']
	}	

 ?>
<?php 
	$joinController = new joinController();
	$id_confirm = isset($_POST['name_judgeId'])?$_POST['name_judgeId']:"";
	$confirm 	= isset($_POST['join_confirm'])?$_POST['join_confirm']:"";
	if($id_confirm == 'id_confirm'){
		$joinController->func_judgeId();
		$_SESSION['id_conf_judge'] = true;
	}
	if($confirm == 'confirm'){
		$joinController->rightID = $_SESSION['id_conf_judge'];
		$joinController->processing();
	}
 ?>