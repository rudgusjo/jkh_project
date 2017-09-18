<?php session_start(); ?>

<?php 

	require_once "loginControllObj.php";

	$loginProcess = new loginController();

	$loginProcess->loginProcessing();

 ?>